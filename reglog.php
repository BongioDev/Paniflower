<?PHP
include 'navbar.php';
include 'db.php';

$userName = $_POST['naam'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];

// Gebruiker aanmaken door admin
if (isset($_POST['submit'])){ 
    if($password1 == $password2 && strlen($password2) >= 8){
        // maak gebruiker aan
        $goodPass = password_hash($password2, PASSWORD_DEFAULT);
        $query = "INSERT INTO `users` (`id`, `userName`, `password`, `admin`) VALUES (NULL, '$userName', '$goodPass', '0');";
        
        if(mysqli_query($conn, $query)){
            echo "<h4 style = 'background-color: #96ffa6';>Gebruiker is aangemaakt!</h4>\n";
            header("refresh:3; url = admin.php");
        } else {
            echo "Er is iets misgegaan";
        }
    } else {
        // errors
        if($password1 != $password2){
            header('Refresh: 3; url=admin.php');
            echo "<h4 style = 'background-color: #ff8f8f';>Herhaling wachtwoord is fout!</h4>\n";
        }
        if(strlen($password2) < 8 && strlen($password1) < 8){
            header('Refresh: 3; url=admin.php');
            echo "<h4 style = 'background-color: #ff8f8f';>Het wachtwoord moet minimaal 8 tekens bevatten!</h4>\n";
        }
    }
} else {
    echo "Contacteer de webmaster";
}

?>
