<?php
include 'config.php';
include '.includes/header.php';

// Ambil data post yang akan diedit dari database (gantilah ini demgan metode pengambilan data yang sesuai)
$pemesananIdToEdit = $_GET['id_pemesanan']; // Sesuaikan dengan cara Anda mendapatkan ID post yang akan di-edit
$query = "SELECT * FROM pemesanan WHERE id_pemesanan = $pemesananIdToEdit";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $post = $result->fetch_assoc();
} else {
    echo "Post not found.";
    exit();
}
?>

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Edit Pemesanan</h4>
  <div class="row">
    <!-- Form controls -->
    <div class="col-md-10">
    <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="proses_pemesanan.php">
                    <input type="hidden" name="id_pemesanan" value="<?php echo $pemesananIdToEdit; ?>"> 
                    <div class="mb-3">
                        <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                        <input type="text" class="form-control" id="nama_pemesan" 
                        name="nama_pemesan" value="<?php echo $post['nama_pemesan']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_pesan" class="form-label">Tanggal Pesan</label>
                        <input type="date" class="form-control" id="tgl_pesan" 
                        name="tgl_pesan" value="<?php echo $post['tgl_pesan']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_penumpang" class="form-label">Jumlah Penumpang</label>
                        <input type="number" class="form-control" id="jumlah_penumpang" 
                        name="jumlah_penumpang" value="<?php echo $post['jumlah_penumpang']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_perjalanan" class="form-label">Asal</label>
                        <select class="form-select" id="id_perjalanan" name="id_perjalanan" required>
                          <!-- Fetch categories from the database and populate the options --> 
                          <option value="" selected disabled>Select one</option>
                          <?php
                          $queryAsal = "SELECT * FROM perjalanan";
                          $resultAsal = $conn->query($queryAsal);
                          if ($resultAsal->num_rows > 0) {
                            while ($row = $resultAsal->fetch_assoc()) {
                                $selected = ($row["id_perjalanan"] == $post['id_perjalanan'])
                                 ? "selected" : "";
                                 echo "<option value='" . $row["id_perjalanan"] . "' $selected>"
                                 . $row["asal"] . "</option>";
                                }
                            }
                            ?>
                            </select>
                            </div>
                            <div class="mb-3">
                        <label for="id_perjalanan" class="form-label">Tujuan</label>
                        <select class="form-select" id="id_perjalanan" name="id_perjalanan" required>
                          <!-- Fetch categories from the database and populate the options --> 
                          <option value="" selected disabled>Select one</option>
                          <?php
                          $queryTujuan = "SELECT * FROM perjalanan";
                          $resulTujuan = $conn->query($queryTujuan);
                          if ($resulTujuan->num_rows > 0) {
                            while ($row = $resulTujuan->fetch_assoc()) {
                                $selected = ($row["id_perjalanan"] == $post['id_perjalanan'])
                                 ? "selected" : "";
                                 echo "<option value='" . $row["id_perjalanan"] . "' $selected>"
                                 . $row["tujuan"] . "</option>";
                                }
                            }
                            ?>
                            </select>
                            </div>
                            <div class="modal fade">
                        <label for="harga" class="form-label">Total Harga</label>
                        <input type="hidden" class="form-control" id="harga" 
                        name="harga" value="<?php echo $post['harga']; ?>" required>
                    </div>
                            <div class="mb-3">
                        <label for="id_pengemudi" class="form-label">Nama Pengemudi</label>
                        <select class="form-select" id="id_pengemudi" name="id_pengemudi" required>
                          <!-- Fetch categories from the database and populate the options --> 
                          <option value="" selected disabled>Select one</option>
                          <?php
                          $querynama = "SELECT * FROM pengemudi";
                          $resulnama = $conn->query($querynama);
                          if ($resulnama->num_rows > 0) {
                            while ($row = $resulnama->fetch_assoc()) {
                                $selected = ($row["id_pengemudi"] == $post['id_pengemudi'])
                                 ? "selected" : "";
                                 echo "<option value='" . $row["id_pengemudi"] . "' $selected>"
                                 . $row["nama_pengemudi"] . "</option>";
                                }
                            }
                            ?>
                            </select>
                            </div>
                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include '.includes/footer.php'; ?>