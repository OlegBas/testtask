<form role="form" method = "post">
    <div class="form-group">
        <label for="mark">Предмет</label>
        <select class="form-control" name = "Mark[idSubject]">
            <option>1</option>
            <option>2</option>
        </select>
    </div>
    <div class="form-group">
        <label for="mark">Студент</label>
        <select class="form-control" name = "Mark[idStudent]">
            <option>1</option>
            <option>2</option>
        </select>
    </div>
    <div class="form-group">
        <label for="mark">Оценка</label>
        <input type="text" class="form-control" id="mark" placeholder="Оценка" min = "2" max = "5" name = "Mark[mark]">
    </div>

    <button type="submit" class="btn btn-default" name = "send_form"><?=$title_action?></button>
</form>