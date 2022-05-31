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


    <title>Edit Data Ikan</title>
</head>
<body class="bodycolor"> 
    <!-- awal script php -->
    <?php 
        include_once("connect.php");
        $data_kelamin = mysqli_query($conn, "SELECT * FROM jenis_kelamin");
        $data_strain = mysqli_query($conn, "SELECT * FROM strain");
        
        $id_ikan = $_GET['id'];
        $hifish = mysqli_query($conn, "SELECT * FROM hifish WHERE id_ikan='$id_ikan'");

        while ($hif = mysqli_fetch_array($hifish)) {
            $id_ikan = $hif['id_ikan'];
            $nama_ikan = $hif['nama'];
            $umur_ikan = $hif['umur'];
            $id_kelamin = $hif['id_kelamin'];
            $id_strain = $hif['id_strain'];
            $stok_ikan = $hif['stok'];
            $harga_ikan = $hif['harga'];
            $gambar_ikan = $hif['gambar'];
        }
    ?>
    <!-- akhir script php -->
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
        <div class="row">
            <div class="col-md-12 judul_edit">
                <h3>Edit Data Ikan</h3>
            </div>
        </div>
        <div class="row" style="margin-bottom: 50px;">
            <div class="col-md-12 d-flex justify-content-center">
                <form action="edit.php?id_ikan=<?php echo $id_ikan ?>" method="post" enctype="multipart/form-data" name="form1">
                    <table width="100%"  class="formbg text-white font-weight-bold rounded" cellpadding="10" bgcolor= "#9ba4b4">
                            <input type="hidden" class="form-control" name="id_ikan" value="<?php ob_start(); echo $id_ikan; ?>">
                            <input type="hidden" class="form-control" name="gambar-lama" value="<?php echo $gambar_ikan; ?>">
                        <tr>
                            <td>Nama Ikan</td>
                            <td><input type="text" class="form-control" name="nama_ikan" value="<?php  echo $nama_ikan; ?>"></td>
                        </tr>
                        <tr>
                            <td>Umur Ikan</td>
                            <td><input type="text" class="form-control" name="umur_ikan" value="<?php echo $umur_ikan; ?>"></td>
                        </tr>
                        <tr>
                            <td>Kelamin Ikan</td>
                            <td>
                                <select class="form-control" name="id_kelamin" value="<?php echo $id_kelamin; ?>">
                                    <?php 
                                        while ($jk = mysqli_fetch_array($data_kelamin)) {
                                            echo "
                                                <option ".($jk['id_kelamin'] == $id_kelamin ? 'selected' : '')." value=".$jk['id_kelamin'].">".$jk['jenis_kelamin']."</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Strain Ikan</td>
                            <td>
                                <select class="form-control" name="id_strain" value="<?php echo $id_strain; ?>">
                                    <?php 
                                    ob_start();
                                        while ($str = mysqli_fetch_array($data_strain)) {
                                            echo "
                                                <option ".($str['id_strain'] == $id_strain ? 'selected' : '')." value=".$str['id_strain'].">".$str['nama_strain']."</option>
                                            ";
                                        }?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Stok Ikan</td>
                            <td><input type="text" class="form-control" name="stok_ikan"  value="<?php echo $stok_ikan; ?>"></td>
                        </tr>
                        <tr>
                            <td>Harga Ikan</td>
                            <td><input type="text" class="form-control" name="harga_ikan" value="<?php echo $harga_ikan; ?>"></td>
                        </tr>
                        <tr>
                            <td>Gambar Ikan</td>
                            <td><input type="file" class="form-control" name="gambar_ikan"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" class="form-control btn btn-primary" name="Submit" value="Edit"></input></td>
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
        $id_ikan = $_POST['id_ikan'];
        $nama_ikan = $_POST['nama_ikan'];
        $umur_ikan = $_POST['umur_ikan'];
        $id_kelamin = $_POST['id_kelamin'];
        $id_strain = $_POST['id_strain'];
        $stok_ikan = $_POST['stok_ikan'];
        $harga_ikan = $_POST['harga_ikan'];
        $gambarlama = $_POST['gambar-lama'];

        //  cek gambar baru
        if ($_FILES['gambar_ikan']['error'] === 4) {
            $gambar_ikan = $gambarlama;
        } else {
            $gambar_ikan = upload();
        }
        

        $result = mysqli_query($conn, "UPDATE hifish SET id_ikan = '$id_ikan', nama = '$nama_ikan', umur = '$umur_ikan', id_kelamin = '$id_kelamin', id_strain = '$id_strain', stok = '$stok_ikan', harga = '$harga_ikan', gambar = '$gambar_ikan' WHERE id_ikan = '$id_ikan';");
    header("Location:edit_page.php");
    }
?>