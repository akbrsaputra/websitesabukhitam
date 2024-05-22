<?php

class Admin_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function loginAdmin($data)
    {
        $conn = mysqli_connect("localhost", "root", "", "skripsi_spk");
        $email = $data['email'];
        $password = $data['password'];
        $admin = mysqli_query($conn, "SELECT * FROM administrator WHERE email = '$email'");

        if (mysqli_num_rows($admin) === 1) {
            $row = mysqli_fetch_assoc($admin);
            if ($password === $row["password"]) {
                if ($row['level'] === 'admin') {
                    $code = 1;
                } elseif ($row['level'] === 'user') {
                    $code = 2;
                } else {
                    $code = 3;
                }
                return $code;
            } else {
                $code = 0;
                return $code;
            }
        } else {
            $code = 0;
            return $code;
        }
    }


    // Kriteria
    public function getKriteria()
    {
        $this->db->query("SELECT * FROM kriteria");
        return $this->db->resultSet();
    }

    public function tambahKriteria($data)
    {
        $kriteria = strtolower($data['kriteria']);

        if ($kriteria == '' || $data['jenis'] == '') { // Validasi Input Tidak Boleh Kosong
            return 0;
        } else {
            $pattern = "/[!\@\#\$\%\^\&\*\(\)\-\_\+\=\[\]\{\}\;\:\'\"\,\<\.\>\?\/]/";
            if (preg_match($pattern, $kriteria) > 0) {  // Validasi Input Tdak Boleh Ada Karakter Atau Simbol
                return 2;
            } else {
                $this->db->query("SELECT * FROM kriteria WHERE nama_kriteria = '$kriteria'"); // Validasi Nama Kriteria Yang Sudah Ada
                $this->db->single();
                if ($this->db->rowCount() > 0) {
                    return 3;
                } else {
                    $conn = mysqli_connect("localhost", "root", "", "skripsi_spk");
                    $row = mysqli_query($conn, "SELECT * FROM kriteria");
                    $rows = mysqli_num_rows($row);
                    $tingkatKepentingan = $rows + 1;
                    $bobotKriteria = (1 / $tingkatKepentingan) / $tingkatKepentingan;

                    // Input Kriteria
                    $query = "INSERT INTO kriteria VALUES ('', :tingkat_kepentingan_kriteria, :nama_kriteria, :jenis, :bobot)";
                    $this->db->query($query);
                    $this->db->bind('tingkat_kepentingan_kriteria', $tingkatKepentingan);
                    $this->db->bind('nama_kriteria', $kriteria);
                    $this->db->bind('jenis', $data['jenis']);
                    $this->db->bind('bobot', $bobotKriteria);
                    $this->db->execute();
                    $tambah = $this->db->rowCount();

                    // 0 kan Nilai Score Alternatif
                    $this->db->query("SELECT * FROM alternatif");
                    $hasil = $this->db->resultSet();
                    $score = 0;
                    for ($i = 0; $i < count($hasil); $i++) {
                        $param = $hasil[$i]['no_urut'];
                        $query = "UPDATE alternatif SET nilai = :nilai WHERE no_urut = '$param'";
                        $this->db->query($query);
                        $this->db->bind('nilai', $score);
                        $this->db->execute();
                    }

                    // Create table Subkriteria
                    $namaTabel = str_replace(" ", "_", $kriteria);
                    $query = "CREATE TABLE " . $namaTabel . " (
                        id INT NOT NULL AUTO_INCREMENT,
                        subkriteria VARCHAR(100) NOT NULL,
                        nilai INT(10) NOT NULL,
                        PRIMARY KEY (id)
                        )";
                    $this->db->query($query);
                    $this->db->execute();

                    // menambah indeks ke 0 subkriteria (tidak di pakai)
                    $query = "INSERT INTO $namaTabel VALUES ('', :subkriteria, :nilai)";
                    $this->db->query($query);
                    $this->db->bind('subkriteria', "");
                    $this->db->bind('nilai', 0);
                    $this->db->execute();


                    // Tambah kolom tabel alternatif
                    $query = "ALTER TABLE alternatif ADD $namaTabel VARCHAR(100)";
                    $this->db->query($query);
                    $this->db->execute();

                    // Update Bobot Kriteria Sebelumnya
                    // Metode ROC
                    if ($rows != 0) {
                        $prioritas = 1;
                        $b = 0;
                        $totalBobot = 0;
                        for ($a = 1; $a < $tingkatKepentingan; $a++) {
                            $x = $prioritas;
                            for ($c = $b; $c < $tingkatKepentingan; $c++) {
                                $bobot = 1 / $x;
                                $totalBobot += $bobot;
                                $x += 1;
                            }
                            $totalBobot /= $tingkatKepentingan;
                            $this->db->query("UPDATE kriteria SET bobot = $totalBobot WHERE tingkat_kepentingan_kriteria = $prioritas");
                            $this->db->execute();
                            $prioritas += 1;
                            $b += 1;
                            $totalBobot = 0;
                        }
                    }
                    return $tambah;
                }
            }
        }
    }

    public function hapusKriteria($namaKriteria, $tingkatKriteria)
    {

        // Hapus Kriteria
        $query = "DELETE FROM kriteria WHERE tingkat_kepentingan_kriteria = :tingkatKriteria";
        $this->db->query($query);
        $this->db->bind('tingkatKriteria', $tingkatKriteria);
        $this->db->execute();
        $hapus = $this->db->rowCount();

        // Hapus Table Subkriteria
        $query = "DROP TABLE $namaKriteria";
        $this->db->query($query);
        $this->db->execute();

        // Hapus Kolom Table Alternatif
        $query = "ALTER TABLE alternatif DROP $namaKriteria";
        $this->db->query($query);
        $this->db->execute();

        // Update Bobot dan Tingkat Kriteria
        $conn = mysqli_connect("localhost", "root", "", "skripsi_spk");
        $row = mysqli_query($conn, "SELECT * FROM kriteria");
        $rows = mysqli_num_rows($row);
        $totalKriteria = $rows + 1;

        // Update Tingkat Kriteria
        if ($totalKriteria > $tingkatKriteria) {
            $j = $totalKriteria - $tingkatKriteria;
            $tingkatAwal = $tingkatKriteria + 1;
            for ($i = 0; $i < $j; $i++) {
                $this->db->query("UPDATE kriteria SET tingkat_kepentingan_kriteria = $tingkatKriteria WHERE tingkat_kepentingan_kriteria = $tingkatAwal");
                $this->db->execute();
                $tingkatKriteria += 1;
                $tingkatAwal += 1;
            }
        }

        // Update Bobot Kriteria
        if ($rows != 0) {
            $prioritas = 1;
            $b = 0;
            $totalBobot = 0;
            for ($a = 0; $a < $rows; $a++) {
                $x = $prioritas;
                for ($c = $b; $c < $rows; $c++) {
                    $bobot = 1 / $x;
                    $totalBobot += $bobot;
                    $x += 1;
                }
                $totalBobot /= $rows;
                $this->db->query("UPDATE kriteria SET bobot = $totalBobot WHERE tingkat_kepentingan_kriteria = $prioritas");
                $this->db->execute();
                $prioritas += 1;
                $b += 1;
                $totalBobot = 0;
            }
        }
        return $hapus;
    }

    public function getKriteriaById($id)
    {
        $this->db->query("SELECT * FROM kriteria WHERE tingkat_kepentingan_kriteria = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function ubahKriteria($data)
    {
        // Ubah Nama Table Subkriteria
        $namaKriteriaFirst = str_replace(" ", "_", $data['kriteriaSebelum']);
        $namaKriteria = strtolower(str_replace(" ", "_", $data['kriteria']));
        $query = "ALTER TABLE $namaKriteriaFirst RENAME TO $namaKriteria";
        $this->db->query($query);
        $this->db->execute();

        // Ubah Kolom Table Alternatif
        $query = "ALTER TABLE alternatif CHANGE $namaKriteriaFirst $namaKriteria VARCHAR(100)";
        $this->db->query($query);
        $this->db->execute();

        // Ubah Kriteria
        $query = "UPDATE kriteria SET
                        tingkat_kepentingan_kriteria = :tingkat_kepentingan_kriteria,
                        nama_kriteria = :nama_kriteria,
                        jenis = :jenis,
                        bobot = :bobot
                        WHERE tingkat_kepentingan_kriteria = :tingkat_kepentingan_kriteria";

        $kriteria = strtolower($data['kriteria']);
        $this->db->query($query);
        $this->db->bind('tingkat_kepentingan_kriteria', $data['tingkat_kepentingan_kriteria']);
        $this->db->bind('nama_kriteria', $kriteria);
        $this->db->bind('jenis', $data['jenis']);
        $this->db->bind('bobot', $data['bobot']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahBobotKriteria($data)
    {
        if (isset($data['ubah'])) {
            $hasil = [];
            foreach ($data as $row) {
                $hasil[] = $row;
            }

            $panjang = count($hasil);
            $panjang -= 1;
            $param = 1;
            $kriteria = $this->getKriteria();
            for ($i = 0; $i < $panjang; $i++) {
                foreach ($kriteria as $row) {
                    if ($row['nama_kriteria'] == $hasil[$i]) {
                        $jenis = $row['jenis'];
                    }
                }
                $this->db->query("UPDATE kriteria SET nama_kriteria =:nama_kriteria, jenis = :jenis WHERE tingkat_kepentingan_kriteria = $param");
                $this->db->bind('nama_kriteria', $hasil[$i]);
                $this->db->bind('jenis', $jenis);
                $this->db->execute();
                $param++;
            }
            return 1;
        }
    }



    // Subkriteria
    public function getSubkriteria()
    {
        $this->db->query("SELECT * FROM kriteria");
        $data = $this->db->resultSet();
        $jumlahData = count($data);
        $Subkriteria = [];
        for ($i = 0; $i < $jumlahData; $i++) {
            $namaSub = str_replace(" ", "_", $data[$i]["nama_kriteria"]);
            $Subkriteria[] = $namaSub;
            $this->db->query("SELECT * FROM $namaSub ORDER BY nilai ASC");
            $isiSub = $this->db->resultSet();
            for ($j = 0; $j < count($isiSub); $j++) {
                $Subkriteria[$namaSub] = $isiSub;
            }
        }
        return $Subkriteria;
    }

    public function getJumlahSub()
    {
        $this->db->query("SELECT * FROM kriteria");
        $data = $this->db->resultSet();
        $jumlahData = count($data);
        return $jumlahData;
    }

    public function tambahSubkriteria($data)
    {
        $table = $data['namaTable'];
        if ($data['nama'] == '' || $data['nilai'] == '') {
            return 0;
        } else {
            $query = "INSERT INTO $table VALUES ('', :subkriteria, :nilai)";
            $this->db->query($query);
            $this->db->bind('subkriteria', $data['nama']);
            $this->db->bind('nilai', $data['nilai']);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    public function hapusSubkriteria($namaTable, $id)
    {
        $this->db->query("SELECT * FROM $namaTable WHERE id = $id");
        $data = $this->db->single();

        // Delete Subkriteria Di Tabel Subkriteria
        $query = "DELETE FROM $namaTable WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        $result = $this->db->rowCount();

        // Mengganti Nilai Subkriteria Menjadi NULL Dari Sukriteria Yang Dihapus pada Table Alternatif
        $namaSub = $data['subkriteria'];
        $query = "UPDATE alternatif SET $namaTable = '' WHERE $namaTable = '$namaSub'";
        $this->db->query($query);
        $this->db->execute();

        return $result;
    }

    public function getSubkriteriaById($id)
    {
        $data = explode(" ", $id);
        $this->db->query("SELECT * FROM $data[0] WHERE nilai = $data[1]");
        // $this->db->bind('nilai', $data[1]);
        return $this->db->single();
    }
    public function ubahSubkriteria($data)
    {
        $table = $data['namaTable'];
        $namaSubBefore = $data['subBefore'];
        if ($data['nama'] == '' || $data['nilai'] == '') {
            return 0;
        } else {
            // Update Table Subkriteria
            $query = "UPDATE $table SET subkriteria = :subkriteria, nilai = :nilai WHERE subkriteria = '$namaSubBefore'";
            $this->db->query($query);
            $this->db->bind('subkriteria', $data['nama']);
            $this->db->bind('nilai', $data['nilai']);
            $this->db->execute();
            $result = $this->db->rowCount();

            if ($data['nilai'] == $data['nilaiBefore']) {
                // Update Table Alternatif
                $query = "UPDATE alternatif SET $table = :$table WHERE $table = '$namaSubBefore'";
                $this->db->query($query);
                $this->db->bind($table, $data['nama']);
                $this->db->execute();
            } else {
                $query = "SELECT * FROM alternatif WHERE $table = '$namaSubBefore'";
                $this->db->query($query);
                $sub = $this->db->resultSet();
                for ($i = 0; $i < count($sub); $i++) {
                    $no_urut = $sub[$i]['no_urut'];

                    $jumlahSub = $this->getJumlahSub();
                    $kriteria = $this->getKriteria();
                    $score = [];
                    for ($j = 0; $j < $jumlahSub; $j++) {

                        // Query Skala Nilai Subkriteria
                        $namaTabel = str_replace(" ", "_", $kriteria[$j]['nama_kriteria']);
                        $subkriteria = $sub[$i][$namaTabel];
                        $this->db->query("SELECT * FROM $namaTabel WHERE subkriteria = '$subkriteria'");
                        $nilai = $this->db->single();
                        $x = $nilai['nilai'];
                        // Query Bobot Kriteria
                        $namaKriteria = str_replace("_", " ", $namaTabel);
                        $this->db->query("SELECT * FROM kriteria WHERE nama_kriteria = '$namaKriteria'");
                        $bobot = $this->db->single();
                        $y = $bobot['bobot'];
                        // Masukkan kedalam array
                        $score[] = $x ** $y;
                    }
                    // Perhitungan Score
                    $b = 1;
                    for ($z = 0; $z < count($score); $z++) {
                        $b *= $score[$z];
                    }

                    $query = "UPDATE alternatif SET $table = :sub, score = :score WHERE no_urut = $no_urut";
                    $this->db->query($query);
                    $this->db->bind('sub', $data['nama']);
                    $this->db->bind('score', $b);
                    $this->db->execute();
                }
            }
            return $result;
        }
    }



    // Alternatif
    public function getAlternatif()
    {
        $this->db->query("SELECT * FROM alternatif");
        $result = $this->db->resultSet();

        $query = "SELECT * FROM alternatif";
        $this->db->query($query);
        $sub = $this->db->resultSet();
        for ($i = 0; $i < count($sub); $i++) {
            $id = $sub[$i]['id'];

            $jumlahSub = $this->getJumlahSub();
            $kriteria = $this->getKriteria();
            $score = [];
            for ($j = 0; $j < $jumlahSub; $j++) {

                // Query Skala Nilai Subkriteria
                $namaTabel = str_replace(" ", "_", $kriteria[$j]['nama_kriteria']);
                $subkriteria = str_replace("_", " ", $sub[$i][$namaTabel]);
                $this->db->query("SELECT * FROM $namaTabel WHERE subkriteria = '$subkriteria'");
                $nilai = $this->db->single();
                $x = $nilai['nilai'];
                // Query Bobot Kriteria
                $namaKriteria = str_replace("_", " ", $namaTabel);
                $this->db->query("SELECT * FROM kriteria WHERE nama_kriteria = '$namaKriteria'");
                $bobot = $this->db->single();
                if ($bobot['jenis'] == 'Benefit') {
                    $y = $bobot['bobot'] * 1;
                } else {
                    $y = $bobot['bobot'] * -1;
                }
                // Metode WP
                // Masukkan kedalam array
                $score[] = $x ** $y;
            }
            // Perhitungan Score
            $b = 1;
            for ($z = 0; $z < count($score); $z++) {
                $b *= $score[$z];
            }
            $query = "UPDATE alternatif SET score = :score WHERE id = $id";
            $this->db->query($query);
            $this->db->bind('score', $b);
            $this->db->execute();
        }
        return $result;
    }

    public function tambahAlternatif($data)
    {
        if ($data['nama'] == '' || $data['no_urut'] == '') {
            return 0;
        } else {
            $jumlahSub = $this->getJumlahSub();
            $kriteria = $this->getKriteria();
            $sub = "'', :score, :nilai, :no_urut, :nama, :club";
            $score = [];
            for ($i = 0; $i < $jumlahSub; $i++) {
                $sub = $sub . ', :' . str_replace(" ", "_", $kriteria[$i]['nama_kriteria']);

                //$sub = "'', :score, :nilai, :no_urut, :nama, :club, :jurus, :14_gerakan_dasar, :teknik_tangan, :teknik_kaki, :sparing_1_langkah, :sparing, :pemecahan_papan, :tes_fisik";
                // // Query Skala Nilai Subkriteria
                // $namaTabel = str_replace(" ", "_", $kriteria[$i]['nama_kriteria']);
                // $subkriteria = $data[$namaTabel];
                // $this->db->query("SELECT * FROM $namaTabel WHERE subkriteria = '$subkriteria'");
                // $nilai = $this->db->single();
                // $x = $nilai['nilai'];
                // // Query Bobot Kriteria
                // $namaKriteria = str_replace("_", " ", $namaTabel);
                // $this->db->query("SELECT * FROM kriteria WHERE nama_kriteria = '$namaKriteria'");
                // $bobot = $this->db->single();
                // if ($bobot['jenis'] == 'Benefit'){
                //     $y = $bobot['bobot'] * 1;
                // } else {
                //     $y = $bobot['bobot'] * -1;
                // }
                // $y = $bobot['bobot'];
                // // Masukkan kedala array
                // $score[] = $x ** $y;
            }
            // Perhitungan Score
            // $b = 1;
            // for ($i = 0; $i < count($score); $i++){
            //     $b *= $score[$i];
            // }

            // Tambah Alternatif
            $query = "INSERT INTO alternatif VALUES ($sub)";
            $this->db->query($query);
            $this->db->bind('score', "");
            $this->db->bind('nilai', "");
            $this->db->bind('no_urut', $data['no_urut']);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('club', $data['club']);
            for ($i = 0; $i < $jumlahSub; $i++) {
                $a = str_replace(" ", "_", $kriteria[$i]['nama_kriteria']);
                $this->db->bind($a, $data[$a]);
            }
            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    public function hapusAlternatif($id)
    {
        $query = "DELETE FROM alternatif WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getAlternatifById($id)
    {
        $this->db->query("SELECT * FROM alternatif WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function ubahAlternatif($data)
    {
        if ($data['nama'] == '' || $data['no_urut'] == '') {
            return 0;
        } else {
            $jumlahSub = $this->getJumlahSub();
            $kriteria = $this->getKriteria();
            $sub = "score = :score, nilai = :nilai, no_urut = :no_urut, nama = :nama, club = :club";
            for ($i = 0; $i < $jumlahSub; $i++) {
                $namaData = str_replace(" ", "_", $kriteria[$i]['nama_kriteria']);
                $sub = $sub . ', ' . $namaData . ' = :' . $namaData;

                // Query Skala Nilai Subkriteria
                $namaTabel = str_replace(" ", "_", $kriteria[$i]['nama_kriteria']);
                $subkriteria = $data[$namaTabel];
                $this->db->query("SELECT * FROM $namaTabel WHERE subkriteria = '$subkriteria'");
                $nilai = $this->db->single();
                $x = $nilai['nilai'];
                // Query Bobot Kriteria
                $namaKriteria = str_replace("_", " ", $namaTabel);
                $this->db->query("SELECT * FROM kriteria WHERE nama_kriteria = '$namaKriteria'");
                $bobot = $this->db->single();
                if ($bobot['jenis'] == 'Benefit') {
                    $y = $bobot['bobot'] * 1;
                } else {
                    $y = $bobot['bobot'] * -1;
                }
                // Masukkan kedalam array
                $score[] = $x ** $y;
            }
            // Perhitungan Score
            $b = 1;
            for ($i = 0; $i < count($score); $i++) {
                $b *= $score[$i];
            }

            // Update Alternatif
            $param = $data['id'];
            $query = "UPDATE alternatif SET $sub WHERE id = $param";
            $this->db->query($query);
            $this->db->bind('score', $b);
            $this->db->bind('nilai', "");
            $this->db->bind('no_urut', $data['no_urut']);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('club', $data['club']);
            for ($i = 0; $i < $jumlahSub; $i++) {
                $a = str_replace(" ", "_", $kriteria[$i]['nama_kriteria']);
                $this->db->bind($a, $data[$a]);
            }

            $this->db->execute();

            return $this->db->rowCount();
        }
    }



    // Hasil Perangkingan
    public function getHasil()
    {
        $this->db->query("SELECT * FROM alternatif");
        $hasil = $this->db->resultSet();
        $score = 0;
        for ($i = 0; $i < count($hasil); $i++) {
            $score += $hasil[$i]["score"];
        }
        if ($score != 0) {
            for ($i = 0; $i < count($hasil); $i++) {
                $param = $hasil[$i]['id'];
                $pembagi = $hasil[$i]["score"];
                $nilai = $pembagi / $score;
                $query = "UPDATE alternatif SET nilai = :nilai WHERE id = '$param'";
                $this->db->query($query);
                $this->db->bind('nilai', $nilai);
                $this->db->execute();
            }
        } else {
            for ($i = 0; $i < count($hasil); $i++) {
                $param = $hasil[$i]['id'];
                $query = "UPDATE alternatif SET nilai = :nilai WHERE id = '$param'";
                $this->db->query($query);
                $this->db->bind('nilai', $score);
                $this->db->execute();
            }
        }

        $this->db->query("SELECT * FROM alternatif ORDER BY nilai DESC");
        $result = $this->db->resultSet();

        return $result;
    }

    public function getScore()
    {
        $this->db->query("SELECT * FROM alternatif");
        $hasil = $this->db->resultSet();
        $score = 0;
        for ($i = 0; $i < count($hasil); $i++) {
            $score += $hasil[$i]["score"];
        }
        return $score;
    }

    // public function tambahPKH()
    // {
    //     $this->db->query("SELECT * FROM alternatif");
    //     $result = $this->db->resultSet();
    //     $ttl = $result[0]['tanggal_lahir'];
    //     $ttl = explode("/", $ttl);
    //     $ttl = end($ttl);
    //     $ttl = intval($ttl);
    //     $selisih = 2000 - $ttl;
    //     // foreach ($result as $data) {
    //     //     $id = $data['id'];
    //     //     $ttl = $data['tanggal_lahir'];
    //     //     $ttl = explode("/", $ttl);
    //     //     $ttl = end($ttl);
    //     //     $ttl = intval($ttl);
    //     //     $selisih = 2023 - $ttl;
    //     //     if ($selisih > 59) {
    //     //         $this->db->query("UPDATE alternatif SET kategori_pkh = 'Ya' WHERE id = $id");
    //     //     } elseif ($selisih < 20) {
    //     //         $this->db->query("UPDATE alternatif SET kategori_pkh = 'Ya' WHERE id = $id");
    //     //     } else {
    //     //         $this->db->query("UPDATE alternatif SET kategori_pkh = 'Tidak' WHERE id = $id");
    //     //     }
    //     //     $this->db->execute();
    //     // }
    //     foreach ($result as $data) {
    //         $id = $data['id'];
    //         $pekerjaan = $data['pekerjaan'];
    //         if ($pekerjaan == 'Pelajar/Mahasiswa') {
    //             $this->db->query("UPDATE alternatif SET pekerjaan = 'Belum/Tidak Bekerja' WHERE id = $id");
    //             $this->db->execute();
    //         }
    //     }
    // }








    public function alternatif()
    {
        $this->db->query("SELECT * FROM alternatif");
        $hasil = $this->db->resultSet();
        return $hasil;
    }
    public function jurus()
    {
        $this->db->query("SELECT * FROM jurus");
        $hasil = $this->db->resultSet();
        return $hasil;
    }
    public function gerakan_dasar()
    {
        $this->db->query("SELECT * FROM 14_gerakan_dasar");
        $hasil = $this->db->resultSet();
        return $hasil;
    }
    public function teknik_tangan()
    {
        $this->db->query("SELECT * FROM teknik_tangan");
        $hasil = $this->db->resultSet();
        return $hasil;
    }
    public function teknik_kaki()
    {
        $this->db->query("SELECT * FROM teknik_kaki");
        $hasil = $this->db->resultSet();
        return $hasil;
    }
    public function sparing_1_langkah()
    {
        $this->db->query("SELECT * FROM sparing_1_langkah");
        $hasil = $this->db->resultSet();
        return $hasil;
    }
    public function sparing()
    {
        $this->db->query("SELECT * FROM sparing");
        $hasil = $this->db->resultSet();
        return $hasil;
    }
    public function pemecahan_papan()
    {
        $this->db->query("SELECT * FROM pemecahan_papan");
        $hasil = $this->db->resultSet();
        return $hasil;
    }
    public function tes_fisik()
    {
        $this->db->query("SELECT * FROM tes_fisik");
        $hasil = $this->db->resultSet();
        return $hasil;
    }
    public function tabelAnalisis()
    {
    }
}
