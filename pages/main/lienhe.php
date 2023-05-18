
<?php 
if(isset($_POST['submit'])) {
if((isset($_POST['your_name'])&& $_POST['your_name'] !='') && (isset($_POST['your_email'])&& $_POST['your_email'] !=''))
{

$yourName = $_POST['your_name'];
$yourEmail = $_POST['your_email'];
$yourPhone = $_POST['your_phone'];
$comments = $_POST['comments'];

$sql_lh=mysqli_query($mysqli,"INSERT INTO lienhe (name, email, phone, comments) VALUES ('".$yourName."','".$yourEmail."', '".$yourPhone."', '".$comments."')");
if($sql_lh){
	echo '<p style="color:green">Bạn đã gửi thành công</p>';
	// $_SESSION['name'] = $yourName;
	// $_SESSION['email'] = $email;
	// $_SESSION['id'] = mysqli_insert_id($mysqli);
	// header('Location:index.php?quanly=lienhe');
}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<style>

#loading-img{
display:none;
}

.response_msg{
margin-top:10px;
font-size:13px;
background:#E5D669;
color:#ffffff;
width:250px;
padding:3px;
display:none;
}

</style>
</head>
<body>

<div class="container">
<h4>CÔNG TY CỔ PHẦN GAS & BẾP GAS TOÀN CẦU</h4>

<p> Địa chỉ: Số 113 Núi Thành - Đà Nẵng</p>

<p> Hotline:  0243.559.9398 / 0986 955 446</p>

<p>Email: gasmoimiendatnuoc@gmail.com</p>	
<div class="row">

<div class="col-md-12">
<form action="" method="POST">
<div class="form-group">
<label for="Name">Họ Tên</label>
<input type="text" class="form-control" name="your_name" placeholder="Họ Tên" required>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Email</label>
<input type="email" class="form-control" name="your_email" placeholder="Email" required>
</div>
<div class="form-group">
<label for="Phone">Số điện thoại</label>
<input type="text" class="form-control" name="your_phone" placeholder="Số điện thoại" required>
</div>
<div class="form-group">
<label for="comments">Nội dung</label>
<textarea name="comments" class="form-control" rows="3" cols="28" rows="5" placeholder="Nội dung"></textarea> 
</div>

<button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit_form">Submit</button>
</form>

</div>
</div>
</div>
</body>
</html>


