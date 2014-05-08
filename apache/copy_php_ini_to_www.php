<?php
/*
 * copy Apache php.ini to the current path.
 */

$file = php_ini_loaded_file();
$newfile = './php.ini';


if(!@copy($file, $newfile))
{
    $errors= error_get_last();
    echo "COPY ERROR: ".$errors['type'];
    echo "<br />\n".$errors['message'];
} else {
    echo "File copied from remote! From: $file , To: $newfile";
}

echo "Loaded Configuration File: ".php_ini_loaded_file();
