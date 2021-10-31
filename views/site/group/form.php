<?php include ROOT . '/widgets/alert.php'; ?>
<form role="form" method = "post">
    <div class="form-group">
        <label for="title">Название</label>
        <input type="text" class="form-control" id="title" placeholder="Название" name = "Group[title]" value = "<?=@$entity[0]["title"]?>" >
    </div>

    <button type="submit" class="btn btn-default" name="send_form"><?=$title_action?></button>
</form>
