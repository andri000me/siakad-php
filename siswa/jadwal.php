<?php include('header.php');?>
<?php include('../koneksi.php');?>
<?php 

$hari=$_GET['hari'];
$id_angkatan=$_GET['id_angkatan'];
$id_kelas=$_GET['id_kelas'];
?>
 <br>
 <div class="col-xl-12 col-lg-7" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header  d-flex flex-row align-items-center">
                  <h6 class="m-0 font-weight-bold text-primary">Data Daftar Jadwal <span style="color:black;"> <?php echo "$kelas"?> </span></h6>
                   
                  <div class="dropdown no-arrow">
                 
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
            
         
                  <div class="row" style="margin-left:auto; margin-bottom:1%;"> 
                  <h5 style="margin-right:10px;"> Hari : </h5>
                       <input type="hidden" id="kelas" value="<?php echo"$id_kelas"; ?> "> 
                       <input type="hidden" id="angkatan" value="<?php echo"$id_angkatan"; ?> "> 
                       <input type="hidden" id="siswa" value="<?php echo"$id_siswa"; ?> "> 
                        <select style="border-color: gainsboro; border-radius: 5px;" onchange="cek()" id="hari" name="hari" value="<?php echo"$id_angkatan"; ?>" >
                    
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM hari ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                             
                            if($row['hari'] == $hari){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='padding:5px;background:white;color:black; border-color: gainsboro; border-radius: 5px; ' value=".$row['hari']." selected>".$row['hari']."</option> ";
                            } else {
                                echo "<option  class='btn btn-danger dropdown-toggle' style='padding:5px;background:white;color:black; border-color: gainsboro; border-radius: 5px; ' value=".$row['hari']." >".$row['hari']."</option> ";
                            }
                           
                         }
                      ?>	                          
                     </select>
                  </div>

                    <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                <th>No</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Nama Matpel</th>
                <th>Nama Guru</th>
                <!-- <th>Input</th> -->
                </tr>
                </thead>
                <?php
               
                $halaman = 10;
                $page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
                $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
               
	$sql="SELECT * FROM jadwal WHERE id_kelas = $id_kelas && mata_pelajaran != '' && hari='$hari' ";
  $query=mysqli_query($db,$sql);
  $total = mysqli_num_rows($query);
  $pages = ceil($total/$halaman); 
  $getData = mysqlI_query($db,"SELECT * FROM jadwal WHERE id_kelas = $id_kelas && mata_pelajaran != '' && hari='$hari'  LIMIT $mulai, $halaman");
$i=0;
	while($siswa=mysqli_fetch_array($getData)){
    $i++;
		echo"<tr>";

		echo"<td style='width:20px;'>$i</td>";
        echo"<td style='width:140px'>".$siswa['hari']."</td>";
        echo"<td style='width:140px'>".$siswa['jam_pelajaran']."</td>";
		echo"<td>".$siswa['mata_pelajaran']."</td>";

		echo"<td >".$siswa['guru_pengajar']."</td>";
	
	

		// echo"<td><a href='form-edit.php?id_siswa=".$siswa['id_kelas']."'>Edit</a> / <a href='jadwaldetail.php?id_kelas=".$siswa['id_kelas']."'>Lihat</a></td>";
		

		echo"</tr>";
	}
	?>
                  </table>
                 
  <div  style="margin-left:auto" class="row">
  <div style="col-6">
  <ul class="pagination">
  <?php for ($j=1; $j<=$pages ; $j++){ ?>
    <li >
    <a class="btn" style="border:solid 1px grey ; margin:4px;" href="?halaman=<?php echo "$j&&hari=$hari&&id_kelas=$id_kelas&&id=$id_siswa&&id_angkatan=$id_angkatan"; ?>"><?php echo $j; ?></a>
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
    var id_angkatan=document.getElementById('angkatan').value;
    var id_siswa=document.getElementById('siswa').value;
    var id=document.getElementById('kelas').value;
    var hari=document.getElementById('hari').value;
// 	var data = $('#myForm').serialize();
// console.log(data);
      var urlID = "jadwal.php?id="+id_siswa+"&&id_kelas="+id+"&&hari="+hari+"&&id_angkatan="+id_angkatan;
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