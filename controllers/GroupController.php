<?php

class GroupController
{

    //Action для главной страницы

    public function actionIndex()
    {

        // Подключаем вид
        require_once(ROOT . '/views/site/group/index.php');
        return true;
    }



}
