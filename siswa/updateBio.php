<?php include('header.php');?>
<?php include('../koneksi.php');?>
<?php 
if(isset($_POST['update']))
{   
    $alamatUP=$_POST['alamat'];
    $teleponUP=$_POST['telepon'];
    $emailUP=$_POST['email'];
    $image = $_FILES['foto']['name'];
    $imageSize = $_FILES['foto']['name'];
    $imagePath = "../img/fotosiswa/".$image;
    // echo "$image";
	move_uploaded_file($_FILES['foto']['tmp_name'],$imagePath);
     // update user data
     if($_FILES['foto']['size'] > 0){
        $image =$image;
     } else {

$image = $foto;
             }
    $result = mysqli_query($db,"UPDATE siswa SET alamat = '$alamatUP',foto='$image',email='$emailUP',no_hp='$teleponUP' WHERE id_siswa=$id_siswa");
    // Redirect to homepage to display updated user in list
    header("Location:index.php?id=$id_siswa");
}
?>

<br>
<div class="col-xl-6 col-lg-12" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                <form class="user" name="update_siswa" method="post" action="updateBio.php?id=<?php echo "$id_siswa"; ?>" enctype="multipart/form-data">
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Nama Lengkap </p>
                    </div>
                   <div class="col-9">
                    <input readonly type="Name" style="border-radius:10px;" class="form-control form-control-user" value="<?php echo"$namaSiswa";?>">
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
                    <input readonly type="Name" style="border-radius:10px;" class="form-control form-control-user" value="<?php echo"$nis";?>">
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
                    <input readonly type="Name" style="border-radius:10px;" class="form-control form-control-user" value="<?php echo"$nisn";?>">
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Foto </p>
                    </div>
                   <div class="col-9">
                    <input name="foto" type="file">
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
                    <input type="Text" style="border-radius:10px;" class="form-control form-control-user" name="alamat" value="<?php echo"$alamatSiswa";?>">
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
                    <input type="Text" style="border-radius:10px;" class="form-control form-control-user" name="telepon" value="<?php echo"$no_hp";?>">
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
                    <input type="email" style="border-radius:10px;" class="form-control form-control-user" name="email" value="<?php echo"$email";?>">
                            </div>
                       </div>
                    </div>                                       
                    </div>
                  
                    <input type="submit" style="max-width:40%; margin-left:auto; margin-right:auto;" name="update" class="btn btn-primary btn-user btn-block" value="Update">

                 
                  </form>
                  </div>
                </div>
              </div>
            </div>
