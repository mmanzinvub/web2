<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZAD2</title>
</head>

<body>
    <form method="post" action="#">
        Unesite username: <input type="text" name="username">
        <button type="submit" >Posalji</button>
        <select name="predmet">
            <option>Odaberite predmet</option>
            <option value = 0>Mikroracunala</option>
            <option value = 1>C# programiranje</option>
            <option value = 2>Java programiranje</option>
            <option value = 3>Web2</option>
        </select>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["username"])){
            if (empty($_POST["username"])) {
                echo '
                <script>
                alert("Molimo unesite username");
                </script>';
            } else {
                echo '
                <script>
                alert("Pozdrav,' . $_POST["username"] .'");
                </script>';
            }
        }

        if (isset($_POST["predmet"])) {
            echo '
                <script>
                alert("Molimo odaberite predmet");
                </script>';
        }
    }
    ?>
</body>

</html>