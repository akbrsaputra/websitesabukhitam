<section class="home">
    <div class="text header-main shadow-sm">
        <span><i class='bx bxs-coin-stack' ></i></span> Sub Kriteria
    </div>

    <div class="isi text-center">
        <?php Flasher::flash(); ?>
    </div>

    <div class="container-fluid mt-4">
    <?php for ($i = 0; $i < $data['jumlahSub']; $i++): ?>
            <?php $namaSub = $data['subkriteria'][$i] ?>
            <?php $totalSub = count($data['subkriteria'][$namaSub]) ?>
            <div class="scroll isi border shadow bg-light p-3">
                <table class="table table-bordered border-dark text-center"> 
                    <div class="d-flex flex-row">
                        <div class="keterangan-sub">
                            <i class='bx bxs-spreadsheet'></i>
                            <span><?= ucwords($data['kriteria'][$i]['nama_kriteria']) ?></span>
                        </div>
                        <button type="button" class="btn btn-primary ms-auto tambahSubkriteria mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="<?= $namaSub ?>">
                        <span class="fw-bold">+</span> Tambah Subkriteria
                        </button>
                    </div> 
                    <thead>
                        <tr>
                            <th scope="col" width="50px">No</th>
                            <th scope="col" width="700px">Sub Kriteria</th>
                            <th scope="col">Nilai</th>
                            <th scope="col" width="200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($j = 1; $j < $totalSub; $j++) : ?>
                            <tr>
                                <td><?= $j; ?></td>
                                <td><?= $data['subkriteria'][$namaSub][$j]['subkriteria'] ?></td>
                                <td><?= $data['subkriteria'][$namaSub][$j]['nilai'] ?></td>
                                <td><a href="<?= BASEURL; ?>/admin/hapus_subkriteria/<?= $namaSub?>/<?= $data['subkriteria'][$namaSub][$j]['id'] ?>" class="badge text-bg-danger  ml-1" onclick="return confirm('Yakin ingin menghapus kriteria')">hapus</a>
                                <a href="" class="badge text-bg-success ubahSubkriteria" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="<?= $namaSub ?> <?= $data['subkriteria'][$namaSub][$j]['nilai'] ?>">ubah</a></td>  
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        <?php endfor ; ?>
    </div> 
</section>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Subkriteria</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/admin/tambah_data_subkriteria/<?= $namaSub ?>" method="post">
        <input type="hidden" id="namaTable" name="namaTable">
        <input type="hidden" id="subBefore" name="subBefore">
        <input type="hidden" id="nilaiBefore" name="nilaiBefore">
        <label for="nama" class="form-label">Nama Subkriteria</label>
        <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" name="nama" autocomplete="off">
        <label for="" class="form-label">Nilai</label>
        <input type="number" class="form-control" id="nilai" aria-describedby="emailHelp" name="nilai" autocomplete="off">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>