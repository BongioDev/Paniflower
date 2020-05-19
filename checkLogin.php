<?PHP 

include 'navbar.php';
include 'db.php';
session_start();


if (isset($_POST['submit'])){
    $user = $_POST['user'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE userName = '$user'";

if($data = mysqli_fetch_assoc(mysqli_query($conn, $query))){
    if(password_verify($password, $data['password'])){
        $_SESSION['loggedin'] = true;
        header('Location: home.php');
        if($data['admin'] == true){
            $_SESSION['admin'] = true;
        }
    } else {
        header('Refresh: 2; url=index.php');
        echo "<h4 style = 'background-color: #ff8f8f';>Fout gebruikersnaam of wachtwoord!</h4>\n";
    }
} else {
    header('Refresh: 2; url=index.php');
    echo "<h4 style = 'background-color: #ff8f8f';>Fout gebruikersnaam of wachtwoord!</h4>\n";
}
}

?>
