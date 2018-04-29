<?php

class AppController
{
    var $layout = "default";
    public $model;

    public function loadModel($usedModel)
    {
        require (ROOT . 'Models/' . $usedModel . '.php');
        $this->model = new $usedModel();
    }

    public function render($controller = null, $view = null)
    {
        if ($controller != null && $view != null) {
            ob_start();
            require(ROOT . 'Views/' . $controller . '/' . $view . '.php');
            $view_content = ob_get_clean();
        }
        require (ROOT . 'Views/Layouts/' . $this->layout . '.php');
    }

    protected function redirect($param = null)
    {
        header("LOCATION: /PHP_Rush_MVC" . $param);
    }

}
?>