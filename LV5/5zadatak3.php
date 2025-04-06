<?php
include 'header.php';
include 'funkcije.php';
?>

<html>

<body>
    <form method="POST">
        <label>Unesite naziv datoteke: </label>
        <!-- Potrebno je dati name atribut input elementu da bi kasnije dohvatili informacije iz njega sa $_POST -->
        <input type="text" name="filename">
        <button type="submit">Ucitaj</button>
        <br>
    </form>
</body>

</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $filename = $_POST["filename"];
    $path = "/opt/lampp/htdocs/LV5/files/$filename";

    $content = file_get_contents($path);

    if(file_exists($path)) {
        echo $content;
    } else {
        echo $filename . " ne postoji";
    }
}

include 'footer.php';
?>