<?php include('header.php');?>
 <?php include('../koneksi.php');?>
 <br>
 <?php 

$id_guru = $_GET['id_guru'];
$getDataGuru=mysqli_query($db,"SELECT * FROM guru WHERE id_guru ='$id_guru'");
$dataGuru=mysqli_fetch_assoc($getDataGuru);
$namaGuru=$dataGuru['nama_guru'];
$alamat=$dataGuru['alamat'];
$no_hp=$dataGuru['no_hp'];
$id_kelas=$dataGuru['id_kelas'];
$email=$dataGuru['email'];
$agama=$dataGuru['agama'];
$tempat_lahir=$dataGuru['tempat_lahir'];
$tanggal_lahir=$dataGuru['tanggal_lahir'];
$jenis_kelamin=$dataGuru['jenis_kelamin'];
$nuptk=$dataGuru['nuptk'];
$status=$dataGuru['status'];
$id_angkatan=$dataGuru['id_angkatan'];
$getDataKelas=mysqli_query($db,"SELECT * FROM guru WHERE id_angkatan ='$id_angkatan'");
$dataKelas=mysqli_fetch_assoc($getDataKelas);
$namaWali=$dataKelas['nama_guru'];
$foto=$dataGuru['foto'];
if($foto != ''){
 $foto = $foto;
} else {
  $foto ="default.png";
}
if(isset($_POST['update']))
{   
   
    $nama=$_POST['nama'];
    $nuptk=$_POST['nuptk'];
    $status=$_POST['status'];
    // echo $status;
    // $nisn=$_POST['nisn'];
    $email=$_POST['email'];
    // $angkatan=$_POST['angkatan'];
    // $kelas=$_POST['kelas'];
    $jenis_k=$_POST['jk'];
    $tempat=$_POST['tempatlahir'];
    $ttl=$_POST['ttl'];
    $alamatUP=$_POST['alamat'];
    $teleponUP=$_POST['telepon'];
    $id=str_replace("-","","$teleponUP");
    // echo $id;
    $agama=$_POST['agama'];
    $inputSiswa = mysqli_query($db,"UPDATE guru SET nuptk='$nuptk', nama_guru='$nama',alamat='$alamatUP', no_hp='$teleponUP', email='$email', agama='$agama', tempat_lahir='$tempat', tanggal_lahir='$ttl', status='$status', jenis_kelamin='$jenis_k' WHERE id_guru='$id_guru'");
  
    echo"$inputSiswa";
    // $inputSiswa = mysqli_query($db,"INSERT INTO siswa VALUE('','$nis','$angkatan','$kelas','$nis','$nama','$namaKelas','$alamat','$teleponUP','$email','$agama','$tempat','$ttl','$nis','$nisn','')");
    // Redirect to homepage to display updated user in list
    header("Location:dataguru.php?id_admin=$id_admin");
} 
?>

<br>
<div class="col-xl-6 col-lg-12" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Edit Guru</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                <form class="user" name="tambah_siswa" method="post" action='editguru.php?id_guru=<?php echo"$id_guru&&id_admin=$id_admin"; ?>' enctype="multipart/form-data">
                <input type="hidden" id="admin"value="<?php echo $id_admin ?>" style="border-radius:10px;" class="form-control form-control-user" >
                    
                <div class="form-group">
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Nama Lengkap </p>
                    </div>
                   <div class="col-9">
                    <input type="text" name="nama" value="<?php echo"$namaGuru"; ?>" style="border-radius:10px;" class="form-control form-control-user" >
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">NUPTK </p>
                    </div>
                   <div class="col-9">
                    <input type="number" name="nuptk" value="<?php echo"$nuptk"; ?>"style="border-radius:10px;" class="form-control form-control-user">
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
                    <input type="text" style="border-radius:10px;" value="<?php echo"$alamat"; ?>"class="form-control form-control-user" name="alamat" >
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
                    <input type="text" style="border-radius:10px;" value="<?php echo"$no_hp"; ?>"class="form-control form-control-user" name="telepon" >
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
                    <input type="email" style="border-radius:10px;" value="<?php echo"$email"; ?>"class="form-control form-control-user" name="email" >
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
                   <select  name="agama" class="form-control" value="<?php echo"$agama"; ?>"id="exampleFormControlSelect1">
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
                    <input type="text" style="border-radius:10px;" value="<?php echo"$tempat_lahir"; ?>" class="form-control form-control-user" name="tempatlahir" >
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
                    <input type="date" style="border-radius:10px;"value="<?php echo"$tanggal_lahir"; ?>" class="form-control form-control-user" name="ttl" >
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
                   <select  name="jk"value="<?php echo"$jenis_kelamin"; ?>" class="form-control" id="exampleFormControlSelect1">
                   <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                                          
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Status</p>
                    </div>
                   <div class="col-9">
                   <select  name="status" value="<?php echo"$status"; ?>"class="form-control" id="exampleFormControlSelect1">
                   <option value="aktif">Aktif</option>
                    <option value="tidak aktif">Tidak Aktif</option>
                                          
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <input type="submit" style="max-width:40%; margin-left:auto; margin-right:auto;" name="update" class="btn btn-primary btn-user btn-block" value="Edit Guru">

                 
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