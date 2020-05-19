<?php
include 'navbar.php';
include 'db.php';

$id = $_GET['id'];

$query = "DELETE FROM `order_paniflower` WHERE `order_paniflower`.`id` = $id";

if (mysqli_query($conn, $query)) {
    echo "<div class=\"container-fluid\">\n";
    echo "        <div class=\"row\">\n";
    echo "            <div class=\"col-md-12 text-center\">\n";
    echo "                <h4 style = 'background-color: #e87b7b';>Opdracht verwijderd!</h4>\n";
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






?>