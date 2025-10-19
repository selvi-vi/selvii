<?php

include("config.php");

if (isset($_POST['simpan'])) {
    $nama_pengemudi = $_POST['nama_pengemudi'];
    $no_telp = $_POST['no_telp'];
    $query ="INSERT INTO pengemudi (nama_pengemudi, no_telp) VALUES ('$nama_pengemudi', '$no_telp')"; 
    $exec = mysqli_query($conn, $query);
    if ($exec) {
        header('Location: pengemudi.php?status=added');
    }
}

if(isset($_GET['id_pengemudi'])) {
    $id_pengemudi = $_GET['id_pengemudi'];
    $query = "CALL deletepengemudi(?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id_pengemudi);
    $exec = mysqli_stmt_execute($stmt);
    if($exec) {
        header('Location: pengemudi.php?status=deleted');
    }
}

if(isset($_POST['update'])) {
    $id_pengemudi = $_POST['id_pengemudi']; 
    $nama_pengemudi = $_POST['nama_pengemudi'];
    $no_telp = $_POST['no_telp'];
    $query ="UPDATE pengemudi SET nama_pengemudi = '$nama_pengemudi', no_telp = '$no_telp' WHERE id_pengemudi='$id_pengemudi' ";
    $exec = mysqli_query($conn, $query);
    if($exec) {
        header('Location: pengemudi.php?status=updated');
    }else {
    }
}
?>