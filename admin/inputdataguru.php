<?php include('header.php');?>
 <?php include('../koneksi.php');?>
 <br>
 <?php 


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
    $inputUser = mysqli_query($db,"INSERT INTO user VALUE('','$teleponUP','$id','$id','guru')");
    $getDataUser=mysqli_query($db,"SELECT id_user FROM user WHERE username='$id'&&password='$id'");
    $user=mysqli_fetch_assoc($getDataUser);
    $id_user=$user['id_user'];
    $inputSiswa = mysqli_query($db,"INSERT INTO guru VALUE('','$id_user','0','0','$nuptk','$nama','$nuptk','$alamatUP','$teleponUP','$email','$agama','$tempat','$ttl','$status','$jenis_k','')");
  
    
    // $inputSiswa = mysqli_query($db,"INSERT INTO siswa VALUE('','$nis','$angkatan','$kelas','$nis','$nama','$namaKelas','$alamat','$teleponUP','$email','$agama','$tempat','$ttl','$nis','$nisn','')");
    // Redirect to homepage to display updated user in list
    header("Location:dataguru.php?id_admin=$id_admin");
} 
?>

<br>
<div class="col-xl-6 col-lg-12" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Input Guru</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                <form class="user" name="tambah_siswa" method="post" action="inputdataguru.php?id_admin=<?php echo $id_admin ?>" enctype="multipart/form-data">
                <input type="hidden" id="admin"value="<?php echo $id_admin ?>" style="border-radius:10px;" class="form-control form-control-user" >
                    
                <div class="form-group">
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
                    <p style="margin-top:10px">NUPTK </p>
                    </div>
                   <div class="col-9">
                    <input type="number" name="nuptk" style="border-radius:10px;" class="form-control form-control-user">
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
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Status</p>
                    </div>
                   <div class="col-9">
                   <select  name="status" class="form-control" id="exampleFormControlSelect1">
                   <option value="aktif">Aktif</option>
                    <option value="tidak aktif">Tidak Aktif</option>
                                          
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <input type="submit" style="max-width:40%; margin-left:auto; margin-right:auto;" name="update" class="btn btn-primary btn-user btn-block" value="Tambah Guru">

                 
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