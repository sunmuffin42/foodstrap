<?php session_start();
session_destroy();
print <<<INIT
<!DOCTYPE HTML>
<html>
<head>
        <title>Food Facts</title>
        <meta charset="utf-8">
        <link rel = 'stylesheet' type = 'text/css' href = './foodstrap.css'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
        <script type="text/javascript" src ="./foodfacts.js"></script>
</head>
<body>
        <header>
        <a href="./foodstrap.html">
            <h1>Foodstrap</h1>
        </a>
    </header>
    <nav>
        <a href="./browse.html" class="navlink" id="link1">Browse Recipes</a>
        <a href="./submit.html" class="navlink" id="link2">Submit Recipes</a>
        <a href="./login.html" class="navlink" id="link3">Log in</a>
        <a href="./contact.html" class="navlink" id="link4">Contact Us</a>
    </nav>
    <p>You have been logged out</p>
</body>
</html>
INIT;
?>
