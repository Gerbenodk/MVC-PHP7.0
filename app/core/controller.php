<?php

class controller{

    public function view($viewName, $data = [])
    {
        if(file_exists('../app/view/'.$viewName.'.php')){
            require_once '../app/view/'.$viewName.'.php';
        }
//        throw new Exception("Page wasn't found.");

    }
    // require_once '../app/view/'.$viewName.'.php';

    public function model($model)
    {
        if(file_exists('../app/model/'.$model.'.php')){
            require_once '../app/model/'.$model.'.php';
        }
        return new $model();
    }
}
