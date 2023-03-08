<?PHP
  require("./PHP/Connexion_BD.php");
?>
<!DOCTYPE HTML>
<HTML>
	<HEAD>
    <!-- this is a test -->
    <meta CHAESET="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"><!--it's only used for Internet explorer-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--Controls the layout of the page on smaller screens-->
		<TITLE>Sayarty - Auto-école en ligne</TITLE>
    <link rel="icon" href="IMG/SAYARATY_Icon.png">
		<link rel="stylesheet" href="./CSS/style-index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,500;0,700;1,100;1,300;1,400;1,500;1,700;1,900&family=Secular+One&display=swap" rel="stylesheet">
  </HEAD>
	<BODY>
    <header>
      <img src="IMG/SAYARATY_LOGO.png">
      <UL class="Nav">
        <LI class = "item1"><a href="./index.php">ACCEUIL</a></LI>
        <LI class = "item2"><a href="./Acceuil/A-propos.html">&Agrave; PROPOS</a></LI>
        <LI class = "item3"><a href="./Acceuil/Nos-offres.php">NOS OFFRES</a></LI>
        <LI class = "item4"><a href="./Acceuil/Contactez-nous.php">CONTACTEZ-NOUS</a></LI>
      </UL>
      <a class="item5" href="./Acceuil/Connexion_inscription.php"> <span>Connexion</span></a></DIV>
    </header>
    <DIV class="Content">
      <DIV class="InteriorHeader">
        <p>
          <span class="Title">L'auto-école en ligne qui réinvente le permis ! </span><BR>
          <span class="SubTitle">Chez Sayaraty la conduite en toute sérénité. 
            Nous prenons la route avec vous dès le premier jour 
            et nous restons à vos côtés les jours d'après.
          </spann>
        </p>
        <div class="imag">
          <img src="IMG/panneaux.png">
          <img src="IMG/auto.png">
        </div>
      </DIV>
      <DIV class="InteriorBottomBar">
        98% Taux de réussite
        <span>Des outils en ligne, des cours bien détaillés et un accompagnement quotidienne<br> <b>pour assurer votre réussite!</b> </span>
      </DIV>
      <DIV class="CodeDeLaRoute">
        <img src="IMG/undraw_knowledge_re_5v9l.png" alt="">
        <div>
          <span class="Section1Title">Code de la Route</span>
          <span class="Section1SubTitle">Révisez votre code partout et en illimité grâce à notre formation complète en ligne !</span>
          <span class="Section1SubTitle2">1 200 questions d'entraînement, cours et séries thématiques conformes à l’examen pour obtenir votre code de la route rapidement.</span>
          <a href="#" class="Cto"><span>J'obtiens mon code</span></a>
        </div>
      </DIV>
      <DIV class="InteriorBottomBar">
        L'une des meilleurs Auto-école au Maroc
        <span>SAYRATY est devenu la nouvelle façon de préparer son code de la route</span>
      </DIV>  
      <div class="card-container">
                <?PHP
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
                      <img src="./'.$photo[$j].'" alt="">
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
            ?>
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
            <h4>Aide</h4>
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
              <a href="#"> <img src="./IMG/facebook.png" alt=""></a>
              <a href="#"> <img src="./IMG/instagram.png" alt=""></a>
              <a href="#"> <img src="./IMG/linkedin.png" alt=""></a>
            </DIV>
          </DIV>
        </DIV>
    </footer>	
	</BODY>
</HTML>
