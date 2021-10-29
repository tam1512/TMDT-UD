<div class="col-lg-9">
    <div class="card mb-4">
        <div class="card-body">
			<div class="row">
				<div class="col col-9">
				<h5 class="w-50">Địa chỉ</h5></div>
				<div class="col col-3">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginmodal">+ Thêm Địa Chỉ Mới</button>
				</div>
			</div>
            <hr>
            <div class="row" id="address-list">

			</div>
        </div>		     
    </div>
</div>
<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="false">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<br>
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">Địa Chỉ Mới</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" id="address-form">
				<input type="text" value="<?php echo $_SESSION['ID'] ?>" class="form-control" id="iduser" name="iduser" hidden>
				<div class="form-group" style="margin-top: 2%">
					<label class="control-label col-sm-12">Họ và Tên:</label>
				    <div class="col-sm-12">
						<input type="text" class="form-control" id="fullname" name="fullname" placeholder="Hãy nhập họ và tên">
						<small style="color: red"><?php echo $error;?></small>
					  </div>
				</div>
				<div class="form-group">
					 <label class="control-label col-sm-12">Địa Chỉ:</label>
					 <div class="col-sm-12">          
						<input type="text" class="form-control" id="address" name="address" placeholder="Hãy nhập địa chỉ">
					 </div>
				</div>
				<div class="form-group">
					 <label class="control-label col-sm-12">Số điện thoại:</label>
					 <div class="col-sm-12">          
						<input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Hãy nhập số điện thoại">
					 </div>
				</div>
				<div class="form-group">
					 <label class="control-label col-sm-12">Loại địa chỉ: </label>
					 <div class="col-sm-12">          
						<select class="form-control" id="type" name="type">
						  <option value="" selected>Chọn loại địa chỉ</option>
						  <option value="Nhà Riêng">Nhà Riêng</option>
						  <option value="Văn Phòng">Văn Phòng</option>
						</select>
					 </div>
				</div>
				<div class="form-group">        
					  <div class="col-sm-offset-2 col-sm-12"  style="margin-top: 5%;">
					  <button type="button" class="btn btn-secondary px-5" data-dismiss="modal">Trở lại</button>
					  <button type="button" class="btn btn-success px-5" id="address-btn" name="address-btn">Lưu</button>
					  </div>
				</div>
			</form>
		  </div>
		</div>
	  </div>
	</div> 

	<script type="text/javascript">
	$(document).ready(function()
	{
	function fetch_data()
		{
		var iduser = $('#iduser').val();
			$.ajax({
				url: "view/account/ajax/load.php",
				method: "POST",
				data: {iduser:iduser},
				success:function(data){
					$("#address-list").html(data);
				}
			});
		}
	fetch_data();
	$('#address-btn').on('click', function()
	{		
		var iduser = $('#iduser').val();	
		var fullname = $('#fullname').val();	
		var address = $('#address').val();	
		var phonenumber = $('#phonenumber').val();	
		var type = $('#type').val();	
		if(iduser == "" || fullname == "" || address == "" || phonenumber == "" || type == "")
		{
			alert("Hãy nhập đầy đủ thông tin!!");
		}
		else
		{
			$.ajax({
				url: "view/account/ajax/insert.php",
				method: "POST",
				data: {iduser:iduser, fullname:fullname, address:address, phonenumber:phonenumber, type: type},
				success:function(data){
					alert("Thêm địa chỉ thành công!!");
					$("#address-form")[0].reset();
					fetch_data();
				}
			});
		}
	});
	$(document).on('click','.address_del_btn', function()
	{		
		var id = $(this).data("id_del");	
		var result = confirm("Bạn có muốn xóa địa chỉ này không?");
		if(result)
		{
			$.ajax({
				url: "view/account/ajax/delete.php",
				method: "POST",
				data: {id:id},
				success:function(data){
					fetch_data();
				}
			});
		}
	});
	});	
	</script>