<!DOCTYPE html>
<!doctype html>
<html>
   <head> 
       <meta charset="UTF-8">
       <title> Admin page</title>
       <link rel="icon" href="image/SAYARATY_Icon.png">
       <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
       <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css">
       <link rel="stylesheet" href="Style_vehicule.css">

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
                    <a href="#" class="active" ><span class="voitures">vehicules</span></a>
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
                         <h3> les vehicules </h3>
                      </div>
                      <div class="card_body">
                        <div class="table_res">
                            <table width="100%">
                                <thead>
                                   <tr>
                                      <td> Num_matricule </td>
                                      <td> Type </td>
                                      <td> la Marque </td> 
                                      <td> le modele </td>
                                      <td> Disponibilite </td> 
                                   </tr>
                                </thead>' ;

                                $requete = mysqli_query( $connexion , "SELECT Num_matricule,Type,Marque,Modele,Disponibilite FROM  vehicule ");
                                while($ligne = mysqli_fetch_assoc($requete)) { 

                                        echo ' <tbody>
                                         <tr>
                                          
                                             <td>'.$ligne['Num_matricule'].'</td>
                                             <td>'.$ligne['Type'].'</td>
                                             <td>'.$ligne['Marque'].'</td>
                                             <td>'.$ligne['Modele'].'</td>
                                             <td>'.$ligne['Disponibilite'].'</td>

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
