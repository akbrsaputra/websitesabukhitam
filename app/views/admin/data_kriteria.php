<section class="home">
    <div class="text header-main shadow-sm">
        <span><i class='bx bxs-cylinder' ></i></span> Kriteria
    </div>

    <div class="isi text-center">
        <?php Flasher::flash(); ?>
    </div>

    <div class="container-fluid mt-4 isi">
        <div class="d-flex flex-row mb-3">
            <a href="<?= BASEURL; ?>/admin/ubah_bobot" class="me-3 ms-auto"><button type="button" class="btn btn-success align-self-center">Ubah Bobot</button></a>
            <button type="button" class="btn btn-primary tambahKriteria align-self-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <span class="fw-bold">+</span> Tambah Kriteria
            </button>
        </div> 

        <div class="scroll shadow rounded-2 bg-light pb-1">
            <div class="keterangan">
            <i class='bx bxs-spreadsheet'></i>
                <span>Tabel Kriteria</span>
            </div>
            <table class="table text-center table-bordered border-dark isi mt-0">
                <thead>
                    <tr>
                        <th scope="col">Tingkat Kepentingan</th>
                        <th scope="col">Nama Kriteria</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Bobot</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['kriteria'] as $kriteria) : ?>
                        <tr>
                            <td><?= $kriteria['tingkat_kepentingan_kriteria'] ?></td>
                            <td><?= $kriteria['nama_kriteria'] ?></td>
                            <td><?= $kriteria['jenis'] ?></td>
                            <td><?= $kriteria['bobot'] ?></td>  
                            <td><a href="<?= BASEURL; ?>/admin/hapus_kriteria/<?= str_replace(" ", "_", $kriteria['nama_kriteria']); ?>/<?= $kriteria['tingkat_kepentingan_kriteria']; ?>" class="badge text-bg-danger  ml-1" onclick="return confirm('Yakin ingin menhapus kriteria')">hapus</a>
                            <a href="" class="badge text-bg-success tampilModalUbah" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="<?= $kriteria['tingkat_kepentingan_kriteria'] ?>">ubah</a></td>  
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div> 
</section>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kriteria</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="<?= BASEURL; ?>/admin/tambah_data_kriteria" method="post">
                <input type="hidden" name="tingkat_kepentingan_kriteria" id="tingkat_kepentingan_kriteria">
                <input type="hidden" name="bobot" id="bobot">
                <input type="hidden" name="kriteriaSebelum" id="kriteriaSebelum">
                <label for="kriteria" class="form-label">Nama Kriteria</label>
                <input type="text" class="form-control" id="kriteria" aria-describedby="emailHelp" name="kriteria" autocomplete="off">
                <label for="" class="form-label">Jenis Kriteria</label>
                <select class="form-select" aria-label="Default select example" id="jenis" name="jenis">
                    <option value="Benefit">Benefit</option>
                    <option value="Cost">Cost</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
            </div>
        </div>
    </div>
</div>