<!DOCTYPE html>
<?php 
include "koneksi.php";
//Menampilkan Data
$nis = "";
$nama = "";
$alamat = "";
$sex = "";
if(isset($_GET['id'])){
	$nis = $_GET['id'];
	$sqlcek = "SELECT nis,nama,alamat,sex FROM siswa WHERE nis = '$nis'";
	$hasilCek = $koneksi->query($sqlcek);
	if($hasilCek->num_rows>0){
		$data = $hasilCek->fetch_assoc();
		$nis = $data['nis'];
		$nama = $data['nama'];
		$alamat = $data['alamat'];
		$sex = $data['sex'];
	}
}
//Menyimpan Edit Data
if($_SERVER['REQUEST_METHOD']=="POST"){
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$sex = $_POST['sex'];
	if(empty($alamat)){
		$sqlEdit = "UPDATE siswa SET nama='$nama'  WHERE nis=$nis";
	}else{
		$sqlEdit = "UPDATE siswa SET nama='$nama' , alamat='$alamat' ,sex='$sex' WHERE nis=$nis";
	}
	$hasilEdit = $koneksi->query($sqlEdit);
	if($hasilEdit){//jika berhasil di simpan
		header('location:tampilsiswa.php');
	}else{//Jika  Tidak BERHASIL di simpan
		echo "<script>alert('Data Siswa Gagal Diubah!');</script>";
	}
}
?>
<html>
<head>
	<title>::EDIT USER::</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="bungkusform" class="center">
		<form name="frmuser" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<h1>Edit Siswa</h1>
			<br>
			<label>Nis</label>
			<input type="text" name="nis" class="form" readonly value="<?php echo $nis; ?>">
			<label>Nama</label>
			<input type="text" name="nama" class="form" placeholder="Nama..." value="<?php echo $nama; ?>">
			<label>Alamat</label>
			<input type="text" name="alamat" class="form" placeholder="Alamat..." value="<?php echo $alamat; ?>">
			<label>Sex</label>
			<select name="sex" name="sex">
				<option value="L">Laki-Laki</option>
				<option value="P">Perempuan</option>
			</select>
			<br><br>
			<a href="tampilsiswa.php">Kembali</a>
			<br><br>
			<input type="submit" name="simpan" value="Simpan Edit" class="btn">
		</form>
	</div>
</body>
<?php $koneksi->close(); ?>
</html>