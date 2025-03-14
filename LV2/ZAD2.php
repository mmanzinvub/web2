<?php
$predmeti = array ('Mikroracunala', 'Programsko inzenjerstvo', 'Operacijski sustavi', 'Java', 'C#', 'Web programiranje 2', 'Tehnicki Engleski 4');
echo "<pre>";
print_r($predmeti);
echo "<pre>";

$predmeti[1] = 'Web programiranje 2';
$predmeti[5] = 'Programsko inzenjerstvo';
echo "<pre>";
print_r($predmeti);
echo "<pre>";
?>