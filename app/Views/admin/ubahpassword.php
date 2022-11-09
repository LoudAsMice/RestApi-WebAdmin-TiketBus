<!-- Begin Page Content --> 
<div class="container-fluid"> 
    <div class="row"> 
        <div class="col-lg-9">
        <?= session()->getFlashdata('pesan');?>
            <form action="<?= base_url('ubah/password')?>" enctype="multipart/form-data" method="post">
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Password Lama</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="lama" name="lama">
                        <small class="text-danger pl-1"><?= $validation->getError('lama');?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Password Baru</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="baru" name="baru">
                        <small class="text-danger pl-1"><?= $validation->getError('baru');?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="konfirmasi" name="konfirmasi">
                        <small class="text-danger pl-1"><?= $validation->getError('konfirmasi');?></small>
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button class="btn btn-dark" onclick="history.back();return false"> Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>
