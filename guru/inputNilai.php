<?php include('header.php'); ?>
<?php include('../koneksi.php'); ?>
<br>
<?php
$id_matpel = $_GET['id_matpel'];
$id_kelas = $_GET['id_kelas'];
$nama_matpel = $_GET['nama_matpel'];
$getDataKelas = mysqli_query($db, "SELECT * FROM nilai WHERE id_kelas ='$id_kelas' && id_matpel='$id_matpel'");
if (isset($_POST['kkm'])) {
  $nilai_kkm = $_POST['nilai_kkm'];
  $inputKKM = mysqli_query($db, "UPDATE nilai SET kkm = '$nilai_kkm' WHERE id_matpel='$id_matpel' ");
  $inputKKMRapot = mysqli_query($db, "UPDATE nilai_siswa SET nilai_kkm = '$nilai_kkm' WHERE id_matpel='$id_matpel' ");

  header("Location:inputNilai.php?id=$id_guru&&id_matpel=$id_matpel&&id_kelas=$id_kelas&&nama_matpel=$nama_matpel");
}
?>

<div class="col-xl-10 col-lg-7" style="margin-left: auto;    margin-right: auto;">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center">
      <div class="col-2">
        <h6 class="m-0 font-weight-bold text-primary">Input Nilai <span style="color:black"> <?php echo "$nama_matpel" ?> </span> </h6>
      </div>
      <div class="col-2">
      </div>
      </form>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <!-- <thead> -->
        <tr>
          <th style="width:15px; vertical-align: middle; text-align: center;">No</th>
          <th style=" vertical-align: middle; text-align: center;">NIS</th>
          <th style=" vertical-align: middle; text-align: center;">NISN</th>
          <th style=" vertical-align: middle; text-align: center;">Nama Siswa</th>
          <th style=" vertical-align: middle; text-align: center;">KKM</th>

          <th style=" vertical-align: middle; text-align: center;">Pengetahuan</th>
          <th style=" vertical-align: middle; text-align: center;">Keterampilan</th>
          <th style=" vertical-align: middle; text-align: center;">Nilai Akhir</th>
          <th style=" vertical-align: middle; text-align: center;">Predikat</th>
          <th style=" vertical-align: middle; text-align: center;">Input</th>
        </tr>

        <!-- </thead> -->

        <!-- <tbody> -->
        <?php
        $i = 0;
        $halaman = 10;
        $page = isset($_GET['halaman']) ? (int)$_GET["halaman"] : 1;
        $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;

        $sql = "SELECT * FROM nilai WHERE id_kelas ='$id_kelas' && id_matpel='$id_matpel'";
        $query = mysqli_query($db, $sql);
        $total = mysqli_num_rows($query);
        $pages = ceil($total / $halaman);
        $getData = mysqlI_query($db, "SELECT * FROM nilai WHERE id_kelas ='$id_kelas' && id_matpel='$id_matpel' LIMIT $mulai, $halaman");

        while ($rowJadwal = mysqli_fetch_assoc($getData)) {
          $i++;
          echo "
      <tr>
      <td>$i</td>
      <td> " . $rowJadwal['nis'] . " </td>
      <td> " . $rowJadwal['nisn'] . " </td>
      <td> " . $rowJadwal['nama_siswa'] . " </td>
      <td>" . $rowJadwal['kkm'] . "</td>
       <td> " . $rowJadwal['nilai_pengetahuan'] . "</td>
      <td> " . $rowJadwal['nilai_keterampilan'] . "</td>
          <td> " . $rowJadwal['nilai_akhir'] . "</td>
      <td> " . $rowJadwal['predikat'] . "</td>
      <td> <a style='text-decoration:none;' href='inputDetailNilai.php?id=$id_guru&&id_matpel=" . $rowJadwal['id_matpel'] . "&&id_kelas=" . $rowJadwal['id_kelas'] . "&&nama_matpel=$nama_matpel&&id_siswa=" . $rowJadwal['id_siswa'] . "'><span> <i class='fas fa-pen-square' > </i></span> Edit/Input</a></td>
         </tr>
      ";
        }
        ?>

        <!-- </tbody> -->

      </table>
      <div style="margin-left:auto" class="row">
        <div>
          <ul class="pagination">
            <?php for ($j = 1; $j <= $pages; $j++) { ?>
              <li>
                <a class="btn" style="border:solid 1px grey ; margin:4px;" href="?halaman=<?php echo "$j&&id=$id_guru&&id_matpel=$id_matpel&&id_kelas=$id_kelas&&nama_matpel=$nama_matpel"; ?>"><?php echo $j; ?></a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <form enctype="multipart/form-data" method="post" action="inputNilai.php?id=<?php echo "$id_guru&&id_matpel=$id_matpel&&id_kelas=$id_kelas&&nama_matpel=$nama_matpel"; ?>">
        <div class="row">

          <?php
          $kkm;
          $getKKM = mysqli_query($db, "SELECT * FROM nilai WHERE id_matpel='$id_matpel'");
          $getNilai = mysqli_fetch_assoc($getKKM);
          $kkm = $getNilai['kkm'];

          ?>
          <input value="<?php echo "$kkm"; ?>" name="nilai_kkm" style="max-width:70px;margin-left:auto; margin-right:1%;" type="number" max="100" min="0" class="form-control">
          <input style="max-width:200px;margin-right:2%;" type="submit" name="kkm" class="btn btn-success btn-user btn-block" value="Input Nilai KKM">

      </form>
    </div>
  </div>
</div>
</div>
<script>
  function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
</script>