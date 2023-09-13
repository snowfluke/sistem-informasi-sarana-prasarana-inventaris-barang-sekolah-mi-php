<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <!-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> -->
        <div class="sidebar-brand-text mx-3">SARPRAS Mi Nurjalin Pesahangan</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Beranda -->
    <li class="nav-item <?=isset($home)?'active':'';?>">
        <a class="nav-link" href="?#">
            <i class="fas fa-fw fa-home"></i>
            <span>Dasboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>
    <?php if(isset($_SESSION['role'])):?>
        <!-- Nav Item - Pages Collapse Menu -->
        
        <?php if($_SESSION['role'] == 'admin'):?>
            <li class="nav-item <?=isset($master)?'active':'';?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#master" aria-expanded="true"
            aria-controls="master">
            <i class="fas fa-fw fa-folder"></i>
            <span>Master</span>
        </a>
        <div id="master" class="collapse <?=isset($master)?'show':'';?>" aria-labelledby="headingTwo"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?=isset($merek)?'active':'';?>" href="?merek">Merek</a>
            <a class="collapse-item <?=isset($kategori)?'active':'';?>" href="?kategori">Kategori</a>
            <a class="collapse-item <?=isset($ruangan)?'active':'';?>" href="?ruangan">Ruangan</a>
            <a class="collapse-item <?=isset($kondisi)?'active':'';?>" href="?kondisi">Kondisi</a>
        </div>
    </div>
</li>
<?php endif; ?>

 <?php if($_SESSION['role'] == 'admin'):?>
            <li class="nav-item <?=isset($inventaris)?'active':'';?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#inventaris" aria-expanded="true"
            aria-controls="inventaris">
            <i class="fas fa-fw fa-folder"></i>
            <span>Sarpras</span>
        </a>
        <div id="inventaris" class="collapse <?=isset($inventaris)?'show':'';?>" aria-labelledby="headingTwo"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?=isset($lahan)?'active':'';?>" href="?lahan">Data Lahan</a>
            <a class="collapse-item <?=isset($bangunan)?'active':'';?>" href="?bangunan">Data Bangunan</a>
            <a class="collapse-item <?=isset($barang)?'active':'';?>" href="?barang">Data Barang</a>
        </div>
    </div>
</li>
<?php endif; ?>


<?php if($_SESSION['role'] == 'admin'):?>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?=isset($transaksi)?'active':'';?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#transaksi" aria-expanded="true"
            aria-controls="transaksi">
            <i class="fas fa-fw fa-folder"></i>
            <span>Transaksi</span>
        </a>
        <div id="transaksi" class="collapse <?=isset($transaksi)?'show':'';?>" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?=isset($barang_masuk)?'active':'';?>" href="?barang_masuk">Barang Masuk</a>
                <a class="collapse-item <?=isset($barang_keluar)?'active':'';?>" href="?barang_keluar">Barang Keluar</a>
                <a class="collapse-item <?=isset($pinjam)?'active':'';?>" href="?pinjam">Peminjaman</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?=isset($laporan)?'active':'';?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true"
            aria-controls="laporan">
            <i class="fas fa-fw fa-folder"></i>
            <span>Laporan</span>
        </a>
        <div id="laporan" class="collapse <?=isset($laporan)?'show':'';?>" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?=isset($lap_barang_masuk)?'active':'';?>" href="?lap_barang_masuk">
                    Laporan Barang Masuk</a>
                <a class="collapse-item <?=isset($lap_barang_keluar)?'active':'';?>" href="?lap_barang_keluar">
                    Laporan Barang Keluar</a>
                <a class="collapse-item <?=isset($lap_pinjam)?'active':'';?>" href="?lap_pinjam">
                    Laporan Peminjaman</a>
                <a class="collapse-item <?=isset($lap_barang)?'active':'';?>" href="?lap_barang">
                    Laporan Data Barang</a>
            </div>
        </div>
    </li>
    <?php endif; ?>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->