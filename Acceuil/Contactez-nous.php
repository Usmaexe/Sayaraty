<?PHP
require("../PHP/Connexion_BD.php");
echo '
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sayaraty - Contactez-Nous</title>
    <link rel="icon" href="../IMG/SAYARATY_Icon.png">
		<link rel="stylesheet" href="../CSS/style-index.css">
    <link rel="stylesheet" href="../CSS/style-contacter.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800;900&family=Poppins:wght@300;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,500;0,700;1,100;1,300;1,400;1,500;1,700;1,900&family=Secular+One&display=swap" rel="stylesheet">
  </head>
  <body>
    <header>
      <img src="../IMG/SAYARATY_LOGO.png">
      <UL class="Nav">
        <LI class = "item1"><a href="../index.php">ACCEUIL</a></LI>
        <LI class = "item2"><a href="A-propos.html">&Agrave PROPOS</a></LI>
        <LI class = "item3"><a href="Nos-offres.html">NOS OFFRES</a></LI>
        <LI class = "item4"><a href="Contactez-nous.php">CONTACTEZ-NOUS</a></LI>
      </UL>
      <a class="item5" href="Connexion_inscription.html"> <span>Connexion</span></a></DIV>
    </header>
    <div class="Title">
      <h1 class="TheHeader">CONTACTEZ-NOUS</h1>
      <p class="Sentence">L\'&eacute;quipe d\'assistance est disponible 24/7 pour vous aider et r&eacute;pondre &agrave; vos questions.</p>
    </div>
    <div class="Container">
      <div class="leftContainer">     
        <form name="formulaire" class="formulaire" action="Contactez-nous.php" method="post">
          <div class="nom_email">
            <div class="block">
              <label>Nom</label><input type="text" name="nom" placeholder="Nom" required>
            </div>
            <div class="block">
              <label>Email</label><input type="text" name="email" placeholder="Email" required>
            </div>
          </div>
          <div class="block">
            <label>Comment peut-on vous aider ?</label><TEXTAREA ROWS="5" COLS="60" name="contenu" placeholder="Comment peut-on vous aider ?" required></TEXTAREA>
          </div>
          <div class="objet">
            <label>Objet</label>
            <div class="options">
              <div>
                <input type="radio" name="objet" value="P_contact" REQUIRED>Probl&egrave;me de contact
              </div> 
              <div>
                <input type="radio" name="objet" value="P_technique" REQUIRED>Probl&egrave;me technique
              </div>
              <div>
                <input type="radio" name="objet" value="Autre probleme" REQUIRED>Autre probl&egrave;me
              </div>
            </div>
          </div>
          <div class="submit">
           <input name="submit-button" type="submit" value="Envoyer">
          </div>
        </form>
      </div>
      <div class="rightContainer">
        <UL class="coordonnees">
          <LI><i class="fa-solid fa-location-dot"></i><A HREF="">30 Bv lkhatabi, Hay Salam, Oujda</A></LI>
          <LI><i class="fa-solid fa-phone"></i><A HREF="">06 24 67 82 90</A></LI>
          <LI><i class="fa-solid fa-envelope"></i><A HREF="">AutoEcol99@gmail.com</A></LI>
        </UL>
      </div>
    </div>
  </body>
</html>
';
if(isset($_POST["submit-button"])){
  $insert = true;
  if(!preg_match("#^[\w\.]+@([\w]+\.)+[\w]{2,4}$#",$_POST["email"])){
    echo '
      <SCRIPT>
        document.formulaire.innerHTML = "<p style=\"color:red;font-size:18px;\">Il faut entrer un email valide!</p>"+document.formulaire.innerHTML;
      </SCRIPT>      
    ';
    $insert = false;
  }
  if(!preg_match("#^[A-z\ ]+#",$_POST["nom"])){
    echo '
      <SCRIPT>
        document.formulaire.innerHTML = "<p style=\"color:red;font-size:18px;\">Il faut entrer un nom valide!</p>"+document.formulaire.innerHTML;
      </SCRIPT>
    ';
    $insert = false;
  }
  if($insert){
    $query = 'INSERT INTO message(nom,contenu,email,objet) VALUES("'.$_POST["nom"].'","'.$_POST["contenu"].'","'.$_POST["email"].'","'.$_POST["objet"].'")';
    mysqli_query($connect,$query);
    echo '
      <SCRIPT>
        alert("Votre a message a été bien envoyer");
      </SCRIPT>
    ';
  }
}
?>