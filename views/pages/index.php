<?php


require_once __DIR__ . ("/../../config/koneksi.php");
require_once(__DIR__ . '/../layouts/header.php');

// Ambil data pelanggaran siswa beserta total poin
// =====================================================================================================
$pelanggarans = [];
$getData = $conn->query("SELECT 
    u.nama AS nama_siswa,
    u.kelas AS kelas,
    SUM(p.poin) AS total_poin
FROM users u
JOIN pelanggaran_siswa ps ON u.id = ps.siswa_id
JOIN pelanggaran p ON ps.pelanggaran_id = p.id
GROUP BY u.id
ORDER BY total_poin DESC
LIMIT 10
");

while ($row = $getData->fetch_assoc()) {
    $pelanggarans[] = $row;
}

// Format data untuk chart
$dataPoints = array_map(function ($data_point) {
    $data_ = $data_point;
    return [
        'label' => htmlspecialchars($data_['nama_siswa']),
        'y' => (int) $data_['total_poin'],
    ];
}, $pelanggarans);

// =====================================================================================================


// Ambil data pelanggaran harian
// =====================================================================================================

$getDataPelanggaranHarian = $conn->query('
    SELECT
    u.id AS user_id,
        u.nama AS user_nama,
        u.kelas AS user_kelas,
        p.id AS pelanggaran_id,
        p.nama_pelanggaran AS pelanggaran_nama,
        p.poin AS pelanggaran_poin,
        ps.tanggal AS pelanggaran_tanggal,
        ps.guru_piket,
        ps.id AS ps_id
    FROM
        users u
        JOIN pelanggaran_siswa ps ON u.id = ps.siswa_id
        JOIN pelanggaran p ON ps.pelanggaran_id = p.id
    WHERE
        DATE(ps.tanggal) = CURDATE()
    ORDER BY
        ps.tanggal DESC
        LIMIT 100
        ');

$dataPage = [];


while ($row = $getDataPelanggaranHarian->fetch_assoc()) {
    $dataPage[] = $row;
}



// =====================================================================================================


?>


<script>
    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "dark2",
            title: {
                text: "Siswa dengan Poin Pelanggaran Terbanyak"
            },
            axisY: {
                title: "Total Poin"
            },
            data: [{
                type: "column",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
    }
</script>
<style>
    @media screen and (max-width: 768px) {
        .tanggal_pelanggaran {
            font-size: 14px;
        }

        table {
            font-size: 13px;
        }

        #chartContainer {
            display: none;
        }
    }
</style>


<div class="container ">

    <!-- SISWA_BERMASALAH -->
    <section id="siswa_bermasalah" class="py-2">
        <div class="">
            <h4 class="tanggal_pelanggaran">Siswa Bermasalah hari ini <span class="fw-bold" id="tanggal"></span></h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive " style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-hover">
                            <thead class="table-primary sticky-top bg-primary text-white" style="z-index: auto;">
                                <tr>
                                    <th scope="col">No</th>
                                    <!-- <th scope="col">Foto</th> -->
                                    <th scope="col">Nama Siswa</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Pelanggaran</th>
                                    <th scope="col">Poin</th>
                                    <th scope="col">Guru Piket</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider table-hover">
                                <?php if (count($dataPage) === 0): ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data pelanggaran hari ini.</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($dataPage as $i => $item): ?>
                                        <tr>
                                            <th scope="row"><?= $i + 1 ?></th>
                                            <!-- <td><img src="<?= BASE_URL ?>assets/img/<?= $item[''] ?>.jpg" alt=""
                                                    srcset=""></td> -->
                                            <!-- <td><img src="<?= BASE_URL ?>assets/img/default.png"
                                                    alt="<?= htmlspecialchars($item['user_nama']) ?>" style="width: 40px;"></td> -->
                                            <td><?= htmlspecialchars($item['user_nama']) ?></td>
                                            <td><?= htmlspecialchars($item['user_kelas']) ?></td>
                                            <td><?= htmlspecialchars($item['pelanggaran_nama']) ?></td>
                                            <td><?= htmlspecialchars($item['pelanggaran_poin']) ?></td>
                                            <td><?= htmlspecialchars($item['guru_piket']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <hr class="mb-4">
    <br>
    <!-- CHART -->
    <section id="chart">
        <div class="row">
            <div class="col-md-12">
                <div id="chartContainer" style="height: 370px; width: 100%; border-left:1px solid #333;"></div>
            </div>
        </div>
    </section>

</div>





<!-- chart js -->
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

</div>
</div>

<?php
require_once(__DIR__ . '/../layouts/footer.php');
// require_once '../layouts/footer.php';
?>