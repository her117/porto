<?php 
require 'connect.php';
$hifish = query("SELECT * FROM hifish");
$count = 0;
$newrow = true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- css -->
    <link rel="stylesheet" href="style1.css" type="text/css">
    <style>.carousel-inner > img { width:100%; height:50px; } </style>
    <!-- Font-awesome -->
    <script src="https://kit.fontawesome.com/4bd78480fd.js" crossorigin="anonymous"></script>

    <title>Web Katalog</title>
</head>
<body class="bodycolor">
    <!-- Awal Header & Nav bar -->
    <nav class="navbar fixed-top navbar-dark bcgr p-0">
        <div class="container">
          <a class="navbar-brand" href="index.php">
            <img src="img/logo.png" alt="" width="200" height="60">
          </a>
          <ul class="nav justify-content-end ">
            <li class="nav-item">
              <a class="nav-link link-primary text-white" href="#"><i class="fa-solid fa-house"></i>Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link link-dark text-white" href="edit_page.php"><i class="fa-solid fa-pen-to-square"></i>Edit Page</a>
            </li>
          </ul>
        </div>
    </nav>
    <!-- akhir header & nav bar -->
    <!-- awal slider/carousel -->
    <div class="container">
        <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade slide carmt bdr bdr- rounded" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="img/guppy1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/guppy2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/guppy3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
    </div>
    <!-- akhir slider/carousel -->
    <!-- awal card katalog -->
    <div class="container">
    <h1 class="judul_index">Katalog Produk</h1>
    <?php foreach ($hifish as $row) :?>
      <?php
        if ($newrow) {
          echo "<div class='row'>";
          $newrow = false;
        }
      ?>
        
            <div class="col-sm-3 my-1 px-1 ">
                <div class="card">
                <img src="img/<?= $row["gambar"]; ?>" class="card-img-top" height="200" width="342" alt="...">
                    <div class="card-body cardcolor">
                        <h6 class="card-title cardfontcolor"><?= $row["nama"]; ?></h6>
                        <a href="https://wa.wizard.id/9fcf89" target="_blank" class="btn btn-primary">Order via Whatsapp</a>
                    </div>
                </div>
            </div>
        
        <?php if ($count == 3) {
          echo "</div>";
          $newrow = true;
          $count = 0;
        } ?>
    <?php endforeach; ?>
    </div>
    <!-- akhir card katalog -->
    <!-- awal footer -->
    <div class="container-footer">
      <footer class="footer">
        <div class="inner-footer">
            <ul class="icon-sosmed">
              <li><a href="https://www.facebook.com/heri.n.humoriezt" target="_blank"><i class="fa-brands fa-facebook-square"></i></a></li>
              <li><a href="https://www.instagram.com/heri_irawan11/" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
              <li><a href="https://wa.wizard.id/9fcf89"><i class="fa-brands fa-whatsapp" target="_blank"></i></a></li>
            </ul>
        </div>
        <div class="outer-footer">
          <p>Copyright &copy; Heri Irawan. 2022</p>
        </div>
      </footer>
    </div>
    <!-- akhir footer -->
</body>
</html>