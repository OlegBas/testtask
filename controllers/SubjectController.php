<?php

class SubjectController
{

    //Action для главной страницы

    public function actionIndex()
    {

        // Подключаем вид
        require_once(ROOT . '/views/site/subject/index.php');
        return true;
    }



}
