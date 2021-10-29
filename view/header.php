<div class="header-top">
		<div class="container-fluid" style="height: 100%;padding: 0">
		<div class="row" style="width: 100%">
			<div class="col col-sm-6 text-center">
			<div class="row">
				<div class="col col-sm-1"></div>
				<div class="col col-sm-3" style="padding: 0"><a href="sellerpage/index.php">Kênh Người Bán</a></div>
				<div class="col col-sm-3" style="padding: 0">Tải Ứng Dụng</div>
				<div class="col col-sm-5" style="padding: 0">Social Media &nbsp;
					<a href="https://www.facebook.com/ShopeeVN/" target="_blank">
					<img src="img/icon/facebook.svg" class="rounded-circle" width="15" height="15"></a>&nbsp;
					<a href="https://www.instagram.com/shopee_vn/?hl=en" target="_blank">
					<img src="img/icon/instagram.svg" class="rounded-circle" width="15" height="15"></a>&nbsp;
					<a href="https://www.youtube.com/channel/UCKcxoGpxOJx3nt83MCG-nuQ" target="_blank">
					<img src="img/icon/youtube.svg" class="rounded-circle" width="15" height="15"></a>
				</div>

			</div>
			</div>
			<div class="col col-sm-6">
			<div class="row">
				<div class="col-6"></div>
				<div class="col-3">
				<div class="box-log-in">
					<ul class="nav navbar-nav" style="width: 100%; height: 100%">
                     <i class="bx bx-user-circle"></i>
                     <span>
					 <?php 
						 if(!empty($_SESSION['Username']))
						 {
					 ?>
						 <li class="nav-item dropdown">
							<a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
							<img src="img/icon/person-circle.svg" width="15" height="15">
							<?php
							echo "Xin Chào, ";
							echo $_SESSION['Username'];
							?></a>
							  <div class="dropdown-menu popout"  aria-haspopup="true" aria-expanded="false">
								<a class="dropdown-item" href="account.php">Profile</a>
								<a class="dropdown-item" href="index.php?logout=1">Đăng Xuất</a>
							  </div>
						  </li>
							</span>
							</ul>
						</div>
						</div>
					 <?php
						 }
						 else
						 {
							echo "<a href='login.php'>Đăng nhập</a>";
						 
					 ?>
					 </span>
					</ul>
                </div>
				</div>
				<?php
				echo "<div class='col-3'><a href='register.php'>Đăng Ký</a></div>";
				 } ?>
			</div>
			</div>
		</div>
		</div>
	</div>
	<?php require_once("headeraccount.php"); ?>
	<script>
	$('ul.nav li.dropdown').hover(
	function() 
	{
	  $(this).find('.dropdown-menu').stop(true, true).delay(0).fadeIn(50);
	}, 
	function() 
	{
	  $(this).find('.dropdown-menu').stop(true, true).delay(0).fadeOut(50);
	});</script>