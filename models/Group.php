<?php

class Group extends BaseModel
{
    const TABLENAME = "groups";






    public function validate()
    {
        if (mb_strlen($this->safe_data["Group"]["title"]) < 2) {
            array_push($this->errors, "Заголовок не может быть меньше 2 символов!");
        }
        if (mb_strlen($this->safe_data["Group"]["title"]) > 5) {
            array_push($this->errors, "Заголовок не может быть больше 5 символов!");
        }
        return empty($this->errors);
    }





}