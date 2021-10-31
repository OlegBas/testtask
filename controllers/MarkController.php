<?php

class MarkController extends BaseController
{

    public $tmp_name = "mark";
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Mark();
    }

    public function actionIndex()
    {
        $list_data = $this->model->getAllMarks();
        // Подключаем вид
        require_once(ROOT . "/views/site/".$this->tmp_name."/index.php");
        return true;
    }

    public function actionCreate()
    {
        $all_subjects = $this->model->selectAll(Subject::TABLENAME);
        $all_students = $this->model->selectAll(Student::TABLENAME);
        $this->sendForm("create",Mark::TABLENAME,"Mark","mark");
        // Подключаем вид
        require_once(ROOT . "/views/site/".$this->tmp_name."/create.php");
        return true;
    }

    public function actionUpdate()
    {
        $id = $this->getIDFromUrl();
        $all_subjects = $this->model->selectAll(Subject::TABLENAME);
        $all_students = $this->model->selectAll(Student::TABLENAME);
        $entity = $this->model->select(Mark::TABLENAME,"*","id = $id");
        $this->sendForm("update",Mark::TABLENAME,"Mark","mark");
        // Подключаем вид
        require_once(ROOT . "/views/site/".$this->tmp_name."/update.php");
        return true;
    }

    public function actionDelete()
    {
        $this->sendForm("delete",Mark::TABLENAME,"Mark","mark");
        return true;
    }



}
