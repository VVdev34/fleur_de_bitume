
<?php

var_dump($_POST);

    $serveur = "localhost";
    $dbname = "formulaire";
    $user = "root";
    $pass = "";
    
    $nom = strip_tags($_POST["nom"]);
    $prenom = strip_tags($_POST["prenom"]);
    $date = strip_tags($_POST["date_naissance"]);
    $email = strip_tags($_POST["email"]);
    $phone = strip_tags($_POST["telephone"]);
    $adress = strip_tags($_POST["adresse"]);
    $code = strip_tags($_POST["code_postale"]);
    $ville = strip_tags($_POST["ville"]);
    
    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //On insère les données reçues
        $sth = $dbco->prepare("INSERT INTO `adherant`(`nom`, `prenom`, `date_naissance`, `email`, `telephone`, `adresse`, `code_postal`, `ville`)
         VALUES (:nom,:prenom,:date_naissance,:email, :telephone, :adresse, :code_postal, :ville)");
        $sth->bindParam(':nom',$nom);
        $sth->bindParam(':prenom',$prenom);
        $sth->bindParam(':date_naissance',$date);
        $sth->bindParam(':email',$email);
        $sth->bindParam(':telephone',$phone);
        $sth->bindParam(':adresse',$adress);
        $sth->bindParam(':code_postal',$code);
        $sth->bindParam(':ville',$ville);
        $sth->execute();
        
        // On renvoie l'utilisateur vers la page de remerciement
        header("Location:formulaireMerci.html");
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>















?>