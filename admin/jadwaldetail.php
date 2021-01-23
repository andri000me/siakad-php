<?php include('header.php');?>
 <?php include('../koneksi.php');?>
 <?php 

$id=$_GET['id_kelas'];
$getKelas=mysqli_query($db,"SELECT * FROM kelas WHERE id_kelas = '$id' limit 1");
$kelas=mysqli_fetch_assoc($getKelas);
$id_kelas=$kelas['id_kelas'];
$nama_kelas=$kelas['nama_kelas'];
$hari=$_GET['hari'];
$id_kelas=$_GET['id_kelas'];
?>
 <br>
 <div class="col-xl-8 col-lg-7" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Jadwal Kelas <?php echo "$nama_kelas";?> </h6>
                  <div class="dropdown no-arrow">
                  <!-- <a style="text-decoration:none;" href="updateBio.php?id=<?php echo "$id_Guru"?>">Update Bio</a> -->
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
            
                  <div class="row" style="margin-left:auto; margin-bottom:1%;"> 
                  <h5 style="margin-right:10px;"> Hari : </h5>
                  <input type="hidden" id="admin"value="<?php echo $id_admin ?>" style="border-radius:10px;" class="form-control form-control-user" >
                
                       <input type="hidden" id="kelas" value="<?php echo"$id_kelas"; ?> "> 
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
  <a class="btn" style="border:solid 1px grey ; margin:4px;" href="?halaman=<?php echo "$j&&hari=$hari&&id_kelas=$id_kelas"; ?>"><?php echo $j; ?></a>
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
    var id=document.getElementById('kelas').value;
    var hari=document.getElementById('hari').value;
    var id_admin=document.getElementById('admin').value;
// 	var data = $('#myForm').serialize();
// console.log(data);
      var urlID = "jadwaldetail.php?id_kelas="+id+"&&hari="+hari+"&&id_admin="+id_admin;
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