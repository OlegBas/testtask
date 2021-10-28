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
        <tr>
            <td>1</td>
            <td>Бас Олег Генн</td>
            <td>Физика</td>
            <td>5</td>
            <td>
                <?php include ROOT . '/widgets/action_buttons.php'; ?>
            </td>
        </tr>

    </table>
</div>
<?php include ROOT . '/views/layouts/footer.php'; ?>
