<?php include('header.php');?>
 <?php include('../koneksi.php');?>
 <?php 
 $id_angkatan=$_GET['id_angkatan'];

if(isset($_POST['update']))
{   
   
    $max=$_POST['max'];
    $id_guru=$_POST['guru'];
    $angkatan=$_POST['angkatan'];
    $kelas=$_POST['kelas'];
    $Data=mysqli_query($db,"SELECT * FROM angkatan WHERE id_angkatan='$id_angkatan'");
    $getData=mysqli_fetch_assoc($Data);
    $angkatan=$getData['tahun'];
    $semester=$getData['semester'];

    $cekData=mysqli_query($db,"SELECT COUNT(*) as total FROM kelas WHERE id_angkatan = '$id_angkatan' && nama_kelas = '$kelas'");
    $jmlh=mysqli_fetch_assoc($cekData);
    if($jmlh['total']>0){
      header("Location:inputkelas.php?pesan=gagal&&id_admin=$id_admin&&id_angkatan=$id_angkatan");
    } else {
      $inputkelas = mysqli_query($db,"INSERT INTO kelas VALUE('$kelas','0','$angkatan','$semester','','$id_angkatan','$id_guru','$max')");
      $getDataKelas=mysqli_query($db,"SELECT * FROM kelas WHERE id_guru='$id_guru'");
      $DataKelas= mysqli_fetch_assoc($getDataKelas);
      $id_kelas=$DataKelas['id_kelas'];
      echo $max;
      $inputguru = mysqli_query($db,"UPDATE guru SET id_kelas='$id_kelas' ,id_angkatan='$id_angkatan' WHERE id_guru='$id_guru'");
      header("Location:datakelas.php?id_admin=$id_admin");
     
    }
    
  //  echo "$id_kelas";
    
    // $inputSiswa = mysqli_query($db,"INSERT INTO siswa VALUE('','$nis','$angkatan','$kelas','$nis','$nama','$namaKelas','$alamat','$teleponUP','$email','$agama','$tempat','$ttl','$nis','$nisn','')");
    // Redirect to homepage to display updated user in list
    // echo "$nama";
    
} 
?>
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<center ><div style='background-color:red; color:white; height:30px;width:100%;'> <p> Kelas sudah memiliki wali kelas </p> </div> </center >";
		}
	}
	?>
<br>
<div class="col-xl-6 col-lg-12" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Form Input Kelas</h6>  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                <form class="user" name="tambah_siswa" method="post" action="inputkelas.php?id_angkatan=<?php echo "$id_angkatan&&id_admin=$id_admin"; ?>" enctype="multipart/form-data">
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
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM angkatan Order by tahun asc ");
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
                    <p style="margin-top:10px">Nama Kelas </p>
                    </div>
                   <div class="col-9">
                   <select name="kelas" class="form-control" id="exampleFormControlSelect1">
                   <option value="X AP-1">X AP-1</option>
                    <option value="X AP-2">X AP-2</option>
                    <option value="XI AP-1">XI AP-1</option>
                    <option value="XI AP-2">XI AP-2</option>
                    <option value="XII AP-1">XII AP-1</option>
                    <option value="XII AP-2">XII AP-2</option>                       
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Wali Kelas</p>
                    </div>
                   <div class="col-9">
                   <select  name="guru" class="form-control" id="exampleFormControlSelect1">
                      <?php 
                      $getData=mysqli_query($db,"SELECT * FROM guru WHERE id_kelas ='0' && id_angkatan='0' Order by nama_guru asc");
                         while($row = mysqli_fetch_assoc($getData)){
			echo " <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_guru']." >".$row['nama_guru']." (".$row['nuptk'].")</option> ";
                         }
                      ?>	                          
                     </select>
                        </div>
                       </div>
                    </div>                                       
                    </div>
                    <!-- <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Maksimum Siswa </p>
                    </div>
                   <div class="col-9"> -->
                    <input value="40"type="hidden" name="max" style="border-radius:10px;" class="form-control form-control-user" >
                            <!-- </div>
                       </div>
                    </div>                                       
                    </div>
                    -->
                    <input type="submit" style="max-width:40%; margin-left:auto; margin-right:auto;" name="update" class="btn btn-primary btn-user btn-block" value="Tambah Kelas">

                 
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
      var urlID = "inputkelas.php?id_angkatan="+id+"&&id_admin="+id_admin;
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