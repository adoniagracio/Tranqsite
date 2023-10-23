<?php
#require = error, require_once = cuma sekali akses, include = warning
require "../config/database.php";
$conn = new mysqli(
    $config["server"],
    $config["username"],
    $config["password"],
    $config["database"]
);

?>
