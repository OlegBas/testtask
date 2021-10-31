<?php

class SubjectController
{

    //Action для главной страницы

    public $tmp_name = "subject";
    public $model;

    public function __construct()
    {
        $this->model = new Subject();
    }


    public function actionIndex()
    {
        $subject = new Subject();
        $list_data = $subject->selectAll(Subject::TABLENAME);
        // Подключаем вид
        require_once(ROOT . "/views/site/".$this->tmp_name."/index.php");
        return true;
    }

    public function actionCreate()
    {
        if(isset($_POST['send_form'])){
            if($this->model->insert(Subject::TABLENAME,$_POST["Subject"])) {
                return header("Location: /subject");
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
            if($this->model->update(Subject::TABLENAME,$_POST["Subject"],$id)) {
                return header("Location: /subject");
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
        if($this->model->delete(Subject::TABLENAME,$id)) {
            return header("Location: /subject");
        }
        return true;
    }



}
