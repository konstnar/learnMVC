<?php

class ControllerIndex extends Controller
{

    public function actionIndex()
    {
        $model = new ModelIndex();
        $view = new View();
        $view->render('Index', 'Главная страница', $model->getData());
    }
}