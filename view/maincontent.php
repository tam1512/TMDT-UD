<div class="container shadow" style="margin-top: 3%; z-index: 1; background: #FFFFFF">
		<div class="row">
			<h4 class="my-3 mx-3">Danh Mục</h4>
		</div>
		<div class="row">
		<?php $categorysql = "SELECT * FROM category";
			$result = mysqli_query($conn,$categorysql);
			while($row = $result->fetch_assoc())
			{ ?>
				<div class="col col-2 border"><a href="<?php echo $row['Link']?>">
					<div class="category-img"><img class="img-fluid w-100 h-100" src="<?php echo $row['Image']?>"></div>
					<p class="text-center" style="margin-top: 5%"><?php echo $row['Name']?></p>
				</a></div>
		<?php } ?>
		</div>
</div>
<div class="container shadow" style="margin-top: 2%; z-index: 1; background: #FFFFFF">
		<div class="row">
			<h4 class="my-3 mx-3">Sản Phẩm</h4>
		</div>
		<div class="row">
			<div class="col col-2 border" >
				<div class="row">
					<div class="bg-secondary product-img"></div>
				</div>
				<div class="row">
					<p style="font-size: 12px">Yeezy Boost 350v2</p>
				</div>
				<div class="row">
					<div class="col col-6">16.000VNĐ</div>
					<div class="col col-6">Đã bán: </div>
				</div>
				<div style="width: 100%; height: 15px"></div>
			</div>
		</div>
</div>
	
