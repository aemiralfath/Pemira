            
            <div class="main-content-inner">
                <div class="row">
                    <!-- seo fact area start -->
                    
                    <div class="col-md-4 mt-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg1">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="fa fa-users"></i> Pemilih</div>
                                    <h2><?= number_format($pemilih) ?></h2>
                                </div>
                                <canvas id="seolinechart1" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-md-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg2">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="fa fa-check-square-o"></i> Telah Memilih</div>
                                    <h2><?= number_format($memilih) ?></h2>
                                </div>
                                <canvas id="seolinechart2" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-md-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg4">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="fa fa-user-times"></i> Belum Memilih</div>
                                    <h2><?= number_format(($pemilih - $memilih)) ?></h2>
                                </div>
                                <canvas id="seolinechart4" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Daftar Pemilih</h4>
                                <div class="table-responsive">
                                    <table id="tabel" class="table table-striped table-bordered" cellspasing = "0" width="100%">
                                        <thead class="unique-color-dark">
                                            <tr>
                                                <td>NIM</td>
                                                <td>Nama</td>
                                                <td>Jenis Kelamin</td>
                                                <td>Jurusan</td>
                                                <td>Angkatan</td>
                                                <td>Status</td>
                                                <td>Actions</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($data_pemilih as $f){ ?>
                                            <tr>
                                                <td><?=$f->nim?></td>
                                                <td><?=$f->nama?></td>
                                                <td><?php
                                                    if($f->jenis_kelamin==1){
                                                        echo 'Laki-laki';
                                                    }else{
                                                        echo 'Perempuan';
                                                    }
                                                ?></td>
                                                <td><?=$f->jurusan?></td>
                                                <td><?=$f->angkatan?></td>
                                                <td></td>
                                                <td class="text-center">
                                                    <!-- <a href="<?= site_url('admin/edit_finalis/'.$f->id_finalis)?>" class="btn btn-amber btn-sm mr-auto px-3 m-0">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a href="<?= site_url('admin/hapus_finalis/'.$f->id_finalis)?>" class="btn btn-amber btn-sm mr-auto px-3 m-0">
                                                        <i class="fas fa-trash"></i>
                                                    </a> -->
                                                </td>
                                                
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot class="unique-color-dark">
                                            <tr>
                                                <td>NIM</td>
                                                <td>Nama</td>
                                                <td>Jenis Kelamin</td>
                                                <td>Jurusan</td>
                                                <td>Angkatan</td>
                                                <td>Status</td>
                                                <td>Actions</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>