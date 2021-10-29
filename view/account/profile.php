<div class="col-lg-9">
        <div class="card mb-4">
          <div class="card-body">
                <h5>Hồ sơ của tôi</h5>
                <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
            <hr>
            <form action="account.php" method="post">
			<div class="row my-4 mx-2">         
              <div class="col-sm-3">
                <p class="mb-0">Họ và Tên</p><small style="color: red"><?php echo $errorfullname ?></small>
              </div>
              <div class="col-sm-9">
                <input type="text" class="form-control text-muted mb-0" value="<?php echo $_SESSION['Fullname']; ?>" id="fullname" name="fullname" readonly>
              </div>
            </div>
            <div class="row my-4 mx-2">
              <div class="col-sm-3">
                <p class="mb-0">Tên Đăng Nhập</p><small style="color: red"><?php echo $errorusername ?></small>
              </div>
              <div class="col-sm-9">
                <input type="text" class="form-control text-muted mb-0" value="<?php echo $_SESSION['Username']; ?>" id="username" name="username" readonly>
              </div>
            </div>
			<div class="row my-4 mx-2">
              <div class="col-sm-3">
                <p class="mb-0">Số Điện Thoại</p><small style="color: red"><?php echo $errorphonenumber ?></small>
              </div>
              <div class="col-sm-9">
                <input type="text" class="form-control text-muted mb-0" value="<?php echo $_SESSION['Phonenumber']; ?>" id="phonenumber" name="phonenumber" readonly>
              </div>
            </div>
            <?php if($_SESSION['Email']=="") 
            { ?>
            <form action="profile.php" method="post">
            <div class="row my-4 mx-2">		
              <div class="col-sm-3">
                <p class="mb-0 py-2">Email <small style="color: red"><?php echo $error2 ?></small></p>
              </div>
              <div class="col-sm-7">
                <input type="text" class="form-control text-muted mb-0" value="<?php
				if(empty($_SESSION['Email']))
				{
				echo $email2 = $_SESSION['Email'];	
				}
				if(!empty($_SESSION['Email']))
				{
				$email2 = $_SESSION['Email'];	
				echo $classacount->hideEmail($email2);
				}?>" id="email" name="email" placeholder="Chưa có email" readonly>
				<small style="color: red"><?php echo $error?></small>
              </div>		
            </div>
            
            <?php } 
            else { ?>
			
            <div class="row my-4 mx-2">		
              <div class="col-sm-3">
                <p class="mb-0 py-2">Email</p>
                <small style="color: red"><?php echo $error?></small>
              </div>
              <div class="col-sm-7">
                <input type="text" class="form-control text-muted mb-0" value="<?php
				if(empty($_SESSION['Email']))
				{
				echo "Chưa Có Email"; 
				}
				if(!empty($_SESSION['Email']))
				{
				$email2 = $_SESSION['Email'];	
				echo $classacount->hideEmail($email2);
				}?>" id="email" name="email" readonly>
              </div>
			  		
            </div>
            <div class="collapse" id="emailcollapse">
              <div class="row mx-2">		
              <div class="col-sm-3">
                <p class="mb-0 py-2">Email cũ</p>
              </div>
              <div class="col-sm-7">
                <input type="text" class="form-control text-muted mb-0" value="" id="emailold" name="emailold" readonly>
                <small>*Để trống nếu bạn không muốn thay đổi.</small>
              </div>		
            </div>
            </div>
            <?php } ?>
            <div class="row my-4 mx-2">
              <div class="col-sm-3">
                <p class="mb-0">Tên Shop </p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $_SESSION['Shop']?></p>
              </div>
            </div>
			<div class="row my-4 mx-2">
              <div class="col-sm-3">
                <p class="mb-0">Ngày Đăng Ký</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $classaccount->converttime($regdate)?></p>
              </div>
            </div>
			<div class="row my-4 mx-2">
              <div class="col-sm-3">
                <p class="mb-0">Lần Cuối Đăng Nhập</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $classaccount->converttime($lastlogin)?></p>
              </div>
            </div>
            <div class="col-sm-2 text-center py-2">
				<button type="button" class="btn btn-primary" id="account-btn" name="account-btn" data-toggle="collapse" data-target="#emailcollapse" onclick="inputToggle(event)">Thay Đổi</button>
            </div>
            <hr class="my-3">
          </div>         
        </form>
        </div>		     
        </div>
    </div>