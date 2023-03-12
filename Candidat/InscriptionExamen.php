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
		<link rel="stylesheet" href="../CSS/style-Examen.css">
		<link rel="stylesheet" href="../CSS/style-index.css">
		<link rel="stylesheet" href="../CSS/style-candidat.css">
		<link rel="stylesheet" href="../CSS/style-contacter.css">
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
    <div class="Title">
      <h1 class="TheHeader">INSCRIVEZ-VOUS</h1>
      <p class="Sentence">S\'inscrire maintenant pour passer votre <b>examen</b> quand vous voulez</p>
    </div>
    <div class="Container">
      <div class="leftContainer">     
        <form name="formulaire" class="formulaire" action="InscriptionExamen.php" method="post">
          <div class="nom_email">
            <div class="block">
              <label>Email</label><input type="text" id="mail" name="email" required>
            </div>
            <div class="block">
              <label>Numéro télephone</label><input type="text" name="num_tel" class="name-style" autocomplete="off" required> 
            </div>
          </div>
          <div class="nums">
            <div class="first">
              <label>Date de l\'examen</label><input type="date" name="date_examen" class="name-style" autocomplete="off" required>                              
            </div>                             
            <div class="second">
              <label>Lieu de l\'examen</label>
              <SELECT name="Horaire" class="name-style" autocomplete="off" required>
                <option name="9:00" value="9:00">9:00 -> 10:30</option>
                <option name="11:00" value="11:00">11:00 -> 12:30</option>
                <option name="13:00" value="13:00">13:00 -> 15:30</option>
              </SELECT>
            </div>               
          </div>                             
          <div class="submit">
           <input name="submit-button" type="submit" value="S\'inscrire">
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
if(isset($_POST["submit-button"])){  
  $insert = true;$error;$exist = false;
  $query = "SELECT * FROM Examen";
  $query2 = "SELECT email_candidat,Num_telephone FROM candidat where login_candidat='".$_SESSION["login"]."'";
  $ligne2=mysqli_fetch_row(mysqli_query($connect,$query2));
  if($result=mysqli_query($connect,$query)){
    while($ligne=mysqli_fetch_row($result)){
      if($ligne[2]==$_SESSION["login"]){
        echo'
          <SCRIPT>
             // Get all the input fields on the forum
              const inputFields = document.querySelectorAll(\'input, select\');

              // Loop through the input fields and disable them
              inputFields.forEach(inputField => {
                inputField.disabled = true;
              });
            document.formulaire.date_examen.value="'.$ligne[3].'";
            let option = "'.$ligne[1].'";
            document.formulaire.Horaire.options.namedItem(option).selected = true;
            document.formulaire.innerHTML = "<DIV class=\"nom-email\" style=\"color:red;\">Vous étes déja inscrit!</DIV>" + document.formulaire.innerHTML;
           
            document.formulaire.email.value="'.$ligne2[0].'";
            document.formulaire.num_tel.value="'.$ligne2[1].'";

          </SCRIPT>
        ';
        $exist=true;
        break;
      }
    }
  }
  if(!preg_match("#^[\w\.]+@([\w]+\.)+[\w]{2,4}$#",$_POST["email"])){     
    $error="email";
    $insert=false;
  }
  if(!preg_match("#^(0|\+\d{1,3}-)\d{9}#",$_POST["num_tel"])){
    $error="Numéro télephone";
    $insert=false;
  }
  if(date('Y-m-d', strtotime(date('m/d/Y') . " + " . 30 . " days"))>$_POST["date_examen"]){
    $error="Date Examen";
    $insert=false;
  }
  if(!$insert&&!$exist){
    echo '
    <SCRIPT>
      alert("'.$error.' Incorrecte");
      document.formulaire.email.value="'.$_POST["email"].'";
      document.formulaire.num_tel.value="'.$_POST["num_tel"].'";
      document.formulaire.date_examen.value="'.$_POST["date_examen"].'";
      let option = "'.$_POST["Horaire"].'";
      document.formulaire.Horaire.options.namedItem(option).selected = true;
    </SCRIPT>
    ';
  }
  else if(!$exist){
    $query = "INSERT INTO EXAMEN(HORAIRE,Id_CANDIDAT,DATE) VALUES('".$_POST["Horaire"]."','".$_SESSION["login"]."','".$_POST["date_examen"]."')";
    mysqli_query($connect,$query);
    echo'
      <SCRIPT>
        alert("Bien inscrite!");
      </SCRIPT>
    ';

  }
}
?>