<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <?= session()->getFlashdata('pesan');?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#materiBaruModal"><i class="fas fa-search"> Filter</i></a>
            <h3 style="text-align: center;"><?php echo $text;?></h3>
            <table class="table table-hover table-primary table-stripped" id="dataTable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order ID</th>
                        <th scope="col">ID Tiket</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Tanggal Pesan</th>
                        <th scope="col">Email Member</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 1; 
                    foreach($cari as $a) {?>
                    <tr>
                        <td><?= $i++;?></td>
                        <td><?= $a['id'];?></td>
                        <td><?= $a['id_tiketbus'];?></td>
                        <td><?= $a['jumlah'];?></td>
                        <td><?= $a['tanggal'];?></td>
                        <td><?= $a['email'];?></td>
                        <td><?= $a['total'];?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
            <br><br>
            <h5 id="grandtotal" style="font-weight: bold; text-align: center;"></h5>
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
                    Filter
                </h5>
                <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('laporan');?>" method="get" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="awal" name="awal" placeholder="Masukkan Tanggal Awal">
                    <small class="text-danger pl-1"><?= $validation->getError('awal');?></small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="akhir" name="akhir" placeholder="Masukkan Tanggal Akhir">
                    <small class="text-danger pl-1"><?= $validation->getError('akhir');?></small>
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

<script>
    var table = document.getElementById("dataTable"), sumVal = 0;

    for(var i = 1; i < table.rows.length; i++)
    {
        sumVal = sumVal + parseInt(table.rows[i].cells[6].innerHTML);
    }

    document.getElementById("grandtotal").innerHTML = "Grand Total: Rp." + sumVal + ",-";
    console.log(sumVal);
</script>
<!-- End of Modal Tambah Menu -->