<?php

include 'database.php';
if(isset($_POST["submit"])){
$firstname=$_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$number = $_POST['number'];
$personalid = $_POST['personalid'];
$indikator = $_POST['indikator'];
$brtr = $_POST['brtr'];
$lokacije =$_POST['lokacije'];
$mailnoti = $_POST['mailnoti'];
$komentar = $_POST['comment'];

$termins=array();
$numbers=$_POST['brtr'];
for($j=0;$j<$numbers;$j++){
$field=$_POST["Termin_".$j];
array_push($termins,"$field");
}
$string=implode(";",$termins);


$lok = getOrCreateLocation($lokacije)[0];//u lok se upisuje id lokacije

if($indikator == 'da'){
    $ind = 1;
} else{
    $ind =0;
}
if($mailnoti == 'da'){
    $mn = 1;
} else{
    $mn =0;
}


$query = "INSERT INTO peticija.potpisi
(id_lokacije,ime,prezime,email,brlk,brtermina,termini,email_info,skriven,komentar,telefon)
VALUES
($lok,'$firstname','$lname','$email','$personalid',$brtr,'$string',$mn, $ind,'$komentar','$number');";

$conn = getConnection();

$conn->query($query);
$conn->close();
}
 header("Location: kompletniPotpisiOrg.php");
?>