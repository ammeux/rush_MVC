<blockquote class="blockquote text-center">
    <?php
    $articles = $this->model->requestArticle;
    foreach ($articles as $row=>$data) {
        echo '<div>';
        echo '<h2>' . $data["Title"] . '</h2>';
        echo '<p>' . $data["Content"] . '</p>';
        echo '<footer class="blockquote-footer">' . $data["Username"] . ' - Created on: ' . substr($data["Creation_date"],0,10) . ' - Edited on: ' . substr($data["Edition_date"], 0,10) . '</footer>';
        echo '</div>';
        echo '<form action="/PHP_Rush_MVC/Comments/commentCreation" method="post">
    <div class="form-group">
        <label>Comment: </label>
        <input type="text" class="raw" name="comment">
    </div>
    <input type="submit" name="submit" value ='. $data["id"]. '>
</form>';
}
    $comments = $this->model->requestComments;
    echo '<table class="table">';
    echo '<tr>';
    echo '<th>Comment</th>';
    echo '<th>Post ID</th>';
    echo '<th>Author</th>';
    echo '</tr>';
    foreach ($comments as $row=>$data) {
        echo '<tr>';
        echo '<td>' . $data["Comment"] . '</td>';
        echo '<td>' . $data["Post_id"] . '</td>';
        echo '<td>' . $data["Author_id"] . '</td>';
        echo '</tr>';
    }
?>
</blockquote>