<!-- Begin Page Content --> 
<div class="container-fluid"> 
    <div class="row"> 
        <div class="col-lg-9">
        <?= session()->getFlashdata('pesan');?>
            <form action="<?= base_url('ubah/asal').'/'.$data['id'];?>" enctype="multipart/form-data" method="post">
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Kota Asal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="asal" name="asal" value="<?= $data['asal'];?>">
                        <small class="text-danger pl-1"><?= $validation->getError('asal');?></small>
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
