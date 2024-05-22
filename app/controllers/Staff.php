<?php

class Staff extends Controller
{

    // Halaman Staff/index
    public function index()
    {
        $data['title'] = 'Staff';
        $this->view('templates/header_staff', $data);
        $this->view('staff/index');
        $this->view('templates/footer');
    }

    public function alternatif()
    {
        $data['title'] = 'Data PKH';
        // $data['score'] = $this->model('Admin_model')->getScore();
        $data['alternatif'] = $this->model('Admin_model')->getAlternatif();
        $data['kriteria'] = $this->model('Admin_model')->getKriteria();
        $data['jumlahSub'] = $this->model('Admin_model')->getJumlahSub();
        $this->view('templates/header_staff', $data);
        $this->view('staff/alternatif', $data);
        $this->view('templates/footer');
    }

    // Hasil Perangkingan
    public function hasil()
    {
        $data['title'] = 'Hasil Laporan';
        $data['hasil'] = $this->model('Admin_model')->getHasil();
        $this->view('templates/header_staff', $data);
        $this->view('staff/hasil', $data);
        $this->view('templates/footer');
    }
}
