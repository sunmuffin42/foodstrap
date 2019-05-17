<?php
if (isset($_GET["email"])) {
	$email = $_GET["email"];
}
else {
	$email = 0;
}
if ($_GET["user"] != ""){
	$file = fopen("passwd.txt", "r");
	$user = $_GET["user"];
	while (!feof($file)){
		$line = fgets($file);
		$info = explode(":", $line);
		if (($user == $info[0] and $email != $info[2]) or ($user != $info[0] and $email == $info[2])) {
			$response =  "Either username or email is already used, but they do not match.";
			return;
		}
		else if ($user == $info[0] and $email == 0){
			$response = "Username exists in database. If this is you, continue. Otherwise, please pick a new username";
			return;
		}
		else {
			$response = "";
			$response = "butts";
		}
	}
	fclose($file);
	$response = $_GET["user"];
}
else {
	$response = "Please enter a username";
}

echo($response);

?>
