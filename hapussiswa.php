<?php
include "koneksi.php";
if(isset($_GET['id'])){
	$idhapus	= $_GET['id'];
}else{
	echo "Parameter Id Tidak Ada";
	$idhapus	= "";
}
$sqlhapus = "DELETE FROM siswa WHERE nis='$idhapus'";

if($koneksi->query($sqlhapus) === TRUE){
	header('location:tampilsiswa.php');
}else{
	echo "Error Hapus :".$sqlhapus."<br>".$koneksi->error;
}

$koneksi->close();
?>