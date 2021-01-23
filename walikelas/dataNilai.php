<?php include('header.php');?>
<?php include('../koneksi.php');?>
<br>
<?php 
// $id_matpel = $_GET['id_matpel'];
$id_kelas = $_GET['id_kelas'];
$id_angkatan = $_GET['id_angkatan'];
// $nama_matpel = $_GET['nama_matpel'];
$getDataKelas=mysqli_query($db,"SELECT * FROM siswa WHERE id_kelas ='$id_kelas' && id_angkatan='$id_angkatan'");
$getKelas=mysqli_fetch_assoc($getDataKelas);
$nama_kelas=$getKelas['kelas'];
?>
     
<div class="col-xl-10 col-lg-7" style="margin-left: auto;margin-right: auto;">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center">
                  <div class="col-2">
                  <h6 class="m-0 font-weight-bold text-primary">Input Nilai <span style="color:black"> <?php echo"$nama_kelas"?> </span> </h6>
                  </div>                                                  
                  <div class="col-2" > 
                     </div>
                    </form>                                 
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <!-- <thead> -->
                <tr>
                <th    style="width:15px; vertical-align: middle; text-align: center;">No</th>
                <th    style=" vertical-align: middle; text-align: center;">NIS</th>
                <th    style=" vertical-align: middle; text-align: center;">NISN</th>
                <th    style=" vertical-align: middle; text-align: center;">Nama Siswa</th>
              
                <th  style=" vertical-align: middle; text-align: center;">Input</th>
</tr>
                 <?php 
                 $i=0;
                 $halaman = 10;
                $page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
                $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
               
	$sql="SELECT * FROM siswa WHERE id_kelas ='$id_kelas' && id_angkatan='$id_angkatan'";
  $query=mysqli_query($db,$sql);
  $total = mysqli_num_rows($query);
  $pages = ceil($total/$halaman); 
  $getData = mysqlI_query($db,"SELECT * FROM siswa WHERE id_kelas ='$id_kelas' && id_angkatan='$id_angkatan' LIMIT $mulai, $halaman");
                
                  while($rowJadwal = mysqli_fetch_assoc($getData)){
                    $i++;
      echo "
      <tr>
      <td>$i</td>
      <td> ".$rowJadwal['nis']." </td>
      <td> ".$rowJadwal['nisn']." </td>
      <td> ".$rowJadwal['nama_siswa']." </td>

      <td> <a style='text-decoration:none;' href='detailNilai.php?id=$id_guru&&id_kelas=".$rowJadwal['id_kelas']."&&id_siswa=".$rowJadwal['id_siswa']."&&id_angkatan=".$rowJadwal['id_angkatan']."'><span> <i class='fas fa-pen-square' > </i></span> Edit/Input</a></td>
         </tr>
      ";
                              }
                              ?>	 
                 
                                  <!-- </tbody> -->
                           
                  </table>
                  <div  style="margin-left:auto" class="row">
  <div style="col-6">
  <ul class="pagination">
  <?php for ($j=1; $j<=$pages ; $j++){ ?>
    <li >
  <a class="btn" style="border:solid 1px grey ; margin:4px;" href="?halaman=<?php echo "$j&&id=$id_guru&&id_matpel=$id_matpel&&id_kelas=$id_kelas&&nama_matpel=$nama_matpel"; ?>"><?php echo $j; ?></a>
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