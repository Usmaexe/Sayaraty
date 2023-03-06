<!DOCTYPE html>
<!doctype html>
<html>
   <head> 
       <meta charset="UTF-8">
       <title> Admin page</title>
       <link rel="icon" href="image/SAYARATY_Icon.png">
       <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
       <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css">
       <link rel="stylesheet" href="Style_condidat.css">

   </head>
   <body class="flex-container" class="flex-item">
   <?PHP 
 $connexion = mysqli_connect("localhost","root","");
 if(!$connexion){
    print("<SCRIPT>alert('Désolé, connexion au serveur a échouée')</SCRIPT>");
}else
if(!mysqli_select_db($connexion,'sayaraty')){
    print("<SCRIPT>alert('Désolé, connexion a la base de données a échouée');</SCRIPT>");		
}

$nbr_condidat = mysqli_query($connexion,"SELECT COUNT(*) FROM candidat");
$nbr_condidat = mysqli_fetch_row($nbr_condidat); 
$nbr_condidat = implode("", $nbr_condidat); 
$name=mysqli_query($connexion,"SELECT Nom FROM administrateur ");
$name = mysqli_fetch_row($name); 
$name = implode("",$name); 
   echo '  <div class="sidebar">
            <div class="brand">
                <img src="image/SAYARATY_LOGO.png">
            </div>
            <div class="menu">
                <ul>
                   <li>
                    <a href="admin.php" ><span class="dash">Tableau</span></a>
                   </li>
                   <li>
                    <a href="#" class="active"><span class="condidats">Condidats</span></a>
                   </li>
                   <li>
                    <a  href="moniteur.php"><span class="moniteur"> Moniteurs </span></a>
                   </li>
                   <li>
                    <a href="vehicule.php"><span class="voitures">vehicules</span></a>
                   </li>
                    <li>
                    <a href="message.php"><span class="">Messages</span></a>
                   </li>
                   <li>
                   <a href=""><span class="">Avis</span></a>
                  </li>
                
                </ul>
            </div>
      </div>
      <div class="main_cont">
        <header>
             <h2 >
                <label for="">
                    <span  class="hello"></span>
                </label>

                Tableau De Bord
             </h2>
             <div class="cherche">
                <span class="la recherce "></span>
                <input type="search" placeholder="chercher ici!">
             </div>
             <div class="condidat">
                <!-- span onclick()=affiche() class=""-->
                <img id="hi" src="image/user.png" onclick="toggle" width="30px" height="30px"  alt="">
                <div >
                    <h4 id="Menu">'.$name.'</h4>
                    <small>Admin</small></a>
                </div>
             </div>
        </header>
        <main>
          
             
        <div class="recent">
                <div class="project">
                   <div class="card2">
                      <div class="card_h">
                         <h3> les Condidats </h3>
                      </div>
                      <div class="card_body">
                        <div class="table_res">
                            <table width="100%">
                                <thead>
                                   <tr>
                                      <td> Candidat </td> 
                                      <td> Cin </td>
                                      <td> Telephone </td>
                                      <td> Email </td> 
                                      <td> Prix payer </td>
                                      <td> Sexe </td>
                                      <td> Date de naissance </td> 
                                      <td> Date d\'inscription</td>
                                      <td> Nombre d\'heures </td> 
                                      <td> Status </td>  
                                   </tr>
                                </thead>  ';

                                $requete = mysqli_query( $connexion , "SELECT Nom,num_CIN_candidat,Prix_payer,Nb_heures,Email_candidat,Date_d_inscription,date_de_naissance,Num_telephone,sexe_candidat,Statut FROM candidat");
                                while($ligne = mysqli_fetch_assoc($requete)){ 

                                        echo ' <tbody>
                                         <tr>
                                             <td>'.$ligne['Nom'].'</td>
                                             <td>'.$ligne['num_CIN_candidat'].'</td>
                                             <td>'.$ligne['Num_telephone'].'</td>
                                             <td>'.$ligne['Email_candidat'].'</td>
                                             <td>'.$ligne['Prix_payer'].'</td>
                                             <td>'.$ligne['sexe_candidat'].'</td>
                                             <td>'.$ligne['date_de_naissance'].'</td>
                                             <td>'.$ligne['Date_d_inscription'].'</td>
                                             <td>'.$ligne['Nb_heures'].'</td> 
                                             <td>
                                                 <span class="status_prog"></span> 
                                                 '.$ligne['Statut'].'
                                             </td>
                                         </tr>' ;
                                     }
        
 


 echo'                               </tbody>
                              </table>
                        </div>
                      </div>
                   </div>
                </div>
                <div class="custmer">

                </div>
            </div>
        </main>
      </div>
   </body>
</html>   '
?>
