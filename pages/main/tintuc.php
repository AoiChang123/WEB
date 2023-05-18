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
	$sql_bv = "SELECT * FROM baiviet WHERE tinhtrang=1 ORDER BY id ASC LIMIT $begin,8";
	$query_bv = mysqli_query($mysqli,$sql_bv);
	
?>
<h3 style="text-align: center;text-transform: uppercase;">Tin tức mới nhất</h3>

				<div class="row">
					<?php
					while($row_bv = mysqli_fetch_array($query_bv)){ 
					?>

					<div class="col-md-3">
					<a href="index.php?quanly=baiviet&id=<?php echo $row_bv['id'] ?>">
							<img class="img img-responsive" width="100%" height="70%" src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh'] ?>">
							<p class="title_product"><?php echo $row_bv['tenbaiviet'] ?></p>
							
						</a>
						<p style="margin:10px" class="title_product"><?php echo $row_bv['tomtat'] ?></p>
					</div>
					<?php
					} 
					?>
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
				$sql_trang = mysqli_query($mysqli,"SELECT * FROM baiviet");
				$row_count1 = mysqli_num_rows($sql_trang);  
				$trang = ceil($row_count1/3);
				?>
				<p>Trang hiện tại : <?php echo $page ?>/<?php echo $trang ?> </p>
				
				<ul class="list_trang">

					<?php
					
					for($i=1;$i<=$trang;$i++){ 
					?>
						<li <?php if($i==$page){echo 'style="background: #5ea3f2;"';}else{ echo ''; }  ?>><a href="index.php?quanly=tintuc&trang=<?php echo $i ?>"><?php echo $i ?></a></li>
					<?php
					} 
					?>
					
				</ul>


