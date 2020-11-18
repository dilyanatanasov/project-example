<?php
require_once dirname(__FILE__). "/repositories/UserRepository.php";

require_once dirname(__FILE__). "/views/html/heading.php";
require_once dirname(__FILE__). "/views/html/updateUser.html";

$userRepository = new UserRepository();

if (!empty($_GET["user_id"])) {
    $userId = $_GET["user_id"];
    $user = $userRepository->getUserById($userId);
    if (!empty($user)) {
        echo "<div class='container'>
            <form method='POST' action='updateUser.php?update_id=".$user['id']."'>
                <div class='form-group' >
                    <h4>".$user["username"]."</h4>
                    <label>Access</label><br>
                    <input type='number' max='1' name='access' value='".$user['access']."'><br>
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

    $update_data = [
        "update_id" => $userId,
        "access" => $access
    ];

    $userRepository->updateUserById($update_data);
    header("Location: modify_user.php");
} else {    
    header("Location: modify_user.php");
}
