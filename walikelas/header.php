<?php include('../koneksi.php');?>
<?php 
$id_guru = $_GET['id'];
$getDataGuru=mysqli_query($db,"SELECT * FROM guru WHERE id_guru ='$id_guru'");
$dataGuru=mysqli_fetch_assoc($getDataGuru);
$namaGuru=$dataGuru['nama_guru'];
$alamat=$dataGuru['alamat'];
$no_hp=$dataGuru['no_hp'];
// $id_kelas=$dataGuru['id_kelas'];
$email=$dataGuru['email'];
$agama=$dataGuru['agama'];
$id_user=$dataGuru['id_user'];
$tempat_lahir=$dataGuru['tempat_lahir'];
$tanggal_lahir=$dataGuru['tanggal_lahir'];
$jenis_kelamin=$dataGuru['jenis_kelamin'];
$nuptk=$dataGuru['nuptk'];
$id_angkatan=$dataGuru['id_angkatan'];

$id_kelas=$dataGuru['id_kelas'];
$id_angkatan=$dataGuru['id_angkatan'];
// $namaWali=$dataKelas['nama_guru'];
$foto=$dataGuru['foto'];
if($foto != ''){
 $foto = $foto;
} else {
  $foto ="default.png";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>
  <link href="../css/font-awesome.css" rel="stylesheet">
  <link href="../css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../css/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../css/simple-sidebar.css" rel="stylesheet">
  <script src="../css/jquery-3.5.1.js"></script>
<style>

</style>
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div style=""class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"> SMK Krisanti </div>
      <div class="list-group list-group-flush">
        <a href="index.php?id=<?php echo "$id_guru"?>" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <!-- <a href="kelas.php?id=<?php echo "$id_guru"?>" class="list-group-item list-group-item-action bg-light">Kelas </a> -->
        <a href="jadwal.php?id=<?php echo "$id_guru&&hari=senin&&id_angkatan=$id_angkatan&&id_kelas=$id_kelas"?>" class="list-group-item list-group-item-action bg-light">Jadwal</a>
		<!-- <a href="peserta.php" class="list-group-item list-group-item-action bg-light">Peserta</a> -->
		 <a href="dataNilai.php?id=<?php echo "$id_guru&&id_kelas=$id_kelas&&id_angkatan=$id_angkatan"?>" class="list-group-item list-group-item-action bg-light">Nilai </a>
     <a href="profile.php?id=<?php echo "$id_guru"?>" class="list-group-item list-group-item-action bg-light">Profile</a>
    <!-- <a href="data_kegiatan.php" class="list-group-item list-group-item-action bg-light">Data Pembayaran SPP</a>
        <a href="tambahdata.php" class="list-group-item list-group-item-action bg-light">Daftar Nilai </a> -->
        
        <!-- <a href="absen.php" class="list-group-item list-group-item-action bg-light">Absen</a> -->
        <a href="../index.php" class="list-group-item list-group-item-action bg-light">Log Out</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <!-- <button class="btn btn-primary" id="menu-toggle">Hide Menu</button> -->
		<h3 style="margin-left:10%;"><?php echo "$namaGuru";?><h3>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#"><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
           <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="absen.php">Absen</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>-->
          </ul>
        </div>
      </nav>

