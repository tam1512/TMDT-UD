<?php    
    session_start();
	header("Content-type: text/html; charset=utf-8");
    date_default_timezone_set('Asia/Ho_Chi_Minh');
	require_once ("class/database.php"); 
    require_once ("class/account.php");    
	$todaytime = time();
	$classconnection = new connection();
	$conn = $classconnection->connect();
	$error = "";
	$error2 = "";
    $errorfullname = "";
    $errorusername = "";
    $errorphonenumber = "";
	$username = "";	
	$title = "E-Commerce";
    $classaccount = new account();

if(isset($_POST['login-btn'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
	if($username=='' || $password=='')
	{
		$error = "*Hãy nhập đầy đủ email và mật khẩu!!";
	}
	else
	{
        if($accountarray = $classaccount->getAccount($username,$conn))
        {
            $return_var = $classaccount->checkPassword($accountarray['Username'],$password,$conn);
            if($return_var == true)
		    {
    //            if($classaccount->checkTOTP($accountarray['username'],$conn)==true)
    //            {
    //                $realnametotp = $accountarray['realname'];
    //                header("location: authen-member/index.php?name=".$realnametotp."");
    //                exit();
    //            }
    //            else
    //            { 
				    $setlogintimesql = "UPDATE users SET lastlogin=? WHERE Username=?;";
				    $stmtlogintime = $conn->prepare($setlogintimesql);
				    $stmtlogintime->bind_param('ss',$todaytime,$accountarray['Username']);
				    $stmtlogintime->execute();
                    $_SESSION['ID']= $accountarray['ID'];
                    $_SESSION['Username']= $accountarray['Username'];
                    $_SESSION['Password']= $accountarray['Password'];
			        $_SESSION['Email']= $accountarray['Email'];
			        $_SESSION['Fullname']= $accountarray['Fullname'];
			        $_SESSION['Phonenumber']= $accountarray['Phonenumber'];
			        $_SESSION['Shop']= $accountarray['Shop'];
			        $_SESSION['regdate']= $accountarray['regdate'];
				    $_SESSION['lastlogin']= $accountarray['lastlogin'];
                    header('Location: index.php');
                    exit();
    //            }
            }
            else
		    {
                $error="*Username hoặc mật khẩu không đúng!!";
            } 
        }
        else
        {
            $error="*Username hoặc mật khẩu không đúng!!";
        }		
    }
}

if(isset($_POST['register-btn']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
	$fullname = $_POST['fullname'];
    $timetoday = time();
    $salt = $classaccount->getRandomString(16);
    //$passwordhash = hash("sha256",$password);
    $passwordhash = '$SHA$'.$salt.'$'.hash('sha256',hash('sha256', $password).$salt);
	if($username=='' || $password=='' || $fullname=='')
	{
		$error = "*Hãy nhập đầy đủ thông tin!!";
		$error2 = "(*)";
	}
	else
	{
        $addaccountarray = array("Username" => $username, "Password" => $passwordhash, "Fullname" =>$fullname,"Shop" => $username, "regdate" => $timetoday);
		if($classaccount->addAccount($addaccountarray, $conn))
		{
			header("Location: index.php");
			exit();
		}
		else
		{
			$error="*Tên này đã có người đặt!!";
            $error2="(*)";
		}
    } 
}
    //log out user
    if(isset($_GET['logout']))
	{
        session_destroy();
        unset($_SESSION['ID']);
        unset($_SESSION['Username']);
        // unset($_SESSION['verified']);
        unset($_SESSION['Password']);
        unset($_SESSION['Email']);
		unset($_SESSION['Fullname']);
		unset($_SESSION['Phonenumber']);
		unset($_SESSION['Shop']);
		unset($_SESSION['regdate']);
		unset($_SESSION['lastlogin']);
        header('location: index.php');
        exit();
    }

	if(isset($_POST['account-btn']))
	{
        $userid = $_SESSION["ID"];
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $phonenumber = $_POST['phonenumber'];
		$email = $_POST['email'];
        if($fullname != $_SESSION['Fullname'])
        {
            if(isset($fullname))
            {
                if($fullname=="")
                {
                    $errorfullname = "*Hãy nhập đầy đủ họ và tên";
                }
                else
                {
                    $fullnamesql = "UPDATE users SET Fullname=? WHERE ID=?;";
                    $stmt = $conn->prepare($fullnamesql);
                    $stmt->bind_param("ss", $fullname, $userid);
                    $stmt->execute();
                    $_SESSION['Fullname'] = $fullname;
                }
            }
        }
        if($username != $_SESSION['Username'])
        {
            if(isset($username))
            {
                if($username=="")
                {
                    $errorusername = "*Hãy nhập đầy đủ username";
                }
                else
                {
                $usernamesql = "UPDATE users SET Username=? WHERE ID=?;";
                $stmt = $conn->prepare($usernamesql);
                $stmt->bind_param("ss", $username, $userid);
                $stmt->execute();
                $_SESSION['Username'] = $username;
                }   
            }
        }
        if($phonenumber != $_SESSION['Phonenumber'])
        {
            if(isset($phonenumber))
            {
                if($phonenumber=="")
                {
                    $errorphonenumber = "*Hãy nhập đầy đủ số điện thoại";
                }
                else
                {
                    if ($classaccount->checkPhoneNumber($phonenumber))
                    {
                    $phonenumbersql = "UPDATE users SET Phonenumber=? WHERE ID=?;";
                    $stmt = $conn->prepare($phonenumbersql);
                    $stmt->bind_param("ss", $phonenumber, $userid);
                    $stmt->execute();
                    $_SESSION['Phonenumber'] = $phonenumber;
                    }
                    else 
                    {
                    $errorphonenumber = "*Sai định dạng sđt (10 số)";
                    }
                }
            }
        }
        if($email == "")
        {
            $error = "*Hãy nhập đầy đủ email!!";
        }
        else 
        {
            if(isset($_POST['emailold']))
            {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL) && $_POST['emailold']!="") 
                {
		          $error = "*Sai Định Dạng Email!!";              
		        }
	            $accountarr = $classaccount->getAccount($_SESSION['Username'],$conn);
                $emailold = $accountarr['Email'];
                if($_POST['emailold'] == $emailold)
                {
                    $usernameemail = $_SESSION['Username'];
	    	        $emailQuery = "SELECT * FROM users WHERE Email=? LIMIT 1";
                    $stmt = $conn->prepare($emailQuery);
                    $stmt->bind_param('s',$email);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $userCount = $result->num_rows;
                    $stmt->close();	
                    if($userCount>0)
                    {
                        $error = "*Email Đã Tồn Tại!!";
                    }	
                    if(empty($error))
                    {
			            $emailsql="UPDATE users SET Email = '".$email."' WHERE Username = '".$usernameemail."';";
                        $result = mysqli_query($conn, $emailsql);
			            if(!empty($result))
			            {
			                $sqlemailcheck = "SELECT * FROM users where email = '$email'";
                            $result = mysqli_query($conn, $sqlemailcheck);
                            $row = mysqli_fetch_assoc($result);
                            $_SESSION['Email']= $row['Email'];
                            header('location: account.php');
                        }
                        else
                        {
                            $errors['db_error']="Không Ghi Được Email!";
                        } 
                    }
                }
                else if($_POST['emailold'] != $emailold && $_POST['emailold']!="")
                {
                $error = "*Email cũ không trùng khớp với tài khoản!!";
                }
            }           
            else if(!isset($_POST['emailold']))
            {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                {
		          $error = "*Sai Định Dạng Email!!";              
		        }
		        $usernameemail = $_SESSION['Username'];
	    	    $emailQuery = "SELECT * FROM users WHERE Email=? LIMIT 1";
                $stmt = $conn->prepare($emailQuery);
                $stmt->bind_param('s',$email);
                $stmt->execute();
                $result = $stmt->get_result();
                $userCount = $result->num_rows;
                $stmt->close();	
                if($userCount>0)
                {
                    $error = "*Email Đã Tồn Tại!!";
                }	
                if(empty($error))
                {
			        $emailsql="UPDATE users SET Email = '".$email."' WHERE Username = '".$usernameemail."';";
                    $result = mysqli_query($conn, $emailsql);
			        if(!empty($result))
			        {
				        $sqlemailcheck = "SELECT * FROM users where email = '$email'";
                        $result = mysqli_query($conn, $sqlemailcheck);
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['Email']= $row['Email'];
                        header('location: account.php');
                        //exit();
                    }
                    else{
                        $errors['db_error']="Không Ghi Được Email!";
                    }
                }
            }
        }
	}
    if(isset($_POST['address-btn'])){
        $iduser = $_SESSION['ID'];
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $phonenumber = $_POST['phonenumber'];
        $type = $_POST['type'];
        if($fullname == "" || $address == "" || $phonenumber == "" || $type == "")
        {
            $error = "*Hãy nhập đầy đủ thông tin!!";
        }
        else 
        {
	        if($classaccount->checkPhoneNumber($phonenumber))
            {
            $sqladdress = "INSERT INTO address(IDUser,Fullname,Address,Phonenumber,Type) VALUES (?,?,?,?,?)";
            $stmt = $conn->prepare($sqladdress);
            $stmt->bind_param('sssss', $iduser, $fullname, $address, $phonenumber, $type);
            $stmt->execute();
            }
            else 
            {
            $error = "*Sai định dạng sđt (10 số)";
            }
        }

    }
	if(isset($_POST['password-reset-btn'])){
        $email = $_POST['email'];
        $username = $_POST['username'];

        //validation
            $sql = "SELECT * FROM users WHERE Username=? AND Email=?  LIMIT 1";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ss', $username , $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            $row = $result->num_rows;
            if($row == 1)
			{
                    header("Location: controller/password-reset-token.php?email=$email");
                    exit();
            }
            else
			{
                $error="*Email hoặc Username không đúng!!";
            }            
    }    
	if(isset($_POST['new-password'])){
		$email = $_POST['email'];
		$reset_link_token = $_POST['reset_link_token'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

            if($password == $cpassword)
			{
                    header("Location: controller/update-forget-password.php?email=$email&reset_link_token=$reset_link_token&password=$password");
                    exit();
            }
            else
			{
                header("location: reset-password.php?key=$email&token=$reset_link_token&alert=1");
            }            
    }  
?>