<!doctype html>
<?php 
require_once 'controller/authController.php';
?>
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
</head>
<body>
	<div class="wrapper">
		<?php require_once 'view/headeraccount.php'; ?> 
		<div class="container-fluid" style="padding: 0">			
				<div class="view">
					<div class="mask rgba-black-light align-items-center">
					  <div class="container">
						<div class="row">
						  <div class="col-md-12 mb-4 white-text text-center">
							<h1 class="h1-reponsive white-text text-uppercase font-weight-bold mb-0 pt-md-5 pt-5 wow fadeInDown" data-wow-delay="0.3s"><strong style="color: red"><br><br><br><br>Link Reset mật khẩu này đã hết hiệu lực</strong></h1>
							<br>
							<h5 class="text-uppercase mb-4 white-text wow fadeInDown" data-wow-delay="0.4s"><strong style="color:red">Hãy nhập lại để có link khác nhé!</strong></h5>
							<a class="btn btn-outline-white wow fadeInDown" data-wow-delay="0.4s"></a>
							<a class="btn btn-outline-white wow fadeInDown" data-wow-delay="0.4s"></a>
						  </div>
						</div>
					  </div>
					</div>
				</div>	
		</div>	
		<?php require_once 'view/footer.php'; ?>
	</div>
</body>
</html>