<?php
	if(isset($_POST['dangky'])) {
		$tenkhachhang = $_POST['hovaten'];
		$email = $_POST['email'];
		$dienthoai = $_POST['dienthoai'];
		$matkhau = md5($_POST['matkhau']);
		$diachi = $_POST['diachi'];
		$sql_dangky = mysqli_query($mysqli,"INSERT INTO dangky(tenkhachhang,email,diachi,matkhau,dienthoai) VALUE('".$tenkhachhang."','".$email."','".$diachi."','".$matkhau."','".$dienthoai."')");
		if($sql_dangky){
			echo '<p style="color:green">Bạn đã đăng ký thành công</p>';
			$_SESSION['dangky'] = $tenkhachhang;
			$_SESSION['email'] = $email;
			$_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
			// header('Location:index.php?quanly=giohang');
		}
	}
?>
<!-- <p>Đăng ký thành viên</p> -->
<style type="text/css">
	table.dangky tr td {
	    padding: 5px;
	}
</style>
<div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="images/gas.png"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="" method="POST">

                  <h3 >Sign into your account</h3><br>

                  <div class="form-outline mb-4">
                    <input type="text" name="hovaten" id="form2Example17" class="form-control form-control-lg" placeholder="Họ Và Tên" />
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" name="email" id="form2Example27" class="form-control form-control-lg" placeholder="Email" />
                  </div>

				  <div class="form-outline mb-4">
                    <input type="text" name="dienthoai" id="form2Example17" class="form-control form-control-lg" placeholder="Số Điện Thoại" />
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" name="diachi" id="form2Example27" class="form-control form-control-lg" placeholder="Địa Chỉ" />
                  </div>

				  <div class="form-outline mb-4">
                    <input type="text" name="matkhau" id="form2Example27" class="form-control form-control-lg" placeholder="Password" />
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit" name="dangky">Login</button>
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
