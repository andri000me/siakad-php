<head>
<title>Halaman Utama</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="desainindex.css" type="text/css" />
</head>
<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<script> alert('Data Tidak Ada')</script>";
		}
	}
	?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
<div class="container">
  <a class="navbar-brand" href="#">SMK Krisanti Jakarta</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="pendahuluan.php">Pendahuluan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="visimisi.php">Visi&misi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="kurikulum.php">Kurikulum</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="kesempatankerja.php">Kesempatan Kerja</a>
      </li>
    </ul>
    <button type="button" class="btn btn-light" onclick="window.location.href='loginuser.php'">login</button>
      
  </div>
  </div>
</nav>

  <div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
      <img src="krisantilogo.jpg">
      <br>
      <h1 class="display-4">SELAMAT DATANG</h1>
      <h1 class="display-4">DI SMK KRISANTI JAKARTA </h1>
    </div>
</div>
<br>

<!-- <div class="container text-center">
  <div class="row">
    <div class="col text-center">
    <h1>About</h1>
    </div>
  <div class="row">
    <div class="col">
    <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus doloremque minus alias omnis veritatis at, ipsam quibusdam laboriosam tenetur facere maiores laudantium? Voluptas voluptate nostrum tempore perspiciatis magnam animi veniam?</p>
    </div>
    <div class="col">
    <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident quam commodi unde? Vitae natus consequatur dolore voluptatibus unde rem velit inventore maiores, quasi dolores dicta quo necessitatibus, numquam quia libero.</p>
    </div>
  </div>
  </div>
</div> -->
<br>
<section id="jurusan" class="jurusan bg-light">
<div class="container text-center">
  <h1>MACAM-MACAM JURUSAN MENARIK</h1>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
      <img src="krisantilogo6.jpeg" class="card-img-top" alt="...">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-body">
      <img src="krisantibg2.jpeg" class="card-img-top" alt="...">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>  
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-body">
      <img src="krisantibg2.jpeg" class="card-img-top" alt="...">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>  
      </div>
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
      <img src="krisantilogo6.jpeg" class="card-img-top" alt="...">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-body">
      <img src="krisantibg2.jpeg" class="card-img-top" alt="...">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>  
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-body">
      <img src="krisantibg2.jpeg" class="card-img-top" alt="...">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>  
      </div>
    </div>
  </div>  
</div>
</div>
</section>
<br>

<div class="container text-center">
<h1>Kegiatan Sekolah</h1>

<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="krisantibg.jpeg" class="d-block w-100 h-200" alt="..." style="height:250px;">
      <div class="carousel-caption d-none d-md-block">
        
      </div>
    </div>
    <div class="carousel-item">
      <img src="krisantilogo2.jpg" class="d-block w-100 h-200" alt="..." style="height:250px;">
      <div class="carousel-caption d-none d-md-block">
        
      </div>
    </div>
    <div class="carousel-item">
      <img src="krisantilogo3.png" class="d-block w-100 h-200" alt="..." style="height:250px;">
      <div class="carousel-caption d-none d-md-block">
        
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>



<div class="footer">
  <p class="text-center">Copyrights@2020_ThejaKusumawijaya</p>
</div>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>