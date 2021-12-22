<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="stil.css">
<script src="pet_sekundi.js"></script>
<script>
function funkcija(){
var broj=document.getElementById("brtr").value;
if(broj>=1 && broj<=8){
document.getElementById("termini").innerHTML="";
for(i=0;i<broj;i++){
var y=document.createElement("INPUT");
y.setAttribute("type","datetime-local");
y.setAttribute("name","Termin_"+i);
document.getElementById("termini").appendChild(y);

}
}
}
</script>
</head>

<body>
    <div class="navbar">
        <nav>
            <ul>
                <li><a href="Korisnik.php">Naslovna</a></li>
                <li><a href="peticija.html">Peticija</a></li>
                <li><a href="vesti.html">Vesti</a></li>
                <li><a href="spisakPotpisa.html">Potpisi</a></li>
                <li><a class="active" href="potpisi.php">Potpiši</a></li>
                <li><a href="#">Organizacija</a>
                    <ul>
                        <li><a href="UlogujSe.html">Uloguj se</a></li>
                        <li><a href="Registracija1.html">Registracija</a></li>
                    </ul>
                </li>

                <li><a href="kontakt.html">Kontakt</a></li </ul>
                </li>

            </ul>
        </nav>

    </div><br><br>

    <div>
        <center>
            <h1>Potpiši</h1>

            <form action="potpisiSubmit.php" method="post">
                <label for="fname">Ime:</label><br>
                <input type="text" id="fname" name="fname"><br><br>
                <label for="lname">Prezime:</label><br>
                <input type="text" id="lname" name="lname"><br><br><label for="comment">Komentar:</label><br>
                <textarea name="comment" rows="7" cols="38"></textarea><br><br>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email"><br><br>
                <label for="number">Telefon:</label><br>
                <input type="tel" id="number" name="number"><br><br>
                <label for="personalid">Broj lične karte:</label><br>
                <input type="text" id="personalid" name="personalid"><br><br>

                <label for="lokacije">Lokacija:</label><br>
                <input list="lokacije" name="lokacije">
                <datalist id="lokacije">
                <?php
                    include 'database.php';

                    $locations = getAllLocations();
                    while($row = $locations->fetch_row()){
                        echo "<option value=\"".$row[1]."\">"; 
                    }
                ?>
                </datalist>
                <label for="brtr">Broj termina:</label><br>
                <input type="number" id="brtr" name="brtr" min="1" max="8" step="1" onchange="funkcija()"><br><br>
                <label for="termini">Datumi i vremena kada se može doći po potpis:</label><br><br>
                <br>

                <div id="termini"></div>

                <label for="indikator">Da li potpis treba da bude objavljen?</label><br>
                <input type="radio" id="indikator" name="indikator" value="da">Da<br>
                <input type="radio" id="indikator" name="indikator" value="ne">Ne<br><br>

                <label for="mailnoti">Da li zelite da primate mailove sa informacijama?</label><br>
                <input type="radio" id="mailnoti" name="mailnoti" value="da">Da<br>
                <input type="radio" id="mailnoti" name="mailnoti" value="ne">Ne<br><br>
                <input type="submit" value="Pošalji potpis" name="submit">
                <br><br>

        </center>
        </form>


    </div>
</body>

</html>