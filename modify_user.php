<?php 
require_once dirname(__FILE__). "/views/html/heading.php";

if ($_SESSION["uid"] === 1) {
    header("Location: index.php");
}

require_once dirname(__FILE__). "/views/html/modify_user.html";

require_once dirname(__FILE__). "/models/User.php";

$user = new User();
$allUsers = $user->list();

echo "<div class='container'>
        <table class='table' style='text-align=center'>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Access</th>
            <th>Actions</th>
        </tr>";

foreach($allUsers as $user) {
    echo "
        <tr>
            <td>".$user->id."</td>
            <td>".$user->username."</td>
            <td>".$user->access."</td>
            <td class='form-group'>
                <form method='GET' action='updateUser.php'>
                    <button class='btn btn-success' 'type='submit' name='user_id' value='".$user->id."'>Update</button>
                </form>
            </td>
        </tr>
    ";
}