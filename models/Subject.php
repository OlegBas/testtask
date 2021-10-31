<?php

class Subject extends BaseModel
{
    const TABLENAME = "subjects";


    public function validate()
    {
        if (strlen($this->safe_data["Subject"]["title"]) < 2) {
            array_push($this->errors, "Заголовок не может быть меньше 2 символов!");
        }
        if (strlen($this->safe_data["Subject"]["title"]) > 10) {
            array_push($this->errors, "Заголовок не может быть больше 10 символов!");
        }
        return empty($this->errors);
    }



}