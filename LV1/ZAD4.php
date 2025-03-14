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

$tekst = "Poštovani, $noviRed $noviRed";
$tekst .= "molimo Vas da se javite u najbližu poslovnicu $firma na adresi $ulica zbog dugovanja od $noviRed";
$tekst .= "$iznos kn. Ako ne podmirite obveze do $datum bit ćemo prisiljeni angažirati $institucija $noviRed";
$tekst .= "Lp, $noviRed $noviRed";
$tekst .= "$ime $prezime $titula";

echo "$tekst";

?>

