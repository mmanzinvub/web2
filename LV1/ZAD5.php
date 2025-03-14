<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP table</title>
</head>

<body>
    <table>
        <tr>
            <td>
                Ime
            </td>
            <td>
                Prezime
            </td>
            <td>
                Predmet
            </td>
            <td>
                Ocjena
            </td>
        </tr>
        <?php
        $ime = "Marko";
        $prezime = "Horvat";
        $predmet = "Engleski";
        $ocjena = "1";

        echo "
        <tr>
            <td>
                $ime
            </td>
            <td>
                $prezime
            </td>
            <td>
                $predmet
            </td>
            <td>
                $ocjena
            </td>
        </tr>
        "
        ?>
    </table>
</body>

</html>