<?php

class News_Controller
{
    public $baseName = 'news';

    public function main(array $vars)
    {
        $newsModel = new News_Model();
        $data = $newsModel->get_data($vars);

        $view = new View_Loader($this->baseName . '_main');

        foreach ($data as $name => $value) {
            $view->assign($name, $value);
        }
    }
}
