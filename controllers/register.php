<?php

class Register_Controller
{
    public $baseName = 'register';

    public function main(array $vars)
    {
        $registerModel = new Register_Model();
        $data = $registerModel->register($vars);

        if ($data['result'] == 'ERROR') {
            $this->baseName = 'registration';
        }

        $view = new View_Loader($this->baseName . '_main');

        foreach ($data as $name => $value) {
            $view->assign($name, $value);
        }
    }
}
