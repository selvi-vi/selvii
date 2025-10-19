<?php
include 'config.php';
include '.includes/header.php';

$title ="Data";
include '.includes/toast_messages.php';

?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard/</span> Perjalanan</h4>
    <!-- Hoverable Table rows -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Perjalanan</h4>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPerjalananModal">
                Tambah 
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table id="datatable" class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th width="50px">#</th>
                            <th >Asal</th>
                            <th >Tujuan</th>
                            <th >Total Harga</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <!-- Query untuk membaca data dari tabel Database (webspp) --> 
                    <?php
                    $index=1;
                    $query = "SELECT * FROM perjalanan";
                    $exec = mysqli_query($conn,$query);
                    while($perjalanan = mysqli_fetch_assoc($exec)) :
                    ?>
                    <tr>
                      <td><?= $index++; ?></td>
                      <td><?= $perjalanan['asal']; ?></td>
                      <td><?= $perjalanan['tujuan']; ?></td>
                      <td><?= $perjalanan['harga']; ?></td>
                      <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a href="#editPerjalananModal" id="<?= $perjalanan['id_perjalanan']; ?>" data-toggle="modal"
                                class="edit_data dropdown-item">
                            <i class="bx bx-edit-alt me-2"></i> Edit</a>
                            <a href="proses_perjalanan.php?id_perjalanan=<?= $perjalanan['id_perjalanan'] ?>"
                            class="dropdown-item" onclick="return confirm('Apakah Yakin Ingin Menghapus Data?')">
                          <i class="bx bx-trash me-2"></i> Delete</a>
                            </div>
                        </div>
                      </td>
                    </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Hoverable Table rows --> 
</div>

<?php include '.includes/footer.php'; ?>

<!-- Modal Tambah perjalanan -->
<div class="modal fade" id="addPerjalananModal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Tambah Data</h5>
        <button 
        type="button"
        class="btn-close"
        data-bs-dismiss="modal"
        aria-label="Close"
        ></button>
    </div>
    <div class="modal-body">
        <form action="proses_perjalanan.php" method="POST" >
            <div>
                <label for="asal" class="form-label">Asal</label>
                <input type="text" class="form-control" name="asal"/>
            </div>
            <div>
                <label for="tujuan" class="form-label">Tujuan</label>
                <input type="text" class="form-control" name="tujuan"/>
            </div>
            <div>
                <label for="harga" class="form-label">Total Harga</label>
                <input type="text" class="form-control" name="harga"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Batal
                </button>
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    </div>
</div>
</div>
<!-- Modal Update perjalanan -->
<div class="modal fade" id="editPerjalananModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Update Data Perjalanan</h5>
                <button 
                 type="button"
                 class="btn-close"
                 data-bs-dismiss="modal"
                 aria-label="Close"
                 ></button>
            </div>
            <div class="modal-body" id="dataperjalanan">
            </div>
        </div>
    </div>
</div>

<script>
    $('.edit_data').click(function(){
        let PerjalananID = $(this).attr('id');
        $.ajax({
            url: 'edit_perjalanan.php',
            method: 'POST',
            data: {id_perjalanan:PerjalananID},
            success:function(data){
                $('#dataperjalanan').html(data)
                $('#editPerjalananModal').modal('show');
            }
        })
    })
</script>