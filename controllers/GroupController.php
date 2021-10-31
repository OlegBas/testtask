<?php

class GroupController
{

    public $tmp_name = "group";
    public $model;

    public function __construct()
    {
        $this->model = new Group();
    }

    public function actionIndex()
    {

        $list_data = $this->model->selectAll(Group::TABLENAME);
        require_once(ROOT . "/views/site/".$this->tmp_name."/index.php");
        return true;
    }

    public function actionCreate()
    {

        if(isset($_POST['send_form'])){
            if($this->model->insert(Group::TABLENAME,$_POST["Group"])) {
                return header("Location: /group");
            }
        }
        // Подключаем вид
        require_once(ROOT . "/views/site/".$this->tmp_name."/create.php");
        return true;
    }

    public function actionUpdate()
    {
        // Подключаем вид
        if(isset($_POST['send_form'])){
            $params_url = explode("/",$_SERVER["REQUEST_URI"]);
            $id = $params_url[3];
            if($this->model->update(Group::TABLENAME,$_POST["Group"],$id)) {
                return header("Location: /group");
            }
        }
        require_once(ROOT . "/views/site/".$this->tmp_name."/update.php");
        return true;
    }

    public function actionDelete()
    {
        $params_url = explode("/",$_SERVER["REQUEST_URI"]);
        $id = $params_url[3];
        if($this->model->delete(Group::TABLENAME,$id)) {
            return header("Location: /group");
        }
        return true;
    }



}
