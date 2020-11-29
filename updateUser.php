<?php
require_once dirname(__FILE__). "/models/User.php";

require_once dirname(__FILE__). "/views/html/heading.php";
require_once dirname(__FILE__). "/views/html/updateUser.html";

$user = new User();

if (!empty($_GET["user_id"])) {
    $userId = $_GET["user_id"];
    $userObject = $user->view($userId);
    if (!empty($user)) {
        echo "<div class='container'>
            <form method='POST' action='updateUser.php?update_id=".$userObject->id."'>
                <div class='form-group' >
                    <h4>".$userObject->username."</h4>
                    <label>Access</label><br>
                    <input type='number' max='1' name='access' value='".$userObject->access."'><br>
                    <button class='btn btn-warning mt-3' type='submit' name='update'>Update</button>
                </div>
            </form>
        </div>";
    } else {
        header("Location: modify_user.php");
    }
} else if(!empty($_GET["update_id"])) {
    $userId = $_GET["update_id"];
    $access = $_POST["access"];

    $userObject = $user->view($userId);
    $userObject->access = $access;
    $userObject->update();
    header("Location: modify_user.php");
} else {    
    header("Location: modify_user.php");
}
