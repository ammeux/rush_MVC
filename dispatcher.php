<?php

class Dispatcher
{
    public function dispatch()
    {
        $url = $_SERVER["REQUEST_URI"];
        $url = str_replace("PHP_Rush_MVC/","",$url);
        $routerArgs = [];
        $routerDirection = Router::routerMap($url);

        if(isset($_POST['submit']))
        {
            switch ($routerDirection[1])
            {
                case "userCreation":
                    $routerArgs = [$_POST['username'], $_POST['email'], $_POST['password'], $_POST['password_confirmation']];
                    break;
                case "userLogin":
                    $routerArgs = [$_POST['username'], $_POST['password']];
                    break;
                case "userAdmin":
                    $routerArgs = [$_POST['submit'], $_POST['username'], $_POST['email'], $_POST['password'], $_POST['usergroup']];
                    break;
                case "articleCreation":
                    $routerArgs = [$_POST['title'], $_POST['content']];
                    break;
                case "commentCreation":
                    $routerArgs = [$_POST['comment'], $_POST['submit']];
                    break;
                case "articleAdmin":
                    $routerArgs = [$_POST['submit'], $_POST['title'], $_POST['content']];
            }
        }
        call_user_func_array($routerDirection,$routerArgs);
    }
}

?>