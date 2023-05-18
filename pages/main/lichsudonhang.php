<h3>Lịch sử đơn hàng</h3>
<?php
	$id_khachhang = $_SESSION['id_khachhang'];
	$sql_lietke_dh = "SELECT * FROM cart,shipping WHERE cart.id_khachhang=shipping.id_dangky AND cart.id_khachhang='$id_khachhang' ORDER BY cart.id_cart DESC";
	$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>
<table style="width:100%" border="1" style="border-collapse: collapse;">
  <tr>
  	<th>Id</th>
    <th>Mã đơn hàng</th>
    <th>Tên khách hàng</th>
    <th>Địa chỉ</th>
    <th>Số điện thoại</th>
    <th>Ghi chú</th>
    <th>Ngày đặt</th>
  	<th>Đơn hàng</th>
  	<th>Hình thức thanh toán</th>
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
  	$i++;
  ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['name'] ?></td>
    <td><?php echo $row['address'] ?></td>
    <td><?php echo $row['phone'] ?></td>
    <td><?php echo $row['note'] ?></td>


    <td><?php echo $row['cart_date'] ?></td>
   	<td>
   		  <a href="index.php?quanly=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a> 
   	</td>
    <td><?php echo $row['cart_payment'] ?></td>
  </tr>
  <?php
  } 
  ?>
 
</table>
