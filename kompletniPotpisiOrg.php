<html>
<head>
<meta charset="UTF-8"/>
<link rel="stylesheet" href="stil.css">
<script src="pitanje.js"></script>
</head>
<body>
 <div class="navbar">
<nav>
<ul>
  <li><a href="AdministratorOrganizator.html">Naslovna</a></li>
  <li><a href="peticija1.html">Peticija</a></li>
  <li><a href="vesti1.html">Vesti</a></li>
  <li><a href="spisakPotpisa1.html">Potpisi</a></li>
  <li><a href="potpisi1.html">Potpiši</a></li>
  <li><a href="#">Organizacija</a>
<ul>

<li><a href="Registracija1.html">Registracija</a></li>
<li><a href="lokacije1.html">Lokacije</a></li>
<li><a href="organizatori1.html">Organizatori</a></li>
<li><a class="active" href="kompletniPotpisiOrg.html">Kompletni potpisi</a></li>
<li><a href="#">Izloguj se</a></li>
</ul></li>
<li><a href="#">Unos</a>
<ul>
<li><a href="unosVesti.html">Unos vesti</a></li>
<li><a href="unosOrganizatora.html">Unos organizatora</a></li>
<li><a href="unosLokacije.html">Unos lokacija</a></li>
</ul></li>
<li><a href="kontakt1.html">Kontakt</a></li>
</ul></li>

</ul></nav>
</div>
<br><br><br>
<h1>Spisak potpisnika</h1>
<br>
<table class="center">
<tr>
<th>No</th>
<th>Ime</th>
<th>Prezime</th>
<th>Komentar</th>
<th>Email</th>
<th>Telefon</th>
<th>Broj lične karte</th>
<th>Adresa</th>
<th>Datumi i vremena kad se može doći po potpis</th>
<th></th>
<th></th>
</tr>

<?php

    include 'database.php';

    function deleteSignature($id){
        deleteSignatureById($id);
    }

    $signatures = getAllSignatures();
    if($signatures){
     while($row = $signatures->fetch_row()) {
        $locationId = $row[0];
        $location = getLocationById($locationId);
        echo "<tr>
        <td></td>
        <td>".$row[2]."</td>
        <td>".$row[3]."</td>
        <td>".$row[10]."</td>
        <td>".$row[4]."</td>
        <td>".$row[11]."</td>
        <td>".$row[5]."</td>
        <td>".$location."</td>
        <td>".$row[7]."</td>
        <td><button class=\"butt\">Ažuriraj</a></td>
        <td>
        <form action=\"middleware.php\" method=\"post\" style=\"margin:0;\">
        <input type=\"submit\" class=\"butt\" name=\"deleteSignatureButton\" value=\"Izbrisi\ onclick="showAlert()">
        <input type=\"hidden\" name=\"signatureId\" value=\"".$row[1]."\">
        </form>
        </td>
        </tr>";
    }
}
?>
</table>

</body>
</html>