<?php include('../koneksi.php');?>
<?php 
$id=$_GET['id'];
$id_admin=$_GET['id_admin'];
$type=$_GET['type'];
if($type =='siswa'){
$hapusData=mysqli_query($db,"DELETE FROM siswa WHERE id_siswa=$id");
$hapusData2=mysqli_query($db,"DELETE FROM nilai WHERE id_siswa=$id");
$hapusData3=mysqli_query($db,"DELETE FROM nilai_siswa WHERE id_siswa=$id");
$hapusData4=mysqli_query($db,"DELETE FROM pembayaran_spp WHERE id_siswa=$id");
if($hapusData){
    header("Location:index.php?id_admin=$id_admin");
} else {
    echo"<script> alert('data tidak ada')</script>";
}
}else if($type=="guru"){
    $hapusData=mysqli_query($db,"DELETE FROM guru WHERE id_guru=$id");
    $hapusData2=mysqli_query($db,"DELETE FROM matpel WHERE id_guru=$id");
    $hapusData3=mysqli_query($db,"DELETE FROM kelas WHERE id_guru=$id");
    $hapusData4=mysqli_query($db,"DELETE FROM jadwal WHERE id_guru=$id");
    if($hapusData){
        header("Location:dataguru.php?id_admin=$id_admin");
    } else {
        header("Location:dataguru.php?pesan=gagal&&id_admin=$id_admin");
    }  
}else if($type=="matpel"){
    $hapusData=mysqli_query($db,"DELETE FROM matpel WHERE id_matpel=$id");
    $hapusData3=mysqli_query($db,"DELETE FROM jadwal WHERE id_matpel=$id");
    if($hapusData){
        header("Location:datamatapelajaran.php?id_admin=$id_admin");
    } else {
        header("Location:datamatapelajaran.php?pesan=gagal&&id_admin=$id_admin");
    } 
}else if($type=="kelas"){
    $hapusData=mysqli_query($db,"DELETE FROM kelas WHERE id_kelas=$id");
    $hapusData2=mysqli_query($db,"DELETE FROM matpel WHERE id_kelas=$id");
    $hapusData3=mysqli_query($db,"DELETE FROM jadwal WHERE id_kelas=$id");
    if($hapusData){
        header("Location:datakelas.php?id_admin=$id_admin");
    } else {
        header("Location:datakelas.php?pesan=gagal&&id_admin=$id_admin");
    } 
}
else if($type=="jadwal"){
    $hapusData3=mysqli_query($db,"DELETE FROM jadwal WHERE id_kelas=$id");
    if($hapusData){
        header("Location:datajadwal.php?id_admin=$id_admin");
    } else {
        header("Location:datajadwal.php?pesan=success&&id_admin=$id_admin");
    } 
}
else if($type=="spp"){
    $hapusData=mysqli_query($db,"DELETE FROM pembayaran_spp WHERE id_spp=$id");
    
    if($hapusData){
        header("Location:spp.php?id_admin=$id_admin");
    } else {
        header("Location:spp.php?pesan=gagal&&id_admin=$id_admin");
    } 
}
else if($type=="angkatan"){
    $hapusData=mysqli_query($db,"DELETE FROM angkatan WHERE id_angkatan=$id");
    
    if($hapusData){
        header("Location:data_angkatan.php?id_admin=$id_admin");
    } else {
        header("Location:data_angkatan.php?pesan=gagal&&id_admin=$id_admin");
    } 
}
?>