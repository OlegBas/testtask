<?php

/**
 * Created by PhpStorm.
 * User: Олег Бас
 * Date: 28.10.2021
 * Time: 12:12
 */
class BaseModal extends  Db
{

    protected  $db;

    protected  function __construct(){
        $this->db = Db::getConnection();
    }
}