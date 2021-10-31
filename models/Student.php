<?php

class Student extends BaseModel
{
    const TABLENAME = "students";

    public function validate()
    {
        if (!preg_match("~^([А-Я][а-я]*)\s([А-Я][а-я]*)((\s[А-Я][а-я]*)$|$)~iu",$this->safe_data["Student"]["fio"])) {
            array_push($this->errors, "Введите корректное ФИО!");
        }

        return empty($this->errors);
    }


        public function allRateStudentsOnAvgMark(){
            $sql = "SELECT s.id,s.fio,AVG(m.mark) as avgmark  FROM students as s JOIN marks as m ON s.id = m.idStudent  GROUP BY s.fio DESC";
            $result = $this->db->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getStringIDsStudentOnIDGroup($id){
           $ids =  $this->select(Student::TABLENAME,"id","idGroup = :id",false,false,["id" => $id]);
           $ids_string = "";
           for($i = 0;$i < count($ids);$i++){
               $ids_string .= $ids[$i]["id"].",";
           }
           return substr($ids_string,0,-1);
        }


    public function deleteStudentsOnIDs($ids){
        $sql = "DELETE FROM ".self::TABLENAME." WHERE id IN ($ids)";
        return $this->db->query($sql);
    }




}