<?php

class MarkController
{

    public $tmp_name = "mark";
    public $model;

    public function __construct()
    {
        $this->model = new Mark();
    }

    public function actionIndex()
    {
        $mark = new Mark();
        $list_data = $mark->selectAll(Mark::TABLENAME);
        // Подключаем вид
        require_once(ROOT . "/views/site/".$this->tmp_name."/index.php");
        return true;
    }

    public function actionCreate()
    {
        if(isset($_POST['send_form'])){
            if($this->model->insert(Mark::TABLENAME,$_POST["Mark"])) {
                return header("Location: /mark");
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
            if($this->model->update(Mark::TABLENAME,$_POST["Mark"],$id)) {
                return header("Location: /mark");
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
        if($this->model->delete(Mark::TABLENAME,$id)) {
            return header("Location: /mark");
        }
        return true;
    }



}
