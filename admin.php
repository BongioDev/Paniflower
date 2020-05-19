<?PHP

include 'navbar.php';
session_start();
if(!$_SESSION['loggedin']){
    header('Location: index.php');
}
if(!$_SESSION['admin']){
    header('Location: home.php');
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
            <div class="col-md-12">
                <form action="reglog.php" method="post">
                    <br>
                    <h3>Gebruikers aanmaken: </h3>
                    <br>
                    Gebruikers naam: <input required type="text" name="naam">
                    <br>
                    <br>
                    <small>(Min. 8 tekens)</small>
                    <br>
                    Gebruikers wachtwoord: <input required type="password" name="password1">
                    <br>
                    <br>
                    Herhaal wachtwoord: <input required type="password" name="password2">
                    <br>
                    <br>
                    <button class="btn btn-outline-primary" name="submit" type="submit">Maak aan</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>