<?php

class Flasher {
    public static function setFlash($pesan, $aksi, $tipe, $add){
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe,
            'add' => $add
        ];
    }
    public static function flash(){
        if(isset($_SESSION['flash'] ) ){
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">Data
            <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . ' ' . $_SESSION['flash']['add'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            unset ($_SESSION['flash']);
        }
    }
}
