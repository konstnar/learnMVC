<?php

class View
{
    public function render($view, $page_title, $data = [])
    {
        include PROJECT_PATH . '/app/views/main.tpl.php';
    }
}