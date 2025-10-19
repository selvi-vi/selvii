<?php
include 'config.php';
include '.includes/header.php';

$title ="Data";
include '.includes/toast_messages.php';

?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard/</span> Pengemudi</h4>
    <!-- Hoverable Table rows -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Pengemudi</h4>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPengemudiModal">
                Tambah Data
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table id="datatable" class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th width="50px">#</th>
                            <th >Nama Pengemudi</th>
                            <th >No Telpon</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                    <?php
                    $index=1;
                    $query = "SELECT * FROM pengemudi";
                    $exec = mysqli_query($conn,$query);
                    while($pengemudi = mysqli_fetch_assoc($exec)) :
                    ?>
                    <tr>
                      <td><?= $index++; ?></td>
                      <td><?= $pengemudi['nama_pengemudi']; ?></td>
                      <td><?= $pengemudi['no_telp']; ?></td>
                      <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a href="#editPengemudiModal" id="<?= $pengemudi['id_pengemudi']; ?>" data-toggle="modal"
                                class="edit_data dropdown-item">
                            <i class="bx bx-edit-alt me-2"></i> Edit</a>
                            <a href="proses_pengemudi.php?id_pengemudi=<?= $pengemudi['id_pengemudi'] ?>"
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

<!-- Modal Tambah pengemudi -->
<div class="modal fade" id="addPengemudiModal" tabindex="-1" aria-hidden="true">
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
        <form action="proses_pengemudi.php" method="POST" >
            <div>
                <label for="nama_pengemudi" class="form-label">Nama Pengemudi</label>
                <input type="text" class="form-control" name="nama_pengemudi"/>
            </div>
            <div>
                <label for="no_telp" class="form-label">No Telpon</label>
                <input type="text" class="form-control" name="no_telp"/>
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
</div>

<div class="modal fade" id="editPengemudiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Update Data Pengemudi</h5>
                <button 
                 type="button"
                 class="btn-close"
                 data-bs-dismiss="modal"
                 aria-label="Close"
                 ></button>
            </div>
            <div class="modal-body" id="datapengemudi">
            </div>
        </div>
    </div>
</div>

<script>
    $('.edit_data').click(function(){
        let PengemudiID = $(this).attr('id');
        $.ajax({
            url: 'edit_pengemudi.php',
            method: 'POST',
            data: {id_pengemudi:PengemudiID},
            success:function(data){
                $('#datapengemudi').html(data)
                $('#editPengemudiModal').modal('show');
            }
        })
    })
</script>