<?php
session_start();
?>

<div class="navbar">
<nav>
<ul>
  <li><a class="active" href="Korisnik.html">Naslovna</a></li>
  <li><a href="peticija.html">Peticija</a></li>
  <li><a href="vesti.html">Vesti</a></li>
  <li><a href="spisakPotpisa.html">Potpisi</a></li>
  <li><a href="potpisi.php">Potpiši</a></li>
  <li><a href="#">Organizacija</a>
<ul>

<?php
    if(!isset($_SESSION['user_type'])){
        $_SESSION['user_type'] = 'Guest';
    }
    if($_SESSION['user_type'] == 'Admin' || $_SESSION['user_type'] == 'Organizer'){
        echo "<li><a href=\"lokacije1.html\">Lokacije</a></li>
        <li><a href=\"organizatori1.html\">Organizatori</a></li>
        <li><a href=\"kompletniPotpisiOrg.html\">Kompletni potpisi</a></li>
        <li><a href=\"#\">Izloguj se</a></li>
        </ul></li>
        <li><a href=\"#\">Unos</a>
        <ul>
        <li><a href=\"unosVesti.html\">Unos vesti</a></li>
        <li><a href=\"unosOrganizatora.html\">Unos organizatora</a></li>
        <li><a href=\"unosLokacije.html\">Unos lokacija</a></li>
        </ul></li>";
    }
    else{
        echo "<li><a href=\"UlogujSe.html\">Uloguj se</a></li>
        <li><a href=\"Registracija.html\">Registracija</a></li>
        </ul></li>";
    }
?>

<li><a href="kontakt.html">Kontakt</a></li>
</ul></nav>

</div>