<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$jeniskelamin = $_POST['jeniskelamin'];
$alamat = $_POST['alamat'];
$nomortelepon = $_POST['nomortelepon'];

// menginput data ke database
mysqli_query($koneksi,"insert into produk values('','$nik','$nama','$jeniskelamin','$alamat','$nomortelepon')");

// mengalihkan halaman kembali ke member.php
header("location:member.php?pesan=simpan");

?>