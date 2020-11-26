
        <div class="main-content-inner">
            <div class="row mt-4">

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Data Pemilih</h4>
                            <table class="w-100">
                                <tr>
                                    <td rowspan="6" style="width:25%" class="p-2">
                                        <img src="https://akademik.unsri.ac.id/images/foto_mhs/<?= $pemilih->angkatan ?>/<?= $pemilih->nim ?>.jpg" alt="" class="img-thumbnail">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-2">NIM</td>
                                    <td>:</td>
                                    <td class="p-2"><?= $pemilih->nim ?></td>
                                    <input type="hidden" id="nim" value="<?= $pemilih->nim ?>">
                                </tr>
                                <tr>
                                    <td class="p-2">Nama</td>
                                    <td>:</td>
                                    <td class="p-2"><?= $pemilih->nama ?></td>
                                </tr>
                                <tr>
                                    <td class="p-2">Jenis Kelamin</td>
                                    <td>:</td>
                                    <td class="p-2"><?= $jk[$pemilih->jenis_kelamin] ?></td>
                                </tr>
                                <tr>
                                    <td class="p-2">Jurusan</td>
                                    <td>:</td>
                                    <td class="p-2"><?= $pemilih->nama_jurusan ?></td>
                                </tr>
                                <tr>
                                    <td class="p-2">Angkatan</td>
                                    <td>:</td>
                                    <td class="p-2"><?= $pemilih->angkatan ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Generate Code</h4>
                            <div class="input-group mb-3">
                                <input type="text" <?php if($kode != null) { echo 'value="'.$decrypt.'"'; } ?> id="code" placeholder="Generate Code" class="form-control" aria-label="Text input with dropdown button" readonly>
                                <div class="input-group-append">
                                    <button id="generateCode" class="btn btn-dark" type="button" <?php if($kode != null) { echo 'disabled'; } ?>><i class="fa fa-qrcode"></i></button>
                                </div>
                                <?php if($kode != null) { ?>
                                <smal class="form-text text-muted"><?= "Dibuat pada ".$kode->date_created ?></smal>
                                <?php } ?>
                            </div>
                            <button id="copyCode" class="btn btn-outline-dark btn-xs w-100">COPY CODE</button>
                        </div>
                    </div>

                    <div class="card mt-2">
                        <div class="card-body">
                            <h4 class="header-title">Link</h4>
                            <div class="form-group mb-3">
                                <input type="text" id="link" class="form-control" value="https://pemira-fasilkom.web.id/vote/vote/<?= $nim.'/'.$nama ?>" readonly>
                            </div>
                            <button id="copyLink" class="btn btn-outline-dark btn-xs w-100">COPY LINK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
