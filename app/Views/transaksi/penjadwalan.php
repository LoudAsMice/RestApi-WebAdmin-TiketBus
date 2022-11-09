<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <?= session()->getFlashdata('pesan');?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#asalBaruModal"><i class="fas fa-file-alt"> Tambah Jadwal</i></a>
            <table class="table table-hover table-primary table-stripped" id="dataTable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kota Asal</th>
                        <th scope="col">Kota Tujuan</th>
                        <th scope="col">Tanggal Berangkat</th>
                        <th scope="col">Jam Berangkat</th>
                        <th scope="col">Harga Tiket (Rp)</th>
                        <th scope="col">Seat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 1; 
                    foreach($jadwal as $a) {?>
                    <tr>
                        <td><?= $i++;?></td>
                        <td><?= $a['asal'];?></td>
                        <td><?= $a['tujuan'];?></td>
                        <td><?= $a['tanggal'];?></td>
                        <td><?= $a['jam'];?></td>
                        <td><?= $a['harga'];?></td>
                        <td><?= $a['tersedia'];?></td>
                        <td>
                        <a href="<?= base_url('ubah/jadwal').'/'.$a['id'];?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                            <a href="<?= base_url('hapus/jadwal').'/'.$a['id'];?>" class="badge badge-danger" onclick="return confirm('Anda yakin akan menghapus data jadwal <?= $a['asal']?> -> <?= $a['tujuan']?>')"><i class="fas fa-trash"></i> Hapus</a>
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
<div class="modal fade" id="asalBaruModal" tabindex="-1" role="dialog" aria-labelledby="asalBaruModalLabel" aria-hidden="true"> 
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="asalBaruModalLabel">
                    Tambah Jadwal
                </h5>
                <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('transaksi/penjadwalan');?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <select name="asal" class="form-control form-control-user">
                        <option value="">-- Pilih Asal Kota --</option>
                        <?php foreach($asal as $a) {?>
                        <option value="<?= $a['asal'];?>"><?= $a['asal'];?></option>
                        <?php }?>
                    </select>
                    <small class="text-danger pl-1"><?= $validation->getError('asal');?></small>
                </div>
                <div class="form-group">
                    <select name="tujuan" class="form-control form-control-user">
                        <option value="">-- Pilih Tujuan Kota --</option>
                        <?php foreach($tujuan as $a) {?>
                        <option value="<?= $a['tujuan'];?>"><?= $a['tujuan'];?></option>
                        <?php }?>
                    </select>
                    <small class="text-danger pl-1"><?= $validation->getError('tujuan');?></small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="tanggal" name="tanggal" placeholder="Tanggal format: dd/mm/yyyy" value="<?= old('tanggal');?>">
                    <small class="text-danger pl-1"><?= $validation->getError('tanggal');?></small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="jam" name="jam" placeholder="Jam Berangkat"value="<?= old('jam');?>">
                    <small class="text-danger pl-1"><?= $validation->getError('jam');?></small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="harga" name="harga" placeholder="Harga Tiket" value="<?= old('harga');?>">
                    <small class="text-danger pl-1"><?= $validation->getError('harga');?></small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="tersedia" name="tersedia" placeholder="Seat" value="<?= old('tersedia');?>">
                    <small class="text-danger pl-1"><?= $validation->getError('tersedia');?></small>
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