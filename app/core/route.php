<?php


class Route
{

    static function start()
    {

        $controller_name = 'index';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);  

        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }

        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        //Добавляем префиксы
        $model_name = 'Model' . ucfirst($controller_name);
        $controller_name = 'Controller' . ucfirst($controller_name);
        $action_name = 'action' . ucfirst($action_name);

        if (file_exists(PROJECT_PATH . '/app/models/' . $model_name . '.php')) {
            include PROJECT_PATH . '/app/models/' . $model_name . '.php';
        } else {
            header('Location: /404');
            exit();
        }

        if (file_exists(PROJECT_PATH . '/app/controllers/' . $controller_name . '.php')) {
            include PROJECT_PATH . '/app/controllers/' . $controller_name . '.php';
        } else {
            header('Location: /404');
            exit();
        }


        $controller = new $controller_name;

        if (method_exists($controller, $action_name)) {
            $controller->$action_name();
        } else {
            header('Location: /error/action');
            exit();
        }


    }

}