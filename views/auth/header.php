<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= isset($title) ? $title : 'Default Title'; ?>
    </title>
    <!-- sweet alert -->
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.23.0/dist/sweetalert2.min.css " rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        body {
            padding: 0;
            margin: 0;
        }

        .register_form {
            margin-top: 10px;
            height: 500px;
        }

        .kotak {
            margin-top: 10px;
        }

        img {
            padding-right: 10px;
        }

        /* Untuk layar kecil (max-width: 993px) */
        @media screen and (max-width: 993px) {
            img {
                /* display: none; */
                width: 300px;
                margin: auto;
                /* padding: 10px; */
                padding-right: 20px;
            }

            .register_form {
                width: auto;
            }

            body {
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: burlywood;
            }

        }

        /* Untuk layar kecil (max-width:768px) */
        @media screen and (max-width: 768px) {
            img {
                /* display: none; */
                width: 270px;
                margin: auto;
            }

        }
    </style>
</head>

<section class="vh-100 d-flex justify-content-center align-items-center" style="background-color: #9A616D;">
    <div class="register_form">
        <div class="card">
            <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="<?= BASE_URL ?>assets/img/logo.jpg" alt="Auth Form" class="img-fluid mt-5 ms-5 pb-5"
                        style="border-radius: 1rem 0 0 1rem;" />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">