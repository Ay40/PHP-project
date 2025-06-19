<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;
use Helpers\HTTP;

$user = Auth::check();

$name = $_FILES['photo']['name'];
// “Go to the $_FILES array, find the input named 'photo', and get its 'name' value.
$tmp_name = $_FILES['photo']['tmp_name'];
$type = $_FILES['photo']['type'];

if($type == "image/jpeg" or $type == "image/png") {
    move_uploaded_file($tmp_name, "photos/$name");
            //  lat shi location, thein chin tae nay yar
            // photos/$name => user pay lite tae file name a time pyan thein
    $table = new UsersTable(new MySQL());
    $table->updatePhoto($user->id, $name);

    $user->photo = $name; // update session's user table

    HTTP::redirect("/profile.php");
} else {
    HTTP::redirect("/profile.php", "error=type");
}


// $_FILES['photo'] = [
//     'name' => 'filename.jpg',
//     'type' => 'image/jpeg',
//     'tmp_name' => '/tmp/php12345.tmp',
//     'error' => 0,
//     'size' => 24567
// ];

