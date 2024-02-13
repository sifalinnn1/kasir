
<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$jeniskelamin = $_POST['jeniskelamin'];
$Alamat = $_POST['Alamat'];
$nomortelepon = $_POST['nomortelepon'];



// update data ke database
mysqli_query($koneksi,"update pelanggan set nik='$nik', nama='$nama', jeniskelamin='$jeniskelamin', Alamat='$Alamat' where member='$member'");

// mengalihkan halaman kembali ke data_barang.php
header("location:pembelian.php?pesan=update");

?>