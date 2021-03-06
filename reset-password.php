<?php 
require_once 'controller/authController.php';
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php echo $title ?></title>
<!-- CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="css/maincss.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
.reset-container
	{
		position: relative;
		z-index: 1;
		width: 100%;
		height: 100%;
	}
.reset-container-tab
	{
		position: relative;
		z-index: 2;
		margin: auto;
		top: 10%;
		width: 50%;
		height: 80%;
		background: #FFFFFF;
	}	
</style>
</head>
<body>
	<div class="wrapper">	
		<?php require_once 'view/headeraccount.php'; ?> 		
		<?php
		if($_GET['key'] && $_GET['token'])
		{
			//include "model/db.php";
			if(isset($_GET['alert']))
			{
				$error = "*Hai mật khẩu nhập không trùng khớp!!";
			}
			$email = $_GET['key'];
			$token = $_GET['token'];
			//query = mysqli_query($conn,"SELECT * FROM `authme` WHERE `token`='".$token."' and `email`='".$email."';");
			$query = "SELECT * FROM `users` WHERE `token`='".$token."' and `Email`='".$email."';";
			$stmt = $conn->prepare($query);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowcount = mysqli_num_rows($result);
			echo $rowcount;
			$row = $result->fetch_assoc();
			$curDate = date("Y-m-d H:i:s");
			if ($rowcount > 0) 
			{			
				if($row['exp_date'] >= $curDate)
				{
				?>			
				<div class="container-fluid py-5" style="padding: 0">
				<div class="container py-5 shadow-lg">		
				<div class="reset-container">
				<div class="reset-container-tab">
					<h2>Reset Mật Khẩu</h2>
					<form action="reset-password.php" method="post">
					<input type="hidden" name="email" value="<?php echo $email;?>">
					<input type="hidden" name="reset_link_token" value="<?php echo $token;?>">
					<div class="form-group">
					<label>Mật Khẩu</label>
					<input type="password" name='password' class="form-control">
					<small style="color: red"><?php echo $error?></small>
					</div>                
					<div class="form-group">
					<label>Nhập Lại Mật Khẩu</label>
					<input type="password" name='cpassword' class="form-control">
					</div>
					<button type="submit" name="new-password" class="btn btn-primary bg-success">Xác Nhận</button
					</form>
				</div>
				</div>
				</div>						
				</div>
				<?php 
				} 
			}
			if ($row['exp_date'] < $curDate)
			{
			header ("location: reset-password-timeout.php");
			exit();
			}
		}
		?>
		<?php require_once 'view/footer.php'; ?>	
	</div>
</body>
</html>