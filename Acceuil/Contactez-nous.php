<?PHP
require("../PHP/Connexion_BD.php");
session_start();
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
    <link rel="stylesheet" href="../CSS/style-candidat.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800;900&family=Poppins:wght@300;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,500;0,700;1,100;1,300;1,400;1,500;1,700;1,900&family=Secular+One&display=swap" rel="stylesheet">
  </head>
  <body>
    <header>
      <img src="../IMG/SAYARATY_LOGO.png">
      <UL class="Nav">';

        if(isset($_SESSION["login"])){
        echo '
          <LI class = "item1"><a href="../Candidaat/">ACCEUIL</a></LI>
          <LI class = "item2"><a href="A-propos.php">&Agrave PROPOS</a></LI>
          <LI class = "item3"><a href="Nos-offres.php">NOS OFFRES</a></LI>
          <LI class = "item4"><a href="Contactez-nous.php">CONTACTEZ-NOUS</a></LI>
        </UL>
        ';
        $query = "SELECT PHOTO FROM Candidat WHERE Login_candidat='".$_SESSION["login"]."'";
        $ligne = mysqli_fetch_row(mysqli_query($connect,$query));
        echo '
        <span class="mon-compte" onclick="toggleMenu()"><img src="'.$ligne[0].'" class="user-pic"> <span>Mon compte</span></span>
        <div class="sub-menu-wrap" id="subMenu">
          <div class="sub-menu">
            <div class="user-info">
              <img src="'.$ligne[0].'" class="user-pic">
              <h2>'.$_SESSION["login"].'</h2>
              <hr>
              <a href="../Candidat/ModifierProfile.php" class="sub-menu-link">
                <img src="../IMG/modify.png" alt="">
                <P>Modifier Profile</P>
              </a>
              <a href="../Candidat/CoursQuest.php" class="sub-menu-link">
                <img src="../IMG/cours.png" alt="">
                <P>Cours & Questionnaire</P>
              </a>
              <a href="../Candidat/EmploiTemps.php" class="sub-menu-link">
                <img src="../IMG/calendar.png" alt="">
                <P>Emploi du temps</P>
              </a>
              <a href="../Candidat/InscriptionExamen.php" class="sub-menu-link">
                <img src="../IMG/testing.png" alt="">
                <P>S\'insrire au examens</P>
              </a>
              <a href="../PHP/Deconnexion.php" class="sub-menu-link">
                <img src="../IMG/logout.png" style="padding: 0px 0px 0px 4px; width: 26px" alt="">
                <P>D&eacute;connexion</P>
              </a>
            </div>
          </div>
        </div>
        ';
      }
      else{
        echo '
          <LI class = "item1"><a href="../">ACCEUIL</a></LI>
          <LI class = "item2"><a href="A-propos.php">&Agrave PROPOS</a></LI>
          <LI class = "item3"><a href="Nos-offres.php">NOS OFFRES</a></LI>
          <LI class = "item4"><a href="Contactez-nous.php">CONTACTEZ-NOUS</a></LI>
        </UL>
        <a class="item5" href="./Acceuil/Connexion_inscription.php"> <span>Connexion</span></a></DIV>
        ';
      }
      echo '
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
              <LI><A HREF="Nos-offres.php">Nos offres</A></LI>
              <LI><A HREF="A-propos.php">A Propos de nous</A></LI>
              <LI><A HREF="Contactez-nous.php">Envoyer un message</A></LI>
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
    <script>
    var subMenu = document.getElementById("subMenu");
    function toggleMenu(){
      subMenu.classList.toggle("open-menu");
    }
  </script>
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