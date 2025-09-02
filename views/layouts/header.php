<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
        integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            <div id="sidebar" class="col-md-3 col-lg-2 p-3 bg-dark text-white sticky-top sidebar" style="height: 100vh; overflow-y: auto;">
                <div class="container d-flex justify-content-between" style="cursor: pointer;">
                    <h4 class="mb-4">Dashboard</h4>
                    <i id="toggleSidebar" class="fa-solid fa-bars fa-xl mt-3"></i>
                </div>
                <ul class="nav flex-column">
                    <!-- Home -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php">
                            Home
                            <i class="fa fa-car fa-md"></i>
                        </a>
                    </li>
                    <!-- Profile -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="profile.php">
                            Profile
                        </a>
                    </li>

                    <!-- DATA GURU -->
                    <li class="nav-item">
                        <a
                            class="nav-link text-white d-flex justify-content-between align-items-center"
                            data-bs-toggle="collapse"
                            href="#data_guru"
                            role="button"
                            aria-expanded="false"
                            aria-controls="data_guru">
                            <span>Data Guru</span>
                            <i class="fa fa-chevron-down"></i>
                        </a>

                        <div class="collapse ps-3 mt-1" id="data_guru">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">
                                        <!-- <i class="fa fa-bolt me-2 text-danger"></i>  -->
                                        Profil Guru
                                    </a>
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
                    <!-- DATA SISWA -->
                    <li class="nav-item">
                        <a
                            class="nav-link text-white d-flex justify-content-between align-items-center"
                            data-bs-toggle="collapse"
                            href="#data_siswa"
                            role="button"
                            aria-expanded="false"
                            aria-controls="data_siswa">
                            <span>Data Siswa</span>
                            <i class="fa fa-chevron-down"></i>
                        </a>

                        <div class="collapse ps-3 mt-1" id="data_siswa">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">
                                        </i> Profil Siswa
                                    </a>
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
                    <!-- PELANGGARAN -->
                    <li class="nav-item">
                        <a
                            class="nav-link text-white d-flex justify-content-between align-items-center"
                            data-bs-toggle="collapse"
                            href="#pelanggaran"
                            role="button"
                            aria-expanded="false"
                            aria-controls="pelanggaran">
                            <span>Pelanggaran</span>
                            <i class="fa fa-chevron-down"></i>
                        </a>

                        <div class="collapse ps-3 mt-1" id="pelanggaran">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">
                                        Pelanggaran Siswa
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider bg-light">
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="../pages/pelanggaran/jenis_pelanggaran.php">
                                        Jenis Pelanggaran
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- PENGATURAN -->
                    <li class="nav-item">
                        <a
                            class="nav-link text-white d-flex justify-content-between align-items-center"
                            data-bs-toggle="collapse"
                            href="#pengaturan"
                            role="button"
                            aria-expanded="false"
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
                        <a class="nav-link text-white" href="#">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 px-0">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg bg-primary px-4 sticky-top" data-bs-theme="dark">
                    <a class="navbar-brand" href="#">Welcome, Admin</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Notifications</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Messages</a>
                            </li>
                        </ul>
                    </div>
                </nav>