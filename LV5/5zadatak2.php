<?php
include 'header.php';
include 'funkcije.php';

$path = "/opt/lampp/htdocs/LV5/files/datoteka02.txt";

$content = file_get_contents($path);

if ($content == true) {
    echo $content;
} else {
    echo "Nije moguce procitati sadrzaj";
}

include 'footer.php';
?>