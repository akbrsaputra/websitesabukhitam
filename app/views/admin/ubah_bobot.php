<section class="home">
    <div class="text header-main shadow-sm">
        <span><i class='bx bxs-cylinder' ></i></span> Kriteria
    </div>

    <div class="isi text-center">
        <?php Flasher::flash(); ?>
    </div>

    <div class="container-fluid mt-4 isi">
        <div class="scroll shadow rounded-2 bg-light pb-1">
            <div class="keterangan">
            <i class='bx bxs-spreadsheet'></i>
                <span>Ubah Bobot</span>
            </div>
            <form action="<?= BASEURL; ?>/admin/ubah_bobot_kriteria" method="post">
                <div class="d-flex flex-row isi text-center bg-light border-top border-end border-start border-dark">
                    <div class="container-tingkat">
                        <p class="border-bottom border-dark border-end text-ubah-bobot p-1 bg-table-ubah-bobot">Tingkat Kriteria</p>
                        <?php foreach($data['kriteria'] as $kriteria): ?>
                            <div class="box-tingkat border-bottom border-dark border-end">
                                <p><?= $kriteria['tingkat_kepentingan_kriteria'] ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="container-drag flex-grow-1 text-center">
                        <p class="border-bottom border-dark text-ubah-bobot p-1 bg-table-ubah-bobot">Nama Kriteria</p>
                        <?php foreach($data['kriteria'] as $kriteria): ?>
                            <div class="draggable border-bottom border-dark" draggable="true">
                                <input type="hidden" name="<?= $kriteria['nama_kriteria'] ?>" value="<?= $kriteria['nama_kriteria'] ?>">
                                <p><?= $kriteria['nama_kriteria'] ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary isi mt-0" name="ubah">Ubah</button>
            </form>
        </div>
    </div> 
</section>
