<?PHP
  echo '
    <!DOCTYPE HTML>
    <HTML>
      <HEAD>
        <meta CHAESET="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge"><!--it\'s only used for Internet explorer-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--Controls the layout of the page on smaller screens-->
        <TITLE>Sayarty - Espace Candidat</TITLE>
        <script src="../SCRIPTS/Page-Candidat.js"></script>
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
            <LI class = "item1"><a href="../index.php">ACCEUIL</a></LI>
            <LI class = "item2"><a href="../Acceuil/A-propos.html">&Agrave PROPOS</a></LI>
            <LI class = "item3"><a href="../Acceuil/Nos-offres.php">NOS OFFRES</a></LI>
            <LI class = "item4"><a href="../Acceuil/Contactez-nous.php">CONTACTEZ-NOUS</a></LI>
          </UL>
          <span class="mon-compte" onclick="toggleMenu()"><img src="../IMG/pdp1.jpg" class="user-pic"> <span>Mon compte</span></span>
          <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
              <div class="user-info">
                <img src="../IMG/pdp1.jpg" class="user-pic">
                <h2>Anou Oussama</h2>
                <hr>
                <a href="ModifierProfile.php" class="sub-menu-link">
                  <img src="../IMG/user-icon.png" alt="">
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
        </header>
      </BODY>
      <script>
        var subMenu = document.getElementById("subMenu");
        function toggleMenu(){
          subMenu.classList.toggle("open-menu");
        }
      </script>
    </HTML> 
    
  ';
?>