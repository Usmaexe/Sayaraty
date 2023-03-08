<?PHP
require("../PHP/Connexion_BD.php");
$query = "SELECT * FROM offre where id_offre=1 and statut=true";
$titre;$commentaire;$prix;$statut;
if($result=mysqli_query($connect,$query)){
  while($ligne=mysqli_fetch_row($result)){
    $titre=$ligne[0];
  }
}
echo '
  <!DOCTYPE HTML>
  <HTML>
    <HEAD>
      <meta CHAESET="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="ie=edge"><!--it\'s only used for Internet explorer-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--Controls the layout of the page on smaller screens-->
      <TITLE>Sayarty - Nos offres</TITLE>
      <link rel="icon" href="../IMG/SAYARATY_Icon.png">
      <link rel="stylesheet" href="../CSS/style-index.css">
      <link rel="stylesheet" href="../CSS/style-offres.css">
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
          <LI class = "item3"><a href="Nos-offres.html">NOS OFFRES</a></LI>
          <LI class = "item4"><a href="Contactez-nous.php">CONTACTEZ-NOUS</a></LI>
        </UL>
        <a class="item5" href="Connexion_inscription.php"> <span>Connexion</span></a></DIV>
      </header>
      <div class="firstContainer">
        <img src="../IMG/offres.jpg" alt="">
        <div class="container">
          <div class="theTitleOfPage">';
          $query = "SELECT Prix FROM offre where id_offre=2";
          $ligne = mysqli_fetch_row(mysqli_query($connect,$query));
          echo '
            Votre permis de conduite en mieux d&egrave;s <b>'.$ligne[0].' DH</b>
          </div>
          <div class="subtitle">
            *par rapport &agrave; une auto-&eacute;cole traditionnelle
          </div>
          <a href="#" class="Cto">J\'obtiens mon code</a>
        </div>
      </div>
      <div class="cardContainer">';
      $query = "SELECT * FROM offre where statut=true";
        $i=0; 
        if($result=mysqli_query($connect,$query)){
          while(($ligne=mysqli_fetch_row($result))&&$i<3){
            $chaine=explode("-",$ligne[1]);
            $titre=$chaine[0];
            if($i==1||$i==2){$subtitre=$chaine[1];}
            $prix=$ligne[2];
            $commentaire=$ligne[4];
            if($i==0){$nbcard="first";}
            else if($i==1){$nbcard="second";}
            else if($i==2){$nbcard="third";}
            echo '
              <div class="'.$nbcard.'Card">
                <span class="cardTitle">'.$titre.'</span>';
            if($i==1 || $i==2){
              echo '<span class="cardSubTitle">'.$subtitre.'</span>';
              echo '<span class="cardSubSubTitle">'.$commentaire.'</span>';
            }
            else{
              echo '<span class="cardSubTitle">'.$commentaire.'</span>';
            }
            echo'
                <hr>
                <span class="cardPrice"><b>D&Eacute;S</b> '.$prix.' DH</span>
                <a href="#">J\'en profite</a>
              </div>
              ';
            $i++;
          }
        }
      echo'
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
  </HTML>
';

?>