<section class="home">
    <div class="text header-main shadow-sm">
        <span><i class='bx bxs-group'></i></span> Data Peserta Ujian Kenaikan Tingkat Sabuk Hitam
    </div>

    <div class="isi text-center">
        <?php Flasher::flash(); ?>
    </div>

    <div class="container-fluid mt-4 isi">
        <div class="shadow rounded-2 bg-light p-3">

            <div class="d-flex flex-row mt-3 mb-4">
                <div class="keterangan-sub">
                    <span>Tambah Data</span>
                </div>
                <a href="<?php echo BASEURL; ?>/juri/alternatif" class="ms-auto">
                    <button type="button" class="btn btn-secondary">Kembali</button>
                </a>
            </div>

            <form action="<?php echo BASEURL; ?>/juri/tambah_data_alternatif" method="post">
                <div class="row">
                    <div class="col-6">
                        <label for="no_urut" class="form-label">No. Urut</label>
                        <input type="number" class="form-control" id="no_urut" aria-describedby="emailHelp" name="no_urut" autocomplete="off" required>
                    </div>
                    <div class="col-6">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" name="nama" autocomplete="off" required>
                    </div>
                    <div class="col-6">
                        <label for="club" class="form-label">Klub</label>
                        <input type="text" class="form-control" id="club" aria-describedby="emailHelp" name="club" autocomplete="off" required>
                    </div>

                    <?php for ($i = 0; $i < $data['jumlahSub']; $i++) : ?>
                        <?php $namaKriteria = $data['kriteria'][$i]['nama_kriteria'] ?>
                        <div class="col-6">
                            <label for="<?= $namaKriteria ?>" class="form-label"><?= $namaKriteria ?></label>
                            <select class="form-select" aria-label="Default select example" name="<?= str_replace(" ", "_", $namaKriteria) ?>">
                                <?php $namaSub = str_replace(" ", "_", $namaKriteria) ?>
                                <?php for ($j = 0; $j < count($data['subkriteria'][$namaSub]); $j++) : ?>
                                    <option value="<?= $data['subkriteria'][$namaSub][$j]['subkriteria'] ?>"><?= $data['subkriteria'][$namaSub][$j]['subkriteria'] ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    <?php endfor; ?>
                </div>
                <div class="row mt-3">
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>