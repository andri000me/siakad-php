<?php include('header.php');?>
 <?php include('../koneksi.php');?>
 <br>
 <?php 
 $id_angkatan=$_GET['id_angkatan'];
 $id_kelas=$_GET['id_kelas'];
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
    $inputkelas = mysqli_query($db,"INSERT INTO pembayaran_spp VALUE('','$id_siswa','$id_angkatan','$id_kelas','$angkatan','$nis','$nama_siswa','$semester','$status','$today','$max')");

    header("Location:spp.php?id_admin=$id_admin");
} 
?>

<br>
<div class="col-xl-6 col-lg-12" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Input Pembayaran SPP</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                <form class="user" name="tambah_siswa" method="post" action="inputspp.php?id_angkatan=<?php echo "$id_angkatan&&id_kelas=$id_kelas&&id_admin=$id_admin"; ?>" enctype="multipart/form-data">
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
                   <select  onchange="cek()" name="kelas" id="kelas"class="form-control" id="exampleFormControlSelect1">
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
                   <select  name="siswa" class="form-control" id="exampleFormControlSelect1">
                      <?php 
                      $getData=mysqli_query($db,"SELECT * FROM siswa WHERE id_angkatan='$id_angkatan' && id_kelas = '$id_kelas' order by nama_siswa asc");
                         while($row = mysqli_fetch_assoc($getData)){
			echo " <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_siswa']." >".$row['nama_siswa']."</option> ";
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
                    <input type="number" name="max" style="border-radius:10px;" class="form-control form-control-user" >
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
                    <option value='lunas'>Lunas</option>
                    <option value='belom lunas'>Belom Lunas</option>                
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
    var kelas=document.getElementById('kelas').value;
    var id_admin=document.getElementById('admin').value;
// 	var data = $('#myForm').serialize();
// console.log(data);
      var urlID = "inputspp.php?id_angkatan="+id+"&&id_kelas="+kelas+"&&id_admin="+id_admin;
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