<?php
class Router
{
    static public function routerMap($url)
    {
        $usersController = UsersController::getInstance();
        $articlesController = ArticlesController::getInstance();
        $commentsController = CommentsController::getInstance();

        $routerMap = ["/" => [$articlesController, "articlesShow"], "/Users/formCreate" => [$usersController, "formCreate"], "/Users/userCreation" => [$usersController, "userCreation"], "/Users/userLogin" => [$usersController, "userLogin"], "/Users/logOut" => [$usersController, "userLogout"], "/Users/accountDelete" => [$usersController, "userDelete"], "/Users/formLogin" => [$usersController, "formLogin"],"/Users/formAdmin" => [$usersController, "formAdmin"], "/Users/userAdmin" => [$usersController, "userAdmin"], "/Articles/formCreate" => [$articlesController, "formCreate"], "/Articles/articleCreation" => [$articlesController, "articleCreation"], "/Comments/commentCreation" => [$commentsController, "commentCreation"], "/Articles/formAdmin" => [$articlesController, "formAdmin"], "/Articles/articleAdmin" => [$articlesController, "articleAdmin"]];

        $routerDirection = $routerMap[$url];

        return ($routerDirection);
    }
}
?>