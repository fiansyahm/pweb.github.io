<?php
    header('Content-Type: text/xml');
    $nama=$_GET['nama'];
    echo '<response>';
    $myFamily=array('ROSIMAN','AMALIA','FAZA','NADA');
    if(in_array(strtoupper($nama),$myFamily)){
        echo'Halo&lt;strong&gt;' . htmlentities($nama) . '&lt:/strong&gt;,anda adalah anggota keluarga saya';
    }
    else if(trim($nama) == ''){
        echo 'hai orang asing , silahkan tulis namamu';
    }
    else{
        echo'&lt;strong&gt;' . htmlentities($nama) . '&lt:/strong&gt;,anda bukan anggota keluarga saya';
    }
    echo '</response>';

?>