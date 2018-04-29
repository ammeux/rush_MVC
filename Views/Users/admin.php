</form>
<h3>User administration</h3>
<form action="/PHP_Rush_MVC/Users/userAdmin" method="post">
    <div class="form-group">
        <label>Username : </label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label>Email : </label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="form-group">
        <label>Password : </label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label>User_group : </label>
        <select class="form-control" name="usergroup">
            <option value = "null"></option>
            <option value = "user">user</option>
            <option value = "writer">writer</option>
            <option value = "admin">admin</option>
        </select>
    </div>
    <input type="submit" name="submit" value="Activate account">
    <input type="submit" name="submit" value="Desactivate account">
    <input type="submit" name="submit" value="Create user">
    <input type="submit" name="submit" value="Modify user">
    <input type="submit" name="submit" value="Delete user">
</form>
