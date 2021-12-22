<?php
    include 'database.php';
    if(isset($_POST['deleteSignatureButton'])){
        deleteSignatureById($_POST['signatureId']);
        header("Location: kompletniPotpisiOrg.php"); 
    }
    
?>