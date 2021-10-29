<div class="col-lg-3">
        <div class="card mb-4">
          <div class="card-body text-center">
            <h5 class="my-3"><?php echo $_SESSION['Fullname']; ?></h5>
<!--
            <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-primary">Follow</button>
              <button type="button" class="btn btn-outline-primary ms-1">Message</button>
            </div>
-->
          </div>
        </div>
        <div id="accordion">
		<div class="card mb-4">
			<div class="card-body" data-toggle="collapse" href="#taikhoancollapse" style="cursor: pointer"><a>Tài Khoản</a></div>
            <div class="collapse" id="taikhoancollapse" data-parent="#accordion">
              <div class="card card-body">
                <ul class="list-group">
                    <a href="account.php"><li class="list-group-item">Hồ sơ của tôi</li></a>
                    <a href="account.php?page=address"><li class="list-group-item">Địa chỉ</li></a>
                </ul>
              </div>
            </div>
			<div class="card-body" data-toggle="collapse" href="#donmuacollapse" style="cursor: pointer"><a>Đơn mua</a></div>
            <div class="collapse" id="donmuacollapse" data-parent="#accordion">
              <div class="card card-body">
                Chưa có
              </div>
            </div>
			<div class="card-body" data-toggle="collapse" href="#khovouchercollapse" style="cursor: pointer"><a>Kho Voucher</a></div>
            <div class="collapse" id="khovouchercollapse" data-parent="#accordion">
              <div class="card card-body">
                Chưa có
              </div>
            </div>
			<div class="card-body" data-toggle="collapse" href="#shopcollapse" style="cursor: pointer"><a>Shop Bán Hàng</a></div>
            <div class="collapse" id="shopcollapse" data-parent="#accordion">
              <div class="card card-body">
                Chưa có
              </div>
            </div>
		</div>
        </div>        
		<?php if(!isset($_SESSION['Shop'])){?>	
		<div class="card mb-4">
			<div class="card-body text-center"><a href="" style="cursor: pointer">Shop Bán Hàng</a></div>
		</div>
		<?php } ?>
</div>