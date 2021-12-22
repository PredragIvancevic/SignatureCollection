<?php

function getConnection(){
    $servername = "localhost:3308";
    $username = "pedja97";
    $password = "Peki7Beograd";
    $db_name = "peticija";

    $conn = new mysqli($servername, $username, $password); 

    $db_selected = mysqli_select_db($conn,$db_name);
    if(!$db_selected){
        $sql = "CREATE DATABASE $db_name";
        if (!$conn->query($sql)) {
            echo 'Error creating database: ' . mysql_error() . "\n";
        }
    } 
    
    $napraviTabeluLokacije = "CREATE TABLE IF NOT EXISTS peticija.lokacija (
        IDlokacije INT NOT NULL AUTO_INCREMENT,
        IDorganizatora_administratora_uneo INT(9) UNSIGNED NOT NULL,
        IDorganizatora_izabrao INT(9) UNSIGNED  NOT NULL,
        ime VARCHAR(45),
        grad VARCHAR(45),
        opstina VARCHAR(45),
        ulica VARCHAR(60),
        PRIMARY KEY (IDlokacije),
        FOREIGN KEY(IDorganizatora_administratora_uneo) REFERENCES organizatori_administratori(IDorganizatora_administratora),
        FOREIGN KEY(IDorganizatora_izabrao) REFERENCES organizatori_administratori(IDorganizatora_administratora)
) ENGINE = InnoDB;";

        $pocetak="ALTER TABLE lokacija
        AUTO_INCREMENT=100000000;";

        
    $napraviTabeluPotpisi ="CREATE TABLE IF NOT EXISTS peticija.potpisi (
        IDpotpisa INT(9)UNSIGNED ZEROFILL  NOT NULL AUTO_INCREMENT,
        ime VARCHAR(45) NOT NULL,
        prezime VARCHAR(45) NOT NULL,
        telefon VARCHAR(15),
        email VARCHAR(45),
        brlk VARCHAR(45) NOT NULL,
        komentar VARCHAR(255),
        id_lokacije INT NOT NULL,
        brtermina INT(10),
        termini VARCHAR(180),
        email_info INT(1),
        skriven INT(1),
        preuzet INT(1),
        broj VARCHAR(10),
        xKoordinata FLOAT(10,2),
        yKoordinata FLOAT(10,2),
        PRIMARY KEY (IDpotpisa),
        FOREIGN KEY(id_lokacije) REFERENCES lokacija(IDlokacije)
        )
    ENGINE = InnoDB;";

  $sql ="CREATE TABLE IF NOT EXISTS Organizatori_Administratori (
    IDorganizatora_administratora INT(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Ime VARCHAR(45),
    Prezime VARCHAR(45),
    Sifra VARCHAR(45),
    Telefon VARCHAR(15),
    Email VARCHAR(45),
    Broj_licne VARCHAR(45),
    Odobren INT(1),
    IDpreporuke INT(9) UNSIGNED,
    NevPotpisi INT,
    NevPreporuke INT,
     FOREIGN KEY(IDpreporuke) REFERENCES Organizatori_Administratori(IDorganizatora_administratora)
)
ENGINE=InnoDB;";

$napraviTabeluVesti="CREATE TABLE IF NOT EXISTS peticija.vesti(
IDvesti INT NOT NULL AUTO_INCREMENT,
IDorganizatora_administratora INT,
Naslov VARCHAR(60),
Datum DATE,
Sadrzaj MEDIUMTEXT,
PRIMARY KEY (IDvesti)
)
ENGINE =InnoDB;";

$devet="ALTER TABLE vesti
AUTO_INCREMENT=100000000;";





    if ($conn->query($napraviTabeluLokacije) === FALSE) {    
        echo mysqli_error($conn);
    }
    if ($conn->query($napraviTabeluPotpisi) === FALSE) {
        echo mysqli_error($conn);
    }
 if ($conn->query($pocetak) === FALSE) {
        echo mysqli_error($conn);
    }
if ($conn->query($sql) === FALSE) {
        echo mysqli_error($conn);
    }
if ($conn->query($napraviTabeluVesti) === FALSE) {
        echo mysqli_error($conn);
    }
if ($conn->query($devet) === FALSE) {
        echo mysqli_error($conn);
    }

   
    return $conn;
}

function getAllSignatures(){
    $conn = getConnection();
    $necka = "SELECT * FROM potpisi";
    $result = $conn->query($necka);
    return $result;
}

function getAllLocations(){
    $conn = getConnection();
    $necka = "SELECT * FROM lokacija";
    $result = $conn->query($necka);
    return $result;
}

function createLocation($name){
    $query = "INSERT INTO peticija.lokacija (ime) VALUES ('$name');";
    $conn = getConnection();
    $conn->query($query);
}

function getOrCreateLocation($name){
    $conn = getConnection();
    $necka = "SELECT * FROM lokacija WHERE ime='$name'";
    $result = $conn->query($necka);
    if($result->num_rows == 0){
        createLocation($name);
        $result = $conn->query($necka);
    }
    return $result->fetch_row();
}

function getLocationById($id){
    $conn = getConnection();
    $result = $conn->query("SELECT ime FROM lokacija WHERE IDlokacije=$id");
    $row = $result->fetch_row();
    return $row[0];
}

function deleteSignatureById($id){
    $conn = getConnection();
    $conn->query("DELETE FROM potpisi WHERE IDpotpisa=$id");
}
?>