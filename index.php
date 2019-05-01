
<?php 

include 'konek.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- CSS FILES -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/ukl_dwiyan.css">
<!-- JS FILES -->
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<!--END OF JS-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INFO ORGANISASI</title>
</head>
<body>
<nav class="fixed navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#" style="margin-left:4%;font-size:30px;color:maroon;font-family:Helvetica">MokletIO</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0" style="margin-left:4%;">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Organisasi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Login</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<!-- END OF NAV -->
<header class="parallax bg-primary text-white" style=" background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url('https://www.smktelkom-mlg.sch.id/assets/front/img/intro-home1.JPG');">
<div class="atur-header container text-center" id="anjay">
        <img style="max-width: 15%; margin-right: 3%;" src="assets/logo.png">
      <h1>Moklet Info Organisasi</h1>
      <p class="lead">Moklet IO Site</p>
    </div>
 
  </header>
  <!-- START OF DESC -->
<?php
$query = "SELECT * FROM post";
$q = mysqli_query($konek,$query);
$num = mysqli_num_rows($q);
?>
  <section id="info-organ">
  <div class="atur-card">
  
  <h1 align="center">List Info Organisasi</h1>
  <?php 
  if($num > 0){
  $no = 1;

  while($data = mysqli_fetch_assoc($q)){
  
  ?>
  <div class="card" style="width:300px;">
    <img class="card-img-top" src="<?php echo $data['upload']; ?>" alt="Card image" style="max-width:250px;margin:7%;float:left">
    <div class="card-body">
      <h4 class="card-title"><?php echo $data['judul']; ?></h4>
      <p class="card-text"><?php echo $data['deskripsi']; ?></p>
      <a href="" class="btn btn-primary">Lebih Lanjut</a>
    </div>
 </div>
 <?php
  }
}
 ?>
</div>
  </section>
<br><br><br>
</body>
</html>