			<div class="sidebar-menu">
				<h4 style="text-align:center">Danh mục sản phẩm</h4>
					<?php
	
						$sql_danhmuc = "SELECT * FROM danhmucsp ORDER BY id_danhmuc ASC";
						$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
						while($row = mysqli_fetch_array($query_danhmuc)){
						    		
					?>
					<li style="text-transform: uppercase;"><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc'] ?>"><?php echo $row['tendanhmuc'] ?></a></li>
					<?php

					} 
					?>
			</div>
                <br/>

            <div class="sidebar-menu">
				<h4 style="text-align:center">Danh mục bài viết</h4>

					<?php	
						$sql_danhmuc_bv = "SELECT * FROM danhmucbaiviet ORDER BY id_baiviet ASC";
						$query_danhmuc_bv = mysqli_query($mysqli,$sql_danhmuc_bv);
						while($row = mysqli_fetch_array($query_danhmuc_bv)){
						    		
					?>
					<li style="text-transform: uppercase;"><a href="index.php?quanly=danhmucbaiviet&id=<?php echo $row['id_baiviet'] ?>"><?php echo $row['tendanhmuc_baiviet'] ?></a></li>
					<?php

					} 
					?>
			</div>
			