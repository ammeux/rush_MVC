<html>
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <div class="topn">
            <ul class="navbar-nav">
                <?php
                session_start();
                if (!$_SESSION["authenticated"]) {
                    echo '<li class="nav-item"><a class="nav-link" href="/PHP_Rush_MVC/Users/formLogin">Login</a></li><li class="nav-item"><a class="nav-link" href="/PHP_Rush_MVC/Users/formCreate">Register</a></li>';
                }
                else
                    echo '<li class="nav-item"><a class="nav-link" href="/PHP_Rush_MVC">Home</a></li><li class="nav-item"><a class="nav-link" href="/PHP_Rush_MVC/Users/logOut">Logout</a></li><li class="nav-item"><a class="nav-link" href="/PHP_Rush_MVC/Users/accountDelete">Delete my account</a></li>';
                if($_SESSION["usergroup"] == "admin") {
                    echo '<li class="nav-item"><a class="nav-link" href="/PHP_Rush_MVC/Users/formAdmin">Users administration</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="/PHP_Rush_MVC/Articles/formAdmin">Articles administration</a></li>';
                }
                if($_SESSION["usergroup"] == "writer" or $_SESSION["usergroup"] == "admin")
                {
                  echo '<li class="nav-item"><a class="nav-link" href="/PHP_Rush_MVC/Articles/formCreate">Write Article</a></li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</header>
<main role="main" class="container">
    <div>
        <?php
        echo $view_content;
        ?>
    </div>
</main>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</html>