<?php include('header.php');?>
 <?php include('../koneksi.php');?>
 <br>
 <?php 
 $id_angkatan=$_GET['id_angkatan'];
 $id_kelas=$_GET['id_kelas'];
 $id_matpel=$_GET['id_matpel'];
 $getDataMatpel=mysqli_query($db,"SELECT * FROM matpel WHERE id_matpel='$id_matpel'");
 $data=mysqli_fetch_assoc($getDataMatpel);
 $nama_matpel=$data['nama_matpel'];
 $id_guru=$data['id_guru'];
if(isset($_POST['update']))
{   
    $nama=$_POST['nama'];
    // echo"$nama";
    // $guru=$_POST['guru']['nama_guru'];
    $id_guru=$_POST['guru'];
    $angkatan=$_POST['angkatan'];
    $kelas=$_POST['kelas'];
    $getData=mysqli_query($db,"SELECT * FROM guru WHERE id_guru='$id_guru'");
    $getDataGuru=mysqli_fetch_assoc($getData);
    $guru=$getDataGuru['nama_guru'];
// echo "$angkatan";
// echo "$kelas";
    $inputmatpel = mysqli_query($db,"UPDATE matpel SET nama_matpel='$nama', nama_guru='$guru', id_guru='$id_guru',id_kelas='$kelas',id_angkatan='$angkatan' WHERE id_matpel='$id_matpel'");
   
   
   
   $getJumlah= mysqli_query($db,"SELECT * FROM kelas WHERE id_kelas='$id_kelas'");
   $jumlah=mysqli_fetch_assoc($getJumlah);
   $get=$jumlah['nama_kelas'];
   $semester=$jumlah['semester'];
   // $inputSiswa = mysqli_query($db,"INSERT INTO siswa VALUE('','$nis','$angkatan','$kelas','$nis','$nama','$namaKelas','$alamat','$teleponUP','$email','$agama','$tempat','$ttl','$nis','$nisn','')");
    // Redirect to homepage to display updated user in list
    // echo "$nama";

 $inputData=mysqli_query($db,"UPDATE nilai SET nama_matpel= '$nama',kelas='$get',id_kelas='$id_kelas',id_angkatan='$id_angkatan',semester='$semester' WHERE id_matpel='$id_matpel'");
 $inputNilai=mysqli_query($db,"UPDATE nilai_siswa SET mata_pelajaran= '$nama' , kelas='$get',id_kelas='$id_kelas',id_angkatan='$id_angkatan',semester='$semester'WHERE id_matpel='$id_matpel' ");
 //   $getDataGuru=mysqli_fetch_assoc($getData);
                           header("Location:datamatapelajaran.php?id_admin=$id_admin");
} 
?>

<br>
<div class="col-xl-6 col-lg-12" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Input Mata Pelajaran</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                <form class="user" name="tambah_siswa" method="post" action="editmatpel.php?id_angkatan=<?php echo "$id_angkatan&&id_matpel=$id_matpel&&id_kelas=$id_kelas&&id_admin=$id_admin"; ?>" enctype="multipart/form-data">
                <input type="hidden" id="admin"value="<?php echo $id_admin ?>" style="border-radius:10px;" class="form-control form-control-user" >
                    
                <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Angkatan</p>
                    </div>
                   <div class="col-9">
                   <input type="hidden" name="id_matpel" value="<?php $id_matpel ?>" >
                   <select onchange="cek()" id="angkatan" name="angkatan" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM angkatan order by tahun asc ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                             
                            if($row['id_angkatan'] == $id_angkatan){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_angkatan']." selected>".$row['tahun']." Semester ( ".$row['semester']." )</option> ";
                            } else {
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_angkatan']." >".$row['tahun']." Semester ( ".$row['semester']." )</option> ";
                            }
                           
                         }
                      ?>	                          
                     </select>
                        
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Nama Mata Pelajaran </p>
                    </div>
                   <div class="col-9">
                   <select  name="nama" id="matpel" value="<?php echo"$nama_matpel"; ?>"class="form-control" id="exampleFormControlSelect1">
                      <?php 
                      $getData=mysqli_query($db,"SELECT * FROM mata_pelajaran order by nama_matpel asc  ");
                         while($row = mysqli_fetch_assoc($getData)){
                            if($row['nama_matpel'] == $nama_matpel){
			echo " <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value='".$row['nama_matpel']."' selected>".$row['nama_matpel']."</option> ";
                            } else {
                                echo " <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value='".$row['nama_matpel']."' >".$row['nama_matpel']."</option> ";
            
                            }                
        
        }
                      ?>	                          
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Nama Guru</p>
                    </div>
                   <div class="col-9">
                   <select  name="guru" class="form-control" value="<?php echo"$id_guru"; ?>" id="exampleFormControlSelect1">
                      <?php 
                      $getData=mysqli_query($db,"SELECT * FROM guru order by nama_guru asc");
                         while($row = mysqli_fetch_assoc($getData)){
                            if($row['id_guru'] == $id_guru){
                                echo " <option selected class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_guru']." >".$row['nama_guru']." ( ".$row['nuptk']." )</option> ";
            
                            } else {
                                echo " <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_guru']." >".$row['nama_guru']." ( ".$row['nuptk']." )</option> ";
         
                            }
			                }
                      ?>	                          
                     </select>
                        </div>
                       </div>
                    </div>                                       
                    </div>
                   
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Kelas</p>
                    </div>
                   <div class="col-9">
                   <select  name="kelas" id="kelas" value="<?php echo"$id_kelas"; ?>"class="form-control" id="exampleFormControlSelect1">
                      <?php 
                      $getData=mysqli_query($db,"SELECT * FROM kelas WHERE id_angkatan='$id_angkatan' order by nama_kelas asc");
                         while($row = mysqli_fetch_assoc($getData)){
                            if($row['id_kelas'] == $id_kelas){
                                echo " <option selected class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_kelas']." >".$row['nama_kelas']."</option> ";
            
                            } else{
                                echo " <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_kelas']." >".$row['nama_kelas']."</option> ";
           
                            }
			              }
                      ?>	                          
                     </select>
                        </div>
                       </div>
                    </div>                                       
                    </div>
                   
                    <input type="submit" style="max-width:40%; margin-left:auto; margin-right:auto;" name="update" class="btn btn-primary btn-user btn-block" value="Update Mata Pelajaran">

                 
                  </form>
                  </div>
                </div>
              </div>
            </div>
<script>
    function cek(){
    var id=document.getElementById('angkatan').value;
    var id_kelas=document.getElementById('kelas').value;
    var id_matpel=document.getElementById('matpel').value;
    var id_admin=document.getElementById('admin').value;
// 	var data = $('#myForm').serialize();
// console.log(data);
      var urlID = "editmatpel.php?id_angkatan="+id+"&&id_kelas="+id_kelas+"&&id_matpel="+id_matpel+"&&id_admin="+id_admin;
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