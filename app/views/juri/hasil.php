<section class="home">
    <div class="text header-main shadow-sm">
        <span><i class='bx bx-bar-chart-alt'></i></span> Hasil Peringkat
    </div>

    <div class="isi text-center">
        <?php Flasher::flash(); ?>
    </div>

    <div class="container-fluid mt-4 isi">
        <div class="d-flex flex-row-reverse mb-3">
            <button type="button" class="btn btn-success me-2">
                <a href="<?= BASEURL; ?>/admin/cetak_hasil" class="text-white">Cetak Excel</a>
            </button>
        </div>

        <div class="scroll shadow rounded-2 bg-light p-3">
            <div class="keterangan-sub mb-2">
                <i class='bx bxs-spreadsheet'></i>
                <span>Hasil Peringkat</span>
                <div class="alert alert-success" role="alert">
                    *Peringkat 1-3 mendapat kesempatan mengikuti TC Persiapan Pekan Olahraga Pelajar Nasional (Popnas)
                </div>
            </div>
            <table id="example" class="table table-bordered border-dark mt-0">
                <thead>
                    <!-- Button trigger modal -->
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Arti Penilaian
                        </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Arti Keterangan Rekomendasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <span class="badge text-bg-warning text-white">Direkomendasikan</span>
                                    <h4> Peringkat 3 besar mendapat panggilan mengikuti TC persiapan Popnas </h4>
                                    <span class="badge text-bg-success">Direkomendasikan</span>
                                    <h4> Direkomendasikan naik ke sabuk hitam</h4>
                                    <span class="badge text-bg-danger">Tidak Direkomendasikan</span>
                                    <h4>Tidak direkomenasi naik sabuk</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Mengerti</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <tr>
                        <th scope="col">Rank</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Klub</th>
                        <th scope="col">Nilai Preferensi</th>
                        <th scope="col">No. Peserta</th>
                        <th scope="col">keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $rank = 1; ?>
                    <?php for ($i = 0; $i <= 2; $i++) : ?>
                        <tr>
                            <td><?= $rank++; ?></td>
                            <td><?= $data['hasil'][$i]['nama'] ?></td>
                            <td><?= $data['hasil'][$i]['club'] ?></td>
                            <td>
                                <?php $output = number_format($data['hasil'][$i]['nilai'], 7, '.', '');  ?>
                                <?= $output; ?>
                            </td>
                            <td><?= $data['hasil'][$i]['no_urut'] ?></td>
                            <td>
                                <span class="badge text-bg-success">Direkomendasikan</span>
                                <button type="button" class="btn rounded-pill btn-sm btn-warning text-warning">.</button>
                            </td>
                        </tr>
                    <?php endfor; ?>

                    <?php $rank = 4; ?>
                    <?php for ($i = 3; $i <= 9; $i++) : ?>
                        <tr>
                            <td><?= $rank++; ?></td>
                            <td><?= $data['hasil'][$i]['nama'] ?></td>
                            <td><?= $data['hasil'][$i]['club'] ?></td>
                            <td>
                                <?php $output = number_format($data['hasil'][$i]['nilai'], 7, '.', '');  ?>
                                <?= $output; ?>
                            </td>
                            <td><?= $data['hasil'][$i]['no_urut'] ?></td>
                            <td>
                                <span class="badge text-bg-success">Direkomendasikan</span>
                            </td>
                        </tr>
                    <?php endfor; ?>

                    <?php $rank = 11; ?>
                    <?php for ($i = 10; $i < count($data['hasil']); $i++) : ?>
                        <tr>
                            <td><?= $rank++; ?></td>
                            <td><?= $data['hasil'][$i]['nama'] ?></td>
                            <td><?= $data['hasil'][$i]['club'] ?></td>
                            <td>
                                <?php $output = number_format($data['hasil'][$i]['nilai'], 7, '.', '');  ?>
                                <?= $output; ?>
                            </td>
                            <td><?= $data['hasil'][$i]['no_urut'] ?></td>
                            <td>


                                <span class="badge text-bg-danger">Tidak Direkomendasikan</span>

                            </td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>