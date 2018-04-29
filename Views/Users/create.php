<form action="/PHP_Rush_MVC/Users/userCreation" method="post">
    <div class="form-group">
        <label>Username: </label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label>Email (user.name@mail.com): </label>
        <input type="text" class="form-control" name="email" required pattern="[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?">
    </div>
    <div class="form-group">
        <label>Password: </label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label>Confirm password: </label>
        <input type="password" class="form-control" name="password_confirmation">
    </div>
    <input type="submit" name="submit" value ="submit">
</form>
