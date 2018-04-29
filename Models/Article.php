<?php
class Article
{
    public $requestArticle;
    public $requestComments;

    function article_create($title, $content)
    {
        $instance = connect_db::getInstance();
        $conn = $instance->getConnection();
        $sql = "INSERT INTO Articles (Title, Content, Username, Author_id, Creation_date, Edition_date) VALUES (?, ?, ?, ?, now(), now())";
        $req = $conn->prepare($sql);
        $req->execute([$title, $content, $_SESSION["username"], $_SESSION["id"]]);
    }

    function article_modify($title, $content)
    {
        $instance = connect_db::getInstance();
        $conn = $instance->getConnection();
        $sql = "UPDATE Articles SET Content = ?, Author_id = ?, Edition_date = now() WHERE Title = ?";
        $req = $conn->prepare($sql);
        $req->execute([$content, $_SESSION["id"], $title]);
    }

    function article_delete($title)
    {
        $instance = connect_db::getInstance();
        $conn = $instance->getConnection();
        $sql = "DELETE FROM Articles WHERE Title = ?";
        $req = $conn->prepare($sql);
        $req->execute([$title]);
    }

    function article_getinformation()
    {
        try {

            $instance = connect_db::getInstance();
            $conn = $instance->getConnection();
            $sql = "SELECT Title, Content, Username, Creation_date, Edition_date, id FROM Articles ORDER BY Creation_date DESC";
            $req = $conn->prepare($sql);
            $req->execute();
            $this->requestArticle = $req->fetchAll();
        } catch (PDOException $e){
            file_put_contents("errors.log", $e->getMessage() . "\n", FILE_APPEND);
        }
    }

    function comments_getinformation()
    {
        try {

            $instance = connect_db::getInstance();
            $conn = $instance->getConnection();
            $sql = "SELECT Comment, Post_id, Author_id, Creation_date, Edition_date FROM Comments ORDER BY Creation_date DESC";
            $req = $conn->prepare($sql);
            $req->execute();
            $this->requestComments = $req->fetchAll();
        } catch (PDOException $e){
            file_put_contents("errors.log", $e->getMessage() . "\n", FILE_APPEND);
        }
    }
}
?>