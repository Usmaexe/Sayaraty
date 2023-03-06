<?PHP
  require("Connexion_BD.php");
  if(isset($_POST["submit-button"])){
    $query = "SELECT Email_candidat FROM candidat";
    $C_email;$A_email;$M_email;$i=0;
    if($result=mysqli_query($connect,$query)){
      while($ligne=mysqli_fetch_row($result)){
        $C_email[$i] = $ligne[0];
        $i++;
      }
    }
    $query = "SELECT Login_candidat FROM candidat";
    if($result=mysqli_query($connect,$query)){
      while($ligne = mysqli_fetch_row($result)){
        $C_email[$i]=$ligne[0];
        $i++;
      }
    }


    $query = "SELECT Email FROM administrateur";$i=0;
    if($result=mysqli_query($connect,$query)){
      while($ligne=mysqli_fetch_row($result)){
        $A_email[$i] = $ligne[0];
        $i++;
      }
    }
    $query = "SELECT login_admin FROM administrateur";
    if($result=mysqli_query($connect,$query)){
      while($ligne=mysqli_fetch_row($result)){
        $A_email[$i] = $ligne[0];
        $i++;
      }
    }

    $query = "SELECT Email_moniteur FROM moniteur";$i=0;
    if($result=mysqli_query($connect,$query)){
      while($ligne=mysqli_fetch_row($result)){
        $M_email[$i] = $ligne[0];
        $i++;
      }
    }
    $query = "SELECT login_moniteur FROM moniteur";
    if($result=mysqli_query($connect,$query)){
      while($ligne=mysqli_fetch_row($result)){
        $M_email[$i] = $ligne[0];
        $i++;
      }
    }

    $isCandidat=$isMoniteur=$isAdmin=false;

    if(in_array($_POST["logemail"],$C_email)||in_array($_POST["logemail"],$M_email)||in_array($_POST["logemail"],$A_email)){
      if(in_array($_POST["logemail"],$C_email)){
        $query = "SELECT Password FROM CANDIDAT WHERE Email_candidat='".$_POST["logemail"]."' OR Login_candidat='".$_POST["logemail"]."'";
        $mdp = mysqli_fetch_row(mysqli_query($connect,$query));
        // ADD the query to get the login to display it on the alert window
        $isCandidat=true;
      }
      if(in_array($_POST["logemail"],$A_email)){
        $query = "SELECT Password FROM MONITEUR WHERE Email_moniteur='".$_POST["logemail"]."' OR login_moniteur='".$_POST["logemail"]."'";
        $mdp = mysqli_fetch_row(mysqli_query($connect,$query));
        // ADD the query to get the login to display it on the alert window
        $isMoniteur=true;
      }
      if(in_array($_POST["logemail"],$M_email)){
        $query = "SELECT Password FROM ADMINISTRATEUR WHERE Email='".$_POST["logemail"]."' OR Login_admin='".$_POST["logemail"]."'";
        $mdp = mysqli_fetch_row(mysqli_query($connect,$query));
        // ADD the query to get the login to display it on the alert window
        $isAdmin=true;
      }
      if(in_array($_POST["logpass"],$mdp)){
        session_start();
        $_SESSION['login']=$_POST["logemail"];
        if($isCandidat){
          echo'
            <SCRIPT>
              alert("Bienvenu '.$_POST["logemail"].'");
              document.location = "../Candidat";
            </SCRIPT> 
          ';
        }
        else if($isMoniteur){
          echo'
            <SCRIPT>
              alert("Bienvenu '.$_POST["logemail"].'");
              document.location = "../Moniteur/Page-Moniteur.php";
            </SCRIPT> 
          ';
        }
        else if($isAdmin){
          echo'
            <SCRIPT>
              alert("Bienvenu '.$_POST["logemail"].'");
              document.location = "../Administrateur/index.php";
            </SCRIPT> 
          ';
        }
      }
    }
    else{
      echo '
      <SCRIPT>
        alert("Informations incorrectes");
        document.location = "../Acceuil/Connexion_inscription.html";
      </SCRIPT> 
      ';
    }
  }
?>