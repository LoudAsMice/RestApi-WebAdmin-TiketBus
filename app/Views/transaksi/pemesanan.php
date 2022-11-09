<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <?= session()->getFlashdata('pesan');?>
            <table class="table table-hover table-responsive" id="dataTable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order ID</th>
                        <th scope="col">ID User</th>
                        <th scope="col">ID Tiket</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No. HP</th>
                        <th scope="col">Jumlah Tiket</th>
                        <th scope="col">Asal</th>
                        <th scope="col">Tujuan</th>
                        <th scope="col">Tanggal Berangkat</th>
                        <th scope="col">Jam Berangkat</th>
                        <th scope="col">Harga Satuan</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1; 
                    foreach($data as $a) {?>
                    <tr>
                        <td><?= $i++;?></td>
                        <td><?= $a['id'];?></td>
                        <td><?= $a['id_user'];?></td>
                        <td><?= $a['id_tiketbus'];?></td>
                        <td><?= $a['nama'];?></td>
                        <td><?= $a['hp'];?></td>
                        <td><?= $a['jumlah'];?></td>
                        <td><?= $a['asal'];?></td>
                        <td><?= $a['tujuan'];?></td>
                        <td><?= $a['tanggal'];?></td>
                        <td><?= $a['jam'];?></td>
                        <td><?= $a['satuan'];?></td>
                        <td><?= $a['total'];?></td>
                        <td><b><?= $a['status'];?></b></td>
                        <td><?php if($a['status'] == 'Sudah Bayar') {?>
                            <a href="<?= base_url('ubah/belum').'/'.$a['id'];?>" class="badge badge-danger"><i class="fas fa-times"></i> Belum Bayar</a>
                            <?php } else {?>
                                <a href="<?= base_url('ubah/sudah').'/'.$a['id'];?>" class="badge badge-success"><i class="fas fa-check-circle"></i> Sudah Bayar</a>
                            <?php }?>
                            <a href="<?= base_url('hapus/pemesanan').'/'.$a['id'];?>" class="badge badge-danger" onclick="return confirm('Anda yakin akan menghapus data pemesanan atas nama <?= $a['nama']?>')"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End of Main Content -->