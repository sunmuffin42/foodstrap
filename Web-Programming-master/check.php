<?php

$user = $_GET["user"];
if (isset($_GET["eMail"])) {
    $email = $_GET["eMail"];
}
else {
    $email = "m";
}
$file = fopen("passwd.txt", "r");
while (!feof($file)){
    $line =  fgets($file);
    $info = explode(":", $line);
    if ($user == $info[0]){
        $response = "x";
    }
    else if ($email != "m" && $info[2] == $email) {
        $response = "y";
    }
}

fclose($file);

echo($response);

?>