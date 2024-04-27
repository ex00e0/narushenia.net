<?php

require_once "../database/Application.php";

$id_appl = isset($_GET['id'])?$_GET['id']:false;
$status = isset($_GET['status'])?$_GET['status']:false;


if ($id_appl && $status) {
    $application = new Application();
    if ($application->change_status($id_appl, $status)) {header("Location: /admin");}
    else {}
}