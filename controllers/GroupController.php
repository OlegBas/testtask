<?php

class GroupController extends BaseController
{

    public $tmp_name = "group";
    public $model;

    public function __construct()
    {
        parent::__construct();
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

        $this->sendForm("create",Group::TABLENAME,"Group","group");
        $model = $this->model;
        // Подключаем вид
        require_once(ROOT . "/views/site/".$this->tmp_name."/create.php");
        return true;
    }

    public function actionUpdate()
    {
        $id = $this->getIDFromUrl();
        $entity = $this->model->select(Group::TABLENAME,"*","id = $id");
        // Подключаем вид
        $this->sendForm("update",Group::TABLENAME,"Group","group");
        $model = $this->model;
        require_once(ROOT . "/views/site/".$this->tmp_name."/update.php");
        return true;
    }

    public function actionDelete()
    {
        $this->sendForm("delete",Group::TABLENAME,"Group","group");
        return true;
    }



}
