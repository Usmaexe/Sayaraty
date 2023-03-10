<?PHP
  require("../PHP/Connexion_BD.php");
  session_start();
  echo '
    <!DOCTYPE HTML>
    <HTML>
      <HEAD>
        <meta CHAESET="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge"><!--it\'s only used for Internet explorer-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--Controls the layout of the page on smaller screens-->
        <TITLE>Sayarty - Espace Candidat</TITLE>
        <script src="Page-Candidat.js"></script>
        <link rel="icon" href="../IMG/SAYARATY_Icon.png">
        <link rel="stylesheet" href="../CSS/style-index.css">
        <link rel="stylesheet" href="../CSS/style-candidat.css">
        <link rel="stylesheet" href="../CSS/style-contacter.css">
        <link rel="stylesheet" href="../CSS/style-modifier.css">
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
            <LI class = "item1"><a href="../index.php">ACCEUIL</a></LI>
            <LI class = "item2"><a href="../Acceuil/A-propos.html">&Agrave PROPOS</a></LI>
            <LI class = "item3"><a href="../Acceuil/Nos-offres.php">NOS OFFRES</a></LI>
            <LI class = "item4"><a href="../Acceuil/Contactez-nous.php">CONTACTEZ-NOUS</a></LI>
          </UL>';
          $query = "SELECT PHOTO FROM Candidat WHERE Login_candidat='".$_SESSION["login"]."'";
          $ligne = mysqli_fetch_row(mysqli_query($connect,$query));
          echo'
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
        </header>
        <div class="Title">
          <h1 class="TheHeader">modifier votre profile</h1>
        </div>
        <div class="Container">
          <div class="rightContainer">
            <label class="picTitle">Photo De profile</label>
            <span class="subTitle">
              Avec une photo à jour, votre identifiera plus facilement sur le site.
            </span>
            <div class="image">
              <img id="ImgProfile" src="'.$ligne[0].'" alt>
            </div>
            <form name="fichier" method="post">
              <input type="file" name="Photo">
              <input type="submit" name="SubmitPic" class="submitPic" value="Changer" style="width:100px;">
            </form>
          </div>';
          $query = "SELECT * FROM Candidat WHERE Login_candidat='".$_SESSION["login"]."'";
          $ligne = mysqli_fetch_row(mysqli_query($connect,$query)); 
          echo '
          <div class="leftContainer">     
            <form name="formulaire" class="formulaire" method="post">
              <div class="nom_email">
                <div class="block">
                  <label>Nom</label><input type="text" id="name" name="nom" value="'.$ligne[2].'"required>
                </div>
                <div class="block">
                  <label>Login</label><input type="text" id="mail" name="login" value="'.$ligne[0].'" required>
                </div>
              </div>
              <div class="secondBlock">
                <div class="first">
                  <label>Sexe</label>
                  <select name="sexe" id="select-area" class="sexe">';
                  if($ligne[4]=="Homme"){
                    echo'
                      <option class="sexe" name="Homme" value="Homme" SELECTED>Homme</option>
                      <option class="sexe" name="Femme" value="Femme">Femme</option>
                    ';
                  }
                  else{
                    echo'
                      <option class="sexe" name="Homme" value="Homme">Homme</option>
                      <option class="sexe" name="Femme" value="Femme" SELECTED>Femme</option>
                    ';
                  }
                  echo'
                  </select>
                </div>
                <div class="second">
                  <label>Date de naissance</label>
                  <input type="date" name="date_naissance" class="login-style" value="'.$ligne[7].'" autocomplete="off" required>                 
                </div>
                <div class="third">
                  <label>Numéro de télephone</label>
                  <input type="text" name="num_tel" class="name-style" value="'.$ligne[5].'" autocomplete="off" required>                                
                </div>
              </div>
              <div class="thirdBlock">
                <div class="first">
                  <label>Adresse</label>
                  <input type="text" name="adresse" class="name-style" value="'.$ligne[13].'" autocomplete="off" required>  
                </div>
                <div class="second">
                  <label>Numèro Carte National</label>
                  <input type="text" name="num_cin" class="login-style" value="'.$ligne[6].'" autocomplete="off" required>                 
                </div>
              </div>
              <div class="forthBlock">
                <div class="first">
                  <label>Email</label>
                  <input type="text" name="email" class="name-style" value="'.$ligne[3].'" autocomplete="off" required>  
                </div>
                <div class="second">
                  <label>Mot de passe</label>
                  <input type="password" name="password" class="login-style" value="'.$ligne[1].'" autocomplete="off" required>                 
                </div>
                <div class="third">
                  <label>Confirmer</label>
                  <input type="password" name="Cpassword" class="login-style" value="'.$ligne[1].'" autocomplete="off" required>                 
                </div>
              </div>
              <div class="submit">
                <input name="submit-button" type="submit" value="Envoyer">
              </div>
            </form>
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
      </BODY>
      <script>
        var subMenu = document.getElementById("subMenu");
        function toggleMenu(){
          subMenu.classList.toggle("open-menu");
        }
      </script>
    </HTML> 
    
  ';
  if(isset($_POST["submit-button"])){
      $update = true;$error;
      if(!preg_match("#^[\w\.]+@([\w]+\.)+[\w]{2,4}$#",$_POST["email"])){     
        $error="email";
        $update=false;
      }
      if(!preg_match("#^[A-z\ ]+#",$_POST["nom"])){
        $error="nom";
        $update=false;
      }
      if(!preg_match("#^\w{1,2}\d{4,6}#",$_POST["num_cin"])){
        $error="Numéro carte national";
        $update=false;
      }
      if(!preg_match("#^(0|\+\d{1,3}-)\d{9}#",$_POST["num_tel"])){
        $error="Numéro télephone";
        $update=false;
      }
      if($_POST["Cpassword"]!=$_POST["password"]) {
        $error="Mot de passe";
        $update=false;
      }
      
    if($update){
      $query = "UPDATE CANDIDAT SET Password='".$_POST["password"]."',Nom='".$_POST["nom"]."',
      Email_candidat='".$_POST["email"]."',Sexe_candidat='".$_POST["sexe"]."',Num_telephone='".$_POST["num_tel"]."',
      Num_CIN_candidat='".$_POST["num_cin"]."',Date_de_naissance='".$_POST["date_naissance"]."'
      ,Adresse='".$_POST["adresse"]."' WHERE Login_candidat='".$_SESSION["login"]."'";
      $result=mysqli_query($connect,$query);
      echo "
        <SCRIPT>
          // Check if the page has already been refreshed
          if (!sessionStorage.getItem('refreshed')) {
            // If not, set the flag and reload the page
            sessionStorage.setItem('refreshed', 'true');
            location.reload();
          }
        </SCRIPT>
      ";
    }
    else{
      echo '
        <SCRIPT>
          alert("'.$error.' Incorrecte!");
        </SCRIPT>
      ';
    }  
  }
  if(isset($_POST["SubmitPic"])){
    $query = "UPDATE CANDIDAT SET PHOTO='../IMG/".$_POST["Photo"]."' WHERE Login_candidat='".$_SESSION["login"]."'";
    $result= mysqli_query($connect,$query);
    echo '
      <SCRIPT>
        document.getElementById("ImgProfile").src="../IMG/'.$_POST["Photo"].'";
      </SCRIPT>
    ';
  }
?>