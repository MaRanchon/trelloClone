<?php
session_start();

$bdd = new PDO("mysql:host=localhost;dbname=appliWeb", 'younes_trello', '************');

if(isset($_GET['id']) AND $_GET['id'] > 0)
{
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM utilisateur WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();



?>
<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
         <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
         <br /><br />
         Pseudo = Profil de <?php echo $userinfo['pseudo']; ?>
         <br />
         <br />
        Ou vous connectez a notre site : 
           <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         
         <a href="deconnexion.php">Se déconnecter</a>
      
       <?php

}
?>

      </div>
   </body>
</html>
<?php

}
?>
