<?php
$email = $_GET["email"];
$user = $_GET["user"];
if ($user != "" and $email != ""){
	$file = file("passwd.txt");
	foreach ($file as $line) {
		$info = explode(":", $line);
		if (($user == $info[0] and $email != trim($info[2])) or ($user != $info[0] and $email == trim($info[2]))) {
			$response = "Either username or email is already used, but they do not match.";
		}
		else {
			$response = $response . "";
		}
	}
}
else if ($user == "") {
	$response = "Please enter a username";
}

echo($response);

?>
