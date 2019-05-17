<?php
if (isset($_POST["name"])) {
   $things_said= fopen("things_said.txt", "w");
   $string = $_POST["name"] . $_POST["email"] . $_POST["comments"];
   fwrite($things_said, $string);
print <<<INIT
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
	<div>    
	Thanks
	</div>
	</body>
	</html>
INIT;
}
else {
	print <<<INIT
<!DOCTYPE html>
<html lang="en">
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

    <div  class = "container" id = "cform">
        <form id="contact_form" action="contact.php" method="post">
            <div class="row form-group">
                <div class = "col-sm-3"><p> </p></div>
                <div class = "col-sm-3"><label for="name">Name</label></div>
                <div class = "col-sm-3"><input type="text" id="name" name="name" required></div>
                <div class = "col-sm-3"><p> </p></div>
            </div>
            <div class="form-group" >
                <div class = "col-sm-3"><p> </p></div>
                <div class = "col-sm-3"><label for="email">Email address</label></div>
                <div class = "col-sm-3"><input type="email" id="email" name="email" required></div>
                <div class = "col-sm-3"><p> </p></div>
            </div>
            <div class="form-group">
                <div class = "col-sm-3"><p> </p></div>
                <div class = "col-sm-3"><label for="comments">Comments</label></div>
                <div class = "col-sm-3"><textarea name="comments" id="comments" cols="50" rows="10" required></textarea></div>
                <div class = "col-sm-3"><p> </p></div>
            </div>
            <div class="form-group">
                <div class = "col-sm-3"><p> </p></div>
                <div class = "col-sm-3"><input type="submit" value="Submit"></div>
                <div class = "col-sm-3"><input type="reset" value="Reset"></div>
                <div class = "col-sm-3"><p> </p></div>
            </div>
        </form>
    </div>
    <footer>
        &copy; 2019 Sunny Ananthanarayan and Stephen Nachazel
    </footer>
</body>
</html>
INIT;
}
?>
