<?php

class Mark extends BaseModel
{
    const TABLENAME = "marks";

    public function  getAllMarks(){
        $sql = "SELECT m.id,s.fio,m.mark,sub.title  FROM students as s JOIN marks as m ON s.id = m.idStudent JOIN subjects as sub ON m.idSubject = sub.id";
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

}