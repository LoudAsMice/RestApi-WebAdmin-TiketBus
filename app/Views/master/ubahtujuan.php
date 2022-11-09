<!-- Begin Page Content --> 
<div class="container-fluid"> 
    <div class="row"> 
        <div class="col-lg-9">
        <?= session()->getFlashdata('pesan');?>
            <form action="<?= base_url('ubah/tujuan').'/'.$data['id'];?>" enctype="multipart/form-data" method="post">
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Kota Tujuan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tujuan" name="tujuan" value="<?= $data['tujuan'];?>">
                        <small class="text-danger pl-1"><?= $validation->getError('tujuan');?></small>
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
