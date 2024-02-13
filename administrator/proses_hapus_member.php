<?php 
// koneksi database
include '../koneksi.php';

// menangkap data id yang di kirim dari url
$nik = $_POST['member'];


// menghapus data dari database
mysqli_query($koneksi,"delete from produk where nik='$nik'");

// mengalihkan halaman kembali ke member.php
header("location:member.php?pesan=hapus");

?>