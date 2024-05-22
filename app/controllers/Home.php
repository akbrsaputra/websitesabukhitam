<?php

class Home extends Controller
{

    // Halaman Home/index
    public function index()
    {
        $data['error'] = null;
        $data['close'] = null;
        $data['title'] = 'UKT SABUK HITAM';
        $this->view('templates/header_home', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');;
    }

    public function masuk()
    {
        if ($this->model('Admin_model')->loginAdmin($_POST) === 1) {
            header('Location: ' . BASEURL . '/admin');
            exit;
        } elseif ($this->model('Admin_model')->loginAdmin($_POST) === 2) {
            header('Location: ' . BASEURL . '/staff');
            exit;
        } elseif ($this->model('Admin_model')->loginAdmin($_POST) === 3) {
            header('Location: ' . BASEURL . '/juri');
            exit;
        } else {
            // $error = true;
            // header('Location: ' . BASEURL . '/login');
            // exit;
            $data['close'] = '<meta http-equiv="refresh" content="1.5;url=index.php">';
            $data['title'] = 'PKH.Login';
            $data['error'] = true;
            $this->view('templates/header_home', $data);
            $this->view('home/index', $data);
            $this->view('templates/footer');
        }
    }
}
