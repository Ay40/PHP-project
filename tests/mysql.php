<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;

$mysql = new MySQL("localhost","root","","project");
$db = $mysql->connect();

$result = $db->query("SELECT * FROM roles");
print_r($result->fetchAll());