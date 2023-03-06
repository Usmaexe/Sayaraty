<!DOCTYPE html>
<!doctype html>
<html>
   <head> 
       <meta charset="UTF-8">
       <title> Admin page</title>
       <link rel="icon" href="image/SAYARATY_Icon.png">
       <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
       <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css">
       <link rel="stylesheet" href="style_moniteur.css">

   </head>
   <body >
   <?PHP 
 $connexion = mysqli_connect("localhost","root","");
 if(!$connexion){
    print("<SCRIPT>alert('Désolé, connexion au serveur a échouée')</SCRIPT>");
}else
if(!mysqli_select_db($connexion,'sayaraty')){
    print("<SCRIPT>alert('Désolé, connexion a la base de données a échouée');</SCRIPT>");		
}
$nbr_moniteur = mysqli_query($connexion,"SELECT COUNT(*) FROM moniteur");
$nbr_moniteur = mysqli_fetch_row($nbr_moniteur); 
$nbr_moniteur = implode("", $nbr_moniteur); 
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
                    <a  href="#" class="active"><span class="moniteur"> Moniteurs </span></a>
                   </li>
                   <li>
                    <a href=" vehicule.php"><span class="voitures">vehicules</span></a>
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
                         <h3> les moniteurs </h3>
                      </div>
                      <div class="card_body">
                        <div class="table_res">
                            <table width="100%">
                                <thead>
                                   <tr>
                                      <td> Moniteur </td> 
                                      <td> Cin </td>
                                      <td> Telephone </td>
                                      <td> Email </td> 
                                      <td> Sexe </td> 
                                      <td> licence </td>
                                   </tr>
                                </thead>  ';

                                $requete = mysqli_query( $connexion , "SELECT Nom,num_CIN_moniteur,num_licence,Email_moniteur,Num_telephone_moniteur,sexe_moniteur FROM moniteur");
                                while($ligne = mysqli_fetch_assoc($requete)){ 

                                        echo ' <tbody>
                                         <tr>
                                             <td>'.$ligne['Nom'].'</td>
                                             <td>'.$ligne['num_CIN_moniteur'].'</td>
                                             <td>'.$ligne['Num_telephone_moniteur'].'</td>
                                             <td>'.$ligne['Email_moniteur'].'</td>
                                             <td>'.$ligne['sexe_moniteur'].'</td>
                                             <td>'.$ligne['num_licence'].'</td>

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
