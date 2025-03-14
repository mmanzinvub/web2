<?php
$predmeti = array ('Mikroracunala', 'Programsko inzenjerstvo', 'Operacijski sustavi', 'Java', 'C#', 'Web programiranje 2', 'Tehnicki Engleski 4');
$pozicija = [1,2];
echo "<pre>";
print_r($predmeti);
echo "<pre>";

$tmp = $predmeti[$pozicija[0]];
$predmeti[$pozicija[0]] = $predmeti[$pozicija[1]];
$predmeti[$pozicija[1]] = $tmp;

echo "<pre>";
print_r($predmeti);
echo "<pre>";
?>