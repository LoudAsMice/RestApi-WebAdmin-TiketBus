<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <?= session()->getFlashdata('pesan');?>
            <table class="table table-hover table-primary table-stripped" id="dataTable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 1; 
                    foreach($data as $a) {?>
                    <tr>
                        <td><?= $i++;?></td>
                        <td><?= $a['nama'];?></td>
                        <td><?= $a['email'];?></td>
                        <td>
                        <a href="<?= base_url('ubah/member').'/'.$a['id'];?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                            <a href="<?= base_url('hapus/member').'/'.$a['id'];?>" class="badge badge-danger" onclick="return confirm('Anda yakin akan menghapus member <?= $a['nama'];?>')"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End of Main Content -->
