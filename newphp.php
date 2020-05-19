<?PHP

include 'db.php';
include 'navbar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //variabelen opdracht aanmaken
    $opdrachtgever = $_POST['opdrachtgever'];
    $oLaden = $_POST['oladen'];
    $datumLaden = $_POST['datumladen'];
    $klant = $_POST['klant'];
    $datumLossen = $_POST['datumlossen'];
    $oLossen = $_POST['olossen'];
    $product = $_POST['product'];
    $kwantum = $_POST['kwantum'];
    $eenheid = $_POST['eenheid'];
    $chauffeur = $_POST['chauffeur'];
    $oExtra = $_POST['oextra'];

    //query insert
    $qInsert = "INSERT INTO `order_paniflower` (`id`, `opdrachtgever_id`, `laad_datum_uur`, `opmerking_laden`, `klant_id`, `los_datum_uur`, `opmerking_lossen`, `product_id`, `kwantum`, `eenheid_id`, `chauffeur_id`, `extra_opmerking`) 
VALUES (NULL, '$opdrachtgever', '$datumLaden', '$oLaden', '$klant', '$datumLossen', '$oLossen',
'$product', '$kwantum', '$eenheid', '$chauffeur', '$oExtra');";

    //query insert uitvoeren
    if (mysqli_query($conn, $qInsert)) {
        echo "<div class=\"container-fluid\">\n";
        echo "        <div class=\"row\">\n";
        echo "            <div class=\"col-md-12 text-center\">\n";
        echo "                <h4 style = 'background-color: #b8edb8';>Opdracht aangemaakt!</h4>\n";
        echo "<div class=\"spinner-border \" role=\"status\">\n";
        echo "  <span class=\"sr-only\">Loading...</span>\n";
        echo "</div>";
        echo "            </div>\n";
        echo "            </div>";
        header('Refresh: 1; url=allhtml.php');
    } else {
        echo 'Er is iets misgelopen';
        header('Refresh: 3; url=index.php');
    }
    // while($result = mysqli_fetch_assoc($data)){

    // }
} else {
    echo 'Er is iets misgelopen';
    header('Refresh: 3; url=index.php');
}
