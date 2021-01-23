<?php include('header.php');?>
 <?php include('../koneksi.php');?>
 <br>
 <?php 
$id_siswa = $_GET['id_siswa'];
$id_angkatan = $_GET['id_angkatan'];
$getDataSiswa=mysqli_query($db,"SELECT * FROM siswa WHERE id_siswa ='$id_siswa'");
$dataSiswa=mysqli_fetch_assoc($getDataSiswa);
$namaSiswa=$dataSiswa['nama_siswa'];
$alamatSiswa=$dataSiswa['alamat'];
$no_hp=$dataSiswa['no_hp'];
$kelas=$dataSiswa['kelas'];
$email=$dataSiswa['email'];
$agama=$dataSiswa['agama'];
$id_kelas=$dataSiswa['id_kelas'];
$tempat_lahir=$dataSiswa['tempat_lahir'];
$tanggal_lahir=$dataSiswa['tanggal_lahir'];
$jenis_kelamin=$dataSiswa['jenis_kelamin'];
$nis=$dataSiswa['nis'];
$nisn=$dataSiswa['nisn'];

$getDataKelas=mysqli_query($db,"SELECT * FROM guru LEFT JOIN angkatan on guru.id_angkatan = angkatan.id_angkatan WHERE guru.id_angkatan ='$id_angkatan'&& guru.id_kelas='$id_kelas'");
$dataKelas=mysqli_fetch_assoc($getDataKelas);
$namaWali=$dataKelas['nama_guru'];
$tahun=$dataKelas['tahun'];
$semester=$dataKelas['semester'];
$foto=$dataSiswa['foto'];
if($foto != ''){
 $foto = $foto;
} else {
  $foto ="default.png";
}
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
    $inputSiswa = mysqli_query($db,"UPDATE siswa SET nis='$nis',nama_siswa='$nama',kelas='$namaKelas',alamat='$alamatUP',no_hp='$teleponUP',email='$email',agama='$agama',tempat_lahir='$tempat',tanggal_lahir='$ttl',jenis_kelamin='$jenis_k',nisn='$nisn',id_kelas='$kelas' WHERE id_siswa='$id_siswa'");
  

    // $inputSiswa = mysqli_query($db,"INSERT INTO siswa VALUE('','$nis','$angkatan','$kelas','$nis','$nama','$namaKelas','$alamat','$teleponUP','$email','$agama','$tempat','$ttl','$nis','$nisn','')");
    // Redirect to homepage to display updated user in list
    header("Location:index.php?id_admin=$id_admin");
} 
?>

<br>
<div class="col-xl-6 col-lg-12" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Edit Siswa</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                <form class="user" name="tambah_siswa" method="post" action="editsiswa.php?id_angkatan=<?php echo "$id_angkatan&&id_siswa=$id_siswa&&id_admin=$id_admin"; ?>" enctype="multipart/form-data">
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
                    <input type="hidden" name="siswa" id="id_siswa"style="border-radius:10px;" class="form-control form-control-user" value="<?php echo"$id_siswa"?>" >
                     
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Nama Lengkap </p>
                    </div>
                   <div class="col-9">
                    <input type="text" name="nama" style="border-radius:10px;" class="form-control form-control-user" value="<?php echo"$namaSiswa"?>" >
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
                    <input type="number" name="nis" style="border-radius:10px;"value="<?php echo"$nis"?>"  class="form-control form-control-user">
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
                    <input type="text" name="nisn"style="border-radius:10px;" value="<?php echo"$nisn"?>"class="form-control form-control-user" >
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
                   <select  name="kelas" id="id_kelas"  value="<?php echo"$id_kelas"?>" class="form-control" id="exampleFormControlSelect1">
                   <?php 
                      $getData=mysqli_query($db,"SELECT * FROM kelas WHERE id_angkatan='$id_angkatan' order by nama_kelas asc");
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
                    <input type="text"value="<?php echo"$alamatSiswa"?>" style="border-radius:10px;" class="form-control form-control-user" name="alamat" >
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
                    <input type="text"value="<?php echo"$no_hp"?>" style="border-radius:10px;" class="form-control form-control-user" name="telepon" >
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
                    <input type="email"value="<?php echo"$email"?>" style="border-radius:10px;" class="form-control form-control-user" name="email" >
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
                   <select  name="agama" value="<?php echo"$agama"?>" class="form-control" id="exampleFormControlSelect1">
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
                    <input type="text"value="<?php echo"$tempat_lahir"?>" style="border-radius:10px;" class="form-control form-control-user" name="tempatlahir" >
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
                    <input type="date" value="<?php echo $tanggal_lahir;?>" style="border-radius:10px;" class="form-control form-control-user" name="ttl" >
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
                   <select  name="jk" value="<?php echo $jenis_kelamin;?>" class="form-control" id="exampleFormControlSelect1">
                   <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                                          
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <input type="submit" style="max-width:40%; margin-left:auto; margin-right:auto;" name="update" class="btn btn-primary btn-user btn-block" value="Edit">

                 
                  </form>
                  </div>
                </div>
              </div>
            </div>
<script>
    function cek(){
    var id=document.getElementById('angkatan').value;
    var id_siswa=document.getElementById('id_siswa').value;
    var id_admin=document.getElementById('admin').value;
// 	var data = $('#myForm').serialize();
// console.log(data);
      var urlID = "editsiswa.php?id_angkatan="+id+"&&id_siswa="+id_siswa+"&&id_admin="+id_admin;
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