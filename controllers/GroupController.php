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
        $id = $this->getIDFromUrl();
        //получить все id студентов удаленной группы
        $model_student = new Student();
        $model_mark = new Mark();

       if($this->sendForm("delete",Group::TABLENAME,"Group","group")){
           $ids_string = $model_student->getStringIDsStudentOnIDGroup($id);
           $model_student->deleteStudentsOnIDs($ids_string);
           $model_mark->deleteMarksStudentsOnIDsStudent($ids_string);
       }
        return true;
    }



}
