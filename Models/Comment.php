<?php
class Comment
{
    function comment_create($comment, $postId)
    {
        $instance = connect_db::getInstance();
        $conn = $instance->getConnection();
        $sql = "INSERT INTO Comments (Comment, Post_id, Author_id, Creation_date, Edition_date) VALUES (?, ?, ?, now(), now())";
        $req = $conn->prepare($sql);
        $req->execute([$comment, $postId, $_SESSION["id"]]);
    }
}
?>