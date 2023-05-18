<?php
	if(isset($_POST['timkiem'])){
		$tukhoa = $_POST['tukhoa'];	

	}
		$sql_pro = "SELECT * FROM sanpham,danhmucsp WHERE sanpham.id_danhmuc=danhmucsp.id_danhmuc AND sanpham.tensanpham LIKE '%".$tukhoa."%'";
	$query_pro = mysqli_query($mysqli,$sql_pro);
	
?>
<h3>Từ khoá tìm kiếm : <?php echo $_POST['tukhoa']; ?></h3>
		<div class="row">
			<?php
			while($row = mysqli_fetch_array($query_pro)){ 
			?>
			<div class="col-md-3">
				<a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
					<img class="img img-responsive" width="100%" height="60%" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
					<p class="title_product"><?php echo $row['tensanpham'] ?></p>
					<p class="price_product">Giá : <?php echo number_format($row['giasp'],0,',','.').'vnđ' ?></p>
					<p style="text-align: center;color:#d1d1d1"><?php echo $row['tendanhmuc'] ?></p>
				</a>
			</div>
			<?php
			} 
			?>
		</div>
