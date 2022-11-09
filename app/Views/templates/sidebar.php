<!-- Sidebar -->
<ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion toggled" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin')?>">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-bus"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Tiket Bus</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Heading -->
<div class="sidebar-heading">
    Menu
</div>

<!-- Nav Item - Dashboard -->

<li class="nav-item active">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#master"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa fa-cubes"></i>
            <span>Master</span>
        </a>
        <div id="master" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-gray-800 py-2 collapse-inner rounded">
                <h6 class="collapse-header text-light">Pilih:</h6>
                <a class="collapse-item text-light" href="<?= base_url('master/asal')?>">Kota Asal</a>
                <a class="collapse-item text-light" href="<?= base_url('master/tujuan')?>">Kota Tujuan</a>
                <a class="collapse-item text-light" href="<?= base_url('master/member')?>">Member</a>
            </div>
        </div>
    </li>
</li>

<li class="nav-item active">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#transaksi"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa fa-signal"></i>
            <span>Transaksi</span>
        </a>
        <div id="transaksi" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-gray-800 py-2 collapse-inner rounded">
                <h6 class="collapse-header text-light">Pilih:</h6>
                <a class="collapse-item text-light" href="<?= base_url('transaksi/penjadwalan')?>">Penjadwalan</a>
                <a class="collapse-item text-light" href="<?= base_url('transaksi/pemesanan')?>">Pemesanan</a>
            </div>
        </div>
    </li>
</li>

<li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('laporan');?>">
        <i class="fa fa-fw fa-database"></i>
        <span>Laporan</span>
        </a>
    </li>

<!-- Divider -->
<hr class="sidebar-divider mt-3">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->