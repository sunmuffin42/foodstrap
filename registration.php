<?php
session_start();

if (!isset($_SESSION["user"])) {
$passwds = file("passwd.txt");
$user = $_POST["userName"];
$users = array();
$emails = array();
foreach ($passwds as $passwd) {
    preg_match('/^(.+):/', $passwd, $matches);
    array_push($users, $matches[1]);
    preg_match('/:(.+)$/', $passwd, $matches);
    array_push($emails, $matches[1]);
}
if (in_array($user, $users)) {
    $response = "Username already exists, sorry.";
}
else if (in_array()) {
    $response = "Email already exists, sorry.";
}
else {
    $these_pass = fopen("passwd.txt", "a");
    fwrite($these_pass, "\n" . $user . ":" . crypt($_POST["pswd"]) . ":" . $_POST["eMail"] . "\n");
    $response = "Thank you for registering";
    fclose($these_pass);
}
$_SESSION["user"] = $user;
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
    <a href="./browse_recipes.php" class="navlink" id="link1">Browse Recipes</a>
    <a href="./submit_recipe.php" class="navlink" id="link2">Submit Recipes</a>
    <a href="./registration.php" class="navlink" id="link3">Log in</a>
    <a href="./foodfacts.html" class="navlink" id="link3">Advice</a>	
    <a href="./contact.php" class="navlink" id="link4">Contact Us</a>
    </nav>
    <p>$response</p>
</body>
</html>
INIT;
}

else {
    $user = $_SESSION["user"];
    $response = "You are already logged in as $user";
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
    <a href="./browse_recipes.php" class="navlink" id="link1">Browse Recipes</a>
    <a href="./submit_recipe.php" class="navlink" id="link2">Submit Recipes</a>
    <a href="./registration.php" class="navlink" id="link3">Log in</a>
    <a href="./foodfacts.html" class="navlink" id="link3">Advice</a>	
    <a href="./contact.php" class="navlink" id="link4">Contact Us</a>
    </nav>
    <p>$response</p>
</body>
</html>
INIT;
}



?>