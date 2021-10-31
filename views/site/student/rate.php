<?php $title = "Рейтинг студентов";
$url_page = "/student/rate";
?>
<?php include ROOT . '/views/layouts/header.php'; ?>
<div class="container">

    <?php include ROOT . '/widgets/breadcrumb.php'; ?>

    <table class="table table-striped" >
        <tr>
            <th>ID</th>
            <th>ФИО</th>
            <th>Средний балл</th>
        </tr>
        <?php  for($i = 0;$i < count($students);$i++) {?>
            <tr>

                <td><?=$students[$i]["id"]?></td>
                <td><?=$students[$i]["fio"]?></td>
                <td><?=$students[$i]["avgmark"]?></td>
            </tr>
        <?php }?>
    </table>
</div>
<?php include ROOT . '/views/layouts/footer.php'; ?>
