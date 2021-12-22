<?php
include 'database.php';

$naziv = $_POST['name'];

$query="INSERT INTO peticija.lokacija
(ime)
VALUES('$naziv')";
$conn = getConnection();

$conn->query($query);
$conn->close();
?>