<?php include('header.php');?>
 <?php include('../koneksi.php');?>
 <br>
 <?php 
$id_kelas=$_GET['id_kelas'];
$id_angkatan=$_GET['id_angkatan'];
$getKelas=mysqli_query($db,"SELECT * FROM jadwal WHERE id_kelas='$id_kelas'");
$getNamaKelas=mysqli_fetch_assoc($getKelas);
if(isset($_POST['update']))
{   
   $hapusData3=mysqli_query($db,"DELETE FROM jadwal WHERE id_kelas=$id_kelas");

   $getKelas=mysqli_query($db,"SELECT * FROM kelas WHERE id_kelas='$id_kelas'");
   $getNamaKelas=mysqli_fetch_assoc($getKelas);
   $nama_kelas=$getNamaKelas['nama_kelas'];
   $angkatan=$getNamaKelas['id_angkatan'];

 for($i=1;$i<53;$i++){
   $jadwal=$_POST["jadwal".$i.""];
   $getMatpel=mysqli_query($db,"SELECT * FROM matpel WHERE id_matpel='$jadwal'");
   $matpel=mysqli_fetch_assoc($getMatpel);
   $namaMatpel=$matpel['nama_matpel'];
   $guru=$matpel['nama_guru'];
   $id_guru=$matpel['id_guru'];
   $jam=$_POST["jam".$i.""];
   $hari;
   if($i>=1 && $i<=9){
      $hari="senin";

   }else if($i>=10 && $i<=21){
      $hari="selasa";
   }
   else if($i>=22 && $i<=33){
      $hari="rabu";
   }
   else if($i>=34 && $i<=45){
      $hari="kamis";
   } else{
      $hari="jumat";
   }  
   $inputSiswa = mysqli_query($db,"INSERT INTO jadwal VALUE('','$angkatan','$hari','$namaMatpel','$jam','$guru','$nama_kelas','$id_kelas','$id_guru','$jadwal')");
}
    // Redirect to homepage to display updated user in list
    header("Location:datajadwal.php?id_admin=$id_admin");
} 
?>

