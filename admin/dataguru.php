<?php include('header.php');?>
 <?php include('../koneksi.php');?>
 <?php 
$getAngkatan=mysqli_query($db,"SELECT * FROM angkatan limit 1");
$angkatan=mysqli_fetch_assoc($getAngkatan);
$id=$angkatan['id_angkatan'];

?>
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<script> alert('Data Tidak Ada')</script>";
		}
	}
	?>
 
 <br>
 <div class="col-xl-12 col-lg-7" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Daftar Guru</h6>
                <div class="dropdown no-arrow">
                  <!-- <a style="text-decoration:none;" href="updateBio.php?id=<?php echo "$id_Guru"?>">Update Bio</a> -->
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
            
                  <div class="row" style="margin-left:auto; margin-bottom:1%;"> 
                  <Label> Cari Nama :</label>
                      <input id="myInput" onkeyup="myFunction()" placeholder="Masukkan nama" type="search" class="form-control" style="margin-right:1%;max-width:200px; margin-left:1%;"placeholder="" aria-controls="dataTable">
                      <!-- <input type="submit" class="btn btn-primary" value="Cari" style="margin-left:1%; margin-right:1%"p>  -->
                      <a class="btn btn-success" href="inputdataguru.php?id_angkatan=<?php echo "$id&&id_admin=$id_admin"?>">[+] Tambah Guru Baru</a>           
                    </div>
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                <th>No</th>
                <th>NUPTK</th>
                <th>Nama Guru</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Email</th>
                <th>Agama</th>
                <th>Tempat lahir </th>
                <th>Tanggal Lahir </th>
                <th>Jenis Kelamin</th>
                <th>Status</th>
                <th>Input</th>
                </tr>
                </thead>
                <?php
               
                $halaman = 10;
                $page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
                $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
               
	$sql="SELECT*FROM guru";
  $query=mysqli_query($db,$sql);
  $total = mysqli_num_rows($query);
  $pages = ceil($total/$halaman); 
  $getData = mysqlI_query($db,"SELECT*FROM guru LIMIT $mulai, $halaman");
$i=0;
	while($siswa=mysqli_fetch_array($getData)){
    $i++;
		echo"<tr>";

		echo"<td>$i</td>";
		echo"<td>".$siswa['nuptk']."</td>";
		echo"<td style='max-width:200px'>".$siswa['nama_guru']."</td>";
		echo"<td  style='max-width:250px'>".$siswa['alamat']."</td>";
		echo"<td>".$siswa['no_hp']."</td>";
		echo"<td>".$siswa['email']."</td>";
		echo"<td>".$siswa['agama']."</td>";
		echo"<td>".$siswa['tempat_lahir']."</td>";
		echo"<td>".$siswa['tanggal_lahir']."</td>";
		echo"<td>".$siswa['jenis_kelamin']."</td>";
        echo"<td>".$siswa['status']."</td>";
		echo"<td><a href='editguru.php?id_guru=".$siswa['id_guru']."&&id_admin=$id_admin'>Edit</a> / <a href='hapus.php?id=".$siswa['id_guru']."&&type=guru&&id_admin=$id_admin'>Hapus</a></td>";
		
    
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
    td = tr[i].getElementsByTagName("td")[3];
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