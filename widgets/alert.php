<?php if(!empty($model->errors)){?>
<div class="alert alert-danger">
    <?php for($i = 0;$i < count($model->errors);$i++){?>
        <?=$model->errors[$i]?><br>
    <?php }?>
</div>
<?php }?>