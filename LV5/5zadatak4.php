<?php
include 'header.php';
include 'funkcije.php';
?>

<html>

<body>
    <form method="POST">
        <label>Unesite naziv datoteke: </label>
        <input type="text" name="filename">
        <button type="submit">Ucitaj</button>
        <br>
    </form>
</body>

</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $filename = $_POST["filename"];
    
    //promjeni path ako ne radis na windows
    $path = "C:/xampp/htdocs/LV5/files/$filename";
    $path_info = pathinfo($path);

    $content = file_get_contents($path);

    if($path_info['extension'] == 'csv') {
        echo prikazCsv($path);
    } elseif (file_exists($path)) {
        echo $content;
    } else {
        echo $filename . " ne postoji";
    }
}

include 'footer.php';
?>