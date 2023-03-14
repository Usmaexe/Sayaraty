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
		<link rel="stylesheet" href="../CSS/style-contacter.css">
		<link rel="stylesheet" href="../CSS/style-Emploi.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.cdnfonts.com/css/monument-extended" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <link href="//db.onlinewebfonts.com/c/9563028603929a5ec058577b3fb5520a?family=Whipsmart" rel="stylesheet">
    <link href="//db.onlinewebfonts.com/c/55d433372d270829c51e2577a78ef12d?family=Monument+Extended" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Noto+Sans:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,500;0,700;1,100;1,300;1,400;1,500;1,700;1,900&family=Secular+One&display=swap" rel="stylesheet">
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
    <DIV class="tableContainer">
      <DIV class="Title">
      <h1 class="TheHeader">Emploi de temps</h1>';
      $query = "SELECT nb_heures FROM CANDIDAT where login_candidat='".$_SESSION["login"]."'";
      $ligne = mysqli_fetch_row(mysqli_query($connect,$query));
      echo'
      <p class="Sentence">
          Nombre d\'heure de conduite: <b>'.$ligne[0].'</b>
      </p>';
      echo'
      </DIV>
      <TABLE CELLSPACING=0>
        <TR>
          <TH></TH>
          <TH>9:00</TH>
          <TH>10:00</TH>
          <TH>11:00</TH>
          <TH>12:00</TH>
          <TH>14:00</TH>
          <TH>15:00</TH>
          <TH>16:00</TH>
          <TH>17:00</TH>
        </TR>';
        $query="SELECT * FROM SEANCE where id_candidat='".$_SESSION["login"]."' AND type='Theorique'";
        $j=0;
        if($result=mysqli_query($connect,$query)){
          while($ligne=mysqli_fetch_row($result)){
            $lignes[$j]=$ligne;
            if($heures=explode("-", $lignes[$j][1])){
              $debut[$j]=explode(":",$heures[0]);
              $fin[$j] =explode(":",$heures[1]);
              $p[$j]=(int)$fin[$j][0]-(int)$debut[$j][0];
            }
            $j++;
          }
        }
        $query2="SELECT * FROM SEANCE where id_candidat='".$_SESSION["login"]."' AND type='Pratique'";
        $j2=0;
        if($result=mysqli_query($connect,$query2)){
          while($ligne=mysqli_fetch_row($result)){
            $lignes2[$j2]=$ligne;
            if($heures=explode("-", $lignes2[$j2][1])){
              $debut2[$j2]=explode(":",$heures[0]);
              $fin2[$j2] =explode(":",$heures[1]);
              $p2[$j2]=(int)$fin2[$j2][0]-(int)$debut2[$j2][0];
            }
            $j2++;
          }
        }
        $jours=["Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"];
        if($j!=0&&$j2!=0){
          $k=0;$k2=0;$increment=false;$increment2=false;$doit=true;
          for($i=0;$i<12;$i++){
            if($i%2==0){
            echo'
              <TR>
                <TD>'.$jours[$i/2].'</TD>';
            }
            if($doit){
              if($k2<sizeof($lignes2)&&$lignes2[$k2][6]==$jours[$i/2]&&$lignes2[$k2][2]=="Pratique"){
              $query = "SELECT MODELE FROM VEHICULE WHERE Num_matricule='".$lignes2[$k2][5]."'";
              $voiture = mysqli_fetch_row(mysqli_query($connect,$query));
              switch($debut2[$k2][0]){
                case "9":{
                  echo '<TD><strong>Séance Pratique<BR>Moniteur: '.$lignes2[$k2][4].'<BR>Véhicule: '.$voiture[0].'</strong></TD>';
                  for($t=$p2[$k2];$t<4;$t++){
                    echo '<TD style="background-color:#cfcfcf"></TD>';
                  }
                }break;
                case "10":{
                  echo '<TD style="background-color:#cfcfcf"></TD>';
                  echo '<TD><strong>Séance Pratique<BR>Moniteur: '.$lignes2[$k2][4].'<BR>Véhicule: '.$voiture[0].'</strong></TD>';
                  for($t=$p2[$k2];$t<4;$t++){
                    echo '<TD style="background-color:#cfcfcf"></TD>';
                  }
                }break;
                case "11":{
                  echo '<TD style="background-color:#cfcfcf"></TD>';
                  echo '<TD style="background-color:#cfcfcf"></TD>';
                  echo '<TD><strong>Séance Pratique<BR>Moniteur: '.$lignes2[$k2][4].'<BR>Véhicule: '.$voiture[0].'</strong></TD>';
                  for($t=$p2[$k2];$t<4;$t++){
                    echo '<TD style="background-color:#cfcfcf"></TD>';
                  }
                }break;
                case "12":{
                  for($t=$p2[$k2];$t<4;$t++){
                    echo '<TD style="background-color:#cfcfcf"></TD>';
                  }
                  echo '<TD><strong>Séance Pratique<BR>Moniteur: '.$lignes2[$k2][4].'<BR>Véhicule: '.$voiture[0].'</strong></TD>';
                }break;
              }
            $k2++;
            }
            else{
              for($t=0;$t<4;$t++){
                echo '<TD style="background-color:#cfcfcf"></TD>';
              }
            }
            $doit=false;
          }
          else{
            if($k<sizeof($lignes)&&$lignes[$k][2]=="Theorique"){
                switch($debut[$k][0]){
                  case "14":{
                    echo '<TD colspan="'.$p[$k].'"><strong>Séance Théorique<BR>Moniteur: '.$lignes[$k][4].'</strong></TD>';
                    for($t=$p[$k];$t<4;$t++){
                      echo '<TD style="background-color:#cfcfcf"></TD>';
                    }
                  }break;
                  case "15":{
                    echo '<TD style="background-color:#cfcfcf"></TD>';
                    echo '<TD colspan="'.$p[$k].'"><strong>Séance Théorique<BR>Moniteur: '.$lignes[$k][4].'</strong></TD>';
                    for($t=$p[$k];$t<3;$t++){
                      echo '<TD style="background-color:#cfcfcf"></TD>';  
                    }
                  }break;
                  case "16":{
                    echo '<TD colspan="2" style="background-color:#cfcfcf"></TD>';
                    echo '<TD colspan="'.$p[$k].'"><strong>Séance Théorique<BR>Moniteur'.$lignes[$k][4].'</strong></TD>';
                  }break;
                }
            $k++;
            }
            else{
              for($t=0;$t<4;$t++){
                echo '<TD style="background-color:#cfcfcf"></TD>';
              }
            }
            $doit=true;
          }
          if($i%2!=0){echo'</TR>';}
        }
        }
        else{
          for($i=0;$i<6;$i++){
            echo'
              <TR class="vide">
                <TD>'.$jours[$i].'</TD>
                <TD></TD>
                <TD></TD>
                <TD></TD>
                <TD></TD>
                <TD>Séances théoriques</TD>
                <TD>Séances théoriques</TD>
                <TD>Séances théoriques</TD>
                <TD>Séances théoriques</TD>
              </TR>
            ';
          }
        }

        echo '
        <TR>
          <TD>Dimanche</TD>
          <TD COLSPAN="8" style="font:700 20px \'Poppins\';">Pas d\'études</TD>
        </TR>
      </TABLE>
    </DIV>
    <footer>
      <DIV class="FooterContainer">
        <DIV class="Footer-col">
          <h4>Nos Horraires</h4>
          <UL class="Horraire" style="color: #bbb;">
            <LI>Lundi | 09:00 - 18:00</LI>
            <LI>Mardi | 09:00 - 18:00</LI>
            <LI>Mercredi | 09:00 - 18:00</LI>
            <LI>Jeudi | 09:00 - 18:00</LI>
            <LI>Vendredi | 09:00 - 12:00</LI>
            <LI>Samedi | 09:00 - 18:00</LI>
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