<?php
class BaseController{
    public function model($model){
        require_once '../model/'.$model.'.php';
        return new $model;
    }

    public function view($view, $data = []){
        require_once '../view/'.$view.'.php';
    }
}