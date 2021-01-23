<?php include('header.php');?>
 <?php include('../koneksi.php');?>
 <br>
 <?php 
 $id=$_GET['id'];
 $id_angkatan=$_GET['id_angkatan'];
 $id_kelas=$_GET['id_kelas'];
 $Data=mysqli_query($db,"SELECT * FROM pembayaran_spp WHERE id_spp='$id'");
$getData=mysqli_fetch_assoc($Data);
$id_siswa=$getData['id_siswa'];
$semester=$getData['semester'];
$jumlah=$getData['jumlah'];
$status=$getData['status'];
if($semester==1){
    $semester="Semester Ganjil";
  } else {
    $semester="Semster Genap";
  }
if(isset($_POST['update']))
{   
    $max=$_POST['max'];
    $id_siswa=$_POST['siswa'];
    $id_angkatan=$_POST['angkatan'];
    $kelas=$_POST['kelas'];
    $status=$_POST['status'];
    $Data=mysqli_query($db,"SELECT * FROM angkatan WHERE id_angkatan='$id_angkatan'");
    $getData=mysqli_fetch_assoc($Data);
    $Datasiswa=mysqli_query($db,"SELECT * FROM siswa WHERE id_siswa='$id_siswa'");
    $getDatasiswa=mysqli_fetch_assoc($Datasiswa);
    $nis=$getDatasiswa['nis'];
    $nama_siswa=$getDatasiswa['nama_siswa'];
    $angkatan=$getData['tahun'];
    $semester=$getData['semester'];
    
   $today=date("Y-m-d");
    $update = mysqli_query($db,"UPDATE pembayaran_spp SET 
    id_siswa='$id_siswa',
    id_angkatan='$id_angkatan',
    id_kelas='$id_kelas',
    angkatan='$angkatan',
    nis='$nis',
    nama_siswa='$nama_siswa',
    semester='$semester',
    status='$status',
    tanggal_bayar='$today',
    jumlah='$max' WHERE id_spp ='$id'");
// echo $status;
    header("Location:spp.php?id_admin=$id_admin");
} 
?>

<br>
<br>
<div class="col-xl-6 col-lg-12" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Input Pembayaran SPP</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                <form class="user" name="tambah_siswa" method="post" action="edit_spp.php?id_angkatan=<?php echo "$id_angkatan&&id_kelas=$id_kelas&&id=$id&&id_admin=$id_admin"; ?>" enctype="multipart/form-data">
                <input type="hidden" id="admin"value="<?php echo $id_admin ?>" style="border-radius:10px;" class="form-control form-control-user" >
                    
                <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Angkatan</p>
                    </div>
                   <div class="col-9">
                   <input type="hidden" id="spp" value="<?php echo"$id"; ?>">
                   <!-- <input type="hidden" name="id"> -->
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
                    <p style="margin-top:10px">Kelas</p>
                    </div>
                   <div class="col-9">
                   <select  onchange="cek()" value="<?php echo"$id_kelas"; ?>"name="kelas" id="kelas"class="form-control" id="exampleFormControlSelect1">
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
                    <p style="margin-top:10px">Siswa</p>
                    </div>
                   <div class="col-9">
                   <select  name="siswa" value="<?php echo"$id_siswa"; ?>" class="form-control" id="exampleFormControlSelect1">
                      <?php 
                      $getData=mysqli_query($db,"SELECT * FROM siswa WHERE id_angkatan='$id_angkatan' && id_kelas = '$id_kelas' order by nama_siswa asc");
                         while($row = mysqli_fetch_assoc($getData)){
                            if($row['id_siswa'] == $id_siswa){
                            echo " <option selected class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_siswa']." >".$row['nama_siswa']."</option> ";
                            } else {
                                echo " <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_siswa']." >".$row['nama_siswa']."</option> ";
                           
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
                    <p style="margin-top:10px">Jumlah Pembayaran </p>
                    </div>
                   <div class="col-9">
                    <input type="number" value="<?php echo"$jumlah"; ?>"  name="max" style="border-radius:10px;" class="form-control form-control-user" >
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
                   <select  name="status" value="<?php echo"$status"; ?>"  class="form-control" id="exampleFormControlSelect1">
                    <?php 
                    if($status=="lunas"){
                        echo"<option selected value='lunas'>Lunas</option>";
                    } else {
                        echo"<option selected value='lunas'>Lunas</option>";
                    }
                    if($status=="belum lunas"){
                        echo"<option selected value='belum lunas'>Belum Lunas</option>";
                    } else {
                        echo"<option value='belum lunas'>Belum Lunas</option>";
                    }
                    ?>
                           
                     </select>
                        </div>
                       </div>
                    </div>                                       
                    </div>
                    <input type="submit" style="max-width:40%; margin-left:auto; margin-right:auto;" name="update" class="btn btn-primary btn-user btn-block" value="Tambah Pembayaran">

                  </form>
                  </div>
                </div>
              </div>
            </div>
<script>
    function cek(){
    var id=document.getElementById('angkatan').value;
    var id_spp=document.getElementById('spp').value;
    var kelas=document.getElementById('kelas').value;
    var id_admin=document.getElementById('admin').value;
// 	var data = $('#myForm').serialize();
// console.log(data);
      var urlID = "edit_spp.php?id_angkatan="+id+"&&id_kelas="+kelas+"&&id="+id_spp+"&&id_admin="+id_admin;
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