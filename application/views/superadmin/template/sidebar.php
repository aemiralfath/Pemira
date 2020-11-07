        
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="<?= base_url() ?>assets/images/icon/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="<?php if($active == 1) echo "active"; ?>"><a href="<?= site_url('superadmin') ?>"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>
                            <li class="<?php if($active == 2) echo "active"; ?>"><a href="<?= site_url('superadmin/daftar-admin') ?>"><i class="ti-map-alt"></i> <span>Daftar Admin</span></a></li>
                            <li class="<?php if($active == 3) echo "active"; ?>">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Daftar Pemilih Tetap</span></a>
                                <ul class="collapse">
                                    <li class="<?php if($active == 3) echo "active"; ?>"><a href="<?= site_url('superadmin/daftar-pemilih') ?>">Belum Memilih</a></li>
                                    <li class="<?php if($active == 3) echo "active"; ?>"><a href="index2.html">Sudah Memilih</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
