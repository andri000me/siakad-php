<?php include('header.php');?>
<?php include('../koneksi.php');?>
<br>
<?php 
// $id_matpel = $_GET['id_matpel'];
$id_kelas = $_GET['id_kelas'];
$id_angkatan = $_GET['id_angkatan'];
$id_siswa = $_GET['id_siswa'];
// $nama_matpel = $_GET['nama_matpel'];
$getData=mysqli_query($db,"SELECT * FROM siswa WHERE id_kelas ='$id_kelas' && id_angkatan='$id_angkatan' && id_siswa='$id_siswa'");
$Data=mysqli_fetch_assoc($getData);
$nama=$Data['nama_siswa'];
if(isset($_POST['update'])){
 $absen=$_POST['absen'];
 $sakit=$_POST['sakit'];
 $izin=$_POST['izin'];
 $cek=mysqli_query($db,"SELECT COUNT(*) as total FROM absen WHERE id_kelas ='$id_kelas' && id_angkatan='$id_angkatan' && id_siswa='$id_siswa'");
$cekData=mysqli_fetch_assoc($cek);
  $jumlah=$cekData['total'];
  if($jumlah>0){
    $inputData=mysqli_query($db,"UPDATE absen SET absen='$absen' , sakit ='$sakit' , izin='$izin' WHERE id_kelas='$id_kelas' && id_angkatan='$id_angkatan' && id_siswa='$id_siswa' ");
    header("Location:detailNilai.php?id_kelas=$id_kelas&&id_angkatan=$id_angkatan&&id=$id_guru&&id_siswa=$id_siswa");
  } else {
    $insertdata=mysqli_query($db,"INSERT INTO absen VALUE('$id_siswa','','$id_kelas','$id_angkatan','$id_guru','$sakit','$izin','$absen')");
    header("Location:detailNilai.php?id_kelas=$id_kelas&&id_angkatan=$id_angkatan&&id=$id_guru&&id_siswa=$id_siswa");
  }
  
 
}
?>
<div class="col-xl-6 col-lg-12" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Input Ketidahadiran <span style="color:black;">  <?php echo "$nama"; ?></span></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                <form class="user" name="tambah_siswa" method="post" action="inputabsen.php?id_siswa=<?php echo "$id_siswa&&id_kelas=$id_kelas&&id_angkatan=$id_angkatan&&id=$id_guru"?>" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Sakit</p>
                    </div>
                   <div class="col-9">
                   <input type="number" name="sakit" class="form-control">
                        
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Izin</p>
                    </div>
                   <div class="col-9">
                   <input type="number" name="izin" class="form-control">
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Tanpa Keterangan </p>
                    </div>
                   <div class="col-9">
                   <input type="number" name="absen" class="form-control">
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
<script>
    function cek(){
    var id=document.getElementById('angkatan').value;
// 	var data = $('#myForm').serialize();
// console.log(data);
      var urlID = "inputmatapelajaran.php?id_angkatan="+id;
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