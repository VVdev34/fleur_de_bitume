<?php
  $host = 'localhost';
  $dbname = 'formulaire';
  $username = 'root';
  $password = '';
  


  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les utilisateurs
  $sql = "SELECT * FROM adherant";
   
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($sql);
   
   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Fleurs de Bitume</title>
<body>
  <h3>Liste des adhérants</h3>
 <table>
     <tr>
       <th>Nom</th>
       <th>Prénom</th>
       <th>Date de naissance</th>
       <th>Adresse email</th>
       <th>Téléphone</th>
       <th>Adresse</th>
       <th>Code postal</th>
       <th>Ville</th>
     </tr>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['nom']); ?></td>
       <td><?php echo htmlspecialchars($row['prenom']); ?></td>
       <td><?php echo htmlspecialchars($row['date_naissance']); ?></td>
       <td><?php echo htmlspecialchars($row['email']); ?></td>
       <td><?php echo htmlspecialchars($row['telephone']); ?></td>
       <td><?php echo htmlspecialchars($row['adresse']); ?></td>
       <td><?php echo htmlspecialchars($row['code_postal']); ?></td>
       <td><?php echo htmlspecialchars($row['ville']); ?></td>
       <td><button><a href="delete.php"></a>Supprimer</button></td>
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>
 <a href="index.html"><img class="admin" src="./img/LOGO-DORÉ-CONTOUR.jpg" alt="" srcset=""></a>
</body>
</html>
