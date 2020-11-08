
        <div class="main-content-inner">
            <div class="row mt-4">
                <div class="col-md-8">
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
                                                <td></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
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
