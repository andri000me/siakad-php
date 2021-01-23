<?php 
session_start();
include 'koneksi.php';
$id_guru=$_GET['id'];
if(isset($_POST['login'])){
    
$status=$_POST['status'];
if($status =="guru"){
    header("location:guru/index.php?id=$id_guru");
} else {
    header("location:walikelas/index.php?id=$id_guru");
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Guru</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="desainlogin.css">
</head>
<body>
 <form action="cek_guru.php?id=<?php echo $id_guru?>" method="post">
 <div class="container text-center">
      <div class="row justify-content-center mt-5">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header bg-transparent mb-0"><h5 class="text-center">Pilih Masuk</div>
            <div class="card-body">
              <form action="">
           
               <select name="status" class="form-control" style="border-color: gainsboro; border-radius: 5px; margin-top:20px" onchange="cek()" id="hari" name="hari" value="<?php echo"$id_angkatan"; ?>" >
                    <option  value="guru" class='btn btn-danger dropdown-toggle' style='padding:5px;background:white;color:black; border-color: gainsboro; border-radius: 5px; ' value=".$row['hari']." selected>Guru </option> ";
                     <option  value="wali_kelas" class='btn btn-danger dropdown-toggle' style='padding:5px;background:white;color:black; border-color: gainsboro; border-radius: 5px; ' value=".$row['hari']." >Wali Kelas</option> ";
                                                   
                     </select>
          

                <div class="form-group" style="margin-top:50px">
                  <input type="submit" name="login" value="Login" class="btn btn-primary btn-block">
                </div>
              </form>
			  <a href="index.php">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</form>
 
</body>
</html>