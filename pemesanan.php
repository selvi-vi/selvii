<?php
include 'config.php';
include '.includes/header.php';

?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span>Pemesanan Baru</h4>
    <div class="row">

        <div class="card mb-4">
                <h5 class="card-header">Pemesanan Baru</h5>
                <div class="card-body">
                  <div class="row gx-3 gy-2 align-items-center">
                <div class="card-body">
                    <form method="POST" action="proses_pemesanan.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama_pemesan" class="form-label">Nama pemesan</label>
                            <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" required>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_pesan" class="form-label">Tanggal pesan</label>
                            <input type="date" class="form-control" id="tgl_pesan" name="tgl_pesan" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_penumpang" class="form-label">Jumlah Penumpang</label>
                            <input type="number" class="form-control" id="jumlah_penumpang" name="jumlah_penumpang" required>
                        </div>
                        <div class="mb-3">
                            <label for="id_perjalanan" class="form-label">Asal</label>
                            <select class="form-select" id="id_perjalanan" name="id_perjalanan" required>

                                <option value="" selected disabled>Pilih</option>
                                <?php
                                $query = "SELECT * FROM perjalanan";
                                $result = $conn->query($query);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row["id_perjalanan"] . "'>" . $row["asal"] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_perjalanan" class="form-label">Tujuan</label>
                            <select class="form-select" id="id_perjalanan" name="id_perjalanan" required>

                                <option value="" selected disabled>Pilih</option>
                                <?php
                                $query = "SELECT * FROM perjalanan";
                                $result = $conn->query($query);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row["id_perjalanan"] . "'>" . $row["tujuan"] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                            </div>
                            <div class="modal fade">
                            <label for="harga" class="form-label"></label>
                            <input type="hidden" class="form-control" id="harga" name="harga" required>
                        </div>
                        <div class="mb-3">
                            <label for="id_pengemudi" class="form-label">Nama Pengemudi</label>
                            <select class="form-select" id="id_pengemudi" name="id_pengemudi" required>

                                <option value="" selected disabled>Pilih</option>
                                <?php
                                $query = "SELECT * FROM pengemudi";
                                $result = $conn->query($query);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row["id_pengemudi"] . "'>" . $row["nama_pengemudi"] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '.includes/footer.php'; ?>