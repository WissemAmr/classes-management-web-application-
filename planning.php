
<!DOCTYPE html>
<html>
<head>
  <title>mini visualiser le planning</title>
  <link rel="stylesheet" type="text/css" href="mini_reservation.css">
  <meta charset="utf-8">

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
?>





<FORM method="POST" action="visplanning.php">
<div class="selectt" >
  <br>

<select name="salle">
<?php 

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
?>
</select>
</div> 



	  
 
	<br>
  <br>	
<br>
<br>




<label> Date de début:</label>
<br>
<br>
<input type="date" name="date_debut" class="form-control" placeholder="Date de début" required >  
  
<br>
<br>

<label> Date de fin :</label>
<br>
<br>
<input type="date" name="date_fin" class="form-control" placeholder="Date de fin" required >  
  
<br>
<br>
<br>
<br>
<br>
<br>




<INPUT type="submit" class="form1" value="visualiser" name="visualiser" required >
</div>
</body>

</html>
