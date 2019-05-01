<?php
session_start();
if (!isset($_SESSION["user"])) {
	if (sizeof($_POST) == 0) {
		$response = <<<INIT1
            <h1> Username Form</h1>
            <form id = "textForm" method = "post"
	    onsubmit = "return validate();" action="./registration.php">
            <h3>Please use a password with 6-10 characters, at least one uppercase character, at least one lowercase character, and at least one digit</h3>
            <table >
            <tr>
            <td> <p>Username: </p> </td>
            <td> <input type = "text" name = "userName" /></td>
            </tr>
            <tr>
            <td> <p>Email: </p> </td>
            <td> <input type = "email" name = "eMail" /></td>
            </tr>
            <tr>
            <td><p> Password: </p></td>
            <td> <input type = "password" name = "pswd" /></td>
            </tr>
            <tr>
            <td> <p>Repeat Password: </p> </td>
            <td> <input type = "password" name = "repeat" /></td>
            </tr>
            <tr>
            <td> <input type = "submit" value = "Enter" /></td>
            <td> <input type = "reset" value = "Clear" /></td>
            </tr>
            </table>
            </form>
INIT1;
	}
	else {
        $passwds = file("passwd.txt");
        $user = $_POST["userName"];
        $users = array();
        $emails = array();
        $passes = array();
        foreach ($passwds as $passwd) {
            preg_match('/^(.+):.+:.+$/', $passwd, $matches);
            array_push($users, $matches[1]);
            preg_match('/^.+:.+:(.+)$/', $passwd, $matches);
            array_push($emails, $matches[1]);
        }
        if (in_array($user, $users)) {
            if (in_array($user . ":" . $_POST["pswd"] . ":" . $_POST["eMail"] . "\n", $passwds)) {
		    $_SESSION["user"] = $user;
		    $response = "Welcome, $user";
            }
            else {
		    $response = $passwds[0] . $passwds[1] . $user . ":" . $_POST["pswd"] . ":" . $_POST["eMail"] . "Username exists, but incorrect password or email";
	    }
        }
        else if (in_array($_POST["eMail"], $emails)) {
            $response = "Email already exists, sorry.";
        }
        else {
            $these_pass = fopen("passwd.txt", "a");
            fwrite($these_pass, "\n" . $user . ":" . $_POST["pswd"] . ":" . $_POST["eMail"] . "\n");
            $response = "Thank you for registering $user $users[1]";
            fclose($these_pass);
            $_SESSION["user"] = $user;
        }
    }
}
else {
    $user = $_SESSION["user"];
    $response = "You are already logged in as $user";
}
print <<<INIT
<!DOCTYPE HTML>
<html>
<head>
        <title>Registration</title>
        <meta charset="utf-8">
        <link rel = 'stylesheet' type = 'text/css' href = './foodstrap.css'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
        <script type="text/javascript" src ="./projectval.js"></script>
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
        <a href="./registration.php" class="navlink" id="link3">Log in</a>
        <a href="./contact.html" class="navlink" id="link4">Contact Us</a>
        <form action="destroy.php" method="post"><input type="submit" value="Log out"></form>
    </nav>
    $response
</body>
</html>
INIT;
?>
