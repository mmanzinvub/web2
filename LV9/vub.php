<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        "projekt" => $_POST['projekt'],
        "procedura" => $_POST['procedura'],
        "ime" => $_POST['ime'],
        "prezime" => $_POST['prezime'],
        "email" => $_POST['email'],
        "spol" => $_POST['spol'],
        "interesi" => isset($_POST['interesi']) ? $_POST['interesi'] : []
    ];

    $filename = 'korisnici.json';
    $korisnici = [];
    if (file_exists($filename)) {
        $json = file_get_contents($filename);
        $korisnici = json_decode($json, true) ?: [];
    }
    $korisnici[] = $data;
    file_put_contents($filename, json_encode($korisnici, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    echo "Korisnik uspješno dodan!";
}
?>