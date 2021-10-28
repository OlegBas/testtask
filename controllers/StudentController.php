<?php

class StudentController
{

    //Action для главной страницы

    public function actionIndex()
    {

        // Подключаем вид
        require_once(ROOT . '/views/site/student/index.php');
        return true;
    }



}
