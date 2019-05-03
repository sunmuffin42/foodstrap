<?php
$host = "localhost";
$user = "cs329e_mitra_sunnya";
$pwd = "mania3melody!goose";
$dbs = "cs329e_mitra_sunnya";
$port = "3306";

$connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);

if (empty($connect)){
        die("mysqli_connect failed: " . mysqli_connect_error());
}
$table = "recipes";
$result = mysqli_query($connect, "SELECT * from $table");

print <<<INIT
<!DOCTYPE HTML>
<html>
<head>
	<title>Submit a recipe</title>
	<meta charset='utf-8'>
	<link rel = 'stylesheet' type = 'text/css' href = './foodstrap.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
    <style>
    table {
        border: 2px solid black;
    }
    </style>
	<script type='text/javascript' src ='./foodfacts.js'></script>
</head>
<body>
	<header>
        <a href='./foodstrap.html'>
            <h1>Foodstrap</h1>
        </a>
    </header>
    <nav>
        <a href='./browse.html' class='navlink' id='link1'>Browse Recipes</a>
        <a href='./submit.html' class='navlink' id='link2'>Submit Recipes</a>
        <a href='./login.html' class='navlink' id='link3'>Log in</a>
        <a href='./contact.html' class='navlink' id='link4'>Contact Us</a>
    </nav>
    <h1>Browse recipes</h1>
    <table>
    <thead>
    <th>
    Skip to:
    </th>
    </thead>
INIT;
while ($row = $result->fetch_row()) {
    $id = grep_replace('/ /', '_', row[1]);
    print "<tr><td><a href='#$id'>$row[1]</a></td></tr>";
}
print "</table>";

$result = mysqli_query($connect, "SELECT * from $table");
while ($row = $result->fetch_row()) {
    print <<<TITLE
    <h2 id="$id">$row[1]</h2>
    <h4>Submitted by: $row[0]</h4>
    <h3>Ingredients:</h3>
    <br>
    <ul>
    <li>$row[2]</li>
    <li>$row[3]</li>
    <li>$row[4]</li>
    <li>$row[5]</li>
    <li>$row[6]</li>
    </ul>
    <h3>Recipe</h3>
    <ol>
TITLE;
    foreach (explode(',', $row[7]) as $step) {
        print "<li>$step</li>\n";
    }
print <<<TITLE2
    </ol>
    <hr>
TITLE2;
}


print <<<FIN
</body>
</html>

FIN;

$result->free();
mysqli_close($connect);
?>