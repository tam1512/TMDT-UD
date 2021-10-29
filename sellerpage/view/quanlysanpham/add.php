<?php
$error = "";
$error2 = "";
$error3 = "";
$errorpic = "";
if(isset($_POST["veg-add-btn"])) 
{
  if($_FILES['vegimage']['size'] == 0 && $_FILES['vegimage']['error'] == 0)
  {
	  $errorpic = "*Hãy chọn hình ảnh!!";
  }
  else
  {
  if($_POST["vegamount"]<0 || $_POST["vegprice"] < 1000)
  {
	  $error = "*Hãy nhập số lượng > 0 và giá tiền > 1000đ";
	  $error3 = "(*)";
  }
  else
  {
  $target_dir = "../images/";
  $target_file = $target_dir . basename($_FILES["vegimage"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $check = getimagesize($_FILES["vegimage"]["tmp_name"]);
  if($check !== false) 
  {
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
	{
		$errorpic =  "*Chỉ chấp nhận file JPG, JPEG, PNG & GIF.";
		$uploadOk = 0;
	}
		else
		{
			if (file_exists($target_file)) 
			{
			  $errorpic = "*File của bạn đã tồn tại.";
			  $uploadOk = 0;
			}
			else
			{
				if ($_FILES["vegimage"]["size"] > 2000000) 
				{
				  $errorpic = "*File của bạn quá lớn (>2mb).";
				  $uploadOk = 0;
				}
				else
				{
					if ($uploadOk == 0) 
					{
					  $errorpic = "*Có lỗi xảy ra khi tải ảnh lên.";
					} 
					else 
					{
					  if(empty($_POST['vegname']) || empty($_POST['vegcategory']) || empty($_POST['vegunit']) || empty($_POST['vegamount']) || empty($_POST['vegprice']) )
					  {
							$error="*Hãy nhập đầy đủ thông tin!!";
							$error2="(*)";
						    $error3="(*)";
					  }
					  else
					  {			  
						  if (move_uploaded_file($_FILES["vegimage"]["tmp_name"], $target_file)) 
						  {
							require "C:\\xampp\htdocs\market\connection.php"; 
							$vegname = $_POST['vegname'];
							$vegcategory = $_POST['vegcategory'];
							$vegunit = $_POST['vegunit'];
							$vegamount = $_POST['vegamount'];
							$vegprice = $_POST['vegprice'];
							$sql = "INSERT INTO vegetable(CategoryID,VegetableName,Unit,Amount,Image,Price) VALUES (?,?,?,?,?,?)";
							$stmt = $conn->prepare($sql);
							$stmt->bind_param('ssssss',$vegcategory,$vegname,$vegunit,$vegamount,$target_file,$vegprice);
							$stmt->execute();					
		//					htmlspecialchars( basename( $_FILES["vegimage"]["name"]))					
						  } 
						  else 
						  {
							$errorpic = "*Có lỗi xảy ra khi tải ảnh lên.";
						  }
					  }
					}
				}
			}
		}
	  } 
	  else 
	  {
		$errorpic = "*File bạn tải không phải là hình ảnh!!.";
		$uploadOk = 0;
	  }
    }
  }
}

?>