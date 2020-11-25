<?php

class Loginer_Controller
{
    public $baseName = 'loginer';

    public function main(array $vars)
    {
        $loginerModel = new Loginer_Model();
        $data = $loginerModel->get_data($vars);

        if ($data['result'] == 'ERROR') {
            $this->baseName = "login";
        }

        $view = new View_Loader($this->baseName . '_main');

        foreach ($data as $name => $value) {
            $view->assign($name, $value);
        }
    }
}
