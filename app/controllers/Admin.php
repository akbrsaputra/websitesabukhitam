<?php

class Admin extends Controller
{

    public function index()
    {
        $data['title'] = 'Admin';
        $this->view('templates/header', $data);
        $this->view('admin/index');
        $this->view('templates/footer');
    }

    // Kriteria
    public function data_kriteria()
    {
        $data['title'] = 'Data Kriteria';
        $data['kriteria'] = $this->model('Admin_model')->getKriteria();
        $this->view('templates/header', $data);
        $this->view('admin/data_kriteria', $data);
        $this->view('templates/footer');
    }
    public function tambah_data_kriteria()
    {
        if ($this->model('Admin_model')->tambahKriteria($_POST) == 1) {
            Flasher::setFlash('berhasil', 'Ditambahkan', 'success', '');
            header('Location: ' . BASEURL . '/admin/data_kriteria');
            exit;
        } else {
            if ($this->model('Admin_model')->tambahKriteria($_POST) == 2) {
                Flasher::setFlash('gagal', 'Ditambahkan', 'danger', 'Nama Kriteria Tidak Boleh Menggunakan Simbol Atau Karakter');
                header('Location: ' . BASEURL . '/admin/data_kriteria');
                exit;
            } elseif ($this->model('Admin_model')->tambahKriteria($_POST) == 3) {
                Flasher::setFlash('gagal', 'Ditambahkan', 'danger', 'Nama Kriteria Sudah Ada');
                header('Location: ' . BASEURL . '/admin/data_kriteria');
                exit;
            } else {
                Flasher::setFlash('gagal', 'Ditambahkan', 'danger', 'Form Input Tidak Boleh Kosong');
                header('Location: ' . BASEURL . '/admin/data_kriteria');
                exit;
            }
        }
    }
    public function hapus_kriteria($namaKriteria, $tingkatKriteria)
    {
        if ($this->model('Admin_model')->hapusKriteria($namaKriteria, $tingkatKriteria) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success', '');
            header('Location: ' . BASEURL . '/admin/data_kriteria');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger', '');
            header('Location: ' . BASEURL . '/admin/data_kriteria');
            exit;
        }
    }
    public function ubah_kriteria()
    {
        echo json_encode($this->model('Admin_model')->getKriteriaById($_POST['id']));
    }
    public function ubah_data_kriteria()
    {
        if ($this->model('Admin_model')->ubahKriteria($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success', '');
            header('Location: ' . BASEURL . '/admin/data_kriteria');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger', '');
            header('Location: ' . BASEURL . '/admin/data_kriteria');
            exit;
        }
    }
    public function ubah_bobot()
    {
        $data['title'] = 'Ubah Bobot Kriteria';
        $data['kriteria'] = $this->model('Admin_model')->getKriteria();
        $this->view('templates/header', $data);
        $this->view('admin/ubah_bobot', $data);
        $this->view('templates/footer');
    }
    public function ubah_bobot_kriteria()
    {
        if ($this->model('Admin_model')->ubahBobotKriteria($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success', '');
            header('Location: ' . BASEURL . '/admin/data_kriteria');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger', '');
            header('Location: ' . BASEURL . '/admin/data_kriteria');
            exit;
        }
    }


    // Subkriteria
    public function subkriteria()
    {
        $data['title'] = 'Subkriteria';
        $data['kriteria'] = $this->model('Admin_model')->getKriteria();
        $data['subkriteria'] = $this->model('Admin_model')->getSubkriteria();
        $data['jumlahSub'] = $this->model('Admin_model')->getJumlahSub();
        $this->view('templates/header', $data);
        $this->view('admin/subkriteria', $data);
        $this->view('templates/footer');
    }
    public function tambah_data_subkriteria()
    {
        if ($this->model('Admin_model')->tambahSubkriteria($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success', '');
            header('Location: ' . BASEURL . '/admin/subkriteria');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger', '');
            header('Location: ' . BASEURL . '/admin/subkriteria');
            exit;
        }
    }
    public function hapus_subkriteria($namaTable, $id)
    {
        if ($this->model('Admin_model')->hapusSubkriteria($namaTable, $id) > 0) {
            Flasher::setFlash('berhasil', 'dihapuskan', 'success', '');
            header('Location: ' . BASEURL . '/admin/subkriteria');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapuskan', 'danger', '');
            header('Location: ' . BASEURL . '/admin/subkriteria');
            exit;
        }
    }
    public function ubah_subkriteria()
    {
        echo json_encode($this->model('Admin_model')->getSubkriteriaById($_POST['id']));
    }
    public function ubah_data_subkriteria()
    {
        if ($this->model('Admin_model')->ubahSubkriteria($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubahkan', 'success', '');
            header('Location: ' . BASEURL . '/admin/subkriteria');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubahkan', 'danger', '');
            header('Location: ' . BASEURL . '/admin/subkriteria');
            exit;
        }
    }


    // Alternatif
    public function alternatif()
    {
        $data['title'] = 'Data Alternatif';
        // $data['score'] = $this->model('Admin_model')->getScore();
        $data['alternatif'] = $this->model('Admin_model')->getAlternatif();
        $data['kriteria'] = $this->model('Admin_model')->getKriteria();
        $data['jumlahSub'] = $this->model('Admin_model')->getJumlahSub();
        $this->view('templates/header', $data);
        $this->view('admin/alternatif', $data);
        $this->view('templates/footer');
    }
    public function tambah_alternatif()
    {
        $data['title'] = 'Tambah Alternatif';
        $data['jumlahSub'] = $this->model('Admin_model')->getJumlahSub();
        $data['kriteria'] = $this->model('Admin_model')->getKriteria();
        $data['subkriteria'] = $this->model('Admin_model')->getSubkriteria();
        $this->view('templates/header', $data);
        $this->view('admin/tambah_alternatif', $data);
        $this->view('templates/footer');
    }
    public function tambah_data_alternatif()
    {
        if ($this->model('Admin_model')->tambahAlternatif($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success', '');
            header('Location: ' . BASEURL . '/admin/alternatif');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger', '');
            header('Location: ' . BASEURL . '/admin/alternatif');
            exit;
        }
    }
    public function hapus_alternatif($id)
    {
        if ($this->model('Admin_model')->hapusAlternatif($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapuskan', 'success', '');
            header('Location: ' . BASEURL . '/admin/alternatif');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapuskan', 'danger', '');
            header('Location: ' . BASEURL . '/admin/alternatif');
            exit;
        }
    }
    public function ubah_alternatif($id)
    {
        $data['title'] = 'Ubah Alternatif';
        $data['alternatif'] = $this->model('Admin_model')->getAlternatifById($id);
        $data['jumlahSub'] = $this->model('Admin_model')->getJumlahSub();
        $data['kriteria'] = $this->model('Admin_model')->getKriteria();
        $data['subkriteria'] = $this->model('Admin_model')->getSubkriteria();
        $this->view('templates/header', $data);
        $this->view('admin/ubah_alternatif', $data);
        $this->view('templates/footer');
    }
    public function ubah_data_alternatif()
    {
        if ($this->model('Admin_model')->ubahAlternatif($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success', '');
            header('Location: ' . BASEURL . '/admin/alternatif');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger', '');
            header('Location: ' . BASEURL . '/admin/alternatif');
            exit;
        }
    }
    public function import()
    {
        $data['title'] = 'Import Excel';
        $this->view('templates/header', $data);
        $this->view('admin/import');
        $this->view('templates/footer');
    }
    public function cetak_alternatif()
    {
        $data['title'] = 'Import Excel';
        $data['alternatif'] = $this->model('Admin_model')->getAlternatif();
        $data['kriteria'] = $this->model('Admin_model')->getKriteria();
        $data['jumlahSub'] = $this->model('Admin_model')->getJumlahSub();
        $this->view('admin/cetak_alternatif', $data);
    }
    public function cetak_hasil()
    {
        $data['hasil'] = $this->model('Admin_model')->getHasil();
        $this->view('admin/cetak_hasil', $data);
    }

    // Hasil Perangkingan
    public function hasil()
    {
        $data['title'] = 'Hasil Perangkingan';
        $data['hasil'] = $this->model('Admin_model')->getHasil();
        $this->view('templates/header', $data);
        $this->view('admin/hasil', $data);
        $this->view('templates/footer');
    }

    public function data_perhitungan()
    {
        $data['title'] = 'Data Perhitungan';
        $data['tabel_anilisis'] = $this->model('Admin_model')->tabelAnalisis();
        $data['kriteria'] = $this->model('Admin_model')->getKriteria();
        $data['jumlahSub'] = $this->model('Admin_model')->getJumlahSub();
        $data['alternatif'] = $this->model('Admin_model')->alternatif();
        $data['jurus'] = $this->model('Admin_model')->jurus();
        $data['14_gerakan_dasar'] = $this->model('Admin_model')->gerakan_dasar();
        $data['teknik_tangan'] = $this->model('Admin_model')->teknik_tangan();
        $data['teknik_kaki'] = $this->model('Admin_model')->teknik_kaki();
        $data['sparing_1_langkah'] = $this->model('Admin_model')->sparing_1_langkah();
        $data['sparing'] = $this->model('Admin_model')->sparing();
        $data['pemecahan_papan'] = $this->model('Admin_model')->pemecahan_papan();
        $data['tes_fisik'] = $this->model('Admin_model')->tes_fisik();
        $this->view('templates/header', $data);
        $this->view('admin/data_perhitungan', $data);
        $this->view('templates/footer');
    }
    public function data_analisis()
    {
        $data['title'] = 'Data Analisis';
        $data['tabel_anilisis'] = $this->model('Admin_model')->tabelAnalisis();
        $data['kriteria'] = $this->model('Admin_model')->getKriteria();
        $data['jumlahSub'] = $this->model('Admin_model')->getJumlahSub();
        $data['alternatif'] = $this->model('Admin_model')->alternatif();
        $data['jurus'] = $this->model('Admin_model')->jurus();
        $data['14_gerakan_dasar'] = $this->model('Admin_model')->gerakan_dasar();
        $data['teknik_tangan'] = $this->model('Admin_model')->teknik_tangan();
        $data['teknik_kaki'] = $this->model('Admin_model')->teknik_kaki();
        $data['sparing_1_langkah'] = $this->model('Admin_model')->sparing_1_langkah();
        $data['sparing'] = $this->model('Admin_model')->sparing();
        $data['pemecahan_papan'] = $this->model('Admin_model')->pemecahan_papan();
        $data['tes_fisik'] = $this->model('Admin_model')->tes_fisik();
        $this->view('templates/header', $data);
        $this->view('admin/data_analisis', $data);
        $this->view('templates/footer');
    }
}
