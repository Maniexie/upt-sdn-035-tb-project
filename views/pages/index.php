<?php

$dataPoints = array(
    array("label" => "Education", "y" => 22),
    array("label" => "Entertainment", "y" => 48),
    array("label" => "Lifestyle", "y" => 14),
    array("label" => "Business", "y" => 64),
    array("label" => "Music & Audio", "y" => 85),
    array("label" => "Personalization", "y" => 42),
    array("label" => "Tools", "y" => 37),
    array("label" => "Books & Reference", "y" => 40),
    array("label" => "Travel & Local", "y" => 87),
    array("label" => "Puzzle", "y" => 30),
    array("label" => "Kotok", "y" => 99)
);

?>

<script>
    window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title: {
                text: "Peringkat Kelas Bermasalah"
            },
            axisY: {
                title: "Point"
            },
            data: [{
                type: "column",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

        var chart2 = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title: {
                text: "Peringkat Kelas Bermasalah"
            },
            axisY: {
                title: "Point"
            },
            data: [{
                type: "column",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart2.render();

        var chart3 = new CanvasJS.Chart("chartContainer3", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title: {
                text: "Peringkat Kelas Bermasalah"
            },
            axisY: {
                title: "Point"
            },
            data: [{
                type: "column",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart3.render();

    }
</script>
<?php require_once '../layouts/header.php';

?>
<!-- Dashboard Content -->
<!-- <h2 class="mb-4">Dashboard Content</h2> -->
<!-- <div class="container d-flex">

        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    </section> -->

<div class="container-fluid">

    <!-- SISWA_BERMASALAH -->
    <section id="siswa_bermasalah" class="py-2">
        <div class="">
            <h4>Siswa Bermasalah hari ini <span class="fw-bold" id="tanggal"></span></h4>
            <div class="slider-wrapper">
                <div class="slider" id="slider">
                    <!-- Card 1 -->
                    <div class="card">
                        <img src="../../assets/img/default.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Suroto Pangestu Wijaya</h5>
                            <p class="card-text"><span class="fw-semibold">Kesalahan:</span> Tidak Membawa Topi</p>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="card">
                        <img src="../../assets/img/default.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Budi Santoso</h5>
                            <p class="card-text"><span class="fw-semibold">Kesalahan:</span> Terlambat Masuk</p>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="card">
                        <img src="../../assets/img/default.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Andi Saputra</h5>
                            <p class="card-text"><span class="fw-semibold">Kesalahan:</span> Tidak Membawa Buku</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="../../assets/img/default.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Andi Saputra</h5>
                            <p class="card-text"><span class="fw-semibold">Kesalahan:</span> Tidak Membawa Buku</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="../../assets/img/default.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Andi Saputra</h5>
                            <p class="card-text"><span class="fw-semibold">Kesalahan:</span> Tidak Membawa Buku</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="../../assets/img/default.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Andi Saputra</h5>
                            <p class="card-text"><span class="fw-semibold">Kesalahan:</span> Tidak Membawa Buku</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="../../assets/img/default.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Andi Saputra</h5>
                            <p class="card-text"><span class="fw-semibold">Kesalahan:</span> Tidak Membawa Buku</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="../../assets/img/default.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Andi Saputra</h5>
                            <p class="card-text"><span class="fw-semibold">Kesalahan:</span> Tidak Membawa Buku</p>
                        </div>
                    </div>
                    <!-- Tambahkan card lain sesuai kebutuhan -->
                </div>
            </div>
        </div>
    </section>
    <hr class="mb-4">
    <br>
    <!-- CHART -->
    <section id="chart">
        <div class="row">
            <div class="col-md-4 ">
                <div id="chartContainer2" style="height: 370px; width: 100%; border-left:1px solid #333;"></div>
            </div>
            <div class="col-md-4 border-end">
                <div id="chartContainer3" style="height: 370px; width: 100%; border-left:1px solid #333;"></div>
            </div>
            <div class="col-md-4">
                <div id="chartContainer" style="height: 370px; width: 100%; border-left:1px solid #333;"></div>
            </div>
        </div>
    </section>

</div>

<!-- utilities -->
<script src="../utilities/tanggal.js"></script>
<script src="../utilities/slider.js"></script>
<script src="../utilities/sidebar.js"></script>


<!-- chart js -->
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</div>
</div>

<?php require_once '../layouts/footer.php';
