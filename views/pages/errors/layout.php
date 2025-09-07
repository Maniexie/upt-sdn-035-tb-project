<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light text-center vh-100 ">
    <div class="container d-flex flex-column justify-content-center align-items-center h-100">
        <h1 class="display-4 text-danger"><?= $code_error ?></h1>
        <p class="lead"> <?= $message ?></p>
        <!-- <a href="/" class="btn btn-primary">Kembali ke Beranda</a> -->
    </div>
</body>

</html>