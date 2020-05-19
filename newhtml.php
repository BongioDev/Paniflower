<?php

include 'navbar.php';
include 'db.php';
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
                <h1>Nieuwe opdracht</h1>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <!-- form -->
                <form action="newphp.php" method="post">
                    <h5>1. Selecteer opdrachtgever: </h5>
                    <select name="opdrachtgever">
                        <?PHP
                        $qOpdrachtgever = "SELECT * FROM `opdrachtgever`";
                        $data = mysqli_query($conn, $qOpdrachtgever);

                        while ($result = mysqli_fetch_assoc($data)) {
                            echo "<option value='" . $result['id'] . "'. >" . $result['naam'] . "</option>";
                        }
                        ?>
                    </select>
                    <br>
                    <br>
                    <h5>2. Datum en uur laden: </h5>
                    <input name="datumladen" type="datetime-local">
                    <br>
                    <br>
                    <h5>3. Opmerking laden: </h5>
                    <textarea name="oladen" cols="30" rows="5"></textarea>
                    <br>
                    <br>
                    <h5>4. Klant: </h5>
                    <br>
                    <select name="klant">
                        <?PHP
                        $qKlant = "SELECT * FROM `klant`";
                        $data = mysqli_query($conn, $qKlant);

                        while ($result = mysqli_fetch_assoc($data)) {
                            echo "<option value='" . $result['id'] . "'. >" . $result['naam'] . "</option>";
                        }
                        ?>
                    </select>
                    <br>
                    <br>
                    <h5>5. Datum en uur lossen: </h5>
                    <input name="datumlossen" type="datetime-local">
                    <br>
                    <br>
                    <h5>6. Opmerking lossen: </h5>
                    <textarea name="olossen" cols="30" rows="5"></textarea>
                    <br>
                    <br>
            </div>
            <div class="col-md-6">
                <h5>7. Product</h5>
                <select name="product">
                    <?PHP
                    $qProduct = "SELECT * FROM `product`";
                    $data = mysqli_query($conn, $qProduct);

                    while ($result = mysqli_fetch_assoc($data)) {
                        echo "<option value='" . $result['id'] . "'. >"  . $result['artikel nr.'] . ' - ' . $result['naam'] . "</option>";
                    }
                    ?>
                </select>
                <br>
                <br>
                <h5>8. Kwantum</h5>
                <input name="kwantum" type="text">
                <br>
                <br>
                <h5>9. Eenheid</h5>
                <select name="eenheid">
                    <?PHP
                    $qEenheid = "SELECT * FROM `eenheid`";
                    $data = mysqli_query($conn, $qEenheid);

                    while ($result = mysqli_fetch_assoc($data)) {
                        echo "<option value='" . $result['id'] . "'. >"  . $result['naam'] .  "</option>";
                    }
                    ?>
                </select>
                <br>
                <br>
                <h5>10. Chauffeur</h5>
                <br>
                <select name="chauffeur">
                    <?PHP
                    $qChauffeur = "SELECT * FROM `chauffeur`";
                    $data = mysqli_query($conn, $qChauffeur);

                    while ($result = mysqli_fetch_assoc($data)) {
                        echo "<option value='" . $result['id'] . "'. >"  . $result['naam'] . "</option>";
                    }
                    ?>
                </select>
                <br>
                <br>
                <h5>11. Extra opmerking</h5>
                <br>
                <textarea name="oextra" cols="30" rows="5"></textarea>
                <br>
                <br>
                <button class="btn btn-outline-primary" type="submit">Maak opdracht aan</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>