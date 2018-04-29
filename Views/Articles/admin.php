</form>
<h3>Articles administration</h3>
<form action="/PHP_Rush_MVC/Articles/articleAdmin" method="post">
    <div class="form-group">
        <label>Title : </label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label>Content : </label>
        <input type="text" class="form-control" name="content">
    </div>
    </div>
    <input type="submit" name="submit" value="Create article">
    <input type="submit" name="submit" value="Modify article">
    <input type="submit" name="submit" value="Delete article">
</form>