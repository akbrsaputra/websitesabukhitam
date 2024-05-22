<section class="home">
    <div class="text header-main shadow-sm">
        <span><i class='bx bxs-group'></i></span> Data Analisis
    </div>

    <div class="isi text-center">
        <?php Flasher::flash(); ?>
    </div>

    <div class="container-fluid mt-4 isi">

        <div class="scroll shadow rounded-2 bg-light p-3">
            <div class="keterangan-sub mb-2">
                <i class='bx bxs-spreadsheet'></i>
                <span>Tabel Analisis</span>
            </div>
            <table id="example" class="table text-center table-bordered border-dark mt-0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Klub</th>
                        <?php for ($i = 0; $i < $data['jumlahSub']; $i++) : ?>
                            <th scope="col"><?= "K" . $i + 1 ?></th>
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
                            <td>
                                <?php for ($j = 0; $j < count($data["jurus"]); $j++) : ?>
                                    <?php if ($data['alternatif'][$i]['jurus'] == $data["jurus"][$j]['subkriteria']) : ?>
                                        <?= $data["jurus"][$j]['nilai']; ?>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </td>
                            <td>
                                <?php for ($j = 0; $j < count($data["14_gerakan_dasar"]); $j++) : ?>
                                    <?php if ($data['alternatif'][$i]['14_gerakan_dasar'] == $data["14_gerakan_dasar"][$j]['subkriteria']) : ?>
                                        <?= $data["14_gerakan_dasar"][$j]['nilai']; ?>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </td>
                            <td>
                                <?php for ($j = 0; $j < count($data["teknik_tangan"]); $j++) : ?>
                                    <?php if ($data['alternatif'][$i]['teknik_tangan'] == $data["teknik_tangan"][$j]['subkriteria']) : ?>
                                        <?= $data["teknik_tangan"][$j]['nilai']; ?>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </td>
                            <td>
                                <?php for ($j = 0; $j < count($data["teknik_kaki"]); $j++) : ?>
                                    <?php if ($data['alternatif'][$i]['teknik_kaki'] == $data["teknik_kaki"][$j]['subkriteria']) : ?>
                                        <?= $data["teknik_kaki"][$j]['nilai']; ?>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </td>
                            <td>
                                <?php for ($j = 0; $j < count($data["sparing_1_langkah"]); $j++) : ?>
                                    <?php if ($data['alternatif'][$i]['sparing_1_langkah'] == $data["sparing_1_langkah"][$j]['subkriteria']) : ?>
                                        <?= $data["sparing_1_langkah"][$j]['nilai']; ?>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </td>
                            <td>
                                <?php for ($j = 0; $j < count($data["sparing"]); $j++) : ?>
                                    <?php if ($data['alternatif'][$i]['sparing'] == $data["sparing"][$j]['subkriteria']) : ?>
                                        <?= $data["sparing"][$j]['nilai']; ?>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </td>
                            <td>
                                <?php for ($j = 0; $j < count($data["pemecahan_papan"]); $j++) : ?>
                                    <?php if ($data['alternatif'][$i]['pemecahan_papan'] == $data["pemecahan_papan"][$j]['subkriteria']) : ?>
                                        <?= $data["pemecahan_papan"][$j]['nilai']; ?>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </td>
                            <td>
                                <?php for ($j = 0; $j < count($data["tes_fisik"]); $j++) : ?>
                                    <?php if ($data['alternatif'][$i]['tes_fisik'] == $data["tes_fisik"][$j]['subkriteria']) : ?>
                                        <?= $data["tes_fisik"][$j]['nilai']; ?>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>