<br>
<div class="col-xl-6 col-lg-12" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Edit Jadwal</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                <form class="user" name="tambah_siswa" method="post" action="editjadwal.php?id_angkatan=<?php echo "$id_angkatan&&id_kelas=$id_kelas&&id_admin=$id_admin"; ?>" enctype="multipart/form-data">
                <input type="hidden" id="admin"value="<?php echo $id_admin ?>" style="border-radius:10px;" class="form-control form-control-user" >
                    
                <input type="hidden" name="jam1" value="07.00 - 07.40">
                <input type="hidden" name="jam2" value="07.40 - 08.20">
                <input type="hidden" name="jam3" value="08.20 - 09.00">
                <input type="hidden" name="jam4" value="09.20 - 10.00">
                <input type="hidden" name="jam5" value="10.00 - 10.40">
                <input type="hidden" name="jam6" value="10.40 - 11.20">
                <input type="hidden" name="jam7" value="11.20 - 12.00">
                <input type="hidden" name="jam8" value="12.20 - 13.00">
                <input type="hidden" name="jam9" value="13.00 - 13.40">
           
                <input type="hidden" name="jam10" value="06.30 - 07.00">
                <input type="hidden" name="jam11" value="07.00 - 07.40">
                <input type="hidden" name="jam12" value="07.40 - 08.20">
                <input type="hidden" name="jam13" value="08.20 - 08.55">
                <input type="hidden" name="jam14" value="09.10 - 09.50">
                <input type="hidden" name="jam15" value="09.50 - 10.25">
                <input type="hidden" name="jam16" value="10.25 - 11.00">
                <input type="hidden" name="jam17" value="11.00 - 11.40">
                <input type="hidden" name="jam18" value="12.10 - 12.40">
                <input type="hidden" name="jam19" value="12.40 - 13.15">
                <input type="hidden" name="jam20" value="13.15 - 13.45">
                <input type="hidden" name="jam21" value="13.45 - 14.20">

                <input type="hidden" name="jam22" value="06.30 - 07.00">
                <input type="hidden" name="jam23" value="07.00 - 07.40">
                <input type="hidden" name="jam24" value="07.40 - 08.20">
                <input type="hidden" name="jam25" value="08.20 - 08.55">
                <input type="hidden" name="jam26" value="09.10 - 09.50">
                <input type="hidden" name="jam27" value="09.50 - 10.25">
                <input type="hidden" name="jam28" value="10.25 - 11.00">
                <input type="hidden" name="jam29" value="11.00 - 11.40">
                <input type="hidden" name="jam30" value="12.10 - 12.40">
                <input type="hidden" name="jam31" value="12.40 - 13.15">
                <input type="hidden" name="jam32" value="13.15 - 13.45">
                <input type="hidden" name="jam33" value="13.45 - 14.20">

                <input type="hidden" name="jam34" value="06.30 - 07.00">
                <input type="hidden" name="jam35" value="07.00 - 07.40">
                <input type="hidden" name="jam36" value="07.40 - 08.20">
                <input type="hidden" name="jam37" value="08.20 - 08.55">
                <input type="hidden" name="jam38" value="09.10 - 09.50">
                <input type="hidden" name="jam39" value="09.50 - 10.25">
                <input type="hidden" name="jam40" value="10.25 - 11.00">
                <input type="hidden" name="jam41" value="11.00 - 11.40">
                <input type="hidden" name="jam42" value="12.10 - 12.40">
                <input type="hidden" name="jam43" value="12.40 - 13.15">
                <input type="hidden" name="jam44" value="13.15 - 13.45">
                <input type="hidden" name="jam45" value="13.45 - 14.20">
              

                <input type="hidden" name="jam46" value="06.30 - 07.10">
                <input type="hidden" name="jam47" value="07.10 - 07.50">
                <input type="hidden" name="jam48" value="07.50 - 08.25">
                <input type="hidden" name="jam49" value="08.25 - 09.00">
                <input type="hidden" name="jam50" value="09.20 - 10.00">
                <input type="hidden" name="jam51" value="10.00 - 10.40">
                <input type="hidden" name="jam52" value="10.40 - 11.15">
                <input type="hidden" name="jam53" value="11.15 - 11.50">
                 
                <div class="form-group">
                    <div class="container">
                    <div class="row" style="border-left:solid 3px blue; padding-left:5px;"> 
                    <h5 styl="padding:5px; color:black; ">Senin :</h5>
                    </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">07.00 - 07.40</p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal1" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	  
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>     
                     </select>
                        </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">07.40 - 08.20 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal2" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	     
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                     
                      
                      </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">08.20 - 09.00 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal3" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	    
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                      
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">09.20 - 10.00 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal4" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	 
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                         
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">10.00 - 10.40 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal5" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	    
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                      
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">10.40 - 11.20 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal6" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	     
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                     
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">11.20 - 12.00 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal7" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	      
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                    
                     </select>
                      </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">12.20 - 13.00 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal8" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	     
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                     
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">13.00 - 13.40 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal9" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	          
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>


                    <div class="form-group">
                    <div class="container">
                    <div class="row" style="border-left:solid 3px blue; padding-left:5px;"> 
                    <h5 styl="padding:5px; color:black; ">Selasa :</h5>
                    </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">06.30 - 07.00</p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal10" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                    	                          
                     </select>
                        </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">07.00 - 07.40</p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal11" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	   
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                           
                     </select>
                        </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">07.40 - 08.20 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal12" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	         
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                     
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">08.20 - 08.55 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal13" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	    
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                          
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">09.10 - 09.50 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal14" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	     
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                         
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">09.50 - 10.25 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal15" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	      
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                        
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">10.25 - 11.00 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal16" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	   
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                           
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">11.00 - 11.40 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal17" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	   
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                           
                     </select>
                      </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">12.10 - 12.40 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal18" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	       
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                       
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">12.40 - 13.15 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal19" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	     
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                         
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">13.15 - 13.45 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal20" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	     
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                         
                     </select>
                     
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">13.45 - 14.20 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal21" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	     
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                         
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>

                    <div class="form-group">
                    <div class="container">
                    <div class="row" style="border-left:solid 3px blue; padding-left:5px;"> 
                    <h5 styl="padding:5px; color:black; ">Rabu :</h5>
                    </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">06.30 - 07.00</p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal22" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                    	                          
                     </select>
                        </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">07.00 - 07.40</p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal23" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	   
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                           
                     </select>
                        </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">07.40 - 08.20 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal24" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	         
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                     
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">08.20 - 08.55 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal25" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	    
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                          
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">09.10 - 09.50 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal26" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	     
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                         
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">09.50 - 10.25 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal27" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	      
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                        
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">10.25 - 11.00 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal28" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	   
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                           
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">11.00 - 11.40 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal29" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	   
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                           
                     </select>
                      </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">12.10 - 12.40 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal30" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	       
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                       
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">12.40 - 13.15 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal31" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	     
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                         
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">13.15 - 13.45 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal32" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	     
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                         
                     </select>
                     
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">13.45 - 14.20 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal33" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	     
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                         
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>


                    <div class="form-group">
                    <div class="container">
                    <div class="row" style="border-left:solid 3px blue; padding-left:5px;"> 
                    <h5 styl="padding:5px; color:black; ">Kamis :</h5>
                    </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">06.30 - 07.00</p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal34" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                    	                          
                     </select>
                        </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">07.00 - 07.40</p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal35" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	   
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                           
                     </select>
                        </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">07.40 - 08.20 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal36" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	         
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                     
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">08.20 - 08.55 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal37" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	    
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                          
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">09.10 - 09.50 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal38" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	     
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                         
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">09.50 - 10.25 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal39" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	      
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                        
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">10.25 - 11.00 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal40" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	   
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                           
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">11.00 - 11.40 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal41" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	   
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                           
                     </select>
                      </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">12.10 - 12.40 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal42" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	       
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                       
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">12.40 - 13.15 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal43" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	     
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                         
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">13.15 - 13.45 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal44" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	     
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                         
                     </select>
                     
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">13.45 - 14.20 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal45" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	     
                      <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                         
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>


                    <div class="form-group">
                    <div class="container">
                    <div class="row" style="border-left:solid 3px blue; padding-left:5px;"> 
                    <h5 styl="padding:5px; color:black; ">Jumat :</h5>
                    </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">06.30 - 07.10</p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal46" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	 
                       <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                               
                     </select>
                        </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">07.10 - 07.50 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal47" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	
                       <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                                
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">07.50 - 08.25 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal48" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	      
                       <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                          
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">08.25 - 09.00 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal49" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	           
                       <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                     
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">09.20 - 10.00 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal50" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	       
                       <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                         
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">10.00 - 10.40 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal51" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	     
                       <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                           
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">10.40 - 11.15 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal52" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	    
                       <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                            
                     </select>
                      </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">11.15 - 11.50 </p>
                    </div>
                   <div class="col-9">
                   <select id="jadwal" name="jadwal53" value="<?php echo"$id_angkatan"; ?>" class="form-control" id="exampleFormControlSelect1">
                    <?php 
                      $getDataAngkatan=mysqli_query($db,"SELECT * FROM matpel WHERE id_angkatan='$id_angkatan' && id_kelas='$id_kelas' ");
                         while($row = mysqli_fetch_assoc($getDataAngkatan)){
                                echo "<option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_matpel']." selected>".$row['nama_matpel']."</option> ";
                         }
                      ?>	  
                       <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value="kosong" > Kosong </option>                
                                               
                     </select>
                            </div>
                       </div>
                    </div>                                       
                    </div>
                   

                    <input type="submit" style="max-width:40%; margin-left:auto; margin-right:auto;" name="update" class="btn btn-primary btn-user btn-block" value="Buat Jadwal">

                 
                  </form>
                  </div>
                </div>
              </div>
            </div>
<script>
    function cek(){
    var id=document.getElementById('angkatan').value;
    var id_kelas=document.getElementById('kelas').value;
    var id_admin=document.getElementById('admin').value;
    console.log(id_kelas);
// 	var data = $('#myForm').serialize();
// console.log(data);
      var urlID = "inputjadwal.php?id_angkatan="+id+"&&id_kelas="+id_kelas+"&&id_admin="+id_admin;
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