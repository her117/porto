<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- manual css -->
    <link rel="stylesheet" href="style1.css" type="text/css">
    <!-- Font-awesome -->
    <script src="https://kit.fontawesome.com/4bd78480fd.js" crossorigin="anonymous"></script>

    <title>Data Strain Baru</title>
</head>
<body class="bodycolor">
<?php 
        include_once("connect.php");
        ob_start();
?>
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
            <li class="nav-item">
              <a class="nav-link link-dark text-white" href="add_strain.php"><i class="fa-solid fa-share"></i>Tambah Strain</a>
            </li>
          </ul>
        </div>
    </nav>
    <!-- akhir header & nav bar -->
    <div class="container">
        <div class="row judul_edit" >
            <div class="col-md-12 text-center">
                <h3>Tambah Strain Ikan</h3>
            </div>
        </div>
        <div class="row" style="margin-bottom: 50px;">
            <div class="col-md-12  d-flex justify-content-center">
                <form action="add_strain.php" method="post" name="form1">
                    <table width="100%" class="formbg text-white font-weight-bold rounded" cellpadding="10" bgcolor= "#9ba4b4">
                        <tr>
                            <td>Nama Strain</td>
                            <td><input type="text" class="form-control" name="nama_strain"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" class="form-control btn btn-primary" name="Submit" value="Add"></input></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    
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

<?php 
    if (isset($_POST['Submit'])) {
        $id_strain = $_POST['id_strain'];
        $nama_strain = $_POST['nama_strain'];
        // $umur_ikan = $_POST['umur_ikan'];
        // $id_kelamin = $_POST['id_kelamin'];
        // $id_strain = $_POST['id_strain'];
        // $stok_ikan = $_POST['stok_ikan'];
        // $harga_ikan = $_POST['harga_ikan'];

        $insert = mysqli_query($conn, "INSERT INTO `strain`(`id_strain`, `nama_strain`) VALUES ('', '$nama_strain');");
    header("Location:edit_page.php");
    }
?>