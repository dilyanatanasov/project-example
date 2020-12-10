<?php
require_once "core/Mailer.php";
$mailer = new Mailer();
$mailer->sendMail("dilyanatanasov177@gmail.com", "dilyanatanasov177@gmail.com", "Ala Bala", "Zaglavie", "<h1>Hello</h1>", "Hello");
?>
