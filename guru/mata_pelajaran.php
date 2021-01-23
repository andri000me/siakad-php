<?php include('header.php');?>
 <?php include('../koneksi.php');?>
 <?php 
$getDataKelas=mysqli_query($db,"SELECT * FROM matpel WHERE id_guru ='$id_guru'");
?>
 <br>
 <div class="col-xl-8 col-lg-7" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center">
                  <div class="col-2">
                  <h6 class="m-0 font-weight-bold text-primary">Daftar Pelajaran</h6>
                  </div>                                                  
                  <div class="col-2" > 
                  
                    </div>
                    </form>
                                     
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <th style="width:15px">No</th>
                <th>Angkatan</th>
                <th>Kelas</th>
                <th>Mata Pelajaran </th>
                <!-- <th>Jam</th> -->
                <th>Input Nilai</th>
                </thead>
                <tbody>
                 <?php 
                 $i=0;
                 $search = mysqli_query($db,"SELECT * FROM matpel RIGHT JOIN kelas ON matpel.id_guru = kelas.id_guru WHERE matpel.id_guru='$id_guru'");
                  while($rowJadwal = mysqli_fetch_assoc($search)){
                    $i++;

                    if($rowJadwal['semester']=="1"){
                      $semester="Semester Ganjil";
                    }else{
                      $semester="Semester Genap";
                    }
      echo "
      <tr>
      <td>$i</td>
      <td style='width:250px'> ".$rowJadwal['angkatan']." $semester</td>
      <td> ".$rowJadwal['nama_kelas']." </td>
      <td> ".$rowJadwal['nama_matpel']." </td>
     
      <td> <a style='text-decoration:none;' href='inputNilai.php?id=$id_guru&&id_matpel=".$rowJadwal['id_matpel']."&&id_kelas=".$rowJadwal['id_kelas']."&&nama_matpel=".$rowJadwal['nama_matpel']."'><span> <i class='fas fa-pen-square' > </i></span> Edit/Input</a></td>
      
      </tr>
      ";
                              }
                              ?>	 
                   
                   
                    </tbody>
                  </table>
                </div>
              </div>
            </div>