<?php

class Controller{

    public function __construct()
    {
        $this->view = new View;

    }

    public function Index(){

        $this->view->render( get_class($this));

    }
}