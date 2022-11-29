<!DOCTYPE html>
<?php
include "koneksi.php";
$sqltampil 	= "SELECT nis, nama, alamat, sex FROM siswa";
$hasil 		= $koneksi->query($sqltampil);
?>
<html>
<head>
	<title>::TAMPIL USER::</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<a href="tambahsiswa.php" class="btn">Tambah User</a>
	<?php
	if($hasil->num_rows > 0){
	?>
	<div class="header">
		<table border="1" cellpadding="0" cellspacing="0">
			<caption><b>Tampil Data User</caption>
			<thead>
				<tr>
					<th>No.</th>
					<th>NIS</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Sex</th>
					<th>Action</th>
				</tr>
			</thead>
			</div>
			<div class="content">
			<table border="1" cellpadding="0" cellspacing="0">
			<tbody>
				<?php 
				$nis = 0;
				while($data = $hasil->fetch_assoc()){
					$nis++;
				?>
				<tr>
					<td><?php echo $nis; ?></td>
					<td><?php echo $data['nis'];  ?></td>
					<td><?php echo $data['nama']; ?></td>
					<td><?php echo $data['alamat']; ?></td>
					<td><?php echo $data['sex']; ?></td>
					<td><a href="editsiswa.php?id=<?php echo $data['nis']; ?>">Edit</a> | <a href="hapussiswa.php?id=<?php echo $data['nis']; ?>"onClick="return confirm ('Apakah Anda Ingin Menghapus Data Ini')">Hapus</a></td>
				</tr>
			<?php 
			} 
			?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="6">Total Record :<?php echo $hasil->num_rows ?>  Record</td>
				</tr>
			</tfoot>
		</table>
	</div>
	<br>
<?php 
}else{
?>
<b>Data User Masih Kosong!</b>
<?php
}
?>
</body>
</html>