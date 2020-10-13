<?php
require_once "Authentication.php";

// If there is a post request
// And if there is a logout key
// And if the logout key has a value that is not empty "" or NULL
// Then logout
if (!empty($_POST) &&
    isset($_POST["logout"]) &&
    !empty($_POST["logout"])) {
    $auth = new Authentication();
    $auth->logout();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Home page</title>
</head>
<body>
    <div class="container">
        <h1>Welcome to our webpage!</h1>
    </div>
    <form method="POST" action="homepage.php">
<!-- To give data of button you have to give it a name attribute-->
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>
