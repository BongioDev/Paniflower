<?php

include 'navbar.php';
session_start();
if(!$_SESSION['loggedin']){
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <?php
                
                $moment = getdate();
                if ($moment['hours'] < 12 && $moment['hours'] > 5) {
                    echo '<h1>' . "Goedemorgen!" . '</h1>' . '<br>';
                } else if ($moment['hours'] > 12 && $moment['hours'] < 18) {
                    echo '<h1>' . "Goedemiddag! " . '</h1>' . '<br>';
                } else if ($moment['hours'] > 18 && $moment['hours'] < 22) {
                    echo '<h1>' . "Goedeavond!" . '</h1>' . '<br>';
                } else {
                    echo '<h1>' . "Goedenacht!" . '</h1>' . '<br>';
                }

                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 style="margin-bottom: 50px">Welkom bij de Paniflower app</h>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li><b>Je kan nieuwe opdrachten aanmaken door te klikken op 'Nieuwe opdracht'.</b></li>
                    <li><b>Een overzicht van alle opdrachten vind je door te klikken op 'Alle opdrachten', hier kan je ook opdrachten verwijderen en/of uitprinten.</b></li>
                    <li><b>Voor het invoegen van nieuwe data zoals: opdrachtgevers, klanten, producten en chauffeurs, klik je op de knop 'invoegen'.</b></li>
                    <li><b>Voor het aanmaken van nieuwe gebruikers, klik op de knop "Invoegen gebruikers" (enkel voor admins).</b></li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>