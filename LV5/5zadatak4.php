<?php
include 'header.php';
include 'funkcije.php';

echo '
<html>

<body>
    <form method="POST">
        <label>Unesite naziv datoteke: </label>
        <input type="text" name="filename">
        <button type="submit">Ucitaj</button>
        <br>
    </form>
</body>

</html>';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $filename = $_POST["filename"];
    $path = "/opt/lampp/htdocs/LV5/files/$filename";

    $content = file_get_contents($path);

    if(file_exists($path)) {
        if(//file_extension == .csv) {
            //iscrtaj tablu
        }
        echo $content;
    } else {
        echo $filename . " ne postoji";
    }
}

include 'footer.php';
?>