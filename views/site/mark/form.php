<form role="form" method = "post">
    <div class="form-group">
        <label for="mark">Предмет</label>
        <select class="form-control" name = "Student_subject">
            <option>1</option>
            <option>2</option>
        </select>
    </div>
    <div class="form-group">
        <label for="mark">Студент</label>
        <select class="form-control" name = "Student_fio">
            <option>1</option>
            <option>2</option>
        </select>
    </div>
    <div class="form-group">
        <label for="mark">Оценка</label>
        <input type="text" class="form-control" id="mark" placeholder="Оценка" min = "2" max = "5">
    </div>

    <button type="submit" class="btn btn-default"><?=$title_action?></button>
</form>