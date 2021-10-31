<?php include ROOT . '/widgets/alert.php'; ?>
<form role="form" method = "post">
    <div class="form-group">
        <label for="fio">ФИО</label>
        <input type="text" class="form-control" id="fio" placeholder="ФИО" name = "Student[fio]" value = "<?=@$entity[0]["fio"]?>">
    </div>
    <div class="form-group">
        <label for="group_id">Группа</label>
        <select  class = "form-control" name="Student[idGroup]" id = "id_group">
            <?php for($i = 0;$i < count($groups);$i++){?>
                <option   <?php if($groups[$i]["id"] == @$entity[0]["idGroup"]) {?>selected<?php }?> value="<?=$groups[$i]["id"]?>"><?=$groups[$i]["title"]?></option>
            <?php }?>
        </select>
    </div>

    <button type="submit" class="btn btn-default" name = "send_form"><?=$title_action?></button>
</form>