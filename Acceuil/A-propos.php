<!DOCTYPE HTML>
<HTML>
	<HEAD>
    <!-- this is a test -->
    <meta CHAESET="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"><!--it's only used for Internet explorer-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--Controls the layout of the page on smaller screens-->
		<TITLE>Sayarty - &Agrave;propos</TITLE>
    <link rel="icon" href="../IMG/SAYARATY_Icon.png">
		<link rel="stylesheet" href="../CSS/style-index.css">
		<link rel="stylesheet" href="../CSS/style-apropos.css">
		<link rel="stylesheet" href="../CSS/style-candidat.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,500;0,700;1,100;1,300;1,400;1,500;1,700;1,900&family=Secular+One&display=swap" rel="stylesheet">
  </HEAD>
	<BODY>
    <header>
      <img src="../IMG/SAYARATY_LOGO.png">
      <UL class="Nav">
        <LI class = "item1"><a href="../index.php">ACCEUIL</a></LI>
        <LI class = "item2"><a href="A-propos.html">&Agrave; PROPOS</a></LI>
        <LI class = "item3"><a href="Nos-offres.php">NOS OFFRES</a></LI>
        <LI class = "item4"><a href="Contactez-nous.php">CONTACTEZ-NOUS</a></LI>
      </UL>
      <?PHP
        session_start();
        if(isset($_SESSION["login"])){
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
                <a href="CoursQuest.html" class="sub-menu-link">
                  <img src="../IMG/cours.png" alt="">
                  <P>Cours & Questionnaire</P>
                </a>
                <a href="EmploiTemps.html" class="sub-menu-link">
                  <img src="../IMG/calendar.png" alt="">
                  <P>Emploi du temps</P>
                </a>
                <a href="Inscription.php" class="sub-menu-link">
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
          echo '<a class="item5" href="./Acceuil/Connexion_inscription.php"> <span>Connexion</span></a></DIV>';
        }
      ?>
    </header>
    <div class="about-container">
        <div class="image-container">
            <img src="../IMG/ipad-iphone.png" alt="">
        </div>
        <div class="text-container">
            <h1>&Agrave; propos</h1>
            <span>
              Sayaraty, plus qu'une auto-&eacute;cole en ligne! Une plateforme qui favorise l'acc&egrave;s &agrave; la mobilit&eacute; pour 
              les jeunes! Chez Sayaraty nous vous accompagnons dans la formation au code de la route et &agrave; la conduite
              et nous vous proposons une assurance auto juste et adapt&eacute;e.
            </span>
        <div class="SocialMedia-col">
          <h4>suivez-nous</h4>
          <DIV class="SocialMedia"> 
            <a href="#"> <img src="../IMG/facebook.png" alt=""></a>
            <a href="#"> <img src="../IMG/instagram.png" alt=""></a>
            <a href="#"> <img src="../IMG/linkedin.png" alt=""></a>
          </DIV>
        </div>
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
  </BODY>
  <script>
    var subMenu = document.getElementById("subMenu");
    function toggleMenu(){
      subMenu.classList.toggle("open-menu");
    }
  </script>
</HTML>