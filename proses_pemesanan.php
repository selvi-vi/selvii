<?php
include 'config.php';

// Start or resume the session
session_start();
// Get user_id from session (you need to set this when the user logs in)
if (isset($_SESSION["user_id"])) {
  $userId = $_SESSION["user_id"];
} else {
    
    echo "Error: user_id not set in the session.";
    exit();
}

if (isset($_POST['simpan'])) {
    $nama_pesan = $_POST["nama_pemesan"]; 
    $tgl_pesan = $_POST["tgl_pesan"];
    $jml_penumpang = $_POST["jumlah_penumpang"];
    $id_perjalanan = $_POST["id_perjalanan"];
    $id_pengemudi = $_POST["id_pengemudi"];
    $query = "INSERT INTO pemesanan (nama_pemesan, tgl_pesan, jumlah_penumpang,
    id_perjalanan, id_pengemudi, user_id) VALUES ('$nama_pesan',
    '$tgl_pesan', '$jml_penumpang', '$id_perjalanan','$id_pengemudi', '$userId')";

    if ($conn->query($query) == TRUE) {
    header('Location: dashboard.php?status=added'); 
    exit();
} else {
    echo "Error: " . $query. "<br>" . $conn->error;
 }
}
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pesan = $_POST['id_pemesanan'];
    $nama_pesan = $_POST["nama_pemesan"];
    $tgl_pesan = $_POST["tgl_pesan"];
    $jml_penumpang = $_POST["jumlah_penumpang"];
    $id_perjalanan = $_POST["id_perjalanan"];
    $id_pengemudi = $_POST["id_pengemudi"];
    $query = "UPDATE pemesanan SET nama_pemesan='$nama_pesan',
    tgl_pesan='$tgl_pesan', jumlah_penumpang='$jml_penumpang', id_perjalanan='$id_perjalanan', id_pengemudi='$id_pengemudi'
    WHERE id_pemesanan='$id_pesan'";
    if ($conn->query($query) === TRUE) {
        header('Location: dashboard.php?status=updated');
        exit();
} else {
    echo "Error: " . $query. "<br>" . $conn->error;
}
}

if (isset($_GET['id_pemesanan'])) {
  $id_pesan = $_GET['id_pemesanan'];
  $queryDelete = "DELETE FROM pemesanan WHERE id_pemesanan = '$id_pesan'";
  if ($conn->query($queryDelete) === TRUE) {
    header('Location: dashboard.php?status=deleted');
    exit();
} else {
    echo "Error: " . $queryDelete . "<br>" . $conn->error;
}
} else {
    echo "Post ID not provided.";
}
?>