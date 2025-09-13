<?php
// require_once '../../index.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    <!-- <link rel="stylesheet" href="../../assets/style.css"> -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
        integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            <div id="sidebar" class="col-md-3 col-lg-2 p-3 bg-dark text-white sticky-top sidebar"
                style="height: 100vh; overflow-y: auto;">
                <div class="container d-flex justify-content-between">
                    <h4 class="mb-4">Dashboard</h4>
                    <!-- <i id="toggleSidebar" class="fa-solid fa-bars fa-xl mt-3" style="cursor: pointer;"></i> -->
                </div>
                <ul class="nav flex-column">
                    <!-- Home -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php?page=index">
                            <i class="fa-solid fa-house text-white"></i>
                            Home
                        </a>
                    </li>
                    <!-- Profile -->
                    <?php if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2): ?>
                        <li class="nav-item">
                            <a class="nav-link text-white text-capitalize" href="index.php?page=profile">
                                Profile <?= ($_SESSION['role_name']) ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ($_SESSION['role_id'] == 3): ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="index.php?page=profile">
                                Daftar Siswa
                            </a>
                        </li>
                    <?php endif; ?>

                    <!-- DATA USER for admin -->
                    <?php if ($_SESSION['role_id'] == 1): ?>
                        <li class="nav-item">
                            <a class="nav-link text-white d-flex justify-content-between align-items-center"
                                data-bs-toggle="collapse" href="#data_user" role="button" aria-expanded="false"
                                aria-controls="data_user">
                                <span>Data User</span>
                                <i class="fa fa-chevron-down"></i>
                            </a>

                            <div class="collapse ps-3 mt-1" id="data_user">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="index.php?page=daftar_user">
                                            </i> Daftar User
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>

                    <!-- DATA GURU -->
                    <?php if ($_SESSION['role_id'] == 1): ?>
                        <li class="nav-item">
                            <a class="nav-link text-white d-flex justify-content-between align-items-center"
                                data-bs-toggle="collapse" href="#data_guru" role="button" aria-expanded="false"
                                aria-controls="data_guru">
                                <span>Data Guru</span>
                                <i class="fa fa-chevron-down"></i>
                            </a>

                            <div class="collapse ps-3 mt-1" id="data_guru">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="index.php?page=daftar_guru">
                                            <!-- <i class="fa fa-bolt me-2 text-danger"></i>  -->
                                            Daftar Guru
                                        </a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link text-white" href="index.php?page=input_guru">
                                            <i class="fa fa-bolt me-2 text-danger"></i>
                                            Input Guru
                                        </a> -->
                        </li>
                        <!-- <li class="nav-item">
                                    <a class="nav-link text-white" href="#">
                                        <i class="fa fa-cogs me-2 text-info"></i> Another Action
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider bg-light">
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">
                                        <i class="fa fa-question-circle me-2 text-light"></i> Something Else
                                    </a>
                                </li> -->
                    </ul>
                </div>
                </li>
            <?php endif; ?>
            <!-- DATA SISWA for guru -->
            <?php if ($_SESSION['role_id'] == 2): ?>
                <li class="nav-item">
                    <a class="nav-link text-white d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" href="#data_siswa" role="button" aria-expanded="false"
                        aria-controls="data_siswa">
                        <span>Data Siswa</span>
                        <i class="fa fa-chevron-down"></i>
                    </a>

                    <div class="collapse ps-3 mt-1" id="data_siswa">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="index.php?page=daftar_siswa">
                                    </i> Daftar Siswa
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="index.php?page=data_siswa_pelanggaran_siswa">
                                    </i> Pelanggaran Siswa
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
            <!-- DATA SISWA for admin -->
            <?php if ($_SESSION['role_id'] == 1): ?>
                <li class="nav-item">
                    <a class="nav-link text-white d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" href="#data_siswa" role="button" aria-expanded="false"
                        aria-controls="data_siswa">
                        <span>Data Siswa</span>
                        <i class="fa fa-chevron-down"></i>
                    </a>

                    <div class="collapse ps-3 mt-1" id="data_siswa">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="index.php?page=daftar_siswa_for_admin">
                                    </i> Daftar Siswa
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
            <!-- PELANGGARAN -->
            <li class="nav-item">
                <a class="nav-link text-white d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" href="#pelanggaran" role="button" aria-expanded="false"
                    aria-controls="pelanggaran">
                    <span>Pelanggaran</span>
                    <i class="fa fa-chevron-down"></i>
                </a>

                <div class="collapse ps-3 mt-1" id="pelanggaran">
                    <ul class="nav flex-column">
                        <?php if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2): ?>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="index.php?page=input_pelanggaran">
                                    Input Pelanggaran
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if ($_SESSION['role_id'] == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="index.php?page=rekap_pelanggaran">
                                    Rekap Pelanggaran
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if ($_SESSION['role_id'] == 3): ?>
                            <li class="nav-item">
                                <a class="nav-link text-white"
                                    href="index.php?page=pelanggaran_siswa&id=<?= $_SESSION['user_id'] ?>">
                                    Pelanggaran Siswa
                                </a>
                            </li>
                        <?php endif ?>

                        <li>
                            <hr class="dropdown-divider bg-light">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="index.php?page=jenis_pelanggaran">
                                Jenis Pelanggaran
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="index.php?page=history_pelanggaran">
                                History Pelanggaran
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- PENGATURAN -->
            <li class="nav-item">
                <a class="nav-link text-white d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" href="#pengaturan" role="button" aria-expanded="false"
                    aria-controls="pengaturan">
                    <span>Pengaturan</span>
                    <i class="fa fa-chevron-down"></i>
                </a>

                <div class="collapse ps-3 mt-1" id="pengaturan">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fa fa-bolt me-2 text-warning"></i> Action
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fa fa-cogs me-2 text-info"></i> Another Action
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider bg-light">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fa fa-question-circle me-2 text-light"></i> Something Else
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- template sidebar dropdown -->
            <!-- <li class="nav-item">
                        <a
                            class="nav-link text-white d-flex justify-content-between align-items-center"
                            data-bs-toggle="collapse"
                            href="#sidebarDropdown"
                            role="button"
                            aria-expanded="false"
                            aria-controls="sidebarDropdown">
                            <span> Dropdown Menu</span>
                            <i class="fa fa-chevron-down"></i>
                        </a>

                        <div class="collapse ps-3 mt-1" id="sidebarDropdown">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">
                                        <i class="fa fa-bolt me-2 text-warning"></i> Action
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">
                                        <i class="fa fa-cogs me-2 text-info"></i> Another Action
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider bg-light">
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">
                                        <i class="fa fa-question-circle me-2 text-light"></i> Something Else
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> -->

            <li class="nav-item">
                <a class="nav-link text-white" href="index.php?page=logout">
                    Logout
                </a>
            </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 px-0">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg bg-primary px-4 sticky-top" data-bs-theme="dark">
                <div class="container-fluid d-flex justify-content-between align-items-center"></div>
                <!-- <a class="navbar-brand" href="#">Welcome, Admin | Role -->
                <!-- </a> -->
                <?php if (isset($_SESSION['user_id']) && isset($_SESSION['role_id'])): ?>
                    <p class="navbar-brand">
                        Welcome, <?= htmlspecialchars($_SESSION['user_name']) ?>
                    </p>
                <?php endif; ?>

                <?php if (isset($_SESSION['user_id']) && isset($_SESSION['role_id'])): ?>
                    <?php
                    // Ambil nama dari session
                    $fullName = $_SESSION['user_name'];

                    // Pecah berdasarkan spasi dan ambil nama depan
                    $firstName = explode(' ', trim($fullName))[0];
                    ?>
                    <p class="navbar-brand-md">
                        Welcome, <?= htmlspecialchars($firstName) ?>
                    </p>
                <?php endif; ?>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Toggle Sidebar Button -->
                <!-- <button class="btn btn-primary" id="toggleSidebar" style="display: none;">
                        <i class="fa fa-bars"></i>
                    </button> -->
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="nav flex-column">
                        <!-- Home -->
                        <li class="nav-item nav-test">
                            <a class="nav-link text-white" href="index.php?page=index">
                                <i class="fa-solid fa-house text-white"></i>
                                Home
                            </a>
                        </li>
                        <!-- Profile -->
                        <?php if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2): ?>
                            <li class="nav-item nav-test">
                                <a class="nav-link text-white text-capitalize" href="index.php?page=profile">
                                    Profile <?= ($_SESSION['role_name']) ?>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ($_SESSION['role_id'] == 3): ?>
                            <li class="nav-item nav-test">
                                <a class="nav-link text-white" href="index.php?page=profile">
                                    Profile Siswa
                                </a>
                            </li>
                        <?php endif; ?>

                        <!-- DATA GURU -->
                        <?php if ($_SESSION['role_id'] == 1): ?>
                            <li class="nav-item nav-test">
                                <a class="nav-link text-white d-flex justify-content-between align-items-center"
                                    data-bs-toggle="collapse" href="#data_guru" role="button" aria-expanded="false"
                                    aria-controls="data_guru">
                                    <span>Data Guru</span>
                                    <i class="fa fa-chevron-down"></i>
                                </a>

                                <div class="collapse ps-3 mt-1" id="data_guru">
                                    <ul class="nav flex-column">
                                        <li class="nav-item nav-test">
                                            <a class="nav-link text-white" href="index.php?page=daftar_guru">
                                                <!-- <i class="fa fa-bolt me-2 text-danger"></i>  -->
                                                Daftar Guru
                                            </a>
                                        </li>
                                        <li class="nav-item nav-test">
                                            <a class="nav-link text-white" href="index.php?page=input_guru">
                                                <!-- <i class="fa fa-bolt me-2 text-danger"></i>  -->
                                                Input Guru
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        <?php endif; ?>
                        <!-- DATA SISWA -->
                        <?php if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2): ?>
                            <li class="nav-item nav-test">
                                <a class="nav-link text-white d-flex justify-content-between align-items-center"
                                    data-bs-toggle="collapse" href="#data_siswa" role="button" aria-expanded="false"
                                    aria-controls="data_siswa">
                                    <span>Data Siswa</span>
                                    <i class="fa fa-chevron-down"></i>
                                </a>

                                <div class="collapse ps-3 mt-1" id="data_siswa">
                                    <ul class="nav flex-column">
                                        <li class="nav-item nav-test">
                                            <a class="nav-link text-white" href="#">
                                                </i> Daftar Siswa
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-white"
                                                href="index.php?page=data_siswa_pelanggaran_siswa">
                                                </i> Pelanggaran Siswa
                                            </a>
                                        </li>
                                        <!-- <li class="nav-item nav-test">
                                    <a class="nav-link text-white" href="#">
                                        <i class="fa fa-cogs me-2 text-info"></i> Another Action
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider bg-light">
                                </li>
                                <li class="nav-item nav-test">
                                    <a class="nav-link text-white" href="#">
                                        <i class="fa fa-question-circle me-2 text-light"></i> Something Else
                                    </a>
                                </li> -->
                                    </ul>
                                </div>
                            </li>
                        <?php endif; ?>
                        <!-- PELANGGARAN -->
                        <li class="nav-item nav-test">
                            <a class="nav-link text-white d-flex justify-content-between align-items-center"
                                data-bs-toggle="collapse" href="#pelanggaran" role="button" aria-expanded="false"
                                aria-controls="pelanggaran">
                                <span>Pelanggaran</span>
                                <i class="fa fa-chevron-down"></i>
                            </a>

                            <div class="collapse ps-3 mt-1" id="pelanggaran">
                                <ul class="nav flex-column">
                                    <?php if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2): ?>
                                        <li class="nav-item nav-test">
                                            <a class="nav-link text-white" href="index.php?page=input_pelanggaran">
                                                Input Pelanggaran
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if ($_SESSION['role_id'] == 1): ?>
                                        <li class="nav-item nav-test">
                                            <a class="nav-link text-white" href="index.php?page=rekap_pelanggaran">
                                                Rekap Pelanggaran
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if ($_SESSION['role_id'] == 3): ?>
                                        <li class="nav-item nav-test">
                                            <a class="nav-link text-white"
                                                href="index.php?page=pelanggaran_siswa&id=<?= $_SESSION['user_id'] ?>">
                                                Pelanggaran Siswa
                                            </a>
                                        </li>
                                    <?php endif ?>

                                    <li>
                                        <hr class="dropdown-divider bg-light">
                                    </li>
                                    <li class="nav-item nav-test">
                                        <a class="nav-link text-white" href="index.php?page=jenis_pelanggaran">
                                            Jenis Pelanggaran
                                        </a>
                                    </li>
                                    <li class="nav-item nav-test">
                                        <a class="nav-link text-white" href="index.php?page=history_pelanggaran">
                                            History Pelanggaran
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- PENGATURAN -->
                        <li class="nav-item nav-test">
                            <a class="nav-link text-white d-flex justify-content-between align-items-center"
                                data-bs-toggle="collapse" href="#pengaturan" role="button" aria-expanded="false"
                                aria-controls="pengaturan">
                                <span>Pengaturan</span>
                                <i class="fa fa-chevron-down"></i>
                            </a>

                            <div class="collapse ps-3 mt-1" id="pengaturan">
                                <ul class="nav flex-column">
                                    <li class="nav-item nav-test">
                                        <a class="nav-link text-white" href="#">
                                            <i class="fa fa-bolt me-2 text-warning"></i> Action
                                        </a>
                                    </li>
                                    <li class="nav-item nav-test">
                                        <a class="nav-link text-white" href="#">
                                            <i class="fa fa-cogs me-2 text-info"></i> Another Action
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider bg-light">
                                    </li>
                                    <li class="nav-item nav-test">
                                        <a class="nav-link text-white" href="#">
                                            <i class="fa fa-question-circle me-2 text-light"></i> Something Else
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item nav-test">
                            <a class="nav-link text-white" href="index.php?page=logout">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>