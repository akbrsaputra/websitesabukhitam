const draggables = document.querySelectorAll('.draggable');
const containers = document.querySelectorAll('.container-drag');
// const coba = document.querySelectorAll('.isiDraggables');
// console.log(coba[0].outerText);
draggables.forEach((draggable) => {
  draggable.addEventListener('dragstart', () => {
    draggable.classList.add('dragging');
  });
  draggable.addEventListener('dragend', () => {
    draggable.classList.remove('dragging');
  });
});

containers.forEach((container) => {
  container.addEventListener('dragover', (e) => {
    e.preventDefault();
    const afterElement = getDragAfterElement(container, e.clientY);
    console.log(afterElement);
    const draggable = document.querySelector('.dragging');

    // const tes = document.querySelectorAll('.draggable');
    // var hasil = [];
    // tes.forEach((isiText) => {
    //   hasil.push(isiText.outerText);
    // });
    // console.log(hasil);

    if (afterElement == null) {
      container.appendChild(draggable);
    } else {
      container.insertBefore(draggable, afterElement);
    }
  });
});

function getDragAfterElement(container, y) {
  const draggableElements = [...container.querySelectorAll('.draggable:not(.dragging)')];

  return draggableElements.reduce(
    (closest, child) => {
      const box = child.getBoundingClientRect();
      const offset = y - box.top - box.height / 2;
      console.log(offset);
      if (offset < 0 && offset > closest.offset) {
        return { offset: offset, element: child };
      } else {
        return closest;
      }
    },
    { offset: Number.NEGATIVE_INFINITY }
  ).element;
}

// Halaman Hasil Staff
// Pengelompokan kecamatan
// const tabel = document.querySelector('.kecamatan');

// // Samarinda Kota
// const samKot = document.querySelector('.samarinda_kota');
// samKot.addEventListener('click', function () {
//   console.log('ok');
//     // const tes =
//     // "<table id='example' class='table table-bordered border-dark mt-0'><thead><tr><th scope='col'>Rank</th><th scope='col'>Kecamatan</th><th scope='col'>ID DTKS</th><th scope='col'>Nama</th><th scope='col'>No.KK</th><th scope='col'>Nik</th><th scope='col'>Penghasilan Perbulan</th><th scope='col'>Jumlah Tanggungan</th><th scope='col'>Pekerjaan</th><th scope='col'>Kepemilikan Rumah</th><th scope='col'>Kepemilikan Kendaraan</th><th scope='col'>Kondisi Rumah</th><th scope='col'>Sudah Dapat Bantuan</th></tr></thead><tbody><?php $rank = 1; ?><?php for($i = 0; $i < count($data['hasil']); $i++) : ?><tr><td><?= $rank++; ?></td><td><?= $data['hasil'][$i]['kecamatan'] ?></td> <td><?= $data['hasil'][$i]['id_dtks'] ?></td> <td><?= $data['hasil'][$i]['nama'] ?></td><td><?= $data['hasil'][$i]['no_kk'] ?></td><td><?= $data['hasil'][$i]['nik'] ?></td><td><?= $data['hasil'][$i]['penghasilan_perbulan'] ?></td><td><?= $data['hasil'][$i]['jumlah_tanggungan_keluarga'] ?></td><td><?= $data['hasil'][$i]['pekerjaan'] ?></td><td><?= $data['hasil'][$i]['kepemilikan_rumah'] ?></td><td><?= $data['hasil'][$i]['kepemilikan_kendaraan'] ?></td><td><?= $data['hasil'][$i]['kondisi_rumah'] ?></td><td><?= $data['hasil'][$i]['sudah_pernah_mendapat_bantuan'] ?></td></tr><?php endfor; ?></tbody>";
//     const tes =
//     "<td><?php echo $data['hasil'][0]['nama']?></td>";
//     tabel.innerHTML = tes;
// });