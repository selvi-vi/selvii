<?php include 'config.php';

if(isset($_POST['id_pengemudi'])) { 
    $id_pengemudi = $_POST['id_pengemudi']; 
    $exec =mysqli_query($conn, "SELECT * FROM pengemudi WHERE id_pengemudi='$id_pengemudi' ");
    $pengemudi = mysqli_fetch_assoc($exec);
    ?>
    <form action="proses_pengemudi.php" method="POST">
        <div class="form-group">
            <input type="hidden" class="form-control" name="id_pengemudi" value="<?= $pengemudi['id_pengemudi'] ?>">
        </div>
        <div class="form-group">
            <label>Nama Pengemudi</label>
            <input type="text" class="form-control" name="nama_pengemudi" value="<?= $pengemudi['nama_pengemudi'] ?>">
        </div>
        <div class="form-group">
            <label>No Telpon</label>
            <input type="text" class="form-control" name="no_telp" value="<?= $pengemudi['no_telp'] ?>">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" name="update" class="btn btn-warning">Update</button> 
        </div>
        </form> 
        <?php }

?>