<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZAD1</title>
</head>

<body>
    <form method="post" action="#">
        Unesite username: <input type="text" name="username">
        <button type="submit" >Posalji</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["username"])){
            if (empty($_POST["username"])){
                echo '<script>alert("Molimo unesite username");</script>';
            }else{
                echo '<script>alert("Pozdrav,' . $_POST["username"] .'");</script>';
            }
        }
    }
    ?>
</body>

</html>