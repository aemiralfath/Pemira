        
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
                            <li class="<?php if($active == 1) echo "active"; ?>"><a href="<?= site_url('admin') ?>"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>
                            <li class="<?php if($active == 2) echo "active"; ?>">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Daftar Pemilih Tetap</span></a>
                                <ul class="collapse">
                                    <li class="<?php if($content == "daftar-pemilih") { if($id == 1) echo "active"; } ?>"><a href="<?= site_url('admin/daftar-pemilih') ?>">Belum Memilih</a></li>
                                    <li class="<?php if($content == "daftar-pemilih") { if($id == 2) echo "active"; } ?>"><a href="<?= site_url('admin/daftar-pemilih/2') ?>">Sudah Memilih</a></li>
                                </ul>
                            </li>
                            <li class="<?php if($active == 4) echo "active"; ?>">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Riwayat</span></a>
                                <ul class="collapse">
                                    <li class="<?php if($content == "riwayat") { if($id == 1) echo "active"; } ?>"><a href="<?= site_url('admin/riwayat') ?>">Generate Code</a></li>
                                    <li class="<?php if($content == "riwayat") { if($id == 2) echo "active"; } ?>"><a href="<?= site_url('admin/riwayat/2') ?>">Vote</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
