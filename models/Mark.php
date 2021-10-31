<?php

class Mark extends BaseModel
{
    const TABLENAME = "marks";

    public function validate()
    {
        if ($this->safe_data["Mark"]["mark"] < 2) {
            array_push($this->errors, "Оценка не может быть меньше 2!");
        }
        if ($this->safe_data["Mark"]["mark"] > 5) {
            array_push($this->errors, "Оценка не может быть больше 5 !");
        }
        return empty($this->errors);
    }

    public function  getAllMarks(){
        $sql = "SELECT m.id,s.fio,m.mark,sub.title  FROM students as s JOIN marks as m ON s.id = m.idStudent JOIN subjects as sub ON m.idSubject = sub.id";
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteMarksOnStudent($id){
        $sql  = "DELETE FROM ".self::TABLENAME." WHERE idStudent = :idStudent";
        $result = $this->db->prepare($sql);
        $result->bindParam(":idStudent",$id);
        return $result->execute();
    }

    public function deleteMarksOnSubject($id){
        $sql  = "DELETE FROM ".self::TABLENAME." WHERE idStudent = :idSubject";
        $result = $this->db->prepare($sql);
        $result->bindParam(":idSubject",$id);
        return $result->execute();
    }

    public function deleteMarksStudentsOnIDsStudent($ids){
        $sql = "DELETE FROM ".self::TABLENAME." WHERE idStudent IN ($ids)";
        return $this->db->query($sql);
    }

}