<?php 
include_once 'form.php';
include_once 'function.php';

/*  l'insertion de reservation aprés la confirmation du email*/
 
$namme = $_POST['namme']; 
$email = $_POST['email'] ; 
$Motif= $_POST ['Motif']; 
$date_debut=$_POST['date_debut']; 
$heure = $_POST['heure']; 
$heure_fin = $_POST['heure_fin'];
$Duration = $_POST['Duration'];

 
$newDate = date("Y-m-d", strtotime($date_debut));


      if (isset($_POST['submit'])) 
 {  	
       	




        	$sql="INSERT INTO reservation (club,Email,Motif,new_date,debut,fin,duration) VALUES ('$namme','$email','$Motif','$date_debut','$heure','$heure_fin','$Duration');"; 
        	if (mysqli_query ($conn,$sql)) 
        		{  
        			echo "reservation terminee";
        		} 

       	
            
}  



   if (isset($_POST['Afficher']))  
{ 
     
     echo recherche_salle ($conn,$newDate,$heure,$heure_fin);
     
} 


 ?>