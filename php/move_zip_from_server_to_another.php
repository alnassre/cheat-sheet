<?php

$zipToDownload = "http://example.com/backup.zip";

if(file_put_contents("Tmpfile.zip", fopen($zipToDownload, 'r')))

echo "Success downloading $zipToDownload :)";

else {

echo "Fail $zipToDownload";

}
