<form role="form" method = "post">
    <div class="form-group">
        <label for="fio">ФИО</label>
        <input type="text" class="form-control" id="fio" placeholder="ФИО" name = "Student[fio]" value = "<?=@$entity[0]["fio"]?>">
    </div>

    <button type="submit" class="btn btn-default" name = "send_form"><?=$title_action?></button>
</form>