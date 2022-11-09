<!-- Begin Page Content --> 
<div class="container-fluid"> 
    <div class="row"> 
        <div class="col-lg-9">
        <?= session()->getFlashdata('pesan');?>
            <form action="<?= base_url('ubah/jadwal').'/'.$data['id'];?>" enctype="multipart/form-data" method="post">
            <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Kota Asal</label>
                <div class="col-sm-10">
                    <select name="asal" class="form-control">
                        <option value="<?= $data['asal'];?>"><?= $data['asal'];?></option>
                        <?php foreach($asal as $a) {?>
                        <option value="<?= $a['asal'];?>"><?= $a['asal'];?></option>
                        <?php }?>
                    </select>
                    <small class="text-danger pl-1"><?= $validation->getError('asal');?></small>
                </div>
            </div>
            <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Kota Tujuan</label>
                <div class="col-sm-10">
                    <select name="tujuan" class="form-control form-control-user">
                        <option value="<?= $data['tujuan'];?>"><?= $data['tujuan'];?></option>
                        <?php foreach($tujuan as $a) {?>
                        <option value="<?= $a['tujuan'];?>"><?= $a['tujuan'];?></option>
                        <?php }?>
                    </select>
                    <small class="text-danger pl-1"><?= $validation->getError('tujuan');?></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Tanggal Berangkat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?= $data['tanggal'];?>">
                    <small class="text-danger pl-1"><?= $validation->getError('tanggal');?></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Jam Berangkat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="jam" name="jam" value="<?= $data['jam'];?>">
                    <small class="text-danger pl-1"><?= $validation->getError('jam');?></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="harga" name="harga" value="<?= $data['harga'];?>">
                    <small class="text-danger pl-1"><?= $validation->getError('harga');?></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Seat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tersedia" name="tersedia" value="<?= $data['tersedia'];?>">
                    <small class="text-danger pl-1"><?= $validation->getError('tersedia');?></small>
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
