<?php 
require 'connect.php';


$id_ikan = $_GET["id"];

if (hapus($id_ikan) > 0) {
    echo " 
        <script>
            alert('Hapus Data Berhasil.');
            document.location.href = 'edit_page.php';
        </script>
        ";
} else {
    echo " 
        <script>
            alert('Data Gagal di Hapus.');
            document.location.href = 'edit_page.php';
        </script>
        ";
}


?>