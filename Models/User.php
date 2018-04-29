<?php

class User{

    public $requestArray;

    function user_create($username, $email, $password)
    {
        $instance = connect_db::getInstance();
        $conn = $instance->getConnection();
        $sql = "INSERT INTO Users (Username, Email, Password, User_group, Status, Creation_date, Edition_date) VALUES (?, ?, ?, 'user', '1', now(), now())";
        $req = $conn->prepare($sql);
        $req->execute([$username, $email, $password]);
    }

    function user_delete($username)
    {
        $instance = connect_db::getInstance();
        $conn = $instance->getConnection();
        $sql = "DELETE FROM Users WHERE Username = ?";
        $req = $conn->prepare($sql);
        $req->execute([$username]);
    }

    function user_activation($username)
    {
        $instance = connect_db::getInstance();
        $conn = $instance->getConnection();
        $sql = "UPDATE Users SET Status = '1', Edition_date = now() WHERE Username = ?";
        $req = $conn->prepare($sql);
        $req->execute([$username]);
    }

    function user_desactivation($username)
    {
        $instance = connect_db::getInstance();
        $conn = $instance->getConnection();
        $sql = "UPDATE Users SET Status = '0', Edition_date = now() WHERE Username = ?";
        $req = $conn->prepare($sql);
        $req->execute([$username]);
    }

    function user_modify($username, $email, $password, $usergroup)
    {
        $instance = connect_db::getInstance();
        $conn = $instance->getConnection();
        $sql = "UPDATE Users SET Email = ?, Password = ?, User_group = ?, Edition_date = now() WHERE Username = ?";
        $req = $conn->prepare($sql);
        $req->execute([$email, $password, $usergroup, $username]);
    }

    function user_getInformation($username)
    {
        try {

            $instance = connect_db::getInstance();
            $conn = $instance->getConnection();
            $sql = "SELECT Password, Email, User_group, Status, id FROM Users WHERE Username = ?";
            $req = $conn->prepare($sql);
            $req->execute([$username]);
            $this->requestArray = $req->fetch();
            } catch (PDOException $e){
            file_put_contents("errors.log", $e->getMessage() . "\n", FILE_APPEND);
        }
    }

    static function password_verify($password, $password_conf)
    {
        if(empty($password) || empty($password_conf) || ($password != $password_conf))
            return false;
        return true;
    }

}

?>