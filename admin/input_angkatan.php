<?php include('header.php');?>
 <?php include('../koneksi.php');?>
 <br>
 <?php 
if(isset($_POST['update']))
{   
   
    $tahun=$_POST['tahun'];
    $semester=$_POST['semester'];
    $inputkelas = mysqli_query($db,"INSERT INTO angkatan VALUE('','$tahun','$semester')");

    // $inputSiswa = mysqli_query($db,"INSERT INTO siswa VALUE('','$nis','$angkatan','$kelas','$nis','$nama','$namaKelas','$alamat','$teleponUP','$email','$agama','$tempat','$ttl','$nis','$nisn','')");
    // Redirect to homepage to display updated user in list
    // echo "$nama";
    header("Location:data_angkatan.php?id_admin=$id_admin");
} 
?>

<br>
<div class="col-xl-6 col-lg-12" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Form Input Angkatan</h6>  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                <form class="user" name="tambah_siswa" method="post" action="input_angkatan.php?id_admin=<?php echo $id_admin?>" enctype="multipart/form-data">
                <input type="hidden" id="admin"value="<?php echo $id_admin ?>" style="border-radius:10px;" class="form-control form-control-user" >
                    
                <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Tahun</p>
                    </div>
                   <div class="col-9">
                   
                   <input name="tahun" style="border-radius:10px;" class="form-control form-control-user" >
                   
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Semester </p>
                    </div>
                   <div class="col-9">
                   <select name="semester" class="form-control" id="exampleFormControlSelect1">
                   <option value="1">1</option>
                    <option value="2">2</option>
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
                    <input type="submit" style="max-width:40%; margin-left:auto; margin-right:auto;  margin-top:20px;" name="update" class="btn btn-primary btn-user btn-block" value="Tambah Angkatan">

                 
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