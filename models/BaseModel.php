<?php

/**
 * Created by PhpStorm.
 * User: Олег Бас
 * Date: 28.10.2021
 * Time: 12:12
 */
class BaseModel extends  Db
{

    protected  $db;

    public function __construct(){
        $this->db = Db::getConnection();
    }
}