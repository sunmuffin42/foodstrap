<?php
if (!isset($_COOKIE["user"]) || $_COOKIE["user"] == "") {
$passwds = file("passwd.txt");
$user = $_POST["userName"];
$users = array();
$emails = array();
$userpass = array();
foreach ($passwds as $passwd) {
    preg_match('/^(.+):/', $passwd, $matches);
    array_push($users, $matches[1]);
    preg_match('/:(.+)$/', $passwd, $matches);
    array_push($emails, $matches[1]);
    preg_match('/^(.+:.+):/', $passwd, $matches);
    array_push($userpass, $matches[1]);
}
if (in_array($user, $users) and isset($_POST["userName"])) {
    $response = "Username $user already exists, sorry.";
}
else if (in_array($_POST["eMail"], $emails) and isset($_POST["eMail"])) {
    $email = $_POST["eMail"];
    $response = "Email $email already exists, sorry.";
}
else if (isset($_POST["userName"]) and isset($_POST["eMail"]) and isset($_POST["pswd"]) and isset($_POST["repeat"]) and $_POST["pswd"] == $_POST["repeat"]) {
	if (in_array($_POST["userName"] . ":" . $_POST["pswd"], $userpass)) {
		$response = "Welcome, $user";
		setcookie("user",mysqli_real_escape_string($connect, $user));
	}
	else {
    $these_pass = fopen("passwd.txt", "a");
    fwrite($these_pass, "\n" . $user . ":" . $_POST["pswd"] . ":" . $_POST["eMail"]);
    $response = "Thank you for registering, $user";
    fclose($these_pass);
    setcookie("user",mysqli_real_escape_string($connect, strip_tags($user)));
	}
}
else {
	$response = <<<REG
	<p>Please make a username with 6-10 alphanumeric characters, a valid email address, and a password with at least 1 each of a lowercase ascii character, an uppercase ascii character, and an arabic numeral, with a length of between 6 and 10, inclusive.</p>
	<form action="registration.php" method="post" id="registration" onsubmit="validate();">
	<table >
<tr>
<td> <p>Username: </p> </td>
<td> <input type = "text" name = "userName" onchange="validateu();callServer();" id="userName" maxlength="10"/></td>
</tr>
<tr>
<td> <p>Email: </p> </td>
<td> <input type = "email" name = "eMail" onchange="validatee();callServer();" id="eMail"/></td>
</tr>
<tr>
<td><p id="pass"> Password: </p></td>
<td> <input type = "password" name = "pswd" id="pswd" onchange="validatep();" maxlength="10" /></td>
</tr>
<tr>
<td> <p>Repeat Password: </p> </td>
<td> <input type = "password" name = "repeat" onchange="validater();bigVal();encryptpass();encryptrep();" id="repeat" maxlength="10" /></td>
</tr>
<tr>
<td> <input type = "submit" value = "Enter" id="submit" disabled/></td>
<td> <input type = "reset" value = "Clear" /></td>
</tr>
</table>
</form>
<div id="after"></div>
REG;
}
setcookie("user", $user);
}

else {
    $user = $_COOKIE["user"];
    $response = "You are already logged in as $user";
}
print <<<INIT
<!DOCTYPE HTML>
<html>
        <head>
        <title>Food Facts</title>
        <meta charset="utf-8">
        <link rel = 'stylesheet' type = 'text/css' href = './foodstrap.css'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
</head>
<body>
        <header>
        <a href="./foodstrap.html">
            <h1>Foodstrap</h1>
        </a>
    </header>
<nav class = "navbar navbar-default">
        <a href="./browse_recipes.php" class="navlink" id="link1">Browse Recipes</a>
        <a href="./submit_recipe.php" class="navlink" id="link2">Submit Recipes</a>
        <a href="./foodfacts.html" class="navlink" id="link3">Advice</a>
        <a href="./health_show.html" class="navlink" id="link4">Learn More</a>
        <a href="./contact.php" class="navlink" id="link5">Contact Us</a>
        <a href="./registration.php" class="navlink" id="link6">Log in</a>
        <a href="./destroy.php" class="navlink" id="link7">Log out</a>
    </nav>
    <p>$response</p>
<script type="text/javascript" src ="./registration.js"></script>
<script type="text/javascript" src ="./signup2.js"></script>
</body>
</html>
INIT;


?>
