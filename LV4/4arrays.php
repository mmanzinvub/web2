<?php
function arrayCount($array) {
    return count($array);
}

function arrayKey($array) {
    return array_keys($array);
}

function arrayValue($array) {
    return array_values($array);
}

function arrayHeader($array) {
    $header = "<tr>";
    foreach ($array as $key => $value) {
        $header .= "<th>$key</th>";
    }
    $header .= "</tr>";

    return $header;
}

function arrayRow($array) {
    $row = "<tr>";
    foreach ($array as $value) {
        $row .= "<td>$value</td>";
    }
    $row .= "</tr>";

    return $row;
}

$korisnik=["ime" => "Mario", 
"prezime" => "Kušević",
"OIB" => 65822145815,
"email" => "mkusevic@vub.hr",
"godiste" => 1999];

//arrayCount
echo "arrayCount: " . arrayCount($korisnik);  
echo "<br>"; 

//arrayKey
$keys = arrayKey($korisnik);

echo "arrayKey: "; 
print_r($keys);
echo "<br>";

//arrayValue
$values = arrayValue($korisnik);

echo "arrayValue: "; 
print_r($values);
echo "<br>";

//arrayHeader
$header = arrayHeader($korisnik);
echo "arrayHeader: <br>";
echo "<table>";
echo "$header";
echo "</table>";
echo "<br>";

//arrayRow
$row = arrayRow($korisnik);
echo "arrayRow: <br>";
echo "<table>";
echo "$row";
echo "</table>";
echo "<br>";
?>