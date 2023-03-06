<!DOCTYPE html>
<!doctype html>
<html>
   <head> 
       <meta charset="UTF-8">
       <title> Admin page</title>
       <link rel="icon" href="image/SAYARATY_Icon.png">
       <link rel="stylesheet" href="Style_admin.css">
       <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
       <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css">
       <link rel="stylesheet" href="style.css">
       <script src="a.js" defer></script> 
       <script>
          let Menu = document.getelementbyId("submenu");
            function toggle(){
              Menu.classList.toggle("open");
            }
       </script> 
       <style>
         
        </style>

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
$nbr_moniteur = mysqli_query($connexion,"SELECT COUNT(*) FROM moniteur");
$nbr_moniteur = mysqli_fetch_row($nbr_moniteur); 
$nbr_moniteur = implode("", $nbr_moniteur); 
$nbr_condidat = mysqli_query($connexion,"SELECT COUNT(*) FROM candidat");
$nbr_condidat = mysqli_fetch_row($nbr_condidat); 
$nbr_condidat = implode("", $nbr_condidat); 
$nbr_voiture = mysqli_query($connexion,"SELECT COUNT(*) FROM vehicule");
$nbr_voiture = mysqli_fetch_row($nbr_voiture); 
$nbr_voiture = implode("", $nbr_voiture); 
$nbr_msg = mysqli_query($connexion,"SELECT COUNT(*) FROM  Message ");
$nbr_msg = mysqli_fetch_row($nbr_msg); 
$nbr_msg = implode("",$nbr_msg); 
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
                    <a href="#" class="active"><span >Tableau</span></a>
                   </li>
                   <li>
                    <a href="candidat.php"><span class="condidats">Condidats</span></a>
                   </li>
                   <li>
                    <a  href="moniteur.php"><span class="moniteur"> Moniteurs </span></a>
                   </li>
                   <li>
                    <a href="vehicule.php"><span class="voitures"> vehicules</span></a>
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
            
             <div id="submenu" class="sub-menu-wrap" >
                <div class="Sub-menu">
                  <div class="user-infos" >
                   <img src="image/user.png">
                   <h3>'.$name.'</h3>
                  </div>
                  <hr>
                  
                  <a href="#" class="sub-menu-link">
                    <img src="image/profile.png">
                    <p>Edit Profile</p>
                    <span>><span>
                    </a>


                    <a href="#" class="sub-menu-link">
                    <img src="image/setting.png">
                    <p>Edit Profile</p>
                    <span>><span>
                    </a>

                    <a href="#" class="sub-menu-link">
                    <img src="image/help.png">
                    <p>Edit Profile</p>
                    <span>><span>
                    </a>

                    <a href="#" class="sub-menu-link">
                    <img src="image/logout.png">
                    <p>Edit Profile</p>
                    <span>><span>
                    </a>
                </div>
             </div>
        </header>
        <main >
            <div class="dash">
                <div class="card">
                    <div>
                        <h1>'.$nbr_condidat.'</h1>
                        <a href="candidat.php"><span>condidats</span></a>
                        
                    </div>
                    <div>
                        <span class="user"></span>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <h1>'.$nbr_moniteur.'</h1>
                        <a href="moniteur.php"><span>moniteurs</span></a>
                    </div>
                    <div>
                        <span class="moniteur"></span>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <h1>'.$nbr_voiture.'</h1>
                        <a href="vehicule.php"><span>vehicules</span></a>
                    </div>
                    <div>
                        <span class="voitures"></span>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <h1>'.$nbr_msg.'</h1>
                        <a href="message.php"><span >Message</span></a>
                    </div>
                    <div>
                        <span class="user"></span>
                    </div>
                </div>
            </div>
             
            <div class="recent">
        
            <div class="project" >
               <div class="card2">
                  <div class="card_h">
                     <h3> les Condidats </h3>
                     <button><a id="nn" href="candidat.php" class="fas fa-list-alt"></a> </button>
                  </div>
                  <div class="card_body">
                    <div class="table_res">
                        <table width="100%">
                            <thead>
                               <tr>
                                  <td> condidates </td> 
                                  <td> motant </td>
                                  <td> Status </td>  
  
                               </tr>
                            </thead>  ';
                         
                           
                            $requete = mysqli_query( $connexion , "SELECT Nom,Prix_payer,Statut FROM candidat");
                        
                                
                           
                                
                                while($ligne = mysqli_fetch_assoc($requete)){
    
                                    echo ' <tbody>
                                     <tr>
                                         <td>'.$ligne['Nom'].'</td>
                                         <td>'.$ligne['Prix_payer'].'</td>
                                         <td>
                                             <span class="status_prog"></span> 
                                             '.$ligne['Statut'].' </td> 
                                             
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
        <div class="recent1">
        
        <div class="project" >
           <div class="card2">
              <div class="card_h">
                 <h3> les Moniteurs </h3>
                 <button><a id="nn" href="moniteur.php" class="fas fa-list-alt"></a> </button>
              </div>
              <div class="card_body">
                <div class="table_res">
                    <table width="100%">
                        <thead>
                           <tr>
                              <td> Moniteur </td> 
                              <td> num_CIN_moniteur </td>
                              <td> num_licence </td>  

                           </tr>
                        </thead>  ';
                       
                        $requete = mysqli_query($connexion , "SELECT Nom,num_CIN_moniteur,num_licence FROM moniteur");
                        
                          
                            while($ligne = mysqli_fetch_assoc($requete)){

                                echo ' <tbody>
                                 <tr>
                                     <td>'.$ligne['Nom'].'</td>
                                     <td>'.$ligne['num_CIN_moniteur'].'</td>
                                     <td>
                                         <span class="status_prog"></span> 
                                         '.$ligne['num_licence'].' </td> 
                                         
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

    <div class="recent1">    
    <div class="project" >
       <div class="card2">
          <div class="card_h">
             <h3> les vehicules </h3>
             <button><a id="nn" href="vehicule.php" class="fas fa-list-alt"></a> </button>
          </div>
          <div class="card_body">
            <div class="table_res">
                <table width="100%">
                    <thead>
                       <tr>
                          <td> Type </td> 
                          <td> Modele </td>
                          <td> Matricule </td>
                          <td> Disponibilite </td>  

                       </tr>
                    </thead>  ';
                      $i=0;
                    $requete = mysqli_query($connexion , "SELECT Num_matricule,Type,Modele,Disponibilite FROM  vehicule");
                      
                        while($ligne = mysqli_fetch_assoc($requete)){


                            echo ' <tbody>
                             <tr>
                                 <td>'.$ligne['Type'].'</td>
                                 <td>'.$ligne['Modele'].'</td>
                                 <td>'.$ligne['Num_matricule'].'</td>
                                 <td>
                                     <span class="status_prog"></span> 
                                     '.$ligne['Disponibilite'].' </td> 
                                     
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
        
<div class="recent1">    
<div class="project" >
   <div class="card2">
      <div class="card_h">
         <h3> les Messages </h3>
         <button><a id="nn" href="message.php" class="fas fa-list-alt"></a> </button>
      </div>
      <div class="card_body">
        <div class="table_res">
            <table width="100%">
                <thead>
                   <tr>
                      <td> Nom </td> 
                      <td> Email </td>
                      <td> Objet </td> 

                   </tr>
                </thead>  ';
                 
                $requete = mysqli_query($connexion , "SELECT Nom , Email, Objet, Contenu FROM  Message where ID_message=2");
                  
                    while($ligne = mysqli_fetch_assoc($requete)){


                        echo ' <tbody>
                         <tr>
                             <td>'.$ligne['Nom'].'</td>
                             <td>'.$ligne['Email'].'</td>
                             <td>'.$ligne['Objet'].'</td>
 
                                 
                         </tr>' ;
                     }



echo'
                               </tbody>
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
;
?>
