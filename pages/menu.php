<?php

	$sql_danhmuc = "SELECT * FROM danhmucsp ORDER BY id_danhmuc ASC";
	$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
	
	    		
?>
<?php
	if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
		unset($_SESSION['dangky']);
	} 
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="width: 100%">
  <a class="navbar-brand" href="index.php"><img src="images/logo.jpg" alt="" width=50px></a> 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Trang chủ <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Danh mục sản phẩm
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php 
				while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
				?>
          <a class="dropdown-item" href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a>
        <?php
				} 
				?>
        </div>
      </li>      
      
      <li class="nav-item"><a class="nav-link" href="index.php?quanly=lichsudonhang">Lịch sử đơn hàng</a></li>
      <li class="nav-item"><a class="nav-link" href="index.php?quanly=tintuc">Tin tức</a></li>
	    <li class="nav-item"><a class="nav-link" href="index.php?quanly=lienhe">Liên hệ</a></li>

      	<?php
				if(isset($_SESSION['dangky'])){ 

				?>
        <li class="nav-item"><a class="nav-link" href="index.php?quanly=thaydoimatkhau">Thay đổi mật khẩu</a></li>
				<li class="nav-item"><a class="nav-link" href="index.php?dangxuat=1">Đăng xuất</a></li>

				
				<?php
				}else{ 
				?>
				<li class="nav-item"><a class="nav-link" href="index.php?quanly=dangky">Đăng ký</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?quanly=dangnhap">Đăng Nhập</a></li>&emsp;&emsp;&emsp;
				<?php
				} 
				?>
        
            <li class="nav-item " style="float: right;">
        <a class="nav-link" href="index.php?quanly=giohang"><img src="images/gio.png" alt="" width=35px></a>
      </li>
    </ul>

    <form class="form-inline my-2 my-lg-0" action="index.php?quanly=timkiem" method="POST">
      <input class="form-control mr-sm-2" type="search" name="tukhoa" placeholder="Từ khóa sản phẩm..." aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" name="timkiem" type="submit">Tìm kiếm</button>
    </form>
  </div>
</nav>


