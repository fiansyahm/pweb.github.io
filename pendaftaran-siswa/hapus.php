<!-- hapus.php -->

<?php

include("config.php");

if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    // ambil foto &hapus
    $sqlfoto = "SELECT photo_name FROM calon_siswa WHERE id=$id";
    $result = $db->query($sqlfoto);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $filename = $row["photo_name"];
            if (file_exists($filename)) {
                unlink($filename);
                echo 'File '.$filename.' has been deleted';
            } else {
                echo 'Could not delete '.$filename.', file does not exist';
            }
        }
    }

    // buat query hapus
    $sql = "DELETE FROM calon_siswa WHERE id=$id";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: list-siswa.php');
    } else {
        die("gagal menghapus...");
    }

    

} else {
    die("akses dilarang...");
}

?>