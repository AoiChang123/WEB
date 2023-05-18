<?php
	if(isset($_GET['trang'])){
		$page = $_GET['trang'];
	}else{
		$page = 1;
	}
	if($page == '' || $page == 1){
		$begin = 0;
	}else{
		$begin = ($page*8)-8;
	}
	$sql_pro = "SELECT * FROM sanpham WHERE sanpham.id_danhmuc='$_GET[id]' ORDER BY id_sanpham ASC LIMIT $begin,8";
	$query_pro = mysqli_query($mysqli,$sql_pro);
	//get ten danh muc
	$sql_cate = "SELECT * FROM danhmucsp WHERE danhmucsp.id_danhmuc='$_GET[id]' LIMIT 1";
	$query_cate = mysqli_query($mysqli,$sql_cate);
	$row_title = mysqli_fetch_array($query_cate);
	
?>

<h3>Danh mục sản phẩm : <?php echo $row_title['tendanhmuc'] ?></h3>
				<div class="row">
				<!-- <ul class="product_list"> -->
					<?php
					while($row = mysqli_fetch_array($query_pro)){ 
					?>
					<!-- <li> -->
					<div class="col-md-3">
						<a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
							<img class="img img-responsive" width="100%" height="60%" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
							<p class="title_product"><?php echo $row['tensanpham'] ?></p>
							<p class="price_product">Giá : <?php echo number_format($row['giasp'],0,',','.').'vnđ' ?></p>
							<!-- <p style="text-align: center;color:#d1d1d1"><?php echo $row['tendanhmuc'] ?></p> -->
						</a>
					<!-- </li> -->
					</div>
					<?php
					} 
					?>
				<!-- </ul> -->
				</div>

				<div style="clear:both;"></div>
				<style type="text/css">
					ul.list_trang {
					    padding: 0;
					    margin: 0;
					    list-style: none;
					}
					ul.list_trang li {
					    float: left;
					    padding: 5px 13px;
					    margin: 5px;
					    background: #e9e3dc;
					    display: block;
					}
					ul.list_trang li a {
					    color: #000;
					    text-align: center;
					    text-decoration: none;
					 
					}
				</style>
				<?php
				$sql_trang = mysqli_query($mysqli,"SELECT * FROM sanpham, danhmucsp WHERE danhmucsp.id_danhmuc=sanpham.id_danhmuc LIMIT 4");
				$row_count1 = mysqli_num_rows($sql_trang);  
				$trang = ceil($row_count1/3);
				?>
				<p>Trang hiện tại : <?php echo $page ?>/<?php echo $trang ?> </p>
				
				<ul class="list_trang">

					<?php
					
					for($i=1;$i<=$trang;$i++){ 
					?>
					
						<li <?php if($i==$page){echo 'style="background: #5ea3f2;"';}else{ echo ''; }  ?>><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_title['id_danhmuc'] ?>&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
					<?php
					} 
					?>
					
				</ul>
