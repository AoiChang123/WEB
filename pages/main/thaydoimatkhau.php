<?php
	if(isset($_POST['doimatkhau'])){
		$taikhoan = $_POST['email'];
		$matkhau_cu = md5($_POST['password_cu']);
		$matkhau_moi = md5($_POST['password_moi']);
		$sql = "SELECT * FROM dangky WHERE email='".$taikhoan."' AND matkhau='".$matkhau_cu."' LIMIT 1";
		$row = mysqli_query($mysqli,$sql);
		$count = mysqli_num_rows($row);
		if($count>0){
			$sql_update = mysqli_query($mysqli,"UPDATE dangky SET matkhau='".$matkhau_moi."'");
			echo '<p style="color:green">Mật khẩu đã được thay đổi.</p>';
		}else{
			echo '<p style="color:red">Tài khoản hoặc Mật khẩu cũ không đúng,vui lòng nhập lại."</p>';
		}
	} 
?>
<!-- <form action="" autocomplete="off" method="POST">
		<table border="1" class="table-login" style="text-align: center;border-collapse: collapse;">
			<tr>
				<td colspan="2"><h3>Đổi mật khẩu Admin</h3></td>
			</tr>
			<tr>
				<td>Tài khoản</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>Mật khẩu cũ</td>
				<td><input type="text" name="password_cu"></td>
			</tr>
			<tr>
				<td>Mật khẩu mới</td>
				<td><input type="text" name="password_moi"></td>
			</tr>
			<tr>
				
				<td colspan="2"><input type="submit" name="doimatkhau" value="Đổi mật khẩu"></td>
			</tr>
	</table>
	</form> -->
	<div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="images/gas.png"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="" autocomplete="off" method="POST">

                  <h3 >Change the password</h3><br>

                  <div class="form-outline mb-5">
                    <input type="email" name="email" id="form2Example17" class="form-control form-control-lg" placeholder="Email" />
                    
                  </div>

                  <div class="form-outline mb-5">
                    <input type="password" name="password_cu" id="form2Example27" class="form-control form-control-lg" placeholder="Mật khẩu cũ" />
                    
                  </div>

				  <div class="form-outline mb-5">
                    <input type="password" name="password_moi" id="form2Example27" class="form-control form-control-lg" placeholder="Mật khẩu mới" />
                    
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit" name="doimatkhau">Đổi Password</button>
                  </div>

                  <a class="small text-muted" href="#!"></a>
                  <p class="mb-9 pb-lg-2" style="color: #393f81;"> <a href="#!"
                      style="color: #393f81;"></a></p>
                </form>

              </div>
            </div>
          </div>
        </div>