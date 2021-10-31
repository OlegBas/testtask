<?php

class Student extends BaseModel
{
    const TABLENAME = "students";


        public function allRateStudentsOnAvgMark(){
            $sql = "SELECT s.id,s.fio,AVG(m.mark) as avgmark  FROM students as s JOIN marks as m ON s.id = m.idStudent  GROUP BY s.fio";
            $result = $this->db->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }


}