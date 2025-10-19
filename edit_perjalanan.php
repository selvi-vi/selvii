<?php include 'config.php';

if(isset($_POST['id_perjalanan'])) { 
    $id_perjalanan = $_POST['id_perjalanan']; 
    $exec =mysqli_query($conn, "SELECT * FROM perjalanan WHERE id_perjalanan='$id_perjalanan' ");
    $perjalanan = mysqli_fetch_assoc($exec);
    ?>
    <form action="proses_perjalanan.php" method="POST">
        <div class="form-group">
            <input type="hidden" class="form-control" name="id_perjalanan" value="<?= $perjalanan['id_perjalanan'] ?>">
        </div>
        <div class="form-group">
            <label>Asal</label>
            <input type="text" class="form-control" name="asal" value="<?= $perjalanan['asal'] ?>">
        </div>
        <div class="form-group">
            <label>Tujuan</label>
            <input type="text" class="form-control" name="tujuan" value="<?= $perjalanan['tujuan'] ?>">
        </div>
        <div class="form-group">
            <label>Total Harga</label>
            <input type="text" class="form-control" name="harga" value="<?= $perjalanan['harga'] ?>">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" name="update" class="btn btn-warning">Update</button> 
        </div>
        </form> 
        <?php }

?>