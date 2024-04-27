<?php

// require "./connection.php";

require "./database/User.php";

// session_start();

session_destroy();

header("Location: /");

?>