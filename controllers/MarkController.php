<?php

class MarkController
{

    //Action для главной страницы

    public function actionIndex()
    {

        // Подключаем вид
        require_once(ROOT . '/views/site/mark/index.php');
        return true;
    }



}
