<?php

class home extends controller
{

    function __construct()
    {
        # code...
    }

    public function index()
    {
        $this->view('default/header', ['link'=> '/']);
        $this->view('home/index');
        $this->view('default/footer');
    }
}
