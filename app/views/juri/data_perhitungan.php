<section class="home">
    <div class="text header-main shadow-sm">
        <span><i class='bx bxs-group'></i></span> Data Perhitungan
    </div>

    <div class="isi text-center">
        <?php Flasher::flash(); ?>
    </div>

    <div class="container-fluid mt-4 isi">

        <div class="scroll shadow rounded-2 bg-light p-3">
            <div class="keterangan-sub mb-2">
                <i class='bx bxs-spreadsheet'></i>
                <span>Tabel Perhitungan</span>
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
                        <th scope="col">Score</th>
                        <th scope="col">Preferensi</th>
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
                                        <?php $hasil = $data["jurus"][$j]['nilai'] ** $data['kriteria'][0]['bobot'] ?>
                                        <?php if ($hasil != 1) : ?>
                                            <?php $hasil = number_format($hasil, 5, '.', ''); ?>
                                            <?= $hasil ?>
                                        <?php else : ?>
                                            <?= $hasil ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </td>
                            <td>
                                <?php for ($j = 0; $j < count($data["14_gerakan_dasar"]); $j++) : ?>
                                    <?php if ($data['alternatif'][$i]['14_gerakan_dasar'] == $data["14_gerakan_dasar"][$j]['subkriteria']) : ?>
                                        <?php $bobot = $data['kriteria'][1]['bobot'] ?>
                                        <?php $hasil = $data["14_gerakan_dasar"][$j]['nilai'] **  $bobot ?>
                                        <?php if ($hasil != 1) : ?>
                                            <?php $hasil = number_format($hasil, 5, '.', ''); ?>
                                            <?= $hasil ?>
                                        <?php else : ?>
                                            <?= $hasil ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </td>
                            <td>
                                <?php for ($j = 0; $j < count($data["teknik_tangan"]); $j++) : ?>
                                    <?php if ($data['alternatif'][$i]['teknik_tangan'] == $data["teknik_tangan"][$j]['subkriteria']) : ?>
                                        <?php $hasil = $data["teknik_tangan"][$j]['nilai'] ** $data['kriteria'][2]['bobot'] ?>
                                        <?php $hasil = number_format($hasil, 5, '.', ''); ?>
                                        <?= $hasil ?>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </td>
                            <td>
                                <?php for ($j = 0; $j < count($data["teknik_kaki"]); $j++) : ?>
                                    <?php if ($data['alternatif'][$i]['teknik_kaki'] == $data["teknik_kaki"][$j]['subkriteria']) : ?>
                                        <?php $bobot = $data['kriteria'][3]['bobot'] ?>
                                        <?php $hasil = $data["teknik_kaki"][$j]['nilai'] **  $bobot ?>
                                        <?php if ($hasil != 1) : ?>
                                            <?php $hasil = number_format($hasil, 5, '.', ''); ?>
                                            <?= $hasil ?>
                                        <?php else : ?>
                                            <?= $hasil ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </td>
                            <td>
                                <?php for ($j = 0; $j < count($data["sparing_1_langkah"]); $j++) : ?>
                                    <?php if ($data['alternatif'][$i]['sparing_1_langkah'] == $data["sparing_1_langkah"][$j]['subkriteria']) : ?>
                                        <?php $bobot = $data['kriteria'][4]['bobot'] ?>
                                        <?php $hasil = $data["sparing_1_langkah"][$j]['nilai'] **  $bobot ?>
                                        <?php if ($hasil != 1) : ?>
                                            <?php $hasil = number_format($hasil, 5, '.', ''); ?>
                                            <?= $hasil ?>
                                        <?php else : ?>
                                            <?= $hasil ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </td>
                            <td>
                                <?php for ($j = 0; $j < count($data["sparing"]); $j++) : ?>
                                    <?php if ($data['alternatif'][$i]['sparing'] == $data["sparing"][$j]['subkriteria']) : ?>
                                        <?php $bobot = $data['kriteria'][5]['bobot']  ?>
                                        <?php $hasil = $data["sparing"][$j]['nilai'] **  $bobot ?>
                                        <?php if ($hasil != 1) : ?>
                                            <?php $hasil = number_format($hasil, 5, '.', ''); ?>
                                            <?= $hasil ?>
                                        <?php else : ?>
                                            <?= $hasil ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </td>
                            <td>
                                <?php for ($j = 0; $j < count($data["pemecahan_papan"]); $j++) : ?>
                                    <?php if ($data['alternatif'][$i]['pemecahan_papan'] == $data["pemecahan_papan"][$j]['subkriteria']) : ?>
                                        <?php $bobot = $data['kriteria'][6]['bobot']?>
                                        <?php $hasil = $data["pemecahan_papan"][$j]['nilai'] **  $bobot ?>
                                        <?php if ($hasil != 1) : ?>
                                            <?php $hasil = number_format($hasil, 5, '.', ''); ?>
                                            <?= $hasil ?>
                                        <?php else : ?>
                                            <?= $hasil ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </td>
                            <td>
                                <?php for ($j = 0; $j < count($data["tes_fisik"]); $j++) : ?>
                                    <?php if ($data['alternatif'][$i]['tes_fisik'] == $data["tes_fisik"][$j]['subkriteria']) : ?>
                                        <?php $bobot = $data['kriteria'][7]['bobot'] ?>
                                        <?php $hasil = $data["tes_fisik"][$j]['nilai'] **  $bobot ?>
                                        <?php if ($hasil != 1) : ?>
                                            <?php $hasil = number_format($hasil, 5, '.', ''); ?>
                                            <?= $hasil ?>
                                        <?php else : ?>
                                            <?= $hasil ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </td>
                            <td>
                                <?php $output = number_format($data['alternatif'][$i]['score'], 7, '.', '');  ?>
                                <?= $output; ?>
                            </td>
                            <td>
                                <?php $output = number_format($data['alternatif'][$i]['nilai'], 7, '.', '');  ?>
                                <?= $output; ?>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>