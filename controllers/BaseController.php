<?php

class BaseController
{

    protected $safe_post;
    protected $safe_get;


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

    public function __construct()
    {
        $this->safe_post = $this->xss($_POST);
        $this->safe_get = $this->xss($_GET);
    }


    private function getIDFromUrl(){
        $params_url = explode("/",$_SERVER["REQUEST_URI"]);
        return $params_url[3];
    }

    protected  function sendForm($action,$tablename,$entity,$url_back){
        switch($action){
            case "create" :
                if(isset($_POST['send_form'])){
                    if($this->model->insert($tablename,$this->safe_post[$entity])) {
                        return header("Location: /$url_back");
                    }
                }
                break;
            case "update" :
                if(isset($_POST['send_form'])){
                    $id = $this->getIDFromUrl();
                    if($this->model->update($tablename,$this->safe_post[$entity],$id)) {
                        return header("Location: /$url_back");
                    }
                }
                break;
            case "delete" :
                $id = $this->getIDFromUrl();
                if($this->model->delete($tablename,$id)) {
                    return header("Location: /$url_back");
                }
                break;

        }
    }

}
