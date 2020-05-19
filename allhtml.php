<?php

include 'navbar.php';
include 'db.php';
session_start();
if(!$_SESSION['loggedin']){
    header('Location: index.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title></title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Alle opdrachten</h1>
            </div>
        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- sort -->
                    <h5>Sorteer op: </h5>
                    <form action="allhtml.php" method="post">
                        <select name="sorteer" onchange="this.form.submit()">
                            <option>...</option>
                            <option value="nummer">Nummer</option>
                            <option value="datumLaNieuw">Datum laden oplopend</option>
                            <option value="datumLaOud">Datum laden aflopend</option>
                            <option value="datumLoNieuw">Datum lossen oplopend</option>
                            <option value="datumLoOud">Datum lossen aflopend</option>
                            <option value="opdracht">Opdrachtgever alfabetisch</option>
                            <option value="klant">Klant alfabetisch</option>
                            <option value="productOp">Product nr. oplopend</option>
                            <option value="productAf">Product nr. aflopend</option>
                        </select>
                    </form>
                    <!-- tafel -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Opdrachtgever</th>
                                <th scope="col">Datum + uur laden</th>
                                <th scope="col">Opmerking laden</th>
                                <th scope="col">Klant</th>
                                <th scope="col">Datum + uur lossen</th>
                                <th scope="col">Opmerking lossen</th>
                                <th scope="col">Artikel nr.</th>
                                <th scope="col">Artikel</th>
                                <th scope="col">Kwantum</th>
                                <th scope="col">Eenheid</th>
                                <th scope="col">Chauffeur</th>
                                <th scope="col">Extra opmerking</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?PHP
                            // error_reporting(0);
                            // ini_set('display_errors', 0);
                            //sorteer opties
                                $sorteer = $_POST['sorteer'];
                            //sorteer op id(standaard)

                            if ($sorteer == "nummer") {
                                //query
                                $query = "SELECT *,order_paniflower.id AS id, opdrachtgever.naam AS opdrachtgever, klant.naam AS klant, product.naam AS product, product.artikelnr AS artikelnr, eenheid.naam AS eenheid, chauffeur.naam AS chauffeur FROM `order_paniflower` JOIN opdrachtgever ON order_paniflower.opdrachtgever_id=opdrachtgever.id JOIN klant ON order_paniflower.klant_id=klant.id JOIN product ON order_paniflower.product_id=product.id JOIN eenheid ON order_paniflower.eenheid_id=eenheid.id JOIN chauffeur ON order_paniflower.chauffeur_id=chauffeur.id ORDER BY order_paniflower.id ASC";
                                //sql uitvoeren
                                $data = mysqli_query($conn, $query);
                                //while loop
                                while ($result = mysqli_fetch_assoc($data)) {
                                    echo "<tr>\n";
                                    echo "    <th scope=\"row\">" . $result['id'] . "</th>\n";
                                    echo "    <td>" . $result['opdrachtgever'] . "</td>\n";
                                    echo "    <td>" . $result['laad_datum_uur'] . "</td>\n";
                                    echo "    <td>" . $result['opmerking_laden'] . "</td>\n";
                                    echo "    <td>" . $result['klant'] . "</td>\n";
                                    echo "    <td>" . $result['los_datum_uur'] . "</td>\n";
                                    echo "    <td>" . $result['opmerking_lossen'] . "</td>\n";
                                    echo "    <td>" . $result['artikelnr'] . "</td>\n";
                                    echo "    <td>" . $result['product'] . "</td>\n";
                                    echo "    <td>" . $result['kwantum'] . "</td>\n";
                                    echo "    <td>" . $result['eenheid'] . "</td>\n";
                                    echo "    <td>" . $result['chauffeur'] . "</td>\n";
                                    echo "    <td>" . $result['extra_opmerking'] . "</td>\n";
                                    echo "    <td><a class='btn btn-outline-danger btn-sm' href='delete.php?id=" . $result['id'] . "'>Verwijder</a><br><a class='btn btn-outline-success btn-sm' href='pdf.php?id=" . $result['id'] . "'>Print uit </a><br><small>(Incl. prod. nr. - laad/los adressen)</small></td>\n";
                                    echo "</tr>\n";
                                }
                            }

                            //sorteer op datum laden oplopend 
                            if ($sorteer == "datumLaNieuw") {
                                //query
                                $query = "SELECT *,order_paniflower.id AS id, opdrachtgever.naam AS opdrachtgever, klant.naam AS klant, product.naam AS product, product.artikelnr AS artikelnr, eenheid.naam AS eenheid, chauffeur.naam AS chauffeur FROM `order_paniflower` JOIN opdrachtgever ON order_paniflower.opdrachtgever_id=opdrachtgever.id JOIN klant ON order_paniflower.klant_id=klant.id JOIN product ON order_paniflower.product_id=product.id JOIN eenheid ON order_paniflower.eenheid_id=eenheid.id JOIN chauffeur ON order_paniflower.chauffeur_id=chauffeur.id ORDER BY order_paniflower.`laad_datum_uur` ASC";
                                //sql uitvoeren
                                $data = mysqli_query($conn, $query);
                                //while loop
                                while ($result = mysqli_fetch_assoc($data)) {
                                    echo "<tr>\n";
                                    echo "    <th scope=\"row\">" . $result['id'] . "</th>\n";
                                    echo "    <td>" . $result['opdrachtgever'] . "</td>\n";
                                    echo "    <td>" . $result['laad_datum_uur'] . "</td>\n";
                                    echo "    <td>" . $result['opmerking_laden'] . "</td>\n";
                                    echo "    <td>" . $result['klant'] . "</td>\n";
                                    echo "    <td>" . $result['los_datum_uur'] . "</td>\n";
                                    echo "    <td>" . $result['opmerking_lossen'] . "</td>\n";
                                    echo "    <td>" . $result['artikelnr'] . "</td>\n";
                                    echo "    <td>" . $result['product'] . "</td>\n";
                                    echo "    <td>" . $result['kwantum'] . "</td>\n";
                                    echo "    <td>" . $result['eenheid'] . "</td>\n";
                                    echo "    <td>" . $result['chauffeur'] . "</td>\n";
                                    echo "    <td>" . $result['extra_opmerking'] . "</td>\n";
                                    echo "    <td><a class='btn btn-outline-danger btn-sm' href='delete.php?id=" . $result['id'] . "'>Verwijder</a><br><a class='btn btn-outline-success btn-sm' href='pdf.php?id=" . $result['id'] . "'>Print uit </a><br><small>(Incl. prod. nr. - laad/los adressen)</small></td>\n";
                                    echo "</tr>\n";
                                }
                            }

                            //sorteer op datum laden aflopend
                            if ($sorteer == "datumLaOud") {
                                //query
                                $query = "SELECT *,order_paniflower.id AS id, opdrachtgever.naam AS opdrachtgever, klant.naam AS klant, product.naam AS product, product.artikelnr AS artikelnr, eenheid.naam AS eenheid, chauffeur.naam AS chauffeur FROM `order_paniflower` JOIN opdrachtgever ON order_paniflower.opdrachtgever_id=opdrachtgever.id JOIN klant ON order_paniflower.klant_id=klant.id JOIN product ON order_paniflower.product_id=product.id JOIN eenheid ON order_paniflower.eenheid_id=eenheid.id JOIN chauffeur ON order_paniflower.chauffeur_id=chauffeur.id ORDER BY  order_paniflower.`laad_datum_uur` DESC";
                                //sql uitvoeren
                                $data = mysqli_query($conn, $query);
                                //while loop
                                while ($result = mysqli_fetch_assoc($data)) {
                                    echo "<tr>\n";
                                    echo "    <th scope=\"row\">" . $result['id'] . "</th>\n";
                                    echo "    <td>" . $result['opdrachtgever'] . "</td>\n";
                                    echo "    <td>" . $result['laad_datum_uur'] . "</td>\n";
                                    echo "    <td>" . $result['opmerking_laden'] . "</td>\n";
                                    echo "    <td>" . $result['klant'] . "</td>\n";
                                    echo "    <td>" . $result['los_datum_uur'] . "</td>\n";
                                    echo "    <td>" . $result['opmerking_lossen'] . "</td>\n";
                                    echo "    <td>" . $result['artikelnr'] . "</td>\n";
                                    echo "    <td>" . $result['product'] . "</td>\n";
                                    echo "    <td>" . $result['kwantum'] . "</td>\n";
                                    echo "    <td>" . $result['eenheid'] . "</td>\n";
                                    echo "    <td>" . $result['chauffeur'] . "</td>\n";
                                    echo "    <td>" . $result['extra_opmerking'] . "</td>\n";
                                    echo "    <td><a class='btn btn-outline-danger btn-sm' href='delete.php?id=" . $result['id'] . "'>Verwijder</a><br><a class='btn btn-outline-success btn-sm' href='pdf.php?id=" . $result['id'] . "'>Print uit </a><br><small>(Incl. prod. nr. - laad/los adressen)</small></td>\n";
                                    echo "</tr>\n";
                                }
                            }

                            //sorteer op datum lossen oplopend
                            if ($sorteer == "datumLoNieuw") {
                                //query
                                $query = "SELECT *,order_paniflower.id AS id, opdrachtgever.naam AS opdrachtgever, klant.naam AS klant, product.naam AS product, product.artikelnr AS artikelnr, eenheid.naam AS eenheid, chauffeur.naam AS chauffeur FROM `order_paniflower` JOIN opdrachtgever ON order_paniflower.opdrachtgever_id=opdrachtgever.id JOIN klant ON order_paniflower.klant_id=klant.id JOIN product ON order_paniflower.product_id=product.id JOIN eenheid ON order_paniflower.eenheid_id=eenheid.id JOIN chauffeur ON order_paniflower.chauffeur_id=chauffeur.id ORDER BY order_paniflower.`los_datum_uur` ASC";
                                //sql uitvoeren
                                $data = mysqli_query($conn, $query);
                                //while loop
                                while ($result = mysqli_fetch_assoc($data)) {
                                    echo "<tr>\n";
                                    echo "    <th scope=\"row\">" . $result['id'] . "</th>\n";
                                    echo "    <td>" . $result['opdrachtgever'] . "</td>\n";
                                    echo "    <td>" . $result['laad_datum_uur'] . "</td>\n";
                                    echo "    <td>" . $result['opmerking_laden'] . "</td>\n";
                                    echo "    <td>" . $result['klant'] . "</td>\n";
                                    echo "    <td>" . $result['los_datum_uur'] . "</td>\n";
                                    echo "    <td>" . $result['opmerking_lossen'] . "</td>\n";
                                    echo "    <td>" . $result['artikelnr'] . "</td>\n";
                                    echo "    <td>" . $result['product'] . "</td>\n";
                                    echo "    <td>" . $result['kwantum'] . "</td>\n";
                                    echo "    <td>" . $result['eenheid'] . "</td>\n";
                                    echo "    <td>" . $result['chauffeur'] . "</td>\n";
                                    echo "    <td>" . $result['extra_opmerking'] . "</td>\n";
                                    echo "    <td><a class='btn btn-outline-danger btn-sm' href='delete.php?id=" . $result['id'] . "'>Verwijder</a><br><a class='btn btn-outline-success btn-sm' href='pdf.php?id=" . $result['id'] . "'>Print uit </a><br><small>(Incl. prod. nr. - laad/los adressen)</small></td>\n";
                                    echo "</tr>\n";
                                }
                            }

                            //sorteer op datum lossen aflopend
                            if ($sorteer == "datumLoOud") {
                                //query
                                $query = "SELECT *,order_paniflower.id AS id, opdrachtgever.naam AS opdrachtgever, klant.naam AS klant, product.naam AS product, product.artikelnr AS artikelnr, eenheid.naam AS eenheid, chauffeur.naam AS chauffeur FROM `order_paniflower` JOIN opdrachtgever ON order_paniflower.opdrachtgever_id=opdrachtgever.id JOIN klant ON order_paniflower.klant_id=klant.id JOIN product ON order_paniflower.product_id=product.id JOIN eenheid ON order_paniflower.eenheid_id=eenheid.id JOIN chauffeur ON order_paniflower.chauffeur_id=chauffeur.id ORDER BY order_paniflower.`los_datum_uur` DESC";
                                //sql uitvoeren
                                $data = mysqli_query($conn, $query);
                                //while loop
                                while ($result = mysqli_fetch_assoc($data)) {
                                    echo "<tr>\n";
                                    echo "    <th scope=\"row\">" . $result['id'] . "</th>\n";
                                    echo "    <td>" . $result['opdrachtgever'] . "</td>\n";
                                    echo "    <td>" . $result['laad_datum_uur'] . "</td>\n";
                                    echo "    <td>" . $result['opmerking_laden'] . "</td>\n";
                                    echo "    <td>" . $result['klant'] . "</td>\n";
                                    echo "    <td>" . $result['los_datum_uur'] . "</td>\n";
                                    echo "    <td>" . $result['opmerking_lossen'] . "</td>\n";
                                    echo "    <td>" . $result['artikelnr'] . "</td>\n";
                                    echo "    <td>" . $result['product'] . "</td>\n";
                                    echo "    <td>" . $result['kwantum'] . "</td>\n";
                                    echo "    <td>" . $result['eenheid'] . "</td>\n";
                                    echo "    <td>" . $result['chauffeur'] . "</td>\n";
                                    echo "    <td>" . $result['extra_opmerking'] . "</td>\n";
                                    echo "    <td><a class='btn btn-outline-danger btn-sm' href='delete.php?id=" . $result['id'] . "'>Verwijder</a><br><a class='btn btn-outline-success btn-sm' href='pdf.php?id=" . $result['id'] . "'>Print uit </a><br><small>(Incl. prod. nr. - laad/los adressen)</small></td>\n";
                                    echo "</tr>\n";
                                }
                            }

                            //sorteer op opdrachtgever alfabetisch
                            if ($sorteer == "opdracht") {
                                //query
                                $query = "SELECT *,order_paniflower.id AS id, opdrachtgever.naam AS opdrachtgever, klant.naam AS klant, product.naam AS product, product.artikelnr AS artikelnr, eenheid.naam AS eenheid, chauffeur.naam AS chauffeur FROM `order_paniflower` JOIN opdrachtgever ON order_paniflower.opdrachtgever_id=opdrachtgever.id JOIN klant ON order_paniflower.klant_id=klant.id JOIN product ON order_paniflower.product_id=product.id JOIN eenheid ON order_paniflower.eenheid_id=eenheid.id JOIN chauffeur ON order_paniflower.chauffeur_id=chauffeur.id ORDER BY `opdrachtgever` ASC";
                                //sql uitvoeren
                                $data = mysqli_query($conn, $query);
                                //while loop
                                while ($result = mysqli_fetch_assoc($data)) {
                                    echo "<tr>\n";
                                    echo "    <th scope=\"row\">" . $result['id'] . "</th>\n";
                                    echo "    <td>" . $result['opdrachtgever'] . "</td>\n";
                                    echo "    <td>" . $result['laad_datum_uur'] . "</td>\n";
                                    echo "    <td>" . $result['opmerking_laden'] . "</td>\n";
                                    echo "    <td>" . $result['klant'] . "</td>\n";
                                    echo "    <td>" . $result['los_datum_uur'] . "</td>\n";
                                    echo "    <td>" . $result['opmerking_lossen'] . "</td>\n";
                                    echo "    <td>" . $result['artikelnr'] . "</td>\n";
                                    echo "    <td>" . $result['product'] . "</td>\n";
                                    echo "    <td>" . $result['kwantum'] . "</td>\n";
                                    echo "    <td>" . $result['eenheid'] . "</td>\n";
                                    echo "    <td>" . $result['chauffeur'] . "</td>\n";
                                    echo "    <td>" . $result['extra_opmerking'] . "</td>\n";
                                    echo "    <td><a class='btn btn-outline-danger btn-sm' href='delete.php?id=" . $result['id'] . "'>Verwijder</a><br><a class='btn btn-outline-success btn-sm' href='pdf.php?id=" . $result['id'] . "'>Print uit </a><br><small>(Incl. prod. nr. - laad/los adressen)</small></td>\n";
                                    echo "</tr>\n";
                                }
                            }

                            //sorteer op klant alfabetisch
                            if ($sorteer == "klant") {
                                //query
                                $query = "SELECT *,order_paniflower.id AS id, opdrachtgever.naam AS opdrachtgever, klant.naam AS klant, product.naam AS product, product.artikelnr AS artikelnr, eenheid.naam AS eenheid, chauffeur.naam AS chauffeur FROM `order_paniflower` JOIN opdrachtgever ON order_paniflower.opdrachtgever_id=opdrachtgever.id JOIN klant ON order_paniflower.klant_id=klant.id JOIN product ON order_paniflower.product_id=product.id JOIN eenheid ON order_paniflower.eenheid_id=eenheid.id JOIN chauffeur ON order_paniflower.chauffeur_id=chauffeur.id ORDER BY `klant` ASC";
                                //sql uitvoeren
                                $data = mysqli_query($conn, $query);
                                //while loop
                                while ($result = mysqli_fetch_assoc($data)) {
                                    echo "<tr>\n";
                                    echo "    <th scope=\"row\">" . $result['id'] . "</th>\n";
                                    echo "    <td>" . $result['opdrachtgever'] . "</td>\n";
                                    echo "    <td>" . $result['laad_datum_uur'] . "</td>\n";
                                    echo "    <td>" . $result['opmerking_laden'] . "</td>\n";
                                    echo "    <td>" . $result['klant'] . "</td>\n";
                                    echo "    <td>" . $result['los_datum_uur'] . "</td>\n";
                                    echo "    <td>" . $result['opmerking_lossen'] . "</td>\n";
                                    echo "    <td>" . $result['artikelnr'] . "</td>\n";
                                    echo "    <td>" . $result['product'] . "</td>\n";
                                    echo "    <td>" . $result['kwantum'] . "</td>\n";
                                    echo "    <td>" . $result['kwantum'] . "</td>\n";
                                    echo "    <td>" . $result['eenheid'] . "</td>\n";
                                    echo "    <td>" . $result['chauffeur'] . "</td>\n";
                                    echo "    <td>" . $result['extra_opmerking'] . "</td>\n";
                                    echo "    <td><a class='btn btn-outline-danger btn-sm' href='delete.php?id=" . $result['id'] . "'>Verwijder</a><br><a class='btn btn-outline-success btn-sm' href='pdf.php?id=" . $result['id'] . "'>Print uit </a><br><small>(Incl. prod. nr. - laad/los adressen)</small></td>\n";
                                    echo "</tr>\n";
                                }
                            }

                            //sorteer op product nummer oplopend WERKT NIET(ik krijg artikel nummer niet in de table gezet)
                            if ($sorteer == "productOp") {
                                //query
                                $query = "SELECT *,order_paniflower.id AS id, opdrachtgever.naam AS opdrachtgever, klant.naam AS klant, product.naam AS product, product.artikelnr AS artikelnr, eenheid.naam AS eenheid, chauffeur.naam AS chauffeur FROM `order_paniflower` JOIN opdrachtgever ON order_paniflower.opdrachtgever_id=opdrachtgever.id JOIN klant ON order_paniflower.klant_id=klant.id JOIN product ON order_paniflower.product_id=product.id JOIN eenheid ON order_paniflower.eenheid_id=eenheid.id JOIN chauffeur ON order_paniflower.chauffeur_id=chauffeur.id ORDER BY `artikelnr` ASC";
                                //sql uitvoeren
                                $data = mysqli_query($conn, $query);
                                //while loop
                                while ($result = mysqli_fetch_assoc($data)) {
                                    echo "<tr>\n";
                                    echo "    <th scope=\"row\">" . $result['id'] . "</th>\n";
                                    echo "    <td>" . $result['opdrachtgever'] . "</td>\n";
                                    echo "    <td>" . $result['laad_datum_uur'] . "</td>\n";
                                    echo "    <td>" . $result['opmerking_laden'] . "</td>\n";
                                    echo "    <td>" . $result['klant'] . "</td>\n";
                                    echo "    <td>" . $result['los_datum_uur'] . "</td>\n";
                                    echo "    <td>" . $result['opmerking_lossen'] . "</td>\n";
                                    echo "    <td>" . $result['artikelnr'] . "</td>\n";
                                    echo "    <td>" . $result['product'] . "</td>\n";
                                    echo "    <td>" . $result['kwantum'] . "</td>\n";
                                    echo "    <td>" . $result['eenheid'] . "</td>\n";
                                    echo "    <td>" . $result['chauffeur'] . "</td>\n";
                                    echo "    <td>" . $result['extra_opmerking'] . "</td>\n";
                                    echo "    <td><a class='btn btn-outline-danger btn-sm' href='delete.php?id=" . $result['id'] . "'>Verwijder</a><br><a class='btn btn-outline-success btn-sm' href='pdf.php?id=" . $result['id'] . "'>Print uit </a><br><small>(Incl. prod. nr. - laad/los adressen)</small></td>\n";
                                    echo "</tr>\n";
                                }
                            }

                            //sorteer op product nummer aflopend WERKT NIET(ik krijg artikel nummer niet in de table gezet)
                            if ($sorteer == "productAf") {
                                //query
                                $query = "SELECT *,order_paniflower.id AS id, opdrachtgever.naam AS opdrachtgever, klant.naam AS klant, product.naam AS product, product.artikelnr AS artikelnr, eenheid.naam AS eenheid, chauffeur.naam AS chauffeur FROM `order_paniflower` JOIN opdrachtgever ON order_paniflower.opdrachtgever_id=opdrachtgever.id JOIN klant ON order_paniflower.klant_id=klant.id JOIN product ON order_paniflower.product_id=product.id JOIN eenheid ON order_paniflower.eenheid_id=eenheid.id JOIN chauffeur ON order_paniflower.chauffeur_id=chauffeur.id ORDER BY `artikelnr` DESC";
                                //sql uitvoeren
                                $data = mysqli_query($conn, $query);
                                //while loop
                                while ($result = mysqli_fetch_assoc($data)) {
                                    echo "<tr>\n";
                                    echo "    <th scope=\"row\">" . $result['id'] . "</th>\n";
                                    echo "    <td>" . $result['opdrachtgever'] . "</td>\n";
                                    echo "    <td>" . $result['laad_datum_uur'] . "</td>\n";
                                    echo "    <td>" . $result['opmerking_laden'] . "</td>\n";
                                    echo "    <td>" . $result['klant'] . "</td>\n";
                                    echo "    <td>" . $result['los_datum_uur'] . "</td>\n";
                                    echo "    <td>" . $result['opmerking_lossen'] . "</td>\n";
                                    echo "    <td>" . $result['artikelnr'] . "</td>\n";
                                    echo "    <td>" . $result['product'] . "</td>\n";
                                    echo "    <td>" . $result['kwantum'] . "</td>\n";
                                    echo "    <td>" . $result['eenheid'] . "</td>\n";
                                    echo "    <td>" . $result['chauffeur'] . "</td>\n";
                                    echo "    <td>" . $result['extra_opmerking'] . "</td>\n";
                                    echo "    <td><a class='btn btn-outline-danger btn-sm' href='delete.php?id=" . $result['id'] . "'>Verwijder</a><br><a class='btn btn-outline-success btn-sm' href='pdf.php?id=" . $result['id'] . "'>Print uit </a><br><small>(Incl. prod. nr. - laad/los adressen)</small></td>\n";
                                    echo "</tr>\n";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>