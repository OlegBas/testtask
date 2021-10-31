<?php

class StudentController
{

    public $tmp_name = "student";

    public $model;

    public function __construct()
    {
        $this->model = new Student();
    }

    public function actionIndex()
    {
        $student = new Student();
        $list_data = $student->selectAll(Student::TABLENAME);
        // Подключаем вид
        require_once(ROOT . "/views/site/".$this->tmp_name."/index.php");
        return true;
    }

    public function actionCreate()
    {
        if(isset($_POST['send_form'])){
            if($this->model->insert(Student::TABLENAME,$_POST["Student"])) {
                return header("Location: /student");
            }
        }
        // Подключаем вид
        require_once(ROOT . "/views/site/".$this->tmp_name."/create.php");
        return true;
    }

    public function actionUpdate()
    {
        if(isset($_POST['send_form'])){
            $params_url = explode("/",$_SERVER["REQUEST_URI"]);
            $id = $params_url[3];
            if($this->model->update(Student::TABLENAME,$_POST["Student"],$id)) {
                return header("Location: /student");
            }
        }
        // Подключаем вид
        require_once(ROOT . "/views/site/".$this->tmp_name."/update.php");
        return true;
    }

    public function actionDelete()
    {
        $params_url = explode("/",$_SERVER["REQUEST_URI"]);
        $id = $params_url[3];
        if($this->model->delete(Student::TABLENAME,$id)) {
            return header("Location: /student");
        }
        return true;
    }






}
