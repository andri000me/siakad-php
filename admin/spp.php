<?php include('header.php');?>
 <?php include('../koneksi.php');?>
 <?php 
$getAngkatan=mysqli_query($db,"SELECT * FROM angkatan limit 1");
$angkatan=mysqli_fetch_assoc($getAngkatan);
$id=$angkatan['id_angkatan'];
$getKelas=mysqli_query($db,"SELECT * FROM kelas where id_angkatan='$id' limit 1");
$get=mysqli_fetch_assoc($getKelas);
$kelas=$get['id_kelas'];
?>
 <br>
 <div class="col-xl-12 col-lg-7" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Daftar Kelas</h6>
                  <div class="dropdown no-arrow">
                  <!-- <a style="text-decoration:none;" href="updateBio.php?id=<?php echo "$id_Guru"?>">Update Bio</a> -->
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
            
                  <div class="row" style="margin-left:auto; margin-bottom:1%;"> 
                  <h5> Cari NIS:</h5>
                      <input id="myInput" onkeyup="myFunction()" placeholder="input" type="search" class="form-control" style="margin-right:1%;max-width:250px; margin-left:1%;"placeholder="" aria-controls="dataTable">
                      <!-- <input type="submit" class="btn btn-primary" value="Cari" style="margin-left:1%; margin-right:1%"p>  -->
                      <a class="btn btn-success" href="inputspp.php?id_angkatan=<?php echo "$id&&id_kelas=$kelas&&id_admin=$id_admin"?>">[+] Tambah Pembayaran</a>           
                    </div>
       <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Angkatan</th>
                <th>Kelas</th>
                <th>Semester</th>
                <th>Jumlah Pembayaran</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Input</th>
                </tr>
                </thead>
                <?php
               
                $halaman = 10;
                $page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
                $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
               
	$sql="SELECT * FROM siswa RIGHT JOIN pembayaran_spp ON siswa.id_siswa = pembayaran_spp.id_siswa ";
  $query=mysqli_query($db,$sql);
  $total = mysqli_num_rows($query);
  $pages = ceil($total/$halaman); 
  $getData = mysqlI_query($db,"SELECT * FROM siswa RIGHT JOIN pembayaran_spp ON siswa.id_siswa = pembayaran_spp.id_siswa  LIMIT $mulai, $halaman");
$i=0;
	while($siswa=mysqli_fetch_array($getData)){
    $i++;
		echo"<tr>";

		echo"<td style='width:20px;'>$i</td>";
		echo"<td>".$siswa['nis']."</td>";
    echo"<td>".$siswa['nama_siswa']."</td>";
    echo"<td >".$siswa['angkatan']."</td>";
    echo"<td >".$siswa['kelas']."</td>";
    echo"<td >".$siswa['semester']."</td>";
    echo"<td >".$siswa['jumlah']."</td>";
    echo"<td >".$siswa['status']."</td>";
    echo"<td >".$siswa['tanggal_bayar']."</td>";
	echo"<td><a href='edit_spp.php?id=".$siswa['id_spp']."&&id_kelas=".$siswa['id_kelas']."&&id_angkatan=".$siswa['id_angkatan']."'>Edit</a> / <a href='hapus.php?id=".$siswa['id_spp']."&&type=spp'>Hapus</a></td>";
		

		echo"</tr>";
	}
	?>
                  </table>
                 
  <div  style="margin-left:auto" class="row">
  <div style="col-6">
  <ul class="pagination">
  <?php for ($j=1; $j<=$pages ; $j++){ ?>
    <li >
  <a class="btn" style="border:solid 1px grey ; margin:4px;" href="?halaman=<?php echo $j; ?>"><?php echo $j; ?></a>
  </li>
  <?php } ?>
  </ul>
</div>
  
</div>
                  </div>
                </div>
              </div>
            </div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>