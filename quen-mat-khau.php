<?php 
require_once 'controller/authController.php';
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $title ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="css/maincss.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="wrapper">
  <?php require_once 'view/headeraccount.php'; ?> 
 <div class="view" style="height: 80vh">
	 <div class="container w-50 py-5">	  
          <div class="card">
            <div class="card-header text-center">
              Quên Mật Khẩu
            </div>
            <div class="card-body">
              <form action="quen-mat-khau.php" method="post">
                <div class="form-group">
				<div class="row">
				  <div class="col-sm-12">
					  <label for="email">Hãy Nhập Địa Chỉ Email Của Bạn</label>
					  <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"> 
					  <small style="color:red"><?php echo $error?></small>
				  </div> 
				  <div class="col-sm-12 py-2">
					  <label for="Username">Hãy Nhập Username Của Bạn</label>
					  <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp">
					  <small id="emailHelp" class="form-text text-muted">Chúng tôi sẽ không chia sẻ thông tin của bạn cho bất kì ai</small>
				  </div>
				</div>
                </div>
				  <button type="submit" name="password-reset-btn" class="btn btn-primary px-4">Gửi</button>
              </form>
            </div>
          </div>
		 </div>	
  </div>
  <?php require_once 'view/footer.php'; ?>  
</div>

</body>
</html>