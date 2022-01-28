<?php
// $db['db_host'] = "localhost";
// $db['db_user'] = "root";
// $db['db_pass'] = "12345678";
// $db['db_name'] = "cms";

// foreach ($db as $key => $value) {
//     define(strtoupper($key), $value);
// }

$connection = mysqli_connect('localhost', 'root', '12345678', 'cms');
if($connection){
    echo "we are connected";
}
?>