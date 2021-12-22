<?php
session_start();
include 'database.php';

$ime = "";
$prezime = "";
$email="";
$licna="";
$password="";
$adresa="";
$organizatorPregledac="";
$telefon="";
$errors = array(); 


if (isset($_POST['submitRegistration'])){
$ime=$_POST['fname'];
$prezime = $_POST['lname'];
$email = $_POST['email'];
$licna=$_POST['personalId'];
$password = $_POST['pwd'];
$adresa = $_POST['address'];
$organizatorPregledac = $_POST['organizator'];
$telefon=$_POST['number'];

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($ime)) { array_push($errors, "Potrebno je da unesete ime!"); }
  if (empty($prezime)) { array_push($errors, "Potrebno je da unesete prezime!"); }
  if (empty($email)) { array_push($errors, "Potrebno je da unesete email!"); }
  if (empty($password)) { array_push($errors, "Potrebno je da unesete lozinku!"); }
  if (empty($adresa)) { array_push($errors, "Potrebno je da unesete adresu!");}
if (empty($organizatorPregledac)) { array_push($errors, "Potreban je organizator Pregledac"); }
if (empty($telefon)) { array_push($errors, "Telefon je potreban!"); }
 

  $user_check_query = "SELECT * FROM organizatori_administratori WHERE email='$email' LIMIT 1";
  $user = mysqli_fetch_assoc($mysqli->query($user_check_query););
  

    if ($user['email'] === $email) {
      array_push($errors, "Korisnik sa ovim e-mailom vec postoji!");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO organizatori_administratori (Ime, Prezime, Sifra,Telefon,Email,Broj_licne) 
  			  VALUES('$ime', '$prezime', '$email','$password','$adresa','$telefon','$licna')";
        $mysqli->query($query);
        $SESSION['email']=$email;
  	$_SESSION['success'] = "Uspesno ste se registrovali";
  	header('location: index.php');
  }
}
// Logovanje usera
if (isset($_POST['ulogujSe'])) {
  $email = $_POST['email'];
  $password = $_POST['pwd'];

  if (empty($email)) {
  	array_push($errors, "Niste uneli email");
  }
  if (empty($password)) {
  	array_push($errors, "Niste uneli sifru");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM organizatori_administratori WHERE email='$email' AND password='$password'";
  	if (mysqli_num_rows($mysqli->query($query)) == 1) {
  	  $_SESSION['email'] = $email;
  	  $_SESSION['success'] = "Ulogovali ste se!";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Pogresan unos!");
  	}
  }
}

?>