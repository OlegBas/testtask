<?php $title = "Оценки";
$url_page = "/mark";
?>
<?php include ROOT . '/views/layouts/header.php'; ?>
<div class="container">
    <?php include ROOT . '/widgets/breadcrumb.php'; ?>
    <?php include ROOT . '/widgets/add_button.php'; ?>
    <table class="table table-striped" >
        <tr>
            <th>ID</th>
            <th>Студент</th>
            <th>Предмет</th>
            <th>Оценка</th>
            <th>Действия</th>
        </tr>
        <?php for($i = 0;$i < count($list_data);$i++) {?>
            <tr>

                <td><?=$list_data[$i]["id"]?></td>
                <td><?=$list_data[$i]["fio"]?></td>
                <td><?=$list_data[$i]["title"]?></td>
                <td><?=$list_data[$i]["mark"]?></td>
                <td>
                    <?php include ROOT . '/widgets/action_buttons.php'; ?>
                </td>
            </tr>
        <?php }?>

    </table>
</div>
<?php include ROOT . '/views/layouts/footer.php'; ?>
