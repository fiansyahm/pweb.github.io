<!-- proses-pendaftaran.php -->

<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];
    $foto = $_POST['foto'];



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
    file_put_contents($dirUpload.$namaFile, base64_decode($foto));

    $file_lokasi=$dirUpload.$namaFile;
    // buat query
    $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal,photo_name) VALUE ('$nama', '$alamat', '$jk', '$agama', '$sekolah','$file_lokasi')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>