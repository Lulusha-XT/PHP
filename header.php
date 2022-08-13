<DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="this is an exaple of a meta description">
        <meta name="viweport" content="width=device-width">
        <link rel="stylesheet" href="style.css">
        <title></title>
    </head>
    <body class="body">
        <header>
            <nav class="nav-header-main">
                <a href=" ">
                    <img src="img/logo.png" alt="logo">
                </a>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php">Protofolio</a></li>
                    <li><a href="index.php">About us</a></li>
                    <li><a href="index.php">HomContact us</a></li>
                </ul>
                <div>
                    <form action="includes/login.inc.php" method="post">
                        <input type="text" name="mailuid" placeholder="Username/E-mail">
                        <input type="password" name="pwd" placeholder="password.....">
                        <button type="submit" name="login-submit">Login</button>
                    </form>
                    <a href="signup.php">Signup</a>
                    <form action="includes/logout.inc.php" method="post">
                        <button type="submit" name="logout-submit">Logout</button>
                    </form>
                </div>
            </nav>
        </header>
    </body>
</html>