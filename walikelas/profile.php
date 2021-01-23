<?php include('header.php');?>
<?php include('../koneksi.php');?>
<br>
<?php 

$getData = mysqli_query($db,"SELECT * FROM user WHERE id_user = '$id_user'");
$getDataAdmin=mysqli_fetch_assoc($getData);
$namaAdmin=$getDataAdmin['nama'];
$username=$getDataAdmin['username'];
$password=$getDataAdmin['password'];
if(isset($_POST['update']))
{   
    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $inputUser = mysqli_query($db,"UPDATE user set nama='$nama',username='$username',password='$password' WHERE id_user='$id_user'");
    // $inputSiswa = mysqli_query($db,"INSERT INTO siswa VALUE('','$nis','$angkatan','$kelas','$nis','$nama','$namaKelas','$alamat','$teleponUP','$email','$agama','$tempat','$ttl','$nis','$nisn','')");
    // Redirect to homepage to display updated user in list
    header("Location:profile.php?id=$id_guru");
} 
?>

<br>
<div class="col-xl-6 col-lg-12" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Update Admin</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                <form class="user" name="tambah_siswa" method="post" action="profile.php?id=<?php echo $id_guru ?>" enctype="multipart/form-data">
                <input type="hidden" id="admin"value="<?php echo $id_admin ?>" style="border-radius:10px;" class="form-control form-control-user" >
                
                <div class="form-group">
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Nama Lengkap </p>
                    </div>
                   <div class="col-9">
                    <input type="nama"value="<?php echo $namaAdmin?>" name="nama" style="border-radius:10px;" class="form-control form-control-user" >
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Username</p>
                    </div>
                   <div class="col-9">
                    <input type="" name="username" value="<?php echo $username?>"style="border-radius:10px;" class="form-control form-control-user">
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Password</p>
                    </div>
                   <div class="col-9">
                    <input type="password" value="<?php echo $password?>" style="border-radius:10px;" class="form-control form-control-user" name="password" >
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <input type="submit" style="max-width:40%; margin-left:auto; margin-right:auto;" name="update" class="btn btn-primary btn-user btn-block" value="Update Admin">

                 
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