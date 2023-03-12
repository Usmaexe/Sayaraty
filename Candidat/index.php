<?PHP
  require("../PHP/Connexion_BD.php");
  session_start();
  echo'
<!DOCTYPE HTML>
<HTML>
	<HEAD>
    <meta CHAESET="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"><!--it\'s only used for Internet explorer-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--Controls the layout of the page on smaller screens-->
		<TITLE>Sayarty - Espace Candidat</TITLE>
    <!-- <script type="module" src="../JS/Page-Candidat.js"></script> -->
    <link rel="icon" href="../IMG/SAYARATY_Icon.png">
		<link rel="stylesheet" href="../CSS/style-index.css">
		<link rel="stylesheet" href="../CSS/style-candidat.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.cdnfonts.com/css/monument-extended" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <link href="//db.onlinewebfonts.com/c/9563028603929a5ec058577b3fb5520a?family=Whipsmart" rel="stylesheet">
    <link href="//db.onlinewebfonts.com/c/55d433372d270829c51e2577a78ef12d?family=Monument+Extended" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,500;0,700;1,100;1,300;1,400;1,500;1,700;1,900&family=Secular+One&display=swap" rel="stylesheet">

  </HEAD>
	<BODY>
    <header>
      <img src="../IMG/SAYARATY_LOGO.png">
      <UL class="Nav">
        <LI class = "item1"><a href="index.php">ACCEUIL</a></LI>
        <LI class = "item2"><a href="../Acceuil/A-propos.php">&Agrave PROPOS</a></LI>
        <LI class = "item3"><a href="../Acceuil/Nos-offres.php">NOS OFFRES</a></LI>
        <LI class = "item4"><a href="../Acceuil/Contactez-nous.php">CONTACTEZ-NOUS</a></LI>
      </UL>';
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
            <a href="ModifierProfile.php" class="sub-menu-link">
              <img src="../IMG/modify.png" alt="">
              <P>Modifier Profile</P>
            </a>
            <a href="CoursQest.php" class="sub-menu-link">
              <img src="../IMG/cours.png" alt="">
              <P>Cours & Questionnaire</P>
            </a>
            <a href="EmploiTemps.php" class="sub-menu-link">
              <img src="../IMG/calendar.png" alt="">
              <P>Emploi du temps</P>
            </a>
            <a href="InscriptionExamen.php" class="sub-menu-link">
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
    </header>
   
    <DIV class="InteriorHeader">
      <div class="TextContainer">';
        $query = "SELECT prix FROM offre where id_offre=1";
        $ligne = mysqli_fetch_row(mysqli_query($connect,$query));
        echo '
        <span class="Title">Bienvenu '.$_SESSION["login"].' </span>
        <span class="SubTitle">Obtenez votre code de la route pour <b STYLE="font-size: 30px;">'.$ligne[0].' DH</b></span>
        
        <div class="valid-offres">
          <span><img src="../IMG/check.png" alt="">2 500 questions de code en ligne conformes &agrave; l\'examen</span>
          <span><img src="../IMG/check.png" alt="">Entra&icirc;nez-vous n\'importe o&ugrave; et n\'importe quand en illimit&eacute;</span>
          <span><img src="../IMG/check.png" alt="">Une &eacute;quipe p&eacute;dagogique pr&ecirc;te &agrave; accompagner votre r&eacute;ussite</span>
        </div>
        <span class="buttons"><div class="button">Acheter le pack code</div> <div class="Essayer">Essayer gratuitement</div></span>
      </div>
      <img src="../IMG/boy-exam.jpg" class="boy">
    </DIV>
    <DIV class="InteriorBottomBar">
      L\'une des meilleurs Auto-école au Maroc
      <span>SAYRATY est devenu la nouvelle façon de préparer son code de la route</span>
    </DIV>  
    <div class="card-container">';
        $query = "SELECT * FROM Avis";
        $i=0;$avis;$nom;$note;$photo;
        if($result = mysqli_query($connect,$query)){
          while($ligne = mysqli_fetch_row($result)){
            if($ligne[3]&&$ligne[2]>2&&$i<3){
              $avis[$i]=$ligne[1];
              $note[$i]=$ligne[2];
              $nom[$i]=$ligne[4];
              $i++;
            }
            
          }
        }
        for($j=0;$j<$i;$j++){

          $query = "SELECT Nom,PHOTO FROM Candidat WHERE login_candidat='".$nom[$j]."'";
          if($result = mysqli_query($connect,$query)){
            while($ligne= mysqli_fetch_row($result)){
              $nom[$j]=$ligne[0];
              $photo[$j]=$ligne[1];
            }
          }
          echo '          
            <div class="card">
            <div class="row">
            <img src="'.$photo[$j].'" alt="">
            <div class="nom">
          ';
          echo '<h4>'.$nom[$j].'</h4>      
            <span>
          ';
          for($t=0;$t<5;$t++){
            if($t<$note[$j]){
              echo '<i class="fa-solid fa-star"></i> ';
            }
            else{
              echo '<i class="fa-regular fa-star"></i> ';
            }
          }
          echo '</span>
              </div>
            </div>
            <p>'.$avis[$j].'</p>
          </div>';
        }
      echo'
    </div>    
  </DIV>	
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
            <LI><A HREF="#">Q&R</A></LI>
            <LI><A HREF="../Acceuil/Nos-offres.php">Nos offres</A></LI>
            <LI><A HREF="../Acceuil/A-propos.php">A Propos de nous</A></LI>
            <LI><A HREF="../Acceuil/Contactez-nous.php">Envoyer un message</A></LI>
          </UL>
        </DIV>
        <DIV class="Footer-col">
          <h4>Nos coordonnées</h4>
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
</HTML>
';

?>