<section class="home">
    <div class="text header-main shadow-sm">
        <span><i class='bx bxs-group'></i></span> Data Calon Penerima PKH
    </div>

    <div class="isi text-center">
        <?php Flasher::flash(); ?>
    </div>

    <div class="container-fluid mt-4 isi">
        <div class="shadow rounded-2 bg-light p-3">

            <div class="d-flex flex-row mt-3 mb-4">
                <div class="keterangan-sub">
                    <span>Ubah Data</span>
                </div>
                <a href="<?php echo BASEURL; ?>/juri/alternatif" class="ms-auto">
                    <button type="button" class="btn btn-secondary">Kembali</button>
                </a>
            </div>

            <form action="<?php echo BASEURL; ?>/juri/ubah_data_alternatif" method="post">
                <div class="row">
                    <div class="col-6">
                        <label for="no_urut" class="form-label">Nomor Urut</label>
                        <input type="number" class="form-control" id="no_urut" aria-describedby="emailHelp" name="no_urut" autocomplete="off" value="<?= $data['alternatif']['no_urut'] ?>">
                    </div>
                    <div class="col-6">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" name="nama" autocomplete="off" value="<?= $data['alternatif']['nama'] ?>">
                    </div>
                    <div class="col-6">
                        <label for="club" class="form-label">Klub</label>
                        <input type="text" class="form-control" id="club" aria-describedby="emailHelp" name="club" autocomplete="off" value="<?= $data['alternatif']['club'] ?>">
                    </div>

                    <?php for ($i = 0; $i < $data['jumlahSub']; $i++) : ?>
                        <?php $namaKriteria = $data['kriteria'][$i]['nama_kriteria'] ?>
                        <div class="col-6">
                            <label for="<?= $namaKriteria ?>" class="form-label"><?= $namaKriteria ?></label>
                            <select class="form-select" aria-label="Default select example" name="<?= str_replace(" ", "_", $namaKriteria) ?>" required>
                                <option></option>
                                <?php $namaSub = str_replace(" ", "_", $namaKriteria) ?>
                                <?php for ($j = 1; $j < count($data['subkriteria'][$namaSub]); $j++) : ?>
                                    <?php if ($data['subkriteria'][$namaSub][$j]['subkriteria'] === $data['alternatif'][$namaSub]) : ?>
                                        <option value="<?= $data['subkriteria'][$namaSub][$j]['subkriteria'] ?>" selected><?= $data['subkriteria'][$namaSub][$j]['subkriteria'] ?></option>
                                    <?php else : ?>
                                        <option value="<?= $data['subkriteria'][$namaSub][$j]['subkriteria'] ?>"><?= $data['subkriteria'][$namaSub][$j]['subkriteria'] ?></option>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </select>
                        </div>
                    <?php endfor; ?>
                    <input type="hidden" name="id" value="<?= $data['alternatif']['id'] ?>">
                </div>
                <div class="row mt-3">
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>