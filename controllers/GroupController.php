<?php

class GroupController
{

    public $tmp_name = "group";

    public function actionIndex()
    {
        $group = new Group();
//        print_r($group->selectAll(Group::TABLENAME));
        // Подключаем вид
        $params = [
            'title' => 'ИС3'
        ];
        echo $group->update(Group::TABLENAME,$params,1);
//        echo $group->delete(Group::TABLENAME,1);
        require_once(ROOT . "/views/site/".$this->tmp_name."/index.php");
        return true;
    }

    public function actionCreate()
    {

        // Подключаем вид
        require_once(ROOT . "/views/site/".$this->tmp_name."/create.php");
        return true;
    }

    public function actionUpdate()
    {

        // Подключаем вид
        require_once(ROOT . "/views/site/".$this->tmp_name."/update.php");
        return true;
    }

    public function actionDelete()
    {

        return true;
    }



}
