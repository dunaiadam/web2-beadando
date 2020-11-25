<?php

class Login_Controller
{
    public $baseName = 'login';

    public function main(array $vars)
    {
        $view = new View_Loader($this->baseName . "_main");
    }
}
