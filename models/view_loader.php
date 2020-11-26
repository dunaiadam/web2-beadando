<?php

class View_Loader
{
    private $data = array();
    private $render = FALSE;

    public function __construct($viewName)
    {
        $file = SERVER_ROOT . 'views/' . strtolower($viewName) . '.php';
        if (file_exists($file)) {
            $page = explode('_', $viewName);
            $this->data['viewName'] = $page[0];
            $this->render = $file;
        }
    }

    public function assign($variable, $value)
    {
        $this->data[$variable] = $value;
    }

    public function __destruct()
    {
        $this->data['render'] = $this->render;
        $viewData = $this->data;
        include(SERVER_ROOT . 'views/page_main.php');
    }
}
