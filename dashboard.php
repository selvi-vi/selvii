<?php
include 'config.php';
include '.includes/header.php';

$title = "Post";
include '.includes/toast_messages.php';
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">table /</span>Semua pemesanan</h4>
     <div class="card">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Semua Pemesanan</h4>
                <button type="button" class="btn btn-primary" onclick="window.location.href='pemesanan.php'">
                Tambah Data 
            </button>
        </div>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="datatable" class="table table-hover">
                     <thead>
                      <tr class="text-center">
                        <th width="50px">#</th> 
                        <th >Nama Pemesan</th>
                        <th >tanggal Pesan</th>
                        <th >jumlah Penumpang</th>
                        <th >Asal</th>
                        <th >Tujuan</th>
                        <th >Total Harga</th>
                        <th >Nama pengemudi</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                <?php
                  $index=1;
                  $query = "SELECT pemesanan.*, user.name as user_name,
                  perjalanan.asal,perjalanan.tujuan,perjalanan.harga, pengemudi.nama_pengemudi FROM pemesanan INNER JOIN user ON
                  pemesanan.user_id = user.user_id LEFT JOIN perjalanan ON 
                  pemesanan.id_perjalanan = perjalanan.id_perjalanan
                  LEFT JOIN pengemudi ON pemesanan.id_pengemudi = pengemudi.id_pengemudi
                  WHERE pemesanan.user_id = $userId";
                  $exec = mysqli_query($conn,$query);
                  while($data = mysqli_fetch_assoc($exec)) :
                ?>
                <tr>
                  <td><?= $index++; ?></td>
                  <td><?= $data['nama_pemesan']; ?></td>
                  <td><?= $data['tgl_pesan']; ?></td>
                  <td><?= $data['jumlah_penumpang']; ?></td>
                  <td><?= $data['asal']; ?></td>
                  <td><?= $data['tujuan']; ?></td>
                  <td><?= $data['harga']; ?></td>
                  <td><?= $data['nama_pengemudi']; ?></td>
                  <td>
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle 
                        hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i> 
                    </button> 
                    <div class="dropdown-menu">
                     <a href="edit_pesan.php?id_pemesanan=<?php echo $data['id_pemesanan']; ?>"
                     class="dropdown-item">
                     <i class= "bx bx-edit-alt me-2"></i> Edit</a>
                     <a href="proses_pemesanan.php?id_pemesanan=<?php echo $data['id_pemesanan']; ?>"
                     class="dropdown-item">
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
  </div>
</div>



<?php include '.includes/footer.php'; ?>