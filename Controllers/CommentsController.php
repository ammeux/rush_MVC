<?php
class CommentsController extends AppController {

    private static $instance = null;

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new CommentsController();
        }
        return self::$instance;
    }

    function commentCreation($comment, $postId)
    {
        $this->render("Articles", "show");
        $this->loadModel("Comment");
        $this->model->comment_create($comment, $postId);
        $this->redirect("/");
    }
}