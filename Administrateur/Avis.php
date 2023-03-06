<!DOCTYPE html>
<!doctype html>
<html>
   <head> 
       <meta charset="UTF-8">
       <title> Admin page</title>
       <link rel="icon" href="image/SAYARATY_Icon.png">
       <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
       <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css">
       <link rel="stylesheet" href="style.css">

   </head>
   <body>
   <?PHP 
 $connexion = mysqli_connect("localhost","root","");
 if(!$connexion){
    print("<SCRIPT>alert('Désolé, connexion au serveur a échouée')</SCRIPT>");
}else
if(!mysqli_select_db($connexion,'sayaraty')){
    print("<SCRIPT>alert('Désolé, connexion a la base de données a échouée');</SCRIPT>");		
} 
$nbr_voiture = mysqli_query($connexion,"SELECT COUNT(*) FROM vehicule");
$nbr_voiture = mysqli_fetch_row($nbr_voiture); 
$nbr_voiture = implode("", $nbr_voiture); 
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
                    <a href="candidat.php" ><span class="condidats">Condidats</span></a>
                   </li>
                   <li>
                    <a  href="moniteur.php" ><span class="moniteur"> Moniteurs </span></a>
                   </li>
                   <li>
                    <a href="#"  ><span class="voitures">vehicules</span></a>
                   </li>
                    <li>
                    <a href="message.php" class="active" ><span class="">Messages</span></a>
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
                <img src="image/me.png" width="30px" height="30px" alt="">
                <div
                    <h4>'.$name.'</h4><br>
                    <small>Admin</small>
                </div>
             </div>
        </header>
        <main>
          
             
        <div class="recent">
                <div class="project">
                   <div class="card2">
                      <div class="card_h">
                         <h3> les messages </h3>
                         <button><i class="fas fa-list-alt"></i> </button>
                      </div>
                      <div class="card_body">
                        <div class="table_res">
                            <table width="100%">
                                <thead>
                                   <tr>
                                      <td> Nom </td>
                                      <td> etoile  </td>
                                      <td> objet </td> 
                                      <td> Contenu </td> 
                                   </tr>
                                </thead>' ;

                                $requete = mysqli_query( $connexion , "SELECT Nom , Email, Objet, Contenu FROM  Message ");
                                while($ligne = mysqli_fetch_assoc($requete)) { 

                                        echo ' <tbody>
                                         <tr>
                                          
                                             <td>'.$ligne['Nom'].'</td>
                                             <td>'.$ligne['Email'].'</td>
                                             <td>'.$ligne['Objet'].'</td>
                                             <td>'.$ligne['Contenu'].'</td>

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
