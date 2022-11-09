<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <?= session()->getFlashdata('pesan');?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#materiBaruModal"><i class="fas fa-file-alt"> Tambah Kota Asal</i></a>
            <table class="table table-hover table-primary table-stripped" id="dataTable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kota</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 1; 
                    foreach($asal as $a) {?>
                    <tr>
                        <td><?= $i++;?></td>
                        <td><?= $a['asal'];?></td>
                        <td>
                        <a href="<?= base_url('ubah/asal').'/'.$a['id'];?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                            <a href="<?= base_url('hapus/asal').'/'.$a['id'];?>" class="badge badge-danger" onclick="return confirm('Anda yakin akan menghapus kota asal <?= $a['asal'];?>')"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<!-- Modal Tambah Materi baru -->
<div class="modal fade" id="materiBaruModal" tabindex="-1" role="dialog" aria-labelledby="materiBaruModalLabel" aria-hidden="true"> 
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="materiBaruModalLabel">
                    Tambah Kota Asal
                </h5>
                <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('master/asal');?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="asal" name="asal" placeholder="Masukkan Kota Asal">
                    <small class="text-danger pl-1"><?= $validation->getError('asal');?></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Menu -->