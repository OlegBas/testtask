<?php include ROOT . '/widgets/alert.php'; ?>
<form role="form" method = "post">
    <div class="form-group">
        <label for="mark">Предмет</label>
        <select class="form-control" name = "Mark[idSubject]">
            <?php for($i = 0;$i < count($all_subjects);$i++){?>
            <option  <?php if($all_subjects[$i]["id"] == @$entity[0]["idSubject"]) {?> selected <?php }?> value = "<?=$all_subjects[$i]["id"]?>"><?=$all_subjects[$i]["title"]?></option>
            <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="mark">Студент</label>
        <select class="form-control" name = "Mark[idStudent]">
            <?php for($i = 0;$i < count($all_students);$i++){?>
                <option <?php if($all_students[$i]["id"] == @$entity[0]["idStudent"]) {?> selected <?php }?>  value = "<?=$all_students[$i]["id"]?>"><?=$all_students[$i]["fio"]?></option>
            <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="mark">Оценка</label>
        <input type="text" class="form-control" id="mark" placeholder="Оценка" min = "2" max = "5" name = "Mark[mark]" value = "<?=@$entity[0]["mark"]?>" >
    </div>

    <button type="submit" class="btn btn-default" name = "send_form"><?=$title_action?></button>
</form>