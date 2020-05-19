<?PHP
$host = "localhost";
$user = "root";
$passwd = "";
$database = "paniflower";
$conn = mysqli_connect($host, $user, $passwd, $database) or die ('Error: '. mysqli_error($conn));
