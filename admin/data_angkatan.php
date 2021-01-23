<?php include('header.php');?>
 <?php include('../koneksi.php');?>
 <?php 
$getAngkatan=mysqli_query($db,"SELECT * FROM angkatan limit 1");
$angkatan=mysqli_fetch_assoc($getAngkatan);
$id=$angkatan['id_angkatan'];
?>
 <br>
 <div class="col-xl-12 col-lg-7" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Daftar Angkatan</h6>
                  <div class="dropdown no-arrow">
                  <!-- <a style="text-decoration:none;" href="updateBio.php?id=<?php echo "$id_Guru"?>">Update Bio</a> -->
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
            
                  <div class="row" style="margin-left:auto; margin-bottom:1%;"> 
                  <h5> Cari Angkatan:</h5>
                      <input id="myInput" onkeyup="myFunction()" placeholder="input" type="search" class="form-control" style="margin-right:1%;max-width:250px; margin-left:1%;"placeholder="" aria-controls="dataTable">
                      <!-- <input type="submit" class="btn btn-primary" value="Cari" style="margin-left:1%; margin-right:1%"p>  -->
                      <a class="btn btn-success" href="input_angkatan.php?id_admin=<?php echo $id_admin ?>">[+] Tambah Angkatan</a>           
                    </div>
       <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                <th>No</th>
                <th>Tahun</th>
                <th>Semester</th>
                <th>Input</th>
                </tr>
                </thead>
                <?php
               
                $halaman = 10;
                $page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
                $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
               
	$sql="SELECT * FROM angkatan ORDER by tahun asc";
  $query=mysqli_query($db,$sql);
  $total = mysqli_num_rows($query);
  $pages = ceil($total/$halaman); 
  $getData = mysqlI_query($db,"SELECT * FROM angkatan ORDER by tahun asc LIMIT $mulai, $halaman");
$i=0;
	while($siswa=mysqli_fetch_array($getData)){
    $i++;
    $semester;
    if($siswa['semester']==1){
        $semester="Ganjil";
    } else{
        $semester="Genap";
    }
		echo"<tr>";

		echo"<td style='width:20px;'>$i</td>";
		echo"<td>".$siswa['tahun']."</td>";
		echo"<td>".$siswa['semester']."</td>";

		echo"<td ><a href='hapus.php?id=".$siswa['id_angkatan']."&&type=angkatan&&id_admin=$id_admin'>Hapus</a></td>";
	// <a href='editkelas.php?id_kelas=".$siswa['id_kelas']."&&id_angkatan=".$siswa['id_angkatan']."'>/ Edit</a></td>
  	

		echo"</tr>";
	}
	?>
                  </table>
                 
  <div  style="margin-left:auto" class="row">
  <div style="col-6">
  <ul class="pagination">
  <?php for ($j=1; $j<=$pages ; $j++){ ?>
    <li >
  <a class="btn" style="border:solid 1px grey ; margin:4px;" href="?halaman=<?php echo "$j&&?id_admin=$id_admin"; ?>"><?php echo $j; ?></a>
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