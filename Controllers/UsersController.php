<?php

class UsersController extends AppController
{

    private static $instance = null;


    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new UsersController();
        }
        return self::$instance;
    }

    public function formCreate()
    {
        $this->render("Users","create");

    }

    public function formLogin()
    {
        $this->render("Users","login");
    }


    public function formAdmin()
    {
        $this->render("Users","admin");
    }

    public function userCreation($username, $email, $password, $password_conf)
    {
        $this->render("Users", "create");
        $this->loadModel("User");
        if (strlen($username) < 3 || strlen($username) > 10)
            echo "Invalid username";
        elseif (strlen($password) < 8 || strlen($password) > 20 || !$this->model->password_verify($password, $password_conf))
            echo "Invalid password";
        else {
            $this->model->user_create($username, $email, $password);
            $this->redirect("/Users/formLogin");
        }
    }

    public function userLogin($username, $password)
    {
        $this->render("Users","login");
        $this->loadModel("User");

        $this->model->user_getInformation($username);
        if (!$this->model->password_verify($password, $this->model->requestArray["Password"]))
        {
            echo "Invalid username and/or password.";
        }
        elseif ($this->model->requestArray["Status"] == 0)
        {
            echo "Sorry, you are banned from this website";
        }
        else {
            $_SESSION["username"] = $username;
            $_SESSION["email"] = $this->model->requestArray["Email"];
            $_SESSION["usergroup"] = $this->model->requestArray["User_group"];
            $_SESSION["id"] = $this->model->requestArray["id"];
            $_SESSION["authenticated"] = true;
            $this->redirect("/");
        }
    }

    public function userLogout()
    {
        Session::destroy();
        header("LOCATION: /PHP_Rush_MVC/Users/formLogin");
    }

    public function userDelete()
    {
        session_start();
        $this->loadModel("User");
        $this->model->user_delete($_SESSION["username"]);
        Session::destroy();
        echo '<script language="javascript">';
        echo 'alert("The account has been deleted")';
        echo '</script>';
    }

    public function userAdmin($action, $username, $email = null, $password = null, $usergroup = null)
    {
        $this->loadModel("User");
        $this->render('Users','admin');
        switch ($action) {
            case "Activate account":
                $this->model->user_activation($username);
                break;
            case "Desactivate account":
                $this->model->user_desactivation($username);
                break;
            case "Create user":
                $this->model->user_create($username, $email, $password);
                break;
            case "Modify user":
                $this->model->user_modify($username, $email, $password, $usergroup);
                break;
            case "Delete user":
                $this->model->user_delete($username);
                break;
        }
    }

}


?>