<?php
session_start();

if (isset($_SESSION['user'])) {
    $response = "Please log in at the <a href='registration.php'>registration page</a>";
    print <<<INIT
<!DOCTYPE HTML>
<html>
<head>
	<title>Submit a recipe</title>
	<meta charset='utf-8'>
	<link rel = 'stylesheet' type = 'text/css' href = './foodstrap.css'>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
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
    <p>$response</p>
</body>
</html>
INIT;
}
else {
    if (!isset($_POST["name"])) {
        print <<<INIT
        <!DOCTYPE HTML>
        <html>
        <head>
            <title>Submit a recipe</title>
            <meta charset='utf-8'>
            <link rel = 'stylesheet' type = 'text/css' href = './foodstrap.css'>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
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
            <form action='submit_recipe.php' method='post' id='submit'>
            <p>Dish name: <input type="text" size="30" name="dish"></p>
            <div>Ingredients: 
            <ul>
            <li><input type="text" placeholder="2 tblsp peanut butter" name="ingr1"></li>
            <li><input type="text" placeholder="1 cup jasmine rice" name="ingr2"></li>
            <li><input type="text" placeholder="10 oz white flour" name="ingr3"></li>
            <li><input type="text" placeholder="1 quart coffee grounds" name="ingr4"></li>
            <li><input type="text" placeholder="goldfish, to taste" name="ingr5"></li>
            </ul>
            </div>
            <p>Recipe (please separate steps with new lines, and do not use subsections):</p>
            <p><textarea name="recipe"
            <p><input type="submit"></p>
            </form>
        </body>
        </html>
INIT;
    }
    else {
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
        $user = $_SESSION["user"];
        $dish = $_POST["dish"];
        $ingr1 = $_POST["ingr1"];
        $ingr2 = $_POST["ingr2"];
        $ingr3 = $_POST["ingr3"];
        $ingr4 = $_POST["ingr4"];
        $ingr5 = $_POST["ingr5"];
        $recipe = $_POST["recipe"];
        $recipe = preg_replace('/\n/', ',', $recipe);
        mysqli_query($connect, "insert into $table (user, dish, ingr1, ingr2, ingr3, ingr4, ingr5, recipe) values ($user, $dish, $ingr1, $ingr2, $ingr3, $ingr4, $ingr5, $recipe);");
        mysqli_close($connect);
        $response = "Thank you for submitting your recipe!";
        print <<<INIT
        <!DOCTYPE HTML>
        <html>
        <head>
            <title>Submit a recipe</title>
            <meta charset='utf-8'>
            <link rel = 'stylesheet' type = 'text/css' href = './foodstrap.css'>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
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
            <p>$response</p>
        </body>
        </html>
INIT;
    }
}

?>