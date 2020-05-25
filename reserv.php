<!DOCTYPE html>
<html>
<head>
  <title>table salle</title>
  <link rel="stylesheet" type="text/css" href="TSS.css">
  <meta charset="utf-8">

</head>
<body>

  <div class="formulaire">
   <div class="row">
 <div class="logo">
        <img src="projet/g-salle.png" / alt="graduation" class="logo-img">
      </div>
           <ul class="main-nav"> 

            
             <li   class="active"><a href="deconnexion.php"><i class="fa fa-lock"></i><span> Cliquer ici pour vous deconnecter</span> &nbspDECONNEXION</a></li>
             <li><a href="aide.php"><i class="fa fa-question-circle-o"></i><span> Obtenir de l'aide</span> &nbspAIDE</a></li>
             <li><a href="a_propos.php"><i class="fa fa-info-circle"></i><span> Lire à propos de nous</span> &nbspA PROPOS</a></li>
           </ul>
         </div> 
         
      <div class="tit">reservation terminée </div>
   
  
    <br>
    <form> 
        <input   type="button" class="form1" value="retour" name="button" onclick="history.go(-3);"> 
    </form> 
  </div>
</body>
</html>


































<?php
session_start(); 
include 'form.php';  

   
/* l'insertion de reservation dans la table reservation apres la confirmation et suppression de demande de table demande reservation) */
   
    if(isset($_POST['send']))  
    {  if(!isset($_POST['check']))  
       { 
          header("Location:pas_de_salle.php");
          exit();

       }



      if (isset($_POST['check'])) 
      {
      $checkbox1=$_POST['check'];
      $word="";
      $sqlpersonne="SELECT * FROM user WHERE IDUser ='".$_SESSION['IDUser']."'";
      $results3 = mysqli_query($conn,$sqlpersonne); 
      $row3= mysqli_fetch_assoc($results3);
      foreach ($checkbox1 as $word2) {
        
        $sql="INSERT INTO demande_de_reservation (club,Email,Motif,new_date,debut,fin,duration,Salle) VALUES ('".$row3['club']."','".$row3['Email']."','".$_SESSION['Motif']."','".$_SESSION['date_debut']."','".$_SESSION['heure']."','".$_SESSION['heure_fin']."','".$_SESSION['Duration']."','".$word2."');";  

        if (mysqli_query ($conn,$sql)) 
            {  
               
               $id=mysqli_insert_id($conn); 
            }

        $sqlll2="INSERT INTO personne (id_personne,club,nom,Matricule,role) VALUES ('".$id."','".$row3['club']."','".$_SESSION['namme']."','".$_SESSION['matricule']."','".$_SESSION['role']."')";  
         mysqli_query ($conn,$sqlll2); 
      $tree="INSERT INTO notification (id,statut) VALUES ('".$id."','unread')";
      mysqli_query($conn,$tree); 
          

       
        
    
           
    
    } }}







 ?> 