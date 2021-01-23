<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($db,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){
	$data = mysqli_fetch_assoc($login);
	$id_user= $data['id_user'];
	// cek jika user login sebagai admin
	if($data['level']=="admin"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:admin/index.php?id_admin=$id_user");
	// cek jika user login sebagai siswa
	}else if($data['level']=="siswa"){
		// buat session login dan username
		$getDataSiswa=mysqli_query($db,"SELECT * FROM siswa WHERE id_user ='$id_user'");
		$dataSiswa=mysqli_fetch_assoc($getDataSiswa);
		$id_siswa=$dataSiswa['id_siswa'];
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "siswa";
		// alihkan ke halaman dashboard siswa
		header("location:siswa/index.php?id=$id_siswa");
 
	// cek jika user login sebagai guru
	}else if($data['level']=="guru"){
		// buat session login dan username
		$getDataGuru=mysqli_query($db,"SELECT * FROM guru WHERE id_user ='$id_user'");
		$dataGuru=mysqli_fetch_assoc($getDataGuru);
		$id_guru=$dataGuru['id_guru'];
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "guru";
		// alihkan ke halaman dashboard guru
		$cekData=mysqli_query($db,"SELECT COUNT(*) as total FROM guru WHERE id_guru ='$id_guru' && id_kelas !='0'");
		$data=mysqli_fetch_assoc($cekData);
		echo  $data['total'];
		if($data['total'] < 1){
			header("location:guru/index.php?id=$id_guru");
		} else {
			header("location:cek_guru.php?id=$id_guru");
		}
		
 
	// cek jika user login sebagai walikelas
	}else if($data['level']=="walikelas"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "walikelas";
		// alihkan ke halaman dashboard guru
		header("location:dashboard3.php");
	}else{
 
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:loginuser.php?pesan=gagal");
}
 
?>