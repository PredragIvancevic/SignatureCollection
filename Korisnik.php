<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="stil.css">
</head>

<body>
    <div class="header">
    </div>

    <?php include 'layouts/navigation.php'  ?>

    <div class="flex-container">
        <div id="C">
        <h2>Komentari</h2>
<?php
        include 'database.php';
         $signatures=getAllSignatures();
         if($signatures){
           while($row=$signatures->fetch_row()){
if($row[10]!=''){
          echo $row[2]." ".$row[3];
          echo <<< NekiString
           <p class="comm">$row[10]</p>
         NekiString;
}
}}
?>
            
         
        </div>
        <div id="D">
            <h1>Peticija za vraćanje na posao novinara Miloša Marinkovića</h1>
            <p>
                Kao što je verovatno široj javnosti poznato, pre 12 dana iz Gradske skupštine otpušten je Miloš Marinković. On je inače poznati novinar koji piše za list "NN". Kao razlog smene navodi se da on nije odgovorno vršio svoju dužnost iako je široj javnosti
                poznato da je navedeni novinar jedan od naših najpoštenijih i najiskusnijih novinara, odlikovan sa više nagrada za objektivnost u izveštavanju. Poslednju u nizu nagrada upravo je dobio pre 2 meseca, a za tu nagradu tvrdi da je kruna njegove
                karijere. S obzirom na to da nam je svima poznato kako radi Gradska skupština, i da imamo sve manje poštenih ljud u njoj, odlučili smo da pokrenemo peticiju za povratak Miloša Marinkovića u Gradsku skupštinu. Da bismo poslali predlog,
                potrebno je skupiti minimum 1000 potpisa. Detaljnije o tome ko su organizatori i na kojim lokacijama se vrši prikupljanje potpisa možete saznati na ovom sajtu na stranicama Organizatori i Lokacije, respektivno. </p>
            <p>Potpišite za Miloša Marinkovića, potpišite za poštenje u Gradskoj skupštini!</p>

        </div>
    </div>
</body>

</html>