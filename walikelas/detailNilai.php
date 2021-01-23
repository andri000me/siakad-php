<?php include('header.php');?>
<?php include('../koneksi.php');?>
<br>
<?php 
// $id_matpel = $_GET['id_matpel'];
$id_kelas = $_GET['id_kelas'];
$id_angkatan = $_GET['id_angkatan'];
$id_siswa = $_GET['id_siswa'];
// $nama_matpel = $_GET['nama_matpel'];
$getData=mysqli_query($db,"SELECT * FROM siswa WHERE id_kelas ='$id_kelas' && id_angkatan='$id_angkatan' && id_siswa='$id_siswa'");
$Data=mysqli_fetch_assoc($getData);
$nama=$Data['nama_siswa'];
?>
     
<div class="col-xl-10 col-lg-7" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center">
                  <div class="col-2">
                  <h6 class="m-0 font-weight-bold text-primary">Input Nilai <span style="color:black"> <?php echo"$nama"?> </span>  </h6>
                  </div>                                                  
                  <div class="col-2" > 
                  <a class="btn btn-primary" href="cetakNilai.php?id_siswa=<?php echo "$id_siswa&&id_kelas=$id_kelas&&id_angkatan=$id_angkatan&&nama_guru=$namaGuru"?>" > Cetak</a>
                  <a class="btn btn-warning" href="inputabsen.php?id_siswa=<?php echo "$id_siswa&&id_kelas=$id_kelas&&id_angkatan=$id_angkatan&&id=$id_guru"?>" > Absen</a>
                   
                     </div>
                    
                    </form>                                 
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <!-- <thead> -->
                <tr>
                <th    style="width:15px; vertical-align: middle; text-align: center;">No</th>
     
                <th    style=" vertical-align: middle; text-align: center;">Mata Pelajaran</th>
                <th    style=" vertical-align: middle; text-align: center;">Nama Guru</th>
                <th    style=" vertical-align: middle; text-align: center;">KKM</th>
                
                <th   style=" vertical-align: middle; text-align: center;">Pengetahuan</th>
                <th  style=" vertical-align: middle; text-align: center;">Keterampilan</th>
                <th  style=" vertical-align: middle; text-align: center;">Nilai Akhir</th>
                <th  style=" vertical-align: middle; text-align: center;">Predikat</th>
                <!-- <th  style=" vertical-align: middle; text-align: center;">Input</th> -->
</tr>

                <!-- </thead> -->
            
                <!-- <tbody> -->
                 <?php 
                 $i=0;
                 $halaman = 10;
                $page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
                $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
               
	$sql="SELECT * FROM nilai LEFT JOIN matpel ON nilai.id_matpel = matpel.id_matpel WHERE nilai.id_kelas ='$id_kelas' && nilai.id_angkatan='$id_angkatan' && nilai.id_siswa='$id_siswa'";
  $query=mysqli_query($db,$sql);
  $total = mysqli_num_rows($query);
  $pages = ceil($total/$halaman); 
  $getData = mysqlI_query($db,"SELECT * FROM nilai LEFT JOIN matpel ON nilai.id_matpel = matpel.id_matpel WHERE nilai.id_kelas ='$id_kelas' && nilai.id_angkatan='$id_angkatan' && nilai.id_siswa='$id_siswa' LIMIT $mulai, $halaman");
                
                  while($rowJadwal = mysqli_fetch_assoc($getData)){
                    $i++;
      echo "
      <tr>
      <td>$i</td>
      <td> ".$rowJadwal['nama_matpel']." </td>
      <td> ".$rowJadwal['nama_guru']." </td>
     
      <td>".$rowJadwal['kkm']."</td>
      <td> ".$rowJadwal['nilai_pengetahuan']."</td>
     <td> ".$rowJadwal['nilai_keterampilan']."</td>
         <td> ".$rowJadwal['nilai_akhir']."</td>
     <td> ".$rowJadwal['predikat']."</td>

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