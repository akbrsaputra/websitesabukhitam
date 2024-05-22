$(function () {
  // Kriteria
  $('.tambahKriteria').on('click', function () {
    $('#staticBackdropLabel').html('Tambah Kriteria');
    $('.modal-footer button[type=submit]').html('Tambah');
    $('.modal-body form').attr('action', 'http://localhost/skripsi_spk/public/admin/tambah_data_kriteria');

    $('#kriteria').val('');
    $('#jenis').val('');
  });

  $('.tampilModalUbah').on('click', function () {
    $('#staticBackdropLabel').html('Ubah Kriteria');
    $('.modal-footer button[type=submit]').html('Ubah');
    $('.modal-body form').attr('action', 'http://localhost/skripsi_spk/public/admin/ubah_data_kriteria');

    const id = $(this).data('id');

    $.ajax({
      url: 'http://localhost/skripsi_spk/public/admin/ubah_kriteria',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#kriteria').val(data.nama_kriteria);
        $('#jenis').val(data.jenis);
        $('#tingkat_kepentingan_kriteria').val(data.tingkat_kepentingan_kriteria);
        $('#bobot').val(data.bobot);
        $('#kriteriaSebelum').val(data.nama_kriteria);
      },
    });
  });

  //   Subkriteria
  $('.tambahSubkriteria').on('click', function () {
    $('#staticBackdropLabel').html('Tambah Subkriteria');
    $('.modal-footer button[type=submit]').html('Tambah');
    $('.modal-body form').attr('action', 'http://localhost/skripsi_spk/public/admin/tambah_data_subkriteria');

    $('#kriteria').val('akukamu');
    $('#jenis').val('');

    const id = $(this).data('id');
    $('#namaTable').val(id);
  });

  $('.ubahSubkriteria').on('click', function () {
    $('#staticBackdropLabel').html('Ubah Subkriteria');
    $('.modal-footer button[type=submit]').html('Ubah');
    $('.modal-body form').attr('action', 'http://localhost/skripsi_spk/public/admin/ubah_data_subkriteria');

    const id = $(this).data('id');
    const namaTable = id.split(" ");
    $('#namaTable').val(namaTable[0]);

    $.ajax({
      url: 'http://localhost/skripsi_spk/public/admin/ubah_subkriteria',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#nama').val(data.subkriteria);
        $('#nilai').val(data.nilai);
        $('#subBefore').val(data.subkriteria);
        $('#nilaiBefore').val(data.nilai);
      },
    });
  });
});

const body = document.querySelector('body'),
  sidebar = body.querySelector('.sidebar'),
  toggle = body.querySelector('.toggle'),
  // searchBtn = body.querySelector('.search-box'),
  modeSwitch = body.querySelector('.toggle-switch'),
  modeText = body.querySelector('.mode-text');

toggle.addEventListener('click', () => {
  sidebar.classList.toggle('close');
});
// searchBtn.addEventListener('click', () => {
//   sidebar.classList.remove('close');
// });

// modeSwitch.addEventListener('click', () => {
//   body.classList.toggle('dark');

//   if (body.classList.contains('dark')) {
//     modeText.innerText = 'Light Mode';
//   } else {
//     modeText.innerText = 'Dark Mode';
//   }
// });

$(document).ready(function () {
  $('#example').DataTable();
});





