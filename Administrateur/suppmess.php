<?php
$connexion = mysqli_connect("localhost","root","");
if(!$connexion){
   print("<SCRIPT>alert('Désolé, connexion au serveur a échouée')</SCRIPT>");
}else
if(!mysqli_select_db($connexion,'sayaraty')){
   print("<SCRIPT>alert('Désolé, connexion a la base de données a échouée');</SCRIPT>");		
}
$requete = mysqli_query( $connexion , "SELECT Nom , Email, Objet, Contenu FROM  Message ");
while($ligne = mysqli_fetch_assoc($requete)){
    $id=0;
    foreach($_POST["<?php echo $id; ?>"] as $tmp ){
      $id=$tmp;
      if($id=$tmp){
       $sql='DELETE * FROM Message WHERE Contenu = '.$tmp.' '; 
       $rq= $bdd -> prepare($sql);
       $r=$rq->execute();
      }
    }
/*$a=$ligne['Contenu'];
$id = $_POST["id"];                         
$rqt=mysqli_query($connexion,"DELETE * FROM Message WHERE Contenu = :i ");
$stmt = $connexion->prepare($rql);
$stmt->bind_param("i", $id);
if (!$stmt->execute()) {
    echo "Échec de l'exécution de la requête SQL: " . $mysqli->error;
    exit();
  }
  header("Location: message.php");*/
  
}
?>