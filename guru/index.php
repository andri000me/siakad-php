 <?php include('header.php');?>
 <?php include('../koneksi.php');?>
 <br>
 <div class="col-xl-8 col-lg-7" style="margin-left: auto;    margin-right: auto;">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
                  <div class="dropdown no-arrow">
                  <a style="text-decoration:none;" href="editguru.php?id=<?php echo "$id_guru"?>">Update Bio</a>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <tbody>
                    <tr>
                      <td style="max-width:20%">Nama</td>
                      <td><?php echo " $namaGuru" ?></td>
                    </tr>
                    <tr>
                      <td style="max-width:20%">NUPTK</td>
                      <td><?php echo "$nuptk" ?></td>
                    </tr>
                  
                    <tr>
                      <td style="max-width:20%">Foto</td>
                      <td><img style="max-height:150px; max-width:100px" src="../img/fotoGuru/<?php echo "$foto" ?>"> </img></td>
                    </tr>
                    <tr>
                      <td style="max-width:20%">Alamat</td>
                      <td><?php echo "$alamat" ?></td>
                    </tr>
                    <tr>
                      <td style="max-width:20%">Email</td>
                      <td><?php echo "$email" ?></td>
                    </tr>
                    <tr>
                      <td style="max-width:20%">No Telepon</td>
                      <td><?php echo "$no_hp" ?></td>
                    </tr>
                    <tr>
                      <td style="max-width:20%">Tanggal Lahir</td>
                      <td><?php echo "$tanggal_lahir" ?></td>
                    </tr>
                    <tr>
                      <td style="max-width:20%">Tempat Lahir</td>
                      <td><?php echo "$tempat_lahir" ?></td>
                    </tr>
                    <tr>
                      <td style="max-width:20%">Agama</td>
                      <td><?php echo "$agama" ?></td>
                    </tr>
                    <tr>
                      <td style="max-width:20%">Jenis Kelamin</td>
                      <td><?php echo "$jenis_kelamin" ?></td>
                    </tr>
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>