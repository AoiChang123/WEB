<p>Hình thức thanh toán</p>
<div class="container">
  <?php
  if(isset($_SESSION['id_khachhang'])){
  ?>
<div class="arrow-steps clearfix">
  	<div class="step done"> <span> <a href="index.php?quanly=giohang" >Giỏ hàng</a></span> </div>
	<div class="step current"> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh toán</a><span> </div>
</div>
  <?php
  } 
  ?>
   <?php
 	if(isset($_POST['themvanchuyen'])) {
 		$name = $_POST['name'];
 		$phone = $_POST['phone'];
 		$address = $_POST['address'];
 		$note = $_POST['note'];
 		$id_dangky = $_SESSION['id_khachhang'];
 		$sql_them_vanchuyen = mysqli_query($mysqli,"INSERT INTO shipping(name,phone,address,note,id_dangky) VALUES('$name','$phone','$address','$note','$id_dangky')");
 		if($sql_them_vanchuyen){
 			echo '<script>alert("Thêm vận chuyển thành công")</script>';

 		}
 	}elseif(isset($_POST['capnhatvanchuyen'])){
 		$name = $_POST['name'];
 		$phone = $_POST['phone'];
 		$address = $_POST['address'];
 		$note = $_POST['note'];
 		$id_dangky = $_SESSION['id_khachhang'];
 		$sql_update_vanchuyen = mysqli_query($mysqli,"UPDATE shipping SET name='$name',phone='$phone',address='$address',note='$note',id_dangky='$id_dangky' WHERE id_dangky='$id_dangky'");
 		if($sql_update_vanchuyen){
 			echo '<script>alert("Cập nhật vận chuyển thành công")</script>';

 		}
 	}
 ?>
  	
	<div class="row">
  
	<?php
 	$id_dangky = $_SESSION['id_khachhang'];
 	$sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM shipping WHERE id_dangky='$id_dangky' LIMIT 1");
 	$count = mysqli_num_rows($sql_get_vanchuyen);
 	if($count>0){
 		$row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
 		$name = $row_get_vanchuyen['name'];
 		$phone = $row_get_vanchuyen['phone'];
 		$address = $row_get_vanchuyen['address'];
 		$note = $row_get_vanchuyen['note'];
 	}else{

 		$name = '';
 		$phone = '';
 		$address = '';
 		$note = '';
 	}
 	?>
 		
  	<div class="col-md-8">
  		<h4>Thông tin vận chuyển và giỏ hàng</h4>

 	<div class="col-md-12">
	 <form action="" autocomplete="off" method="POST">
	  <div class="form-group">
	    <label for="email">Họ và tên</label>
	    <input type="text" name="name" class="form-control" value="<?php echo $name ?>" placeholder="..." >
	  </div>
		<div class="form-group">
	    <label for="email">Phone</label>
	    <input type="text" name="phone" class="form-control" value="<?php echo $phone ?>"  placeholder="...">
	  </div>
	  <div class="form-group">
	    <label for="email">Địa chỉ</label>
	    <input type="text" name="address" class="form-control" value="<?php echo $address ?>"  placeholder="...">
	  </div>
	  <div class="form-group">
	    <label for="email">Ghi chú</label>
	    <input type="text" name="note" class="form-control" value="<?php echo $note ?>"  placeholder="..." >
	  </div>
	  <?php
	  if($name=='' && $phone=='') {
	  ?>
	  <button type="submit" name="themvanchuyen" class="btn btn-primary">Thêm vận chuyển</button>
	  <?php
	  } elseif($name!='' && $phone!=''){
	  ?>
	  <button type="submit" name="capnhatvanchuyen" class="btn btn-primary">Cập nhật vận chuyển</button>
	  <?php
	  } 
	  ?>
	</form>
	</div>
	<form action="pages/main/xulythanhtoan.php" method="POST">
  		<h5>Giỏ hàng của bạn</h5>
  		<table style="width:100%;text-align: center;border-collapse: collapse;" border="1">
		  <tr>
		    <th>Id</th>
		    <!-- <th>Mã sp</th> -->
		    <th>Tên sản phẩm</th>
		    <th>Hình ảnh</th>
		    <th>Số lượng</th>
		    <th>Giá sản phẩm</th>
		    <th>Thành tiền</th>
		 
		   
		  </tr>
		  <?php
		  if(isset($_SESSION['cart'])){
		  	$i = 0;
		  	$tongtien = 0;
		  	foreach($_SESSION['cart'] as $cart_item){
		  		$thanhtien = $cart_item['soluong']*$cart_item['giasp'];
		  		$tongtien+=$thanhtien;
		  		$i++;
		  ?>
		  <tr>
		    <td><?php echo $i; ?></td>
		    <!-- <td><?php echo $cart_item['masp']; ?></td> -->
		    <td><?php echo $cart_item['tensanpham']; ?></td>
		    <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="150px"></td>
		    <td>
		    	<a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa fa-plus fa-style" aria-hidden="true"></i></a>
		    	<?php echo $cart_item['soluong']; ?>
		    	<a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa fa-minus fa-style" aria-hidden="true"></i></a>

		    </td>
		    <td><?php echo number_format($cart_item['giasp'],0,',','.').'vnđ'; ?></td>
		    <td><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>
		   
		  </tr>
		  <?php
		  	}
		  ?>
		   <tr>
		    <td colspan="8">
		    	<p style="float: left;">Tổng tiền: <?php echo number_format($tongtien,0,',','.').'vnđ' ?></p><br/>
		    </td>
		  </tr>
		  <?php	
		  }else{ 
		  ?>
		   <tr>
		    <td colspan="8"><p>Hiện tại giỏ hàng trống</p></td>
		  </tr>
		  <?php
		  } 
		  ?>
		 
		</table>
  	</div>
  	<style type="text/css">
  		.col-md-4.hinhthucthanhtoan .form-check {
		    margin: 11px;
		}
  	</style>

  	<div class="col-md-4 hinhthucthanhtoan">
  		<h4>Phương thức thanh toán</h4>
  		<div class="form-check">
		  <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="tienmat" checked>
		  <img src="images/tien.jpg" height="32" width="32">
		  <label class="form-check-label" for="exampleRadios1">
		    Tiền mặt
		  </label>
		</div>

		<div class="form-check">
		  <input class="form-check-input" type="radio" name="payment" id="exampleRadios2" value="chuyenkhoan">
		  <img src="images/ck.png" height="32" width="32">
		  <label class="form-check-label" for="exampleRadios2">
		    Chuyển khoản
		  </label>
		</div>

		<div class="form-check">
		  <input class="form-check-input" type="radio" name="payment" id="exampleRadios3" value="momo">
		  <img src="images/momo.png" height="32" width="32">
		  <label class="form-check-label" for="exampleRadios3">
		    Momo
		  </label>
		</div>

		<div class="form-check">
		  <input class="form-check-input" type="radio" name="payment" id="exampleRadios5" value="paypal">
		  <img src="images/paypal.png" height="30" width="20">
		  <label class="form-check-label" for="exampleRadios5">
		    Paypal
		  </label>
		</div>

		<div class="form-check">
		  <input class="form-check-input" type="radio" name="payment" id="exampleRadios4" value="vnpay">
		  <img src="images/vnpay.png" height="20" width="64">
		  <label class="form-check-label" for="exampleRadios4">
		    Vnpay
		  </label>
		</div>

		<input type="submit" value="Thanh toán ngay" name="redirect" class="btn btn-danger">
		
		</form>

		<p></p>
	
		<?php
		$tongtien = 0;
		foreach($_SESSION['cart'] as $key => $value){
			$thanhtien = $value['soluong']*$value['giasp'];
  			$tongtien+=$thanhtien;

		} 
		$tongtien_vnd = $tongtien;
		$tongtien_usd = round($tongtien/22667);
		?>


		 </div>
		 	
		 </div>

		  
	

		</div>
	
	
	