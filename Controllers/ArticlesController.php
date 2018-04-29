<?php
class ArticlesController extends AppController
{

    private static $instance = null;

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new ArticlesController();
        }
        return self::$instance;
    }

    function articlesShow()
    {
        $this->loadModel('Article');
        $this->model->article_getinformation();
        $this->model->comments_getinformation();
        $this->render('Articles', 'show');
    }

    function formCreate()
    {
        $this->render('Articles', 'create');
    }

    function articleCreation($title, $content)
    {
        $this->render("Articles", "create");
        $this->loadModel("Ar    ticle");
        $this->model->article_create($title, $content);
        $this->redirect("/");
    }

    public function formAdmin()
    {
        $this->render("Articles", "admin");
    }

    public function articleAdmin($action, $title, $content = null)
    {
        $this->loadModel("Article");
        $this->render('Articles', 'admin');
        switch ($action) {
            case "Create article":
                $this->model->article_create($title, $content);
                break;
            case "Modify article":
                $this->model->article_modify($title, $content);
                break;
            case "Delete article":
                $this->model->article_delete($title);
                break;
        }
    }
}

?>