<?php

include 'navbar.php';

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
                <h3>Log in</h3>
                <small>(Enkel gebruikers aangemaakt door de admin kan inloggen)</small>
                <br>
                <small>(user:admin1 pass:adminadmin)</small>
                <br>
                <form method="post" action="checkLogin.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gebruikersnaam</label>
                        <input name="user" type="text" required class="form-control" placeholder="Gebruikersnaam">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Wachtwoord</label>
                        <input name="password" type="password" class="form-control" placeholder="Wachtwoord">
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary">Log in</button>
                </form>
            </div>
        </div>
</body>

</html>
