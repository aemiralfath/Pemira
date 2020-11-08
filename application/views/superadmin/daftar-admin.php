
        <div class="main-content-inner">
            <div class="card mt-5">
                <div class="card-body">
                    <button style="float: right" class="btn btn-outline-dark btn-xs mb-3">Tambah Admin</button>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table text-center">
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
