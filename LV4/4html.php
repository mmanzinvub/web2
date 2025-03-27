<?php
function getHTMLpage($content) {
    return "
<html>

<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <title>ZAD1</title>
</head>

<body>
$content
</body>

</html>";
}

$poziv = getHTMLpage("<b>Hello World</b>");

echo $poziv;
?>