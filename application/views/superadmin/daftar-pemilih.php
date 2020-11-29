
        <div class="main-content-inner">
            <div class="card mt-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select id="jurusan" class="custom-select">
                                            <option value="all">Semua Jurusan</option>
                                            <?php foreach($jurusan as $jrs) { ?>
                                            <option value="<?= $jrs->id_jurusan ?>"><?= $jrs->nama_jurusan ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select id="angkatan" class="custom-select">
                                            <option value="all">Semua Angkatan</option>
                                            <?php for($i = $angkatan->mins; $i <= $angkatan->maks; $i++) { ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <a href="<?= site_url('superadmin/ekspor-excel/all/all/'.($id - 1)) ?>" target="_blank" id="excel" class="btn btn-sm btn-success mr-3">Ekspor Excel</a>
                                <a href="<?= site_url('superadmin/ekspor-pdf/all/all/'.($id - 1)) ?>" target="_blank" id="pdf" class="btn btn-sm btn-danger">Ekspor PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <div class="data-tables datatable-dark table-striped">
                        <table id="tbdata" class="text-center">
                            <thead>
                                <tr>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Jurusan</th>
                                    <th>Angkatan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
