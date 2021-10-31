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
    public $errors;
    public $safe_data;

    private function xss($data) {
        if (is_array($data)) {
            $escaped = array();
            foreach ($data as $key => $value) {
                $escaped[$key] = $this->xss($value);
            }
            return $escaped;
        }
        return trim(htmlspecialchars($data));
    }

    public function __construct(){
        $this->db = Db::getConnection();
        $this->errors = [];
        $this->safe_data = $this->xss($_POST);
    }

}