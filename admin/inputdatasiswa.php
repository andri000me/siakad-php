 <?php include('header.php');?>
 <?php include('../koneksi.php');?>
 <br>
 <?php 
 $id_angkatan=$_GET['id_angkatan'];

if(isset($_POST['update']))
{   
   
    $nama=$_POST['nama'];
    $nis=$_POST['nis'];
    $nisn=$_POST['nisn'];
    $email=$_POST['email'];
    $angkatan=$_POST['angkatan'];
    $kelas=$_POST['kelas'];
    $jenis_k=$_POST['jk'];
    $tempat=$_POST['tempatlahir'];
    $ttl=$_POST['ttl'];
    $alamatUP=$_POST['alamat'];
    $teleponUP=$_POST['telepon'];
    $agama=$_POST['agama'];
    $getKelas=mysqli_query($db,"SELECT * FROM kelas WHERE id_kelas='$kelas'");
    $getNamaKelas=mysqli_fetch_assoc($getKelas);
    $namaKelas=$getNamaKelas['nama_kelas'];
    $inputUser = mysqli_query($db,"INSERT INTO user VALUE('','$nis','$nisn','$nisn','siswa')");
    $getDataUser=mysqli_query($db,"SELECT id_user FROM user WHERE username='$nisn'&&password='$nisn'");
    $user=mysqli_fetch_assoc($getDataUser);
    $id_user=$user['id_user'];
    $inputSiswa = mysqli_query($db,"INSERT INTO siswa VALUE('','$id_user','$angkatan','$kelas','$nis','$nama','$namaKelas','$alamatUP','$teleponUP','$email','$agama','$tempat','$ttl','$jenis_k','$nis','$nisn','')");
  
    
    // $inputSiswa = mysqli_query($db,"INSERT INTO siswa VALUE('','$nis','$angkatan','$kelas','$nis','$nama','$namaKelas','$alamat','$teleponUP','$email','$agama','$tempat','$ttl','$nis','$nisn','')");
    // Redirect to homepage to display updated user in list
    header("Location:index.php?id_admin=$id_admin");
} 
?>

<br>
<div class="col-xl-6 col-lg-12" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Input Siswa</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                <form class="user" name="tambah_siswa" method="post" action="inputdatasiswa.php?id_angkatan=<?php echo "$id_angkatan&&id_admin=$id_admin"; ?>" enctype="multipart/form-data">
                <input type="hidden" id="admin"value="<?php echo $id_admin ?>" style="border-radius:10px;" class="form-control form-control-user" >
                     
                <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Angkatan</p>
                    </div>
                   <div class="col-9">
                   
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
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Nama Lengkap </p>
                    </div>
                   <div class="col-9">
                    <input type="text" name="nama" style="border-radius:10px;" class="form-control form-control-user" >
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">NIS </p>
                    </div>
                   <div class="col-9">
                    <input type="number" name="nis" style="border-radius:10px;" class="form-control form-control-user">
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">NISN </p>
                    </div>
                   <div class="col-9">
                    <input type="text" name="nisn"style="border-radius:10px;" class="form-control form-control-user" >
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
                   <select  name="kelas" class="form-control" id="exampleFormControlSelect1">
                      <?php 
                      $getData=mysqli_query($db,"SELECT * FROM kelas WHERE id_angkatan='$id_angkatan' ");
                         while($row = mysqli_fetch_assoc($getData)){
                           $aktif=false;
                           if($row['id_kelas'] == $id_kelas){
                             echo " <option class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_kelas']."  selected>".$row['nama_kelas']."</option> ";
                           } else {
                             echo " <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_kelas']." >".$row['nama_kelas']."</option> ";
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
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Alamat </p>
                    </div>
                   <div class="col-9">
                    <input type="text" style="border-radius:10px;" class="form-control form-control-user" name="alamat" >
                            </div>
                       </div>
                    </div>                                       
                    </div>

                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">No telepon </p>
                    </div>
                   <div class="col-9">
                    <input type="text" style="border-radius:10px;" class="form-control form-control-user" name="telepon" >
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Email </p>
                    </div>
                   <div class="col-9">
                    <input type="email" style="border-radius:10px;" class="form-control form-control-user" name="email" >
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Agama</p>
                    </div>
                   <div class="col-9">
                   <select  name="agama" class="form-control" id="exampleFormControlSelect1">
                   <option value="islam">Islam</option>
                    <option value="kristen">Kristen</option>
                    <option value="katholik">Katholik</option>
                    <option value="budha">Budha</option>
                    <option value="hindu">Hindu</option>                         
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Tempat Lahir </p>
                    </div>
                   <div class="col-9">
                    <input type="text" style="border-radius:10px;" class="form-control form-control-user" name="tempatlahir" >
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Tanggal Lahir </p>
                    </div>
                   <div class="col-9">
                    <input type="date" style="border-radius:10px;" class="form-control form-control-user" name="ttl" >
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Jenis Kelamin</p>
                    </div>
                   <div class="col-9">
                   <select  name="jk" class="form-control" id="exampleFormControlSelect1">
                   <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                                          
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <input type="submit" style="max-width:40%; margin-left:auto; margin-right:auto;" name="update" class="btn btn-primary btn-user btn-block" value="Tambah Siswa">

                 
                  </form>
                  </div>
                </div>
              </div>
            </div>
<script>
    function cek(){
    var id=document.getElementById('angkatan').value;
    var id_admin=document.getElementById('admin').value;
// 	var data = $('#myForm').serialize();
// console.log(data);
      var urlID = "inputdatasiswa.php?id_angkatan="+id+"&&id_admin="+id_admin;
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