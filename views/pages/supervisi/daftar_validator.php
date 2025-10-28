<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

?>

<div class="container">
    <div class="table">
        <div class="table-wrapper">
            <h2 class=" text-center">Daftar Validator</h2>
            <div class="table-title text-center">
                <div class="row ">
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
            <?php if ($_SESSION['role_id'] == 1): ?>
                <div class="col-sm-6 mb-3">
                    <a href="index.php?page=tambah_validator" class="btn btn-success" data-toggle="modal"><i
                            class="material-icons">&#xE147;</i> <span>Tambah Validator</span></a>
                </div>
            <?php endif; ?>
        </div>

        <div class="row">
            <div class="col">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <?php if ($_SESSION['role_id'] == 1): ?>
                                <th>Username</th>
                            <?php endif; ?>
                            <th>Kelas</th>
                            <th>Role</th>
                            <th>Validator</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        // Query untuk mengambil daftar validator dan status pengisian questioner
                        $stmt = $db->prepare('
                                SELECT users.*, roles.role_name, 
                                       COUNT(questioner_answer.user_id) AS answered_count
                                FROM users 
                                JOIN roles ON roles.id = users.role_id
                                LEFT JOIN questioner_answer ON questioner_answer.user_id = users.id
                                WHERE users.role_id IN (1, 2)
                                AND users.validator = "yes"
                                GROUP BY users.id
                            ');
                        $stmt->execute();
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($result as $validator) {
                            $status = $validator['answered_count'] > 0 ? '✅' : '❌';
                            echo '<tr>';
                            echo '<td>' . $no . '</td>';
                            echo '<td>' . $validator['nama'] . '</td>';
                            ?>

                            <?php if ($_SESSION['role_id'] == 1):
                                echo '<td>' . $validator['username'] . '</td>';
                            endif; ?>

                            <?php
                            echo '<td>' . $validator['kelas'] . '</td>';
                            echo '<td class="text-capitalize">' . $validator['role_name'] . '</td>';
                            echo '<td>' . ($validator['validator'] == 'yes' ? 'Yes' : 'No') . '</td>';
                            echo '<td>' . $status . '</td>';
                            echo '</tr>';
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<?php
require_once __DIR__ . '/../../layouts/footer.php';
?>