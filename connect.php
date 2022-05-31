<?php 
$servername = "localhost";
$database = "hifish";
$username = "root";
$password = "";

//connection
$conn = mysqli_connect($servername,$username,$password,$database);


function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function hapus($id_ikan){
    global $conn;
    mysqli_query($conn, "DELETE FROM hifish WHERE id_ikan = $id_ikan");
    
    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['gambar_ikan']['name'];
    $sizefile = $_FILES['gambar_ikan']['size'];
    $error = $_FILES['gambar_ikan']['error'];
    $tmpname = $_FILES['gambar_ikan']['tmp_name'];

    // cek gambar harus di pilih
    if ($error === 4) {
        echo "
            <script>
            alert('Pilih Gambar!');
            </script>
        ";
        return false;
    }

    // cek gambar atau bukan
    $ektgambarvalid = ['jpg','jpeg','png'];
    $ektgambar = explode('.' , $namaFile);
    $ektgambar = strtolower(end($ektgambar));
    if (!in_array($ektgambar, $ektgambarvalid )) {
        echo "
            <script>
            alert('Wajib Pilih Gambar!');
            </script>
        ";
        return false;
    }

    // maks ukuran file gambar
    if ($sizefile > 2000000) {
        echo "
            <script>
            alert('Gambar Terlalu Besar! maks 2mb.');
            </script>
        ";
        return false;
    }

    // proses cek gambar selesai
    // buat nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ektgambar;

    move_uploaded_file($tmpname, 'img/' . $namaFileBaru);

    return $namaFileBaru;


}
?>