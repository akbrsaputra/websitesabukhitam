<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $data['title']; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Data Table Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo BASEURL; ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/assets/css/templatemo-space-dynamic.css"> <!-- css home -->
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/assets/css/style.css"> <!-- css side bar -->
</head>

<body>
    <nav class="sidebar ">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="<?= BASEURL ?>/gambar/organisasi/logo_taekwondo.png" alt="logo">
                </span>
                <span class="text nav-text fs-5 ms-2">TAEKWONDO</span>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-link">
                    <li class="nav-link">
                        <a href="<?php echo BASEURL; ?>/juri">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <hr>
                    <li class="nav-link">
                        <a href="<?php echo BASEURL; ?>/juri/alternatif">
                            <i class='bx bxs-group icon'></i>
                            <span class="text nav-text">Data Peserta Ujian</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="<?php echo BASEURL; ?>/juri/hasil">
                            <i class='bx bx-bar-chart-alt icon'></i>
                            <span class="text nav-text">Hasil peringkat</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="<?php echo BASEURL; ?>/juri/data_analisis">
                            <i class='bx bx-bar-chart-alt icon'></i>
                            <span class="text nav-text">Data Analisis</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="<?php echo BASEURL; ?>/juri/data_perhitungan">
                            <i class='bx bx-bar-chart-alt icon'></i>
                            <span class="text nav-text">Data Perhitungan</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="<?php echo BASEURL; ?>/home">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>
        </div>
    </nav>