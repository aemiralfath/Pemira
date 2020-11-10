
        <div class="main-content-inner">
            <div class="row mt-4">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <?= $this->session->flashdata('msg') ?>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead class="text-uppercase bg-dark">
                                            <tr class="text-white">
                                                <th scope="col">No</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0; foreach($admin as $data) { ?>
                                            <tr>
                                                <th scope="row"><?= ++$no ?></th>
                                                <td><?= $data->username ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-warning mr-3"><i class="fa fa-pencil" data-toggle="modal" data-target="#<?= $data->username ?>"></i></button>

                                                    <div class="modal fade" id="<?= $data->username ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <?= form_open('superadmin/ubah-password') ?>
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Ubah Password</h5>
                                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="username" value="<?= $data->username ?>">
                                                                        <div class="form-group">
                                                                            <label for="password" class="col-form-label">Password</label>
                                                                            <input type="text" name="password" id="password" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                                    </div>
                                                                <?= form_close() ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="<?= site_url('superadmin/hapus-admin/'.$data->username) ?>" class="btn btn-sm btn-flat btn-outline-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Tambah Admin</h4>
                            <?= form_open('superadmin/tambah-admin/') ?>
                            <div class="form-group">
                                <label for="username" class="col-form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label">Password</label>
                                <input type="text" name="password" id="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-dark btn-s w-100 mt-2">TAMBAH</button>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
