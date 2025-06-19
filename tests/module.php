<?php

include("../vendor/autoload.php");

use Faker\Factory as Faker;
use Helpers\Auth;
use Helpers\HTTP;
use Libs\Database\MySQl;
use Libs\Database\UsersTable;

Auth::check();
HTTP::redirect();

$db = new MySQl;
$db->connect();

$table = new UsersTable;
$table->insert();

$faker = Faker::create();
echo $faker->name;