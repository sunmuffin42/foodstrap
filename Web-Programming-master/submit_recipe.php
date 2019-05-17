<?php
if (!isset($_COOKIE['user'])) {
    $response = "Please log in at the <a href='registration.php'>registration page</a>";
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
</body>
</html>
INIT;
}
else {
    if (!isset($_POST["dish"])) {
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
<nav class = "navbar navbar-default">
        <a href="./browse_recipes.php" class="navlink" id="link1">Browse Recipes</a>
        <a href="./submit_recipe.php" class="navlink" id="link2">Submit Recipes</a>
        <a href="./foodfacts.html" class="navlink" id="link3">Advice</a>
        <a href="./health_show.html" class="navlink" id="link4">Learn More</a>
        <a href="./contact.php" class="navlink" id="link5">Contact Us</a>
        <a href="./registration.php" class="navlink" id="link6">Log in</a>
        <a href="./destroy.php" class="navlink" id="link7">Log out</a>
    </nav>
            <form action='submit_recipe.php' method='post' id='submit'>
            <p>Dish name (no apostrophes or special characters): <input type="text" size="30" name="dish"></p>
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
            <p><textarea name="recipe"></textarea></p>
            <p><input type="submit"></p>
            </form>
        </body>
        </html>
INIT;
    }
    else {
        $host = "spring-2019.cs.utexas.edu";
        $user = "cs329e_mitra_sunnya";
        $pwd = "mania3melody!goose";
        $dbs = "cs329e_mitra_sunnya";
        $port = "3306";

        $connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);

        if (empty($connect)){
            die("mysqli_connect failed: " . mysqli_connect_error());
        }
        $table = "recipes";
        $user = $_COOKIE["user"];
        $dish =  mysqli_real_escape_string($connect, strip_tags($_POST["dish"]));
        $ingr1 =  mysqli_real_escape_string($connect, strip_tags($_POST["ingr1"]));
        $ingr2 =  mysqli_real_escape_string($connect, strip_tags($_POST["ingr2"]));
        $ingr3 =  mysqli_real_escape_string($connect, strip_tags($_POST["ingr3"]));
        $ingr4 =  mysqli_real_escape_string($connect, strip_tags($_POST["ingr4"]));
        $ingr5 =  mysqli_real_escape_string($connect, strip_tags($_POST["ingr5"]));
        $recipe =  mysqli_real_escape_string($connect, strip_tags($_POST["recipe"]));
        $recipe = preg_replace("/[\n\r]/", ",", $recipe);
        mysqli_query($connect, "insert into $table (user, dish, ingr1, ingr2, ingr3, ingr4, ingr5, recipe) values ('$user', '$dish', '$ingr1', '$ingr2', '$ingr3', '$ingr4', '$ingr5', '$recipe');");
	mysqli_close($connect);
	$response = mysqli_query("describe $table;");
//        $response = "Thank you for submitting your recipe!";
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
        </body>
        </html>
INIT;
    }
}

?>
