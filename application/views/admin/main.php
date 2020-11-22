            
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
                    
                </div>
            </div>