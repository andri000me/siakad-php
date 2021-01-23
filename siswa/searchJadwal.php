
<?php include('header.php');?>
<?php include('../koneksi.php');?>
<?php 
if(isset($_POST['search']))
{   

  $id_kelas=$_POST['kelas'];
//   echo "$id_kelas";
//   echo "232323";
  $search = mysqli_query($db,"SELECT * FROM jadwal WHERE id_angkatan ='$id_angkatan'&& id_kelas='$id_kelas'");
//   header("Location:jadwal.php?id=$id_siswa");
} else {
  // $id_kelas=$_POST['search'];
  // echo "$id_kelas";
}
?>
<br>
 <div class="col-xl-8 col-lg-7" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center">
                  <div class="col-2">
                  <h6 class="m-0 font-weight-bold text-primary">Jadwal Pelajaran</h6>
                  </div>                                                  
                  <div class="col-2" > 
                  <form enctype="multipart/form-data" method="post" action="searchJadwal.php?id=<?php echo "$id_siswa"; ?>"> 
                    <select name="kelas" class="form-control" id="exampleFormControlSelect1">
                      <?php 
                        $getDataKelas=mysqli_query($db,"SELECT * FROM kelas WHERE id_angkatan ='$id_angkatan'");
                         while($row = mysqli_fetch_assoc($getDataKelas)){
			echo " <option  class='btn btn-danger dropdown-toggle' style='background:white;color:black; ' value=".$row['id_kelas']." >".$row['nama_kelas']."</option> ";
                         }
                      ?>	                          
                     </select>
                    </div>
                    <div class="col-2"> 
                   <input type="hidden" name="id_siswa" value="<?php echo"$id_siswa";?>">
                   <input type="hidden" name="id_angkatan" value="<?php echo"$id_angkatan";?>">
                    <input type="submit" name="search" class="btn btn-primary btn-user btn-block" value="Tampilkan">
                    </div>
                    </form>
                   
                    
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <th style="max-width:10%;">No</th>
                <th>Hari</th>
                <th>Mata Pelajaran </th>
                <th>Jam</th>
                </thead>
                 <tbody>
                 <?php 
                 $i=0;
                 $search = mysqli_query($db,"SELECT * FROM jadwal WHERE id_angkatan ='$id_angkatan'&& id_kelas='$id_kelas'");
                  while($rowJadwal = mysqli_fetch_assoc($search)){
                    $i++;
      echo "
      <tr>
      <td>$i</td>
      <td> ".$rowJadwal['hari']." </td>
      <td> ".$rowJadwal['mata_pelajaran']." </td>
      <td> ".$rowJadwal['jam_pelajaran']."</td>
    </tr>
      ";
                              }
                              ?>	 
                   
                   
                    </tbody>
                  </table>
                </div>
              </div>
            </div>