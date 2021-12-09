<!-- proses-edit.php -->

<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];
    $foto = $_POST['foto'];

    
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

    $namaFile = $_FILES['berkas']['name'];
    $namaSementara = $_FILES['berkas']['tmp_name'];

    // tentukan lokasi file akan dipindahkan
    $dirUpload = "foto/";

    // pindahkan file
    // $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

    // if ($terupload) {
    //     echo "Upload berhasil!<br/>";
    //     echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
    // } else {
    //     echo "Upload Gagal!";
    // }
    
    $file_location = $dirUpload.$namaFile;
    file_put_contents($dirUpload.$namaFile, base64_decode($foto));
    

    // buat query update
    $sql = "UPDATE calon_siswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah', photo_name='$file_location' WHERE id=$id";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: list-siswa.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>