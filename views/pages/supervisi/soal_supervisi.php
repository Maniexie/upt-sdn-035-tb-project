<?php
require_once __DIR__ . '/../../layouts/header.php';
require_once __DIR__ . '/../../../koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?page=login');
    exit;
}

$stmt = $db->prepare("SELECT 
questioner_category.name_category, 
questioner_category.id , 
questioner.question , 
questioner.id as id_questioner 
FROM questioner_category 
JOIN questioner ON questioner_category.id = questioner.questioner_category_id");
$stmt->execute();
$questioners = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <div class="container">
        <h1 class="text-center me-5 title">Soal Supervisi</h1>
        <?php if ($_SESSION['role_id'] == 1): ?>
            <div class="container mb-2">
                <a href="index.php?page=input_questioner" class="btn btn-primary" target="_blank"> + Input
                    Quesioner</a>
                <a href="index.php?page=input_questioner_category" class="btn btn-primary" target="_blank"> + Input Category
                    Quesioner</a>
            </div>
        <?php endif; ?>
        <section class="container">
            <div class="table-responsive " style="max-height: 400px; overflow-y: auto;">
                <table class="table table-hover">
                    <thead class="table-primary sticky-top bg-primary text-white" style="z-index: auto;">
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Category</th>
                            <th scope="col">Quesioner</th>
                            <?php if ($_SESSION['role_id'] == 1): ?>
                                <th scope="col">Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php foreach ($questioners as $i => $item): ?>
                            <tr>
                                <th scope="row"><?= $i + 1 ?></th>
                                <td><?= $item['name_category'] ?></td>
                                <td><?= $item['question'] ?></td>

                                <?php if ($_SESSION['role_id'] == 1): ?>
                                    <td class="btn-flex">
                                        <a href="index.php?page=edit_jenis_pelanggaran&id=<?= $item['id'] ?>"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="confirmDelete(<?= $item['id'] ?>, '<?= htmlspecialchars(addslashes($item['name_category'])) ?>')">
                                            Hapus
                                        </button>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>

<?php
require_once __DIR__ . '/../../layouts/footer.php';
?>