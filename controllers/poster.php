<?php

class Poster_Controller
{
    public $baseName = 'poster';

    public function main(array $vars)
    {
        $posterModel = new Poster_Model();
        $data = $posterModel->post($vars);

        if ($data['result'] == 'ERROR') {
            $this->baseName = 'post';
        }

        $view = new View_Loader($this->baseName . '_main');

        foreach ($data as $name => $value) {
            $view->assign($name, $value);
        }
    }
}
