<!DOCTYPE html>
<html>
<head>
  <title>mini reservation</title>
  <link rel="stylesheet" type="text/css" href="mini_reservation.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Style des icons -->
  <link rel="stylesheet" href="https://fontawesome.com/icons/angle-double-up?style=solid/.css">
  

</head>
<body >

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


<?php 

include 'form.php'; 
session_start();
if(isset($_POST['send']))  
{  
    $checkbox1=$_POST['check'];
    $word="";
    foreach ($checkbox1 as $word2)
{ 
	$okay="SELECT * from reservation WHERE id= '".$word2."'"; 
	$reesults = mysqli_query($conn,$okay);  
   while ($col= mysqli_fetch_assoc($reesults)) 
   { 
       $_SESSION['room']=$col['Salle'];
       $_SESSION['date']=$col['new_date'];
       $_SESSION['beg']=$col['debut']; 
       $_SESSION['end']=$col['fin'];
       $_SESSION['email']=$col['Email'];
       $_SESSION['club']=$col['club'];
       $_SESSION['why']=$col['Motif']; 
       $_SESSION['ID']=$col['id'];
       $_SESSION['Duration']=$col['Duration'];


   	echo ' <FORM method="POST" action="suite_modifier.php"'; 
   echo'	<label> Date de début:</label>
<br>
<br>';
echo '<input type="date" name="date_debut" class="form-control" placeholder="Date de début" required >  
  
<br>
<br>';


echo '<label> Heure de début:</label>
<br>
<br>
<input type="time" name="heure" class="form-control" placeholder="heure de debut" required>
<br>
<br> ';


echo '<label> heure de fin :</label>
<br>
<br>
<INPUT type="time" name="heure_fin" class="form-control" placeholder="heure de fin" required>
<br>
<br>'; 
echo '<div class="selectt" >'; 
echo '<select name="salle">'; 

$sql="SELECT * FROM `liste_des_salles`";
$results = mysqli_query($conn,$sql); 
$resultscheck = mysqli_num_rows ($results);   
if ($resultscheck>0)  
{  
	while ($row= mysqli_fetch_assoc($results)) 
  {
   echo "<option value= '".$row['Salle']."'>".$row['Salle']."</option>";


 
  } 

  

}

echo '</select>';
echo '</div>
<br>
<br>

<br>'; 

echo'<INPUT type="text" name="Motif" class="form-control" placeholder="activité" required>
<br>
<br>';

echo '<input type="submit" value ="visualiser" name="send" class="form-control submit">';  
echo '</form>';





   }}}

?> 
</div>

</body>
</html>