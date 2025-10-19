<?php
include 'config.php';
include '.includes/header.php';

$title = "Kategori";
include '.includes/toast_messages.php';
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class=" text-muted fw-light">Dashboard/</span>Riwayat</h4>
    <div class="card">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Riwayat Kategori</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="datatable" class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th width="50px">#</th>
                                <th>Action</th>
                                <th>Perubahan</th>
                                <th>Waktu</th>
                                
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            <?php
                            $index=1;
                            $query = "SELECT * FROM historypesan ";
                            $exec = mysqli_query($conn,$query);

                            if (!$exec) {
                                die("Query failed: " . mysqli_error($conn));
                            }
                            
                            while($kategori = mysqli_fetch_assoc($exec)) :
                            ?>

                            <tr >
                                <td><?= $index++; ?></td>
                                <td><?= $kategori['action']; ?> </td>
                                
                                <td><?= $kategori['nama_pemesan']; ?> </td>
                                <td><?= $kategori['created_at']; ?> </td>
                                
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

