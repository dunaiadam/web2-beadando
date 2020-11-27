<?php

class Post_Controller
{
    public $baseName = 'post';

    public function main(array $vars)
    {
        $view = new View_Loader($this->baseName . '_main');
    }
}
