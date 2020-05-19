<?PHP

include 'navbar.php';
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $opdrachtNaam = $_POST['opdrachtNaam'];
    $opdrachtLaad = $_POST['opdrachtLaad'];

    $query = "INSERT INTO `opdrachtgever` (`id`, `naam`, `laadplaats`) VALUES (NULL, '$opdrachtNaam', '$opdrachtLaad');";

    if (mysqli_query($conn, $query)) {

        echo "<h4 style = 'background-color: #b8edb8';>Opdrachtgever is succesvol aangemaakt!</h4>\n";
        header('Refresh: 2; url=add.php');
    } else {
        echo 'Er is iets misgelopen';
        header('Refresh: 3; url=index.php');
    }
}

?>