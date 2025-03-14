<!DOCTYPE html>

<?php
$ime = "Marko";
$prezime = "Horvat";
$titula = "Ban";
$firma = "Firma A";
$ulica = "Ulica A";
$iznos = "1000";
$datum = "6.3.2025.";
$institucija = "Institucija A";
$noviRed = '<br>';

$tekst = "Poštovani, molimo Vas da se javite u najbližu poslovnicu #firma na adresi #ulica zbog dugovanja od
#iznos kn. Ako ne podmirite obveze do #datum bit ćemo prisiljeni angažirati #institucija
Lp, #ime #prezime #titula.";

$hashevi = ['#firma', '#ulica', '#iznos', '#datum', '#institucija', '#ime', '#prezime', '#titula'];
$replace = [$firma, $ulica, $iznos, $datum, $institucija, $ime, $prezime, $titula];

$tekst = str_replace($hashevi, $replace, $tekst);

echo "$tekst";

?>

