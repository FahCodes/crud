<!DOCTYPE html>
<?php 
include "koneksi.php";
$nis = "";
$nama = "";
$alamat = "";
$sex = "";
if($_SERVER['REQUEST_METHOD']=="POST"){
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$sex = $_POST['sex'];
	//Cek Data
	$sqlcek = "SELECT * FROM siswa where nis='$nis'";
	$hasilCek = $koneksi->query($sqlcek);
	if(!$hasilCek->num_rows>0){
	//Simpan Data
	if(!empty($nama) && !empty($nis)){
		$sql = "INSERT INTO siswa (nis,nama,alamat,sex) VALUES ('$nis','$nama','$alamat','$sex')";
		if($koneksi->query($sql)=== TRUE){
			header('location:tampilsiswa.php');
		}else{
			echo "<script>alert('Data User Gagal Disimpan !');</script>";
		}
	}else{
		echo "<script>alert('Data Nama & Alamat wajib Di isi!');</script>";
	}
}else{
	echo "<script>alert('Data Nis Sudah Ada !');</script>";
}
}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>::TAMBAH USER::</title>
</head>
<body>
<div id="bungkus">
	<div id="bungkusform">
		<form name="frmuser" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<h1>Tambah Siswa</h1>
			<label>Nis Siswa</label>
			<input type="text" name="nis" class="form" placeholder="Nis Here..." value="<?php echo $nis; ?>">
			<label>Nama Siswa</label>
			<input type="text" name="nama" class="form" placeholder="Nama Here...." value="<?php echo $nama; ?>">
			Alamat Siswa
			<br>
			<textarea name="alamat" class="form"></textarea>
			<br><br>
			<label>Sex</label>
			<select name="sex">
				<option value="L">Laki-Laki</option>
				<option value="P">Perempuan</option>
			</select>
			<br><br>
			<a href="tampilsiswa.php">Kembali</a>
			<br><br>
			<input type="submit" name="simpan" value="Simpan Data" class="btn">
			<br><br>
			<input type="reset" name="reset" class="btn" value="Kosongkan Form">
		</form>
	</div>
</div>
</body>
</html>