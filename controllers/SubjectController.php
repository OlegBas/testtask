<?php

class SubjectController extends BaseController
{

    //Action для главной страницы

    public $tmp_name = "subject";
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Subject();
    }


    public function actionIndex()
    {
        $list_data = $this->model->selectAll(Subject::TABLENAME);
        // Подключаем вид
        require_once(ROOT . "/views/site/".$this->tmp_name."/index.php");
        return true;
    }

    public function actionCreate()
    {
        $this->sendForm("create",Subject::TABLENAME,"Subject","subject");
        $model = $this->model;
        // Подключаем вид
        require_once(ROOT . "/views/site/".$this->tmp_name."/create.php");
        return true;
    }

    public function actionUpdate()
    {
        $id = $this->getIDFromUrl();
        $entity = $this->model->select(Subject::TABLENAME,"*","id = $id");
        $this->sendForm("update",Subject::TABLENAME,"Subject","subject");
        $model = $this->model;
        // Подключаем вид
        require_once(ROOT . "/views/site/".$this->tmp_name."/update.php");
        return true;
    }

    public function actionDelete()
    {
        if($this->sendForm("delete",Subject::TABLENAME,"Subject","subject")){
            $id = $this->getIDFromUrl();
            $mark_model = new Mark();
            $mark_model->deleteMarksOnSubject($id);
        }
        return true;
    }



}
