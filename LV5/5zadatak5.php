<?php
include 'header.php';
include 'funkcije.php';

$currentContent = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $filename = $_POST["filename"];
    
    //promjeni path ako ne radis na windows
    $path = "C:/xampp/htdocs/LV5/files/$filename";
    $currentContent = file_get_contents($path);

    if(file_exists($path)) {
        //NE RADI

        //citanje datoteke
        $handle = fopen($path, "r");
        $content = fread($handle, filesize($path));
        fclose($handle);

        //uzimanje podataka iz textarea
        $newContent = $_POST["content"];

        //overwriteat ce preko starog contenta
        $handle = fopen($path, "w");
        fwrite($handle, $newContent);
        fclose($handle);

    } else {
        echo $filename . " ne postoji";
    }
}
?>

<html>

<body>
    <form method="POST">
        <label>Unesite naziv datoteke: </label>
        <input type="text" name="filename">
        <button type="submit" name="load">Ucitaj</button>
        <br>
        <textarea name="content" rows="10" cols="50">
            <?php 
            echo $currentContent;
            ?>
        </textarea>
        <br>
        <button type="submit" name="save">Spremi</button>
    </form>
</body>

</html>

<?php
include 'footer.php';
?>