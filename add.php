<?PHP

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
        <div class="row text-center">
            <div style="margin-bottom: 50px" class="col-md-12">
                <h1>Nieuwe data invoegen</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form action="addProd.php" method="post">
                    <h3>Producten toevoegen: </h3>
                    Product naam: <input required type="text" name="prodNaam">
                    <br>
                    Product nummer: <input required type="text" name="prodNr">
                    <br>
                    <button class="btn btn-outline-primary" type="submit">Voeg toe</button>
                </form>
            </div>
            <div style="margin-bottom: 50px" class="col-md-6">
                <form action="addOpdracht.php" method="post">
                    <h3>Opdrachtgever toevoegen: </h3>
                    Opdrachtgever naam: <input required type="text" name="opdrachtNaam">
                    <br>
                    Opdrachtgever laadplaats: <input required type="text" name="opdrachtLaad">
                    <br>
                    <button class="btn btn-outline-primary" type="submit">Voeg toe</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div style="margin-bottom: 50px" class="col-md-6">
                <form action="addKlant.php" method="post">
                    <h3>Klant toevoegen: </h3>
                    Klant naam: <input required type="text" name="klantNaam">
                    <br>
                    Klant losplaats: <input required type="text" name="klantLos">
                    <br>
                    <button class="btn btn-outline-primary" type="submit">Voeg toe</button>
                </form>
            </div>
            <div style="margin-bottom: 50px" class="col-md-6">
                <form action="addChau.php" method="post">
                    <h3>Chauffeur toevoegen: </h3>
                    Chauffeur naam: <input required type="text" name="naam">
                    <br>
                    <button class="btn btn-outline-primary" type="submit">Voeg toe</button>
                </form>
            </div>
        </div>
    </div>


</body>

</html>