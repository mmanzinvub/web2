<?php
require_once 'FormBuilder.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Forma za unos korisnika</title>
</head>

<body>
    <div class="container">
        <?php
            $form = new FormBuilder('GET', 'vub.php', ['class' => 'my-form', 'projekt' => 'mmanzin', 'procedura' => 'p_login']);

            echo $form->open();
        ?>
            <div class="form-group">
                <?php
                    echo $form->input('ime', 'text', '', ['placeholder' => 'Ime', 'required' => 'required']) . "<br>" . "<br>";
                    echo $form->input('prezime', 'text', '', ['placeholder' => 'Prezime', 'required' => 'required']) . "<br>" . "<br>";
                    echo $form->input('email', 'email', '', ['placeholder' => 'Email', 'required' => 'required']) . "<br>" . "<br>";
                    echo $form->input('projekt', 'hidden', 'ime_studenta') . "<br>" . "<br>";
                    echo $form->input('procedura', 'hidden', 'ime_procedure') . "<br>" . "<br>";
                ?>
            </div>

            <div class="form-check">
                <?php
                    echo $form->radio('spol', 'musko', 'musko');
                    echo '<label for="musko"> Musko</label>' . "<br>";
                    echo $form->radio('spol', 'zensko', 'zensko');
                    echo '<label for="zensko"> Zensko</label>' . "<br>" . "<br>";
                ?>
            </div>

            <div class="form-check">
                <?php
                    echo $form->checkbox('interesi[]', 'programiranje', 'programiranje');
                    echo '<label for="programiranje"> Programiranje</label>' . "<br>";
                    echo $form->checkbox('interesi[]', 'dizajn', 'dizajn');
                    echo '<label for="dizajn"> Dizajn</label>' . "<br>";
                    echo $form->checkbox('interesi[]', 'bazePodataka', 'bazePodataka');
                    echo '<label for="bazePodataka"> Baze podataka</label>' . "<br>" . "<br>";
                ?>
            </div>

            <div class="form-group">
                <?php
                    echo $form->input('submit', 'submit', 'Posalji');
                ?>
            </div>

            <?php
                echo $form->close();
            ?>
    </div>
</body>