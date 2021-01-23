<?php include('header.php');?>
<?php include('../koneksi.php');?>
<br>
<?php 
// $id_matpel = $_GET['id_matpel'];
$id_kelas = $_GET['id_kelas'];
$id_angkatan = $_GET['id_angkatan'];
$id_siswa = $_GET['id'];
// $nama_matpel = $_GET['nama_matpel'];
$getData=mysqli_query($db,"SELECT * FROM siswa WHERE id_kelas ='$id_kelas' && id_angkatan='$id_angkatan' && id_siswa='$id_siswa'");
$Data=mysqli_fetch_assoc($getData);
$nama=$Data['nama_siswa'];
$getDataGuru=mysqli_query($db,"SELECT * FROM guru WHERE id_kelas ='$id_kelas'");
$dataGuru=mysqli_fetch_assoc($getDataGuru);
$namaGuru=$dataGuru['nama_guru'];
?>
     
<div class="col-xl-10 col-lg-7" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center">
                  <div class="col-1">
                  <h6 class="m-0 font-weight-bold text-primary">Nilai  Rapot</h6>
                  </div>                                                  
                  <div class="col-2" > 
                  <a class="btn btn-primary" href="cetakNilai.php?id=<?php echo "$id_siswa&&id_kelas=$id_kelas&&id_angkatan=$id_angkatan&&nama_guru=$namaGuru"?>" > Cetak</a>

                   
                     </div>
                    
                    </form>                                 
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="d-flex flex-row align-items-center " style="padding-bottom:20px;">
                <div style="width:100px;">
                  <h6 class="m-0 font-weight-bold text-primary">Angkatan <span style="color:black">  </h6>
                  </div>                                                  
                  <div style="padding-right:10px;" > 
                  <input type="hidden" value="<?php echo"$id_siswa"; ?>" id="siswa"> 
                  <select onchange="cek()" id="angkatan" name="angkatan" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM angkatan order by tahun asc");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                             
                            if($row['id_angkatan'] == $id_angkatan){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_angkatan']." selected>".$row['tahun']." Semester ( ".$row['semester']." )</option> ";
                            } else {
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_angkatan']." > ".$row['tahun']."  Semester ( ".$row['semester']." )</option> ";
                            }
                           
                         }
                      ?>	                          
                     </select>
                  </div> 
                  <h6 class="m-0 font-weight-bold text-primary">Kelas <span style="color:black"> </h6>
                  <div style="padding-left:20px" > 
                  <select onchange="cek()" name="kelas" id="kelas" class="form-control" id="exampleFormControlSelect1">
                      <?php 
                      $getData=mysqli_query($db,"SELECT DISTINCT nilai.kelas ,nilai.id_kelas FROM nilai right JOIN kelas ON nilai.id_kelas = kelas.id_kelas WHERE nilai.id_siswa='$id_siswa' && nilai.id_angkatan='$id_angkatan' GROUP BY nilai.id_kelas ");
                         while($row = mysqli_fetch_assoc($getData)){
                           $aktif=false;
                           $count;
                           if($row['id_kelas'] == $id_kelas){
                            
                             echo " <option class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_kelas']."  selected>".$row['kelas']."</option> ";
                           } else {
                             echo " <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_kelas']." >".$row['kelas']."</option> ";
                           $aktif=true;
                            }
                         }
                         if($aktif==true){
                            if($id_kelas=="" || $row['id_kelas'] != $id_kelas){
                               echo " <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value='' selected >Pilih Kelas </option> ";
                            } else {
                               echo " <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=''>Pilih Kelas </option> ";
                            }
                         } else {
                            echo " <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=''>Pilih Kelas </option> ";
                           
                         }      
                      ?>	                          
                     </select></div>
                </div>
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
<script>
    function cek(){
    var id=document.getElementById('angkatan').value;
    var id_siswa=document.getElementById('siswa').value;
    var id_kelas=document.getElementById('kelas').value;
// 	var data = $('#myForm').serialize();
// console.log(data);
      var urlID = "daftarNilai.php?id_angkatan="+id+"&&id="+id_siswa+"&&id_kelas="+id_kelas;
      console.log(urlID);
        $.ajax({
            
            url:  urlID,
            type: "post",
            data: {option: $(this).find("option:selected").val()},
            success: function(data){
                //adds the echoed response to our container
                window.location=urlID;
                console.log("success");
            }
        });
    }
    </script>