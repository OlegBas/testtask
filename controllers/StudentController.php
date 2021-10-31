<?php

class StudentController extends BaseController
{

    public $tmp_name = "student";

    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Student();
    }

    public function actionIndex()
    {
        $list_data = $this->model->selectAll(Student::TABLENAME);
        // Подключаем вид
        require_once(ROOT . "/views/site/".$this->tmp_name."/index.php");
        return true;
    }

    public function actionCreate()
    {
        $this->sendForm("create",Student::TABLENAME,"Student","student");
        // Подключаем вид
        require_once(ROOT . "/views/site/".$this->tmp_name."/create.php");
        return true;
    }

    public function actionUpdate()
    {
        $this->sendForm("update",Student::TABLENAME,"Student","student");
        // Подключаем вид
        require_once(ROOT . "/views/site/".$this->tmp_name."/update.php");
        return true;
    }

    public function actionDelete()
    {
        $this->sendForm("delete",Student::TABLENAME,"Student","student");
        return true;
    }






}
