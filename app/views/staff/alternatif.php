<section class="home">
    <div class="text header-main shadow-sm">
        <span><i class='bx bxs-group'></i></span> Data Peserta Ujian
    </div>

    <div class="isi text-center">
        <?php Flasher::flash(); ?>
    </div>

    <div class="container-fluid mt-4 isi">
        <!-- <?php var_dump($data['score']) ?> -->
        <div class="d-flex flex-row-reverse mb-3">
            <button type="button" class="btn btn-success me-2">
                <a href="<?= BASEURL; ?>/admin/cetak_alternatif" class="text-white">Cetak Excel</a>
            </button>
        </div>

        <div class="scroll shadow rounded-2 bg-light p-3">
            <div class="keterangan-sub mb-2">
                <i class='bx bxs-spreadsheet'></i>
                <span>Tabel Data Peserta Ujian</span>
            </div>
            <table id="example" class="table text-center table-bordered border-dark mt-0">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Club</th>
                        <?php for ($i = 0; $i < $data['jumlahSub']; $i++) : ?>
                            <th scope="col"><?= ucwords($data['kriteria'][$i]['nama_kriteria']) ?></th>
                        <?php endfor; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php for ($i = 0; $i < count($data['alternatif']); $i++) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['alternatif'][$i]['nama'] ?></td>
                            <td><?= $data['alternatif'][$i]['club'] ?></td>
                            <?php for ($j = 0; $j < $data['jumlahSub']; $j++) : ?>
                                <?php $namaKolom = str_replace(" ", "_", $data['kriteria'][$j]['nama_kriteria']) ?>
                                <?php $resultKolom = str_replace("_", " ", $data['alternatif'][$i][$namaKolom]) ?>
                                <td><?= $resultKolom ?></td>
                            <?php endfor; ?>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>