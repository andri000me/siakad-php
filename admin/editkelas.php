<?php include('header.php');?>
 <?php include('../koneksi.php');?>
 <br>
 <?php 
 $id_angkatan=$_GET['id_angkatan'];
 $id_kelas=$_GET['id_kelas'];
 $Data=mysqli_query($db,"SELECT * FROM kelas LEFT JOIN guru on kelas.id_kelas=guru.id_kelas WHERE kelas.id_kelas='$id_kelas'");
$getData=mysqli_fetch_assoc($Data);
$nama_kelas=$getData['nama_kelas'];
$nama_guru=$getData['id_guru'];
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

    $inputkelas = mysqli_query($db,"UPDATE kelas SET 
    nama_kelas='$kelas',
    angkatan='$angkatan',
    semester='$semester',
    id_angkatan='$id_angkatan',
    id_guru='$id_guru'");
    $getDataKelas=mysqli_query($db,"SELECT * FROM kelas WHERE id_guru='$id_guru'");
    $DataKelas= mysqli_fetch_assoc($getDataKelas);
    $id_kelas=$DataKelas['id_kelas'];
   echo "$id_kelas";
    $inputguru = mysqli_query($db,"UPDATE guru SET id_kelas='$id_kelas' WHERE id_guru='$id_guru'");
    // $inputSiswa = mysqli_query($db,"INSERT INTO siswa VALUE('','$nis','$angkatan','$kelas','$nis','$nama','$namaKelas','$alamat','$teleponUP','$email','$agama','$tempat','$ttl','$nis','$nisn','')");
    // Redirect to homepage to display updated user in list
    // echo "$nama";
    header("Location:datakelas.php?id_admin=$id_admin");
} 
?>

<br>
<div class="col-xl-6 col-lg-12" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Edit Kelas</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                <form class="user" name="tambah_siswa" method="post" action="editkelas.php?id_angkatan=<?php echo "$id_angkatan&&id_kelas=$id_kelas&&id_admin=$id_admin"; ?>" enctype="multipart/form-data">
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
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM angkatan ");
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
                   <select value="<?php echo $nama_kelas?>"name="kelas" class="form-control" id="exampleFormControlSelect1">
                   <?php 
                   if($nama_kelas=="X AP-1"){
                    echo "<option value='X AP-1' selected>X AP-1</option>";
                   } else {
                       echo"<option value='X AP-1' >X AP-1</option>";
                   }
                   if($nama_kelas=="X AP-2"){
                    echo "<option value='X AP-2' selected>X AP-2</option>";
                   } else {
                       echo"<option value='X AP-2' >X AP-2</option>";
                   }
                   if($nama_kelas=="XI AP-1"){
                    echo "<option value='XI AP-1' selected>XI AP-1</option>";
                   } else {
                       echo"<option value='XI AP-1' >XI AP-1</option>";
                   }
                   if($nama_kelas=="XI AP-2"){
                    echo "<option value='XI AP-2' selected>XI AP-2</option>";
                   } else {
                       echo"<option value='XI AP-2' >XI AP-2</option>";
                   }
                   if($nama_kelas=="XII AP-1"){
                    echo "<option value='XII AP-1' selected>XII AP-1</option>";
                   } else {
                       echo"<option value='XII AP-1' >XII AP-1</option>";
                   }
                   if($nama_kelas=="XII AP-2"){
                    echo "<option value='XII AP-2' selected>XII AP-2</option>";
                   } else {
                       echo"<option value='XII AP-2' >XII AP-2</option>";
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
                    <p style="margin-top:10px">Wali Kelas</p>
                    </div>
                   <div class="col-9">
                   <select  value="<?php echo $nama_guru?>" name="guru" class="form-control" id="exampleFormControlSelect1">
                      <?php 
                      $getData=mysqli_query($db,"SELECT * FROM guru ");
                         while($row = mysqli_fetch_assoc($getData)){
                 if( $row['id_guru'] == $nama_guru){
                    echo " <option selected  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_guru']." >".$row['nama_guru']." (".$row['nuptk'].")</option> ";
                        
                 } else {
                    echo " <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_guru']." >".$row['nama_guru']." (".$row['nuptk'].")</option> ";
                       
                 }
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
                    <input type="hidden" value="40"name="max" style="border-radius:10px;" class="form-control form-control-user" >
                            <!-- </div>
                       </div>
                    </div>                                       
                    </div> -->
                   
                    <input type="submit" style="max-width:40%; margin-left:auto; margin-right:auto;" name="update" class="btn btn-primary btn-user btn-block" value="Update Kelas">

                 
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