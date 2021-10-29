 <?php  
 require_once("../../../controller/class/database.php");
 $classconnection = new connection();
 $conn = $classconnection->connect();  
 $iduser = $_POST['iduser'];
 $output = "";
 $sqlload = "SELECT * FROM address WHERE IDUser = ?";
 //$sqlload = "SELECT * FROM address";
 $stmt = $conn->prepare($sqlload);
 $stmt->bind_param('s',$iduser);
 $stmt->execute();
 $result = $stmt->get_result();
 while($row = $result->fetch_assoc())
 {
	  $output .= "
			<div class='col col-5'><p> Họ và tên:  ".$row['Fullname']." </p></div>
			<div class='col col-5'><p> Số điện thoại: ".$row['Phonenumber']."</p></div>
			<div class='col col-2'><button data-id_del='".$row['ID']."' type='button' class='btn btn-danger address_del_btn' id='address_del_btn'>Xóa</button></div>			
			<div class='col col-5'><p> Địa chỉ: ".$row['Address']."</p></div>
			<div class='col col-5'><p> Loại Địa chỉ: ".$row['Type']."</p></div>			
			<div class='col col-12'><hr></div>  
	  ";
 }
 echo $output;
 ?> 