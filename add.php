<!DOCTYPE html>
<html lang="en">
<head>
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

    <title>Data Ikan Baru</title>
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
              <a class="nav-link link-primary text-white" href="index.php"><i class="fa-solid fa-house"></i>Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link link-dark text-white" href="edit_page.php"><i class="fa-solid fa-pen-to-square"></i>Edit Page</a>
            </li>
          </ul>
        </div>
    </nav>
    <!-- akhir header & nav bar -->
    <!-- script konek dabes & data -->
<?php 
        include_once("connect.php");
        $data_kelamin = mysqli_query($conn, "SELECT * FROM jenis_kelamin");
        $data_strain = mysqli_query($conn, "SELECT * FROM strain");
?>
    <!-- akhir konek dabes -->
    <!-- Awal Form -->
    <div class="container">
        <div class="row">
            <div class="judul_edit">
                <h2>Tambah Ikan</h2>
            </div>
        </div>
        <div class="row" style="margin-bottom: 50px;">
            <div class="col-md-12 d-flex justify-content-center">
                <form action="add.php"  method="post" enctype="multipart/form-data" name="form1" >
                    <table width="100%" class="formbg text-white font-weight-bold rounded" cellpadding="10" bgcolor= "#9ba4b4">
                        <tr>
                            <td>Nama Ikan</td>
                            <td><input type="text" class="form-control" name="nama_ikan"></td>
                        </tr>
                        <tr>
                            <td>Umur Ikan</td>
                            <td><input type="text" class="form-control" name="umur_ikan"></td>
                        </tr>
                        <tr>
                            <td>Kelamin Ikan</td>
                            <td>
                                <select class="form-control" name="id_kelamin">
                                    <?php 
                                        while ($jk = mysqli_fetch_array($data_kelamin)) {
                                            echo "
                                                <option value=".$jk['id_kelamin'].">".$jk['jenis_kelamin']."</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Strain Ikan</td>
                            <td>
                                <select class="form-control" name="id_strain">
                                    <?php 
                                    ob_start();
                                        while ($str = mysqli_fetch_array($data_strain)) {
                                            echo "
                                                <option value=".$str['id_strain'].">".$str['nama_strain']."</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Stok Ikan</td>
                            <td><input type="text" class="form-control" name="stok_ikan"></td>
                        </tr>
                        <tr>
                            <td>Harga Ikan</td>
                            <td><input type="text" class="form-control" name="harga_ikan"></td>
                        </tr>
                        <!-- input file -->
                        <tr> 
                            <td>Gambar Ikan</td>
                            <td><input type="file" class="form-control" name="gambar_ikan"></td>
                        </tr>
                        <!-- akhir input file -->
                        <tr>
                            <td class="text-center"><a href="add_strain.php" class="btn btn-primary">Tambah Jenis Strain</a></td>
                            <td><input type="submit" class="form-control btn btn-primary" name="Submit" value="Add"></input></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <!-- akhir Form -->
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

<!-- Script PHP -->
<?php 
    if (isset($_POST['Submit'])) {
        $nama_ikan = htmlspecialchars($_POST['nama_ikan']);
        $umur_ikan = htmlspecialchars($_POST['umur_ikan']);
        $id_kelamin = htmlspecialchars($_POST['id_kelamin']);
        $id_strain = htmlspecialchars($_POST['id_strain']);
        $stok_ikan = htmlspecialchars($_POST['stok_ikan']);
        $harga_ikan = htmlspecialchars($_POST['harga_ikan']);

        // upload gamber
        $gambar_ikan = upload();
        if (!$gambar_ikan) {
            return false;
        }

        $insert = mysqli_query($conn, "INSERT INTO `hifish`(`id_ikan`, `nama`, `umur`, `id_kelamin`, `id_strain`, `stok`, `harga`, `gambar`) 
            VALUES ('', '$nama_ikan', '$umur_ikan', '$id_kelamin', '$id_strain', '$stok_ikan', '$harga_ikan', '$gambar_ikan');");
    header("Location:index.php");
    }

    
?>