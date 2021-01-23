<?php 
include "../koneksi.php";
$id_kelas = $_GET['id_kelas'];
$id_angkatan = $_GET['id_angkatan'];
$id_siswa = $_GET['id'];
$nama_guru=$_GET['nama_guru'];
$getData=mysqli_query($db,"SELECT * FROM nilai WHERE id_siswa='$id_siswa' && id_angkatan='$id_angkatan'&& id_kelas='$id_kelas'");
$data=mysqli_fetch_assoc($getData);
$nama=$data['nama_siswa'];
$kelas=$data['kelas'];
$nis=$data['nis'];
$nisn=$data['nisn'];
$semester=$data['semester'];
if($semester==1){
    $semester = "Ganjil";
}else {
    $semester ="Genap";
}
?>

<html>
<head>
	<title>Cetak Print Data Nilai</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="../css/font-awesome.css" rel="stylesheet">
  <link href="../css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../css/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../css/simple-sidebar.css" rel="stylesheet">
</head>
<body>

	<style type="text/css">
	.left   { text-align: left;}
   	.right   { text-align: right;}
	</style>
 	
 		<p class="left"><img src="../krisantilogo.jpg" height="70px" width="70px;"><p> 


	<center>
		<u><b><h4>RAPOR AKHIR SEMESTER TAHUN PELAJARAN 2019/2020</h4></b></u>	
	</center>

 	<body>
     <?php 
     echo 
     "
     <p class='left'>Nama Peserta Didik	: $nama<p>
     <p class='left'>NISN/NISN 			: $nisn / $nis<p>
     <p class='left'>Kelas				: $kelas<p>
     <p class='left'>Semester			: $semester <p>
     "
   
       ?>
	</body>

<h6 style="font-weight:bold;"> A. Nilai Akademik</h6>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		<tr>
			<th style='width:20px'>No</th>
			<th>Nata Pelajaran</th>
			<th>KKM</th>
			<th>Pengetahuan</th>
			<th>Keterampilan</th>
			<th>Nilai Akhir</th>
			<th>Predikat</th>
		</tr>
    <tr>
        <th colspan="7"> A. Muatan Nasional</th>
        </tr>
<!-- agama -->
  <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='Pendidikan Agama'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){     
      echo "
      <tr>
      <td style='width:20px'>1</td>
      <td> ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
    
  }else {
    echo "
  <tr>
  <td style='width=20px'>1</td>
  <td> Pendidikan Agama </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> E </td>
  </tr>
  ";
  }
  ?>	 
  <!-- pkn -->
  <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='Pendidikan Pancasila dan Kewarganegaraan'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
        
  
      echo "
      <tr>
      <td style='width:20px'>2</td>
      <td> ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
   
  }else {
    echo "
  <tr>
  <td style='width=20px'>2</td>
  <td> Pendidikan Pancasila dan Kewarganegaraan </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> E </td>
  </tr>
  ";
  }
  ?>	 
  <!-- agama -->
  <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='Bahasa Indonesia'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
      echo "
      <tr>
      <td style='width:20px'>3</td>
      <td> ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
  
  }else {
    echo "
  <tr>
  <td style='width=20px'>3</td>
  <td> Bahasa Indonesia </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> E </td>
  </tr>
  ";
  }
  ?>	 
   <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='Matematika'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
      echo "
      <tr>
      <td style='width:20px'>4</td>
      <td> ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
  
  }else {
    echo "
  <tr>
  <td style='width=20px'>4</td>
  <td> Matematika </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> E </td>
  </tr>
  ";
  }
  ?>	
     <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='Sejarah Indonesia'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
      echo "
      <tr>
      <td style='width:20px'>5</td>
      <td> ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
  
  }else {
    echo "
  <tr>
  <td style='width=20px'>5</td>
  <td> Sejarah Indonesia </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> E </td>
  </tr>
  ";
  }
  ?>	
     <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='Bahasa Inggris'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
      echo "
      <tr>
      <td style='width:20px'>6</td>
      <td> ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
  
  }else {
    echo "
  <tr>
  <td style='width=20px'>6</td>
  <td> Bahasa Inggris </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> E </td>
  </tr>
  ";
  }
  ?>	

  <tr>
        <th colspan="7"> B. Muatan Kewilayahan</th>
  </tr>

     <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='Seni Budaya'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
      echo "
      <tr>
      <td style='width:20px'>7</td>
      <td> ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
  
  }else {
    echo "
  <tr>
  <td style='width=20px'>7</td>
  <td> Seni Budaya </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> E </td>
  </tr>
  ";
  }
  ?>	
     <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='Pendidikan Jasmani, Olah Raga dan Kesehatan'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
      echo "
      <tr>
      <td style='width:20px'>8</td>
      <td> ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
  
  }else {
    echo "
  <tr>
  <td style='width=20px'>8</td>
  <td> Pendidikan Jasmani, Olah Raga dan Kesehatan  </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> E </td>
  </tr>
  ";
  }
  ?>	
    <tr>
        <th colspan="7"> C. Muatan Perminatan Kejuruan</th>
  </tr>
  <tr>
        <th colspan="7"> C1. Dasar Bidang Ahli</th>
  </tr>
     <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='Simulasi dan Komunikasi Digital'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
      echo "
      <tr>
      <td style='width:20px'>9</td>
      <td> ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
  
  }else {
    echo "
  <tr>
  <td style='width=20px'>9</td>
  <td> Simulasi dan Komunikasi Digital </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> E </td>
  </tr>
  ";
  }
  ?>	
     <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='IPA Terapan'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
      echo "
      <tr>
      <td style='width:20px'>10</td>
      <td> ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
  
  }else {
    echo "
  <tr>
  <td style='width=20px'>10</td>
  <td> IPA Terapan </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> E </td>
  </tr>
  ";
  }
  ?>	
     <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='Kepariwisataan'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
      echo "
      <tr>
      <td style='width:20px'>11</td>
      <td> ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
  
  }else {
    echo "
  <tr>
  <td style='width=20px'>11</td>
  <td> Kepariwisataan </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> E </td>
  </tr>
  ";
  }
  ?>	

  <tr>
        <th colspan="7"> C2. Dasar Program Keahlian </th>
  </tr>


     <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='Komunikasi Industri Pariwisata'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
      echo "
      <tr>
      <td style='width:20px'>12</td>
      <td> ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
  
  }else {
    echo "
  <tr>
  <td style='width=20px'>12</td>
  <td> Komunikasi Industri Pariwisata </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> E </td>
  </tr>
  ";
  }
  ?>	
     <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='Sanitasi, Hygiene, dan Keselamatan Kerja'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
      echo "
      <tr>
      <td style='width:20px'>13</td>
      <td> ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
  
  }else {
    echo "
  <tr>
  <td style='width=20px'>13</td>
  <td> Sanitasi, Hygiene, dan Keselamatan Kerja </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> E </td>
  </tr>
  ";
  }
  ?>	
     <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='Administrasi Umum'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
      echo "
      <tr>
      <td style='width:20px'>14</td>
      <td> ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
  
  }else {
    echo "
  <tr>
  <td style='width=20px'>14</td>
  <td> Administrasi Umum </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> E </td>
  </tr>
  ";
  }
  ?>	
     <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='Basdawdaweaw'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
      echo "
      <tr>
      <td style='width:20px'>15</td>
      <td> ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
  
  }else {
    echo "
  <tr>
  <td style='width=20px'>15</td>
  <td> Bahasa Asing Pilihan </td>
  <td>  </td>
  <td>  </td>
  <td>  </td>
  <td>  </td>
  <td>  </td>
  </tr>
  ";
  }
  ?>	
     <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='Bahasa Jepang'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
      echo "
      <tr>
      <td style='width:20px'></td>
      <td> a. ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
  
  }else {
    echo "
  <tr>
  <td style='width=20px'></td>
  <td> a. Bahasa Jepang </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> E </td>
  </tr>
  ";
  }
  ?>	
     <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='Bahasa Prancis'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
      echo "
      <tr>
      <td style='width:20px'></td>
      <td> b. ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
  
  }else {
    echo "
  <tr>
  <td style='width=20px'></td>
  <td> b. Bahasa Prancis</td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> E </td>
  </tr>
  ";
  }
  ?>	
     <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='Bahasa Inggris Profesional'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
      echo "
      <tr>
      <td style='width:20px'></td>
      <td> c. ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
  
  }else {
    echo "
  <tr>
  <td style='width=20px'></td>
  <td> c. Bahasa Inggris Profesional </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> E </td>
  </tr>
  ";
  }
  ?>	
   <tr>
        <th colspan="7"> C3. Kompetensi Keahlian </th>
  </tr>
     <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='Industri Perhotelan'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
      echo "
      <tr>
      <td style='width:20px'>16</td>
      <td> ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
  
  }else {
    echo "
  <tr>
  <td style='width=20px'>16</td>
  <td> Industri Perhotelan </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> E </td>
  </tr>
  ";
  }
  ?>	
     <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='Front Office'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
      echo "
      <tr>
      <td style='width:20px'>17</td>
      <td> ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
  
  }else {
    echo "
  <tr>
  <td style='width=20px'>17</td>
  <td> Front Office </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> E </td>
  </tr>
  ";
  }
  ?>	
     <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='Housekeeping'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
      echo "
      <tr>
      <td style='width:20px'>18</td>
      <td> ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
  
  }else {
    echo "
  <tr>
  <td style='width=20px'>18</td>
  <td> Housekeeping </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> E </td>
  </tr>
  ";
  }
  ?>	
     <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='Laundry'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
      echo "
      <tr>
      <td style='width:20px'>19</td>
      <td> ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
  
  }else {
    echo "
  <tr>
  <td style='width=20px'>19</td>
  <td> Laundry </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> E </td>
  </tr>
  ";
  }
  ?>	
     <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='Launasdadawearwara'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
      echo "
      <tr>
      <td style='width:20px'>1</td>
      <td> ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
  
  }else {
    echo "
  <tr>
  <td style='width=20px'>20</td>
  <td> Food and Beverage </td>
  <td> </td>
  <td> </td>
  <td>  </td>
  <td>  </td>
  <td>  </td>
  </tr>
  ";
  }
  ?>	
     <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='F&B Service'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
      echo "
      <tr>
      <td style='width:20px'></td>
      <td>a. ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
  
  }else {
    echo "
  <tr>
  <td style='width=20px'></td>
  <td> a. F&B Service </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> E </td>
  </tr>
  ";
  }
  ?>	
     <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='F&B Product'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
      echo "
      <tr>
      <td style='width:20px'></td>
      <td> b. ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
  
  }else {
    echo "
  <tr>
  <td style='width=20px'></td>
  <td> b. F&B Product </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> E </td>
  </tr>
  ";
  }
  ?>	
     <?php  
      $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel 
      ON nilai.id_matpel = matpel.id_matpel 
      WHERE nilai.id_kelas ='$id_kelas' && 
      nilai.id_angkatan='$id_angkatan' && 
      nilai.id_siswa='$id_siswa' && 
      nilai.nama_matpel='Produk Kreatif dan Kewirausahaan'"); 
      if($rowJadwal = mysqli_fetch_assoc($getData)){
      echo "
      <tr>
      <td style='width:20px'>21</td>
      <td> ".$rowJadwal['nama_matpel']." </td>
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
     <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>
    </tr>
      ";
  
  }else {
    echo "
  <tr>
  <td style='width=20px'>21</td>
  <td> Produk Kreatif dan Kewirausahaan </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> 0 </td>
  <td> E </td>
  </tr>
  ";
  }
  ?>	
    
    </table>

    <h6 style="font-weight:bold;"> B. Catatan Akademik</h6>
    <div style="width:100%; border:solid 1px black; padding:10px; ">
    <p>Siswa perlu meningkatkan kompetensi pada beberapa mata pelajaran, karena nilai rapor akan digunakan sebagai acuan dalam penentuan penentuan kelulusan kelas <?php $s= substr($kelas,0,3); echo "$s";?></p>
    </div>
    <h6 style="font-weight:bold; padding-top:20px;"> C. Praktik Kerja Lapangan</h6>
    <div>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <tr>
    <th style="width:20px"> No </th>
    <th> Mitra DU/DI</th>
    <th> Lokasi </th>
    <th> Lamanya (bulan) </th>
    <th> Keterangan </th>
    </tr>
    <tr>
    <td>1 </td>
    <td> </td>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td>2 </td>
    <td> </td>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    <tr>
    <td>3 </td>
    <td> </td>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    </table>
    </div>
    <h6 style="font-weight:bold; padding-top:20px;"> D. Ekstrakurikuler</h6>
    <div>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <tr>
    <th style="width:20px"> No </th>
    <th> Kegiatan Ekstrakurikuler</th>
    <th> Keterangan </th>
    </tr>
    <tr>
    <td>1 </td>
    <td> </td>
    <td></td>
   
    </tr>
    <tr>
    <td>2 </td>
    <td> </td>
    <td></td>
  
    </tr>
    <tr>
    <td>3 </td>
    <td> </td>
    <td></td>
   
    </tr>
    </table>
    </div>
    <h6 style="font-weight:bold; padding-top:20px;"> E. Ketidakhadiran</h6>
    <div>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    
    <?php 
    $getDataAbsen=mysqli_query($db,"SELECT * FROM absen WHERE id_kelas='$id_kelas' && id_angkatan='$id_angkatan' && id_siswa='$id_siswa' ");
    $dataAbsen=mysqli_fetch_assoc($getDataAbsen);
    $absen=$dataAbsen['absen'];
    $sakit=$dataAbsen['sakit'];
    $izin=$dataAbsen['izin'];
    ?> 
    <tr>
    <td style="width:180px;">Sakit</td>
    <td  style="width:15px">:</td>
    <td> <?php echo"$sakit"; ?> Hari</td>
   
    </tr>
    <tr>
    <td style="width:180px;">Izin</td>
    <td  style="width:15px">:</td>
    <td> <?php echo"$izin"; ?> Hari</td>
  
    </tr>
    <tr>
    <td style="width:180px;">Tanpa Keterangan</td>
    <td style="width:15px">:</td>
    <td> <?php echo"$absen"; ?> Hari</td>
   
    </tr>
    </table>
    </div>
    <div class="row"> 
    <div class="col-8">
    <p>Mengetahui</p>
    <p>Orang Tua / Wali </p>
    <br>
    <br>
    <p>..................................</p>
    </div>
    <div class="col-4">
    <p>Jakarta, <?php echo "". date("d F Y").""?></p>
    <p> Wali Kelas </p>
    <br>
    <br>
    <p><?php echo"$nama_guru";?></p>
    </div>
    </div>
    <center>
    <p>Mengetahui</p>
    <p>Kepala Sekolah </p>
    <br>
    <br>
    <br>
    <p>Edriyanto, S.S</p>

    </center>
	<script>
		window.print();
	</script>
 
</body>
</html>