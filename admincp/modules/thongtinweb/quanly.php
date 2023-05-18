<p>Quản lý thông tin website</p>
<?php
	$sql_lh = "SELECT * FROM lienhe WHERE id";
	$query_lh = mysqli_query($mysqli,$sql_lh);
?>
<table border="1" width="100%" style="border-collapse: collapse;">
<tr>
  	<th>Id</th>
    <th>Họ Tên</th>
    <th>Email</th>
    <th>Số điện thoại</th>
	<th>Nội dung</th>
</tr>
	<?php
	$i = 0;
	 	while($row = mysqli_fetch_array($query_lh)) {
		$i++;
	?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $row['name'] ?></td>
		<td><?php echo $row['email'] ?></td>
		<td><?php echo $row['phone'] ?></td>
		<td><?php echo $row['comments'] ?></td>
	</tr>
	<?php 
		}
	?>
</table>
