<?php
class juri extends Controller
{

    // Halaman Juri/index
    public function index()
    {
        $data['title'] = 'juri';
        $this->view('templates/header_juri', $data);
        $this->view('juri/index');
        $this->view('templates/footer');
    }

    // Kriteria
    public function data_kriteria()
    {
        $data['title'] = 'Data Kriteria';
        $data['kriteria'] = $this->model('Admin_model')->getKriteria();
        $this->view('templates/header', $data);
        $this->view('juri/data_kriteria', $data);
        $this->view('templates/footer');
    }

    // Subkriteria
    public function subkriteria()
    {
        $data['title'] = 'Subkriteria';
        $data['kriteria'] = $this->model('Admin_model')->getKriteria();
        $data['subkriteria'] = $this->model('Admin_model')->getSubkriteria();
        $data['jumlahSub'] = $this->model('Admin_model')->getJumlahSub();
        $this->view('templates/header', $data);
        $this->view('juri/subkriteria', $data);
        $this->view('templates/footer');
    }

    public function alternatif()
    {
        $data['title'] = 'Data UKT Sabuk Hitam Taekwondo';
        // $data['score'] = $this->model('Admin_model')->getScore();
        $data['alternatif'] = $this->model('Admin_model')->getAlternatif();
        $data['kriteria'] = $this->model('Admin_model')->getKriteria();
        $data['jumlahSub'] = $this->model('Admin_model')->getJumlahSub();
        $this->view('templates/header_juri', $data);
        $this->view('juri/alternatif', $data);
        $this->view('templates/footer');
    }
    public function tambah_alternatif()
    {
        $data['title'] = 'Tambah Alternatif';
        $data['jumlahSub'] = $this->model('Admin_model')->getJumlahSub();
        $data['kriteria'] = $this->model('Admin_model')->getKriteria();
        $data['subkriteria'] = $this->model('Admin_model')->getSubkriteria();
        $this->view('templates/header_juri', $data);
        $this->view('juri/tambah_alternatif', $data);
        $this->view('templates/footer');
    }
    public function tambah_data_alternatif()
    {
        if ($this->model('Admin_model')->tambahAlternatif($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success', '');
            header('Location: ' . BASEURL . '/juri/alternatif');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger', '');
            header('Location: ' . BASEURL . '/juri/alternatif');
            exit;
        }
    }
    public function hapus_alternatif($id)
    {
        if ($this->model('Admin_model')->hapusAlternatif($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapuskan', 'success', '');
            header('Location: ' . BASEURL . '/juri/alternatif');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapuskan', 'danger', '');
            header('Location: ' . BASEURL . '/juri/alternatif');
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
        $this->view('templates/header_juri', $data);
        $this->view('juri/ubah_alternatif', $data);
        $this->view('templates/footer');
    }
    public function ubah_data_alternatif()
    {
        if ($this->model('Admin_model')->ubahAlternatif($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success', '');
            header('Location: ' . BASEURL . '/juri/alternatif');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger', '');
            header('Location: ' . BASEURL . '/juri/alternatif');
            exit;
        }
    }

    public function cetak_alternatif()
    {
        $data['title'] = 'Import Excel';
        $data['alternatif'] = $this->model('Admin_model')->getAlternatif();
        $data['kriteria'] = $this->model('Admin_model')->getKriteria();
        $data['jumlahSub'] = $this->model('Admin_model')->getJumlahSub();
        $this->view('juri/cetak_alternatif', $data);
    }
    public function cetak_hasil()
    {
        $data['hasil'] = $this->model('Admin_model')->getHasil();
        $this->view('juri/cetak_hasil', $data);
    }

    // Hasil Perangkingan
    public function hasil()
    {
        $data['title'] = 'Hasil Peringkat';
        $data['hasil'] = $this->model('Admin_model')->getHasil();
        $this->view('templates/header_juri', $data);
        $this->view('juri/hasil', $data);
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
        $this->view('templates/header_juri', $data);
        $this->view('juri/data_perhitungan', $data);
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
        $this->view('templates/header_juri', $data);
        $this->view('juri/data_analisis', $data);
        $this->view('templates/footer');
    }
}
