<?php

class Logout_Controller
{
    public $baseName = 'logout';

    public function main(array $vars)
    {
        $logoutModel = new Logout_Model();
        $logoutModel->logout();

        $view = new View_Loader($this->baseName . "_main");
    }
}
