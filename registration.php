<?php

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
$_SESSION["user"] = TRUE;
echo $response;

?>