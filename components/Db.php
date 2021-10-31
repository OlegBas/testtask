<?php

// Класс Db Компонент для работы с базой данных

class Db
{

    protected $db;

    protected  function __construct()
    {
        $this->db = Db::getConnection();
    }

    //Устанавливает соединение с базой данных
    public static function getConnection()
    {
        // Получаем параметры подключения из файла
        $paramsPath = ROOT . '/config/db.php';
        $params = include($paramsPath);

        // Устанавливаем соединение
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);

        // Задаем кодировку
        $db->exec("set names utf8");

        return $db;
    }


    public  function select($tablename,$fields = "*",$where = false,$order = false, $limit = false,$params = false){

        $sql = "SELECT $fields FROM $tablename";
        if($where)
            $sql .= " WHERE ".$where;

        if($order)
            $sql .= "ORDER BY ".$order;
        if($limit)
            $sql .= "LIMIT ".$limit;

        // Используется подготовленный запрос
        $result = $this->db->prepare($sql);
        if($params){
            foreach ($params as $key => $val){
                $result->bindValue(":$key",$val);
            }
        }




        // Выполнение коменды
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }



    public  function selectAll($tablename){
        return $this->select($tablename);
    }

    public  function insert($tablename,$params){

        $sql = "INSERT INTO $tablename (";
        $fields = array_keys($params);
        for($i = 0;$i < count($fields);$i++){
            $sql .= $fields[$i].",";
        }
        $sql = substr($sql,0,-1);
        $values = array_values($params);
        $sql .=  ") VALUES (";
        for($i = 0;$i < count($fields);$i++){
            $sql .= ":".$fields[$i].",";
        }
        $sql = substr($sql,0,-1);
        $sql .=  ")";

        $result = $this->db->prepare($sql);
        for($i = 0;$i < count($values);$i++){
            $result->bindParam(":".$fields[$i], $values[$i]);
        }

        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $this->db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;

    }

    public  function update($tablename,$params,$id = false){
        $fields = array_keys($params);
        $values = array_values($params);

        $sql = "UPDATE  $tablename SET ";
        for($i = 0;$i < count($fields);$i++){
            $sql .= "$fields[$i] = :$fields[$i],";
        }
        $sql = substr($sql,0,-1);
        if($id)
            $sql .= " WHERE id=:id";
        $result = $this->db->prepare($sql);

        for($i = 0;$i < count($fields);$i++){
            $result->bindValue(":$fields[$i]", $values[$i]);
        }

        if($id)
            $result->bindValue(":id", $id);

        return $result->execute();
    }


    public  function delete($tablename,$id)
    {
        // Текст запроса к БД
        $sql = "DELETE FROM $tablename WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос

        $result = $this->db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

}
