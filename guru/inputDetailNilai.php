<?php include('header.php');?>
<?php include('../koneksi.php');?>

<?php 
$id_siswa=$_GET['id_siswa'];
$id_matpel=$_GET['id_matpel'];
$id_guru=$_GET['id'];
$id_kelas=$_GET['id_kelas'];
$nama_matpel=$_GET['nama_matpel'];
$getDataSiswa=mysqli_query($db,"SELECT * FROM nilai_siswa WHERE id_matpel='$id_matpel' && id_siswa='$id_siswa' ");
$dataSiswa=mysqli_fetch_assoc($getDataSiswa);
$nama_siswa=$dataSiswa['nama_siswa'];
$id_angkatan=$dataSiswa['id_angkatan'];
if(isset($_POST['update']))
{   
    $tugas=$_POST['tugas'];
    $uh=$_POST['uh'];
    $pts=$_POST['pts'];
    $pas=$_POST['pas'];
    
    $praktek=$_POST['praktek'];
    $portofolio=$_POST['portofolio'];
    $proyek=$_POST['proyek'];

    $nilai_keterampilan=($praktek+$portofolio+$proyek)/3;
    $nilai_akademik=($tugas+$uh+$pts+$pas)/4;
    $nilai_akhir=($nilai_akademik+$nilai_keterampilan)/2;
    $predikat;
    if ( $nilai_akhir <= 100 && $nilai_akhir >= 96)
{$predikat = "A+";}
elseif ( $nilai_akhir <= 95 && $nilai_akhir >= 91)
{$predikat = "A";}
elseif($nilai_akhir <=90 && $nilai_akhir >=86)
{$predikat = "A-";}
elseif($nilai_akhir <=85 && $nilai_akhir >=81)
{$predikat = "B+";}
elseif($nilai_akhir <=80 && $nilai_akhir >=76)
{$predikat = "B";}
elseif($nilaikhir <=75 && $nilai_akhir >=71)
{$predikat = "B-";}
elseif($nilaikhir <=70 && $nilai_akhir >=66)
{$predikat = "C";}
elseif($nilaikhir <=65 && $nilai_akhir >=61)
{$predikat = "C-";}
elseif($nilai_akhir <=60 && $nilai_akhir >=56)
{$predikat = "D";}
elseif($nilai_akhir <=55 && $nilai_akhir >=0)
{$predikat = "E";}
  
    $inputNilai = mysqli_query($db,"UPDATE nilai_siswa SET nilai_tugas = '$tugas',nilai_uh='$uh',nilai_pts='$pts',nilai_pas='$pas',nilai_praktek='$praktek',nilai_portofolio='$portofolio',nilai_proyek='$proyek' WHERE id_siswa=$id_siswa");
    $inputRapot = mysqli_query($db,"UPDATE nilai SET nilai_pengetahuan= '$nilai_akademik',nilai_keterampilan='$nilai_keterampilan',nilai_akhir='$nilai_akhir',predikat='$predikat' WHERE id_siswa=$id_siswa && id_matpel=$id_matpel && id_angkatan=$id_angkatan" );
    // Redirect to homepage to display updated user in list
    header("Location:inputNilai.php?id=$id_guru&&id_matpel=$id_matpel&&id_kelas=$id_kelas&&nama_matpel=$nama_matpel");
}
?>

<br>
<div class="col-xl-6 col-lg-12" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Nilai Siswa <span style="color:black"> <?php  echo"$nama_siswa";?> </span></h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                <form class="user" name="update_siswa" method="post" action="inputDetailNilai.php?id=<?php echo "$id_guru&&id_matpel=$id_matpel&&id_kelas=$id_kelas&&nama_matpel=$nama_matpel&&id_siswa=$id_siswa"; ?>" enctype="multipart/form-data">
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Nama Lengkap </p>
                    </div>
                   <div class="col-9">
                    <input readonly type="text" style="border-radius:10px;" class="form-control form-control-user" value="<?php echo"$nama_siswa";?>">
                </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Tahun Ajaran</p>
                    </div>
                   <div class="col-9">
                    <input readonly type="Name" style="border-radius:10px;" class="form-control form-control-user" value="<?php echo"".$dataSiswa['tahun_ajaran']."";?>">
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Nilai KKM</p>
                    </div>
                   <div class="col-9">
                    <input readonly type="Name" style="border-radius:10px;" class="form-control form-control-user" value="<?php echo"".$dataSiswa['nilai_kkm']."";?>">
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <h5 styl="padding:5px; color:black; padding-bottom:5px;"> Input Nilai Aspek Pengetahuan :</h5>
                    </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Nilai Tugas</p>
                    </div>
                   <div class="col-9">
                   <input min="0" max="100" type="number" style="border-radius:10px;" class="form-control form-control-user" name="tugas" value="<?php echo"".$dataSiswa['nilai_tugas']."";?>">
                    
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Nilai Ulangan Harian </p>
                    </div>
                   <div class="col-9">
                   <input  min="0" max="100"  type="number" style="border-radius:10px;" class="form-control form-control-user" name="uh" value="<?php echo"".$dataSiswa['nilai_uh']."";?>">
                           </div>
                       </div>
                    </div>                                       
                    </div>

                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Nilai PTS </p>
                    </div>
                   <div class="col-9">
                   <input  min="0" max="100" type="number" style="border-radius:10px;" class="form-control form-control-user" name="pts" value="<?php echo"".$dataSiswa['nilai_pts']."";?>">
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Nilai PAS</p>
                    </div>
                   <div class="col-9">
                    <input min="0" max="100" type="number" style="border-radius:10px;" id="maxInput" class="form-control form-control-user" name="pas" value="<?php echo"".$dataSiswa['nilai_pas']."";?>">
                    </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <h5 styl="padding:5px; color:black; padding-bottom:5px;"> Input Nilai Aspek Keterampilan :</h5>
                    </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Nilai Praktek</p>
                    </div>
                   <div class="col-9">
                   <input  min="0" max="100" type="number" style="border-radius:10px;" id="maxInput" class="form-control form-control-user" name="praktek" value="<?php echo"".$dataSiswa['nilai_praktek']."";?>">
                    
                            </div>
                       </div>
                    </div>                                       
                    </div>
                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Nilai Portofolio </p>
                    </div>
                   <div class="col-9">
                   <input  min="0" max="100" type="number" style="border-radius:10px;" id="maxInput" class="form-control form-control-user" name="portofolio" value="<?php echo"".$dataSiswa['nilai_portofolio']."";?>">
                           </div>
                       </div>
                    </div>                                       
                    </div>

                    <div class="form-group">
                    <div class="container">
                    <div class="row"> 
                    <div class="col-3">
                    <p style="margin-top:10px">Nilai Proyek </p>
                    </div>
                   <div class="col-9">
                   <input  min="0" max="100" type="number" style="border-radius:10px;" id="maxInput" class="form-control form-control-user" name="proyek" value="<?php echo"".$dataSiswa['nilai_proyek']."";?>">
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