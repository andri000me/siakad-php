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
<?php
$id_admin = $_GET['id_admin'];

?>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div style="" class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"> SMK Krisanti </div>
      <div class="list-group list-group-flush">
        <a href="index.php?id_admin=<?php echo $id_admin ?>" class="list-group-item list-group-item-action bg-light">Data Siswa</a>
        <a href="dataguru.php?id_admin=<?php echo $id_admin ?>" class="list-group-item list-group-item-action bg-light">Data Guru </a>
        <a href="datamatapelajaran.php?id_admin=<?php echo $id_admin ?>" class="list-group-item list-group-item-action bg-light">Data Mata Pelajaran </a>
        <a href="datakelas.php?id_admin=<?php echo $id_admin ?>" class="list-group-item list-group-item-action bg-light">Data Kelas</a>
        <a href="datajadwal.php?id_admin=<?php echo $id_admin ?>" class="list-group-item list-group-item-action bg-light">Data Jadwal</a>
        <a href="data_angkatan.php?id_admin=<?php echo $id_admin ?>" class="list-group-item list-group-item-action bg-light">Data Angkatan</a>
        <a href="spp.php?id_admin=<?php echo $id_admin ?>" class="list-group-item list-group-item-action bg-light">Data Pembayaran SPP</a>
        <a href="createaccount.php?id_admin=<?php echo $id_admin ?>" class="list-group-item list-group-item-action bg-light">Buat Akun Admin</a>
        <a href="profile.php?id_admin=<?php echo $id_admin ?>" class="list-group-item list-group-item-action bg-light">Profile</a>
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
        <h3 style="margin-left:10%;"> Admin<h3>
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