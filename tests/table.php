<?php

include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$table = new UsersTable(new MySQL());

$id = $table->insert([
    "name" => "Alice",
    "email"=>"alice@gmail.com",
    "phone"=>"246546544",
    "address"=>"Yangon",
    "password"=>"password",
]);

echo $id;