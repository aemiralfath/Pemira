<main>
    <div class="container py-5">
        <style>
            .top .blocks .title {
                font-weight: 500;
            }

            .top .blocks .block {
                width: 20px;
                height: 20px;
                border-radius: 5px;
            }

            .top .blocks p {
                width: 10em;
                margin-bottom: -7px;
                font-size: calc(0.1vmax + 0.8em);
            }

            .top .blocks .list {
                margin-bottom: 1vmax;
            }
        </style>
        <div class="card mt-5 mb-3">
            <div class="card-header">
                Grafik Skala Total Yang Sudah Memilih
            </div>
            <div class="card-body">
                <style>
                    .chart {
                        width: 15vmax;
                        height: 15vmax;
                        border-radius: 50%;
                        margin-right: calc(3vw - 1vmax);
                        background-image: conic-gradient(<?php $totalPercentage = 0;
                                                            foreach ($paslon as $calon) :
                                                                if($count1 == 0 && $count2 == 0){
                                                                    break;
                                                                }
                                                                if ($calon['nomor'] == 1) {
                                                                    $totalPercentage += round(($count1 / ($count1 + $count2)) * 100, 2);
                                                                } else {
                                                                    $totalPercentage += round(($count2 / ($count1 + $count2)) * 100, 2);
                                                                }
                                                            ?> <?= '#' . $calon['color'] ?> 0,
                                <?= '#' . $calon['color'] ?> <?= $totalPercentage . '%' ?>,
                                <?php endforeach ?> #757575 0,
                                #757575 100%);
                        background-size: contain;
                        background-position-x: left;
                    }
                </style>
                <div class="top container d-flex flex-column justify-content-center align-items-center p-0">
                    <div class="chart"></div>
                    <div class="blocks w-100">
                        <?php
                        foreach ($paslon as $calon) :
                            if($count1 == 0 && $count2 == 0){
                                break;
                            }
                            if ($calon['nomor'] == 1) {
                                $percentage = round(($count1 / $topcount) * 100, 2);
                                $count = round(($count1 / ($count1 + $count2)) * 100, 2);
                                $num = $count1;
                            } else {
                                $percentage = round(($count2 / $topcount) * 100, 2);
                                $count = round(($count2 / ($count1 + $count2)) * 100, 2);
                                $num = $count2;
                            }

                        ?>
                            <div class="list">
                                <div class="d-flex flex-row mb-1">
                                    <div class="block" style="background-color: #<?= $calon['color'] ?>;"></div>
                                    <p class="title ml-1">Nomor Urut <?= $calon['nomor'] ?></p>
                                </div>
                                <div class="progress" style="height: 25px;">
                                    <div class="progress-bar" role="progressbar" style="width: <?= $percentage ?>%; background-color: #<?= $calon['color'] ?>; font-weight: 500;" aria-valuenow="<?= $percentage ?>" aria-valuemin="0" aria-valuemax="100"><?= $count ?>%</div>
                                </div>
                                <p><?= $num ?> Suara</p>
                            </div>
                        <?php endforeach ?>
                        <div class="list">
                            <div class="d-flex flex-row mb-1">
                                <div class="block" style="background-color: #757575;"></div>
                                <p class="title ml-2">
                                    Tidak Memilih
                                </p>
                            </div>
                            <p><?= $maxvote - $count1 - $count2 ?> Suara</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-5 mb-3">
            <div class="card-header">
                Grafik Skala Total Seluruh Daftar Pemilih
            </div>
            <div class="card-body">
                <style>
                    .chart2 {
                        width: 15vmax;
                        height: 15vmax;
                        border-radius: 50%;
                        margin-right: calc(3vw - 1vmax);
                        background-image: conic-gradient(<?php $totalPercentage = 0;
                                                            foreach ($paslon as $calon) :
                                                                if($count1 == 0 && $count2 == 0){
                                                                    break;
                                                                }
                                                                if ($calon['nomor'] == 1) {
                                                                    $totalPercentage += round(($count1 / $maxvote) * 100, 2);
                                                                } else {
                                                                    $totalPercentage += round(($count2 / $maxvote) * 100, 2);
                                                                }
                                                            ?> <?= '#' . $calon['color'] ?> 0,
                                <?= '#' . $calon['color'] ?> <?= $totalPercentage . '%' ?>,
                                <?php endforeach ?> #757575 0,
                                #757575 100%);
                        background-size: contain;
                        background-position-x: left;
                    }
                </style>
                <div class="top container d-flex flex-column justify-content-center align-items-center p-0">
                    <div class="chart2"></div>
                    <div class="blocks w-100">
                        <?php
                        foreach ($paslon as $calon) :
                            if($count1 == 0 && $count2 == 0){
                                break;
                            }
                            if ($calon['nomor'] == 1) {
                                $percentage = round(($count1 / $maxvote) * 100, 2);
                                $count = round(($count1 / $maxvote) * 100, 2);
                                $num = $count1;
                            } else {
                                $percentage = round(($count2 / $maxvote) * 100, 2);
                                $count = round(($count2 / $maxvote) * 100, 2);
                                $num = $count2;
                            }
                        ?>
                            <div class="list">
                                <div class="d-flex flex-row mb-1">
                                    <div class="block" style="background-color: #<?= $calon['color'] ?>;"></div>
                                    <p class="title ml-1">Nomor Urut <?= $calon['nomor'] ?></p>
                                </div>
                                <div class="progress" style="height: 25px;">
                                    <div class="progress-bar" role="progressbar" style="width: <?= $percentage ?>%; background-color: #<?= $calon['color'] ?>; font-weight: 500;" aria-valuenow="<?= $percentage ?>" aria-valuemin="0" aria-valuemax="100"><?= $count ?>%</div>
                                </div>
                                <p><?= $num ?> Suara</p>
                            </div>
                        <?php endforeach ?>
                        <div class="list">
                            <div class="d-flex flex-row mb-1">
                                <div class="block" style="background-color: #757575;"></div>
                                <p class="title ml-2">
                                    Tidak Memilih
                                </p>
                            </div>
                            <div class="progress" style="height: 25px;">
                                <div class="progress-bar" role="progressbar" style="width: <?= 100 - $totalPercentage ?>%; background-color: #757575; font-weight: 500;" aria-valuenow="<?= 100 - $totalPercentage ?>" aria-valuemin="0" aria-valuemax="100"><?= 100 - $totalPercentage ?>%</div>
                            </div>
                            <p><?= $maxvote - $count1 - $count2 ?> Suara</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>