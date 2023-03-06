<?PHP
  require("Connexion_BD.php");
  if(isset($_POST["submit-button"])){
    
    $insert = true;
    if(!preg_match("#^[\w\.]+@([\w]+\.)+[\w]{2,4}$#",$_POST["email"])||
    !preg_match("#^[A-z\ ]+#",$_POST["name"])||
    !preg_match("#^\w{1,2}\d{4,6}#",$_POST["num-cin"])||
    !preg_match("#^(0|\+\d{1,3}-)\d{9}#",$_POST["num-tel"])){
      echo '
        <script>
          alert("Données invalide!");
          document.location = "../Acceuil/Connexion_Inscription.html";
        </script>
      ';

      $insert = false;
    }
    if($insert){
      // add a condition where the login is similar
      $query = "INSERT INTO CANDIDAT VALUES ('".$_POST["login"]."',
      '".$_POST["logpass"]."','".$_POST["name"]."',
      '".$_POST["email"]."','".$_POST["sexe"]."',
      '".$_POST["num-tel"]."','".$_POST["num-cin"]."',
      '".$_POST["date_naissance"]."','".date('Y-m-d')."',
      0,0,false,'../IMG/Candidat.jpg')";
      mysqli_query($connect,$query);  
      echo '
        <script>
          alert("Vous étes inscrit par succées!");
          document.location = "../Candidat/Page-Candidat.php" ;
        </script>
      ';
    }
  }
?>