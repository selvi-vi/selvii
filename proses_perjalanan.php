<?php

include("config.php");

if (isset($_POST['simpan'])) {
    $perjalanan_asal = $_POST['asal'];
    $perjalanan_tujuan = $_POST['tujuan'];
    $perjalanan_harga = $_POST['harga'];
    $query ="INSERT INTO perjalanan (asal,tujuan,harga) VALUES ('$perjalanan_asal','$perjalanan_tujuan','$perjalanan_harga')"; 
    $exec = mysqli_query($conn, $query);
    if ($exec) {
        header('Location: perjalanan.php?status=added');
    }
}

if(isset($_GET['id_perjalanan'])) {
    $id_perjalanan = $_GET['id_perjalanan'];
    $exec = mysqli_query($conn, "DELETE FROM perjalanan WHERE id_perjalanan='$id_perjalanan' ");
    if($exec) {
        header('Location: perjalanan.php?status=deleted');
    }
}

if(isset($_POST['update'])) {
    $id_perjalanan = $_POST['id_perjalanan']; 
    $perjalanan_asal = $_POST['asal'];
    $perjalanan_tujuan = $_POST['tujuan'];
    $perjalanan_harga = $_POST['harga'];
    $query ="UPDATE perjalanan SET asal = '$perjalanan_asal', tujuan = '$perjalanan_tujuan', harga = '$perjalanan_harga' 
    WHERE id_perjalanan='$id_perjalanan'";
    $exec = mysqli_query($conn, $query);
    if($exec) {
        header('Location: perjalanan.php?status=updated');
    }else {
    }
}
?>