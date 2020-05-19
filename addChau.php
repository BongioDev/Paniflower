<?PHP

include 'navbar.php';
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $naam = $_POST['naam'];

    $query = "INSERT INTO `chauffeur` (`id`, `naam`) VALUES (NULL, '$naam');";

    if (mysqli_query($conn, $query)) {

        echo "<h4 style = 'background-color: #b8edb8';>Chauffeur is succesvol aangemaakt!</h4>\n";
        header('Refresh: 2; url=add.php');
    } else {
        echo 'Er is iets misgelopen';
        header('Refresh: 3; url=index.php');
    }
}

?>