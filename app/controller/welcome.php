<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 10-2-2017
 * Time: 14:29
 */
class welcome extends controller{
    function __construct()
    {

    }

    public function index(){
        $this->view('default/header', ['link' => '/welcome']);
        $this->view('welcome/index',['message' => 'Costum message in controller!']);
        $this->view('default/footer');
    }
}