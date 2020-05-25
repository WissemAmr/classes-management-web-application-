<!DOCTYPE html>
<html>

<head>
  <title> modification </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Style des icons -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Style de la page -->
  <link rel="stylesheet" href="demande_effectuee.css" type="text/css" />
  <!-- icon de la page -->
  <link rel="SHORTCUT ICON" href="./icon.png" />
  <!-- ******** -->
</head>

<body>
  <header>
    <div class="row">
      <div class="logo">
        <img src="projet/g-salle.png" / alt="graduation" class="logo-img">
      </div>
      <ul class="main-nav">
        <!-- barre de navigation -->
        
             <li   class="active"><a href="deconnexion.php"><i class="fa fa-lock"></i><span> Cliquer ici pour vous deconnecter</span> &nbspDECONNEXION</a></li>
             <li><a href="aide.php"><i class="fa fa-question-circle-o"></i><span> Obtenir de l'aide</span> &nbspAIDE</a></li>
             <li><a href="a_propos.php"><i class="fa fa-info-circle"></i><span> Lire à  propos de nous</span> &nbspA PROPOS</a></li>
      </ul>
    </div>
   
    <div>
      <h1 id="some" style="margin-top:200px; margin-left: 150px;"> la demande à été bien traitée</h1>
      
    </div>
 <form> 
        <input type="button" class="form1" value="retour" name="button" onclick="history.go(-2);"> 
    </form>
  </header>
</body>

</html>










































<?php 
 if(!isset($_POST['check']))  
       { 
          header("Location:no_selct.php");
          exit();

    }
include ('form.php');
include ('function.php'); 

if(isset($_POST['send']))  
{  
    $checkbox1=$_POST['check'];
    $word="";
    foreach ($checkbox1 as $word2)
{ 
  $quert="UPDATE  notification2 SET statut='read' where id='".$word2."'"; 
  mysqli_query($conn,$quert);
	$okay="SELECT * from modification WHERE id_reservation = '".$word2."'"; 
	$reesults = mysqli_query($conn,$okay);  
   while ($col= mysqli_fetch_assoc($reesults)) 
   {  
      
      $si=recherche_modif ($conn,$col['nouvelle_salle'],$col['date_nouvelle'],$col['nouvelle_heure_debut'],$col['nouvelle_heure_fin']); 
      if ($si==1) 
      { 
         echo "la salle '".$col['nouvelle_salle']."' est occupée"; 

         

      } 
      elseif ($si==0) 
      { 

         /* confirmation de modification par l'insertion de la nouvelle demande de reservation ensuitte supprimée de table modification  */
         $mysql_query="INSERT INTO demande_de_reservation(Salle,Motif,new_date,duration,debut,fin,Email,club) VALUES('".$col['nouvelle_salle']."', '".$col['nouveau_motif']."','".$col['date_nouvelle']."','".$col['duration']."' ,'".$col['nouvelle_heure_debut']."','".$col['nouvelle_heure_fin']."', '".$col['Email']."','".$col['club']."')";  
         
         $results = mysqli_query($conn,$mysql_query);
         $mysql_query1="DELETE from modification where id_reservation = '".$word2."'"; 
         $results1 = mysqli_query($conn,$mysql_query1);
         $mysql_query1="DELETE from reservation where id = '".$word2."'"; 
         $results1 = mysqli_query($conn,$mysql_query1);
          $eco="INSERT INTO notification (id,statut) VALUES ('".$id."','unread')";
           mysqli_query($conn,$eco); 
         

      } 


}
}


} 
?>

