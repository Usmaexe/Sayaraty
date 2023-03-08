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
        <LI class = "item3"><a href="Nos-offres.php">NOS OFFRES</a></LI>
        <LI class = "item4"><a href="Contactez-nous.php">CONTACTEZ-NOUS</a></LI>
      </UL>
      <a class="item5" href="Connexion_inscription.php"> <span>Connexion</span></a></DIV>
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
              <label>Nom</label><input type="text" id="name" name="nom" required>
            </div>
            <div class="block">
              <label>Email</label><input type="text" id="mail" name="email" required>
            </div>
          </div>
          <div class="block">
            <label>Comment peut-on vous aider ?</label><TEXTAREA id="text" ROWS="5" COLS="60" name="contenu" required></TEXTAREA>
          </div>
          <div class="objet">
            <label>Objet</label>
            <div class="options">
              <div>
                <input type="radio" name="objet" value="Problème de contact" REQUIRED>Probl&egrave;me de contact
              </div> 
              <div>
                <input type="radio" name="objet" value="Problème technique" REQUIRED>Probl&egrave;me technique
              </div>
              <div>
                <input type="radio" name="objet" value="Autre problème" REQUIRED>Autre probl&egrave;me
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
    <footer>
        <DIV class="FooterContainer">
          <DIV class="Footer-col">
            <h4>Nos Horraires</h4>
            <UL class="Horraire" style="color: #bbb;">
              <LI>Lundi | 09:00 - 17:00</LI>
              <LI>Mardi | 09:00 - 17:00</LI>
              <LI>Mercredi | 09:00 - 17:00</LI>
              <LI>Jeudi | 09:00 - 17:00</LI>
              <LI>Vendredi | 09:00 - 12:00</LI>
              <LI>Samedi | 09:00 - 19:00</LI>
            </UL>
          </DIV>
          <DIV class="Footer-col">
            <h4>aide</h4>
            <UL class="Aide">
              <LI><A HREF="">Q&R</A></LI>
              <LI><A HREF="">Nos offres</A></LI>
              <LI><A HREF="">A Propos de nous</A></LI>
              <LI><A HREF="">Envoyer un message</A></LI>
            </UL>
          </DIV>
          <DIV class="Footer-col">
            <h4>Nos coordonn&eacute;es</h4>
            <UL class="coordonnees">
              <LI><i class="fa-solid fa-location-dot"></i><A HREF="">30 Bv lkhatabi, Hay Salam, Oujda</A></LI>
              <LI><i class="fa-solid fa-phone"></i><A HREF="">06 24 67 82 90</A></LI>
              <LI><i class="fa-solid fa-envelope"></i><A HREF="">AutoEcol99@gmail.com</A></LI>
            </UL>
          </DIV>
          <DIV class="Footer-col">
            <h4>suivez-nous</h4>
            <DIV class="SocialMedia">
              <a href="#"> <img src="../IMG/facebook.png" alt=""></a>
              <a href="#"> <img src="../IMG/instagram.png" alt=""></a>
              <a href="#"> <img src="../IMG/linkedin.png" alt=""></a>
            </DIV>
          </DIV>
        </DIV>
    </footer>
  </body>
</html>
';
if(isset($_POST["submit-button"])){
  $insert=true;
  $name=$_POST["nom"];
  $mail=$_POST["email"];
  $text=$_POST["contenu"];     
  $prbl=$_POST["objet"];
  if(!preg_match("#^[\w\.]+@([\w]+\.)+[\w]{2,4}$#",$_POST["email"])){
    $insert=false;
    echo '
      <SCRIPT>
        document.formulaire.innerHTML = "<p style=\"color:red;font-size:18px;\">Il faut entrer un email valide!</p>"+document.formulaire.innerHTML;
        document.formulaire.nom.value = "'.$name.'";     
        document.formulaire.email.value = "'.$mail.'";     
        document.formulaire.contenu.value = `'.$text.'`;
        var objet = document.getElementsByName("objet");
        for(let i = 0 ; i < 3 ; i++){       
          if("'.$prbl.'"==objet[i].value){
            objet[i].checked;
          }
        }
      </SCRIPT>      
    ';
  }
  if(!preg_match("#^[A-z\ ]+#",$_POST["nom"])){
    $insert=false;
    echo '
      <SCRIPT>
        // alert("'.json_encode($insert).'");
        document.formulaire.innerHTML = "<p style=\"color:red;font-size:18px;\">Il faut entrer un nom valide!</p>"+document.formulaire.innerHTML;
        document.formulaire.nom.value = "'.$name.'";     
        document.formulaire.email.value = "'.$mail.'";     
        document.formulaire.contenu.value = `'.$text.'`;
        var objet = document.getElementsByName("objet");
        for(let i = 0 ; i < 3 ; i++){       
          if("'.$prbl.'"==objet[i].value){
            alert(objet[i].value+" "+"'.$prbl.'");
            objet[i].checked=true;
          }
        }
      </SCRIPT>
    ';
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