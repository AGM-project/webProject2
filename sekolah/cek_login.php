<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'function.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * FROM pengguna WHERE username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

 $data = mysqli_fetch_assoc($login);

 // cek jika user login sebagai admin
 if($data['level']=="admin"){

  // buat session login dan username
  $_SESSION['username'] = $username;
  $_SESSION['level'] = "admin";
  // alihkan ke halaman dashboard admin
  header("location:halaman_utama.php");

 // cek jika user login sebagai guru
 }else if($data['level']=="guru"){
  // buat session login dan username
  $_SESSION['username'] = $username;
  $_SESSION['level'] = "guru";
  // alihkan ke halaman dashboard guru
  header("location:halaman_utama.php");

 // cek jika user login sebagai administrasi sekolah
 }else if($data['level']=="administrasi sekolah"){
  // buat session login dan administrasi sekolah
  $_SESSION['username'] = $username;
  $_SESSION['level'] = "administrasi sekolah";
  // alihkan ke halaman dashboard administrasi sekolah
  header("location:halaman_utama.php");

 }else{

  // alihkan ke halaman login kembali
  header("location:index.php?pesan=gagal");
 }}else{
 header("location:index.php?pesan=gagal");
}

?>