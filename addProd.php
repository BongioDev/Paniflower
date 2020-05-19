<?PHP

include 'navbar.php';
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prodNaam = $_POST['prodNaam'];
    $prodNr = $_POST['prodNr'];

    $query = "INSERT INTO `product` (`id`, `artikelnr`, `naam`) VALUES (NULL, '$prodNr', '$prodNaam');";

    if (mysqli_query($conn, $query)) {

        echo "<h4 style = 'background-color: #b8edb8';>Product is succesvol aangemaakt!</h4>\n";
        header('Refresh: 2; url=add.php');
    } else {
        echo 'Er is iets misgelopen';
        header('Refresh: 3; url=index.php');
    }
}

?>