<?php
include('../../config/config.php');

$tenloaisp = $_POST['tendanhmuc'];
$thutu = $_POST['thutu'];
if(isset($_POST['themdanhmuc'])){
	//them
	$sql_them = "INSERT INTO danhmucsp(tendanhmuc,thutu) VALUE('".$tenloaisp."','".$thutu."')";
	mysqli_query($mysqli,$sql_them);
	header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}elseif(isset($_POST['suadanhmuc'])){
	//sua
	$sql_update = "UPDATE danhmucsp SET tendanhmuc='".$tenloaisp."',thutu='".$thutu."' WHERE id_danhmuc='$_GET[iddanhmuc]'";
	mysqli_query($mysqli,$sql_update);
	header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}else{

	$id=$_GET['iddanhmuc'];
	$sql_xoa = "DELETE FROM danhmucsp WHERE id_danhmuc='".$id."'";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}

?>