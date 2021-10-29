<!doctype html>

<?php
require_once("add.php");
?>
<div class="col-lg-9">
        <div class="card">
          <div class="card-body">

<h5>Thêm sản phẩm</h5>
<hr>
<form class="form-horizontal" action="new.php" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-12">
				<div class="form-group">
					<label class="control-label">Hình ảnh sản phẩm</label><small style="color: red"> <?php echo $errorpic;?></small>
					<input type="file" class="form-control" id="vegimage" name="vegimage">					
				</div>
		</div>
		<div class="col-12">

				<div class="form-group">
					<label class="control-label">Tên sản phẩm</label>
					<input type="text" class="form-control" id="vegname" name="vegname" placeholder="Hãy nhập tên sản phẩm">
					<small style="color: red"><?php echo $error;?></small>
				</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
				<div class="form-group">
					<label class="control-label">Mô tả sản phẩm</label>
					<textarea class="form-control" rows="5" id="comment"></textarea>
					<small style="color: red"><?php echo $error;?></small>
				</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="form-group">
				<label class="control-label">Danh mục</label><small style="color: red"> <?php echo $error2;?></small>
				<select name="vegunit" class="custom-select">
					<option value="" selected>Hãy chọn danh mục</option>
					<?php 
					$categorysql =  "SELECT * FROM category;";
					$stmt=$conn->prepare($categorysql);
					$stmt->execute();
					$result = $stmt->get_result();
					while($row = $result->fetch_assoc())
					{
					?>
					<option value="<?php echo $row['ID']?>"><?php echo $row['Name']?></option>
					<?php } ?>
				</select>					
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<button type="submit" id="veg-add-btn" name="veg-add-btn" class="btn btn-primary px-5 py-2">Add</button> 
		</div>
	</div>
</form>
	
</div>
</div>
</div>