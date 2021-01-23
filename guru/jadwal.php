<?php include('header.php');?>
<?php include('../koneksi.php');?>
<?php 
$getAngkatan=mysqli_query($db,"SELECT * FROM angkatan limit 1");
$angkatan=mysqli_fetch_assoc($getAngkatan);
$id=$angkatan['id_angkatan'];
$getKelas=mysqli_query($db,"SELECT * FROM kelas WHERE id_angkatan = '$id' limit 1");
$kelas=mysqli_fetch_assoc($getKelas);
$id_kelas=$kelas['id_kelas'];
?>
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="success"){
			echo " <center ><div style='background-color:green; color:white; width:100%'> <p> Jadwal berhasil di hapus </p> </div> </center >";
		}
	}
	?>
 
 <br>
 <div class="col-xl-12 col-lg-7" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Daftar Jadwal</h6>
                  <div class="dropdown no-arrow">
                  <!-- <a style="text-decoration:none;" href="updateBio.php?id=<?php echo "$id_Guru"?>">Update Bio</a> -->
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
            
                  <div class="row" style="margin-left:auto; margin-bottom:1%;"> 
                  <h5> Cari Kelas :</h5>
                      <input id="myInput" onkeyup="myFunction()" placeholder="Masukkan nama kelas" type="search" class="form-control" style="margin-right:1%;max-width:250px; margin-left:1%;"placeholder="" aria-controls="dataTable">
                      <!-- <input type="submit" class="btn btn-primary" value="Cari" style="margin-left:1%; margin-right:1%"p>  -->
                      <!-- <a class="btn btn-success" href="inputjadwal.php?id_angkatan=<?php echo "$id&&id_kelas=$id_kelas&&id_admin=$id_admin"?>">[+] Tambah Mata Pelajaran</a>            -->
                    </div>

                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                <th>No</th>
                <th>Kelas</th>
                <th>Angkatan</th>
                <th>Wali Kelas</th>
                <th>Input</th>
                </tr>
                </thead>
                <?php
               
                $halaman = 10;
                $page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
                $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
               
	$sql="SELECT * FROM kelas LEFT JOIN guru ON kelas.id_kelas = guru.id_kelas WHERE kelas.id_guru = $id_guru";
  $query=mysqli_query($db,$sql);
  $total = mysqli_num_rows($query);
  $pages = ceil($total/$halaman); 
  $getData = mysqlI_query($db,"SELECT * FROM kelas LEFT JOIN guru ON kelas.id_kelas = guru.id_kelas WHERE kelas.id_guru = $id_guru LIMIT $mulai, $halaman");
$i=0;
	while($siswa=mysqli_fetch_array($getData)){
    $i++;
    $semester;
    if($siswa['semester']==1){
      $semester="Semester Ganjil";
    } else {
      $semester="Semster Genap";
    }
		echo"<tr>";

		echo"<td style='width:20px;'>$i</td>";
		echo"<td style='width:140px'>".$siswa['nama_kelas']."</td>";
		echo"<td >".$siswa['angkatan']." $semester</td>";
		echo"<td >".$siswa['nama_guru']."</td>";
		echo"<td></a> <a href='jadwal_detail.php?id_kelas=".$siswa['id_kelas']."&&hari=senin&&id=$id_guru&&id_angkatan=".$siswa['id_angkatan']."'>Lihat</a></td>";
	

		echo"</tr>";
	}
	?>
                  </table>
                 
  <div  style="margin-left:auto" class="row">
  <div style="col-6">
  <ul class="pagination">
  <?php for ($j=1; $j<=$pages ; $j++){ ?>
    <li >
  <a class="btn" style="border:solid 1px grey ; margin:4px;" href="?halaman=<?php echo "$j&&id_admin=$id_admin"; ?>"><?php echo $j; ?></a>
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