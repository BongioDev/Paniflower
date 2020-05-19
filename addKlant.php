<?PHP

include 'navbar.php';
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $klantNaam = $_POST['klantNaam'];
    $klantLos = $_POST['klantLos'];

    $query = "INSERT INTO `klant` (`id`, `naam`, `losplaats`) VALUES (NULL, '$klantNaam', '$klantLos');";

    if (mysqli_query($conn, $query)) {

        echo "<h4 style = 'background-color: #b8edb8';>Klant is succesvol aangemaakt!</h4>\n";
        header('Refresh: 2; url=add.php');
    } else {
        echo 'Er is iets misgelopen';
        header('Refresh: 3; url=index.php');
    }
}

?>