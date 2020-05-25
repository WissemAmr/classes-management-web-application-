<?php 
include 'form.php'; 
echo "<style>";
include 'CSS/reservcss.css';
echo "</style>";  
?>
<!DOCTYPE html>
<html>
<head>
    <title>confirmer une demande de reservation </title>
    <link rel="stylesheet" type="text/css" href="reservcsss.css">
    <meta charset="utf-8"> 
    <script type="text/javascript" src="C:\wamp64\www\site\jequery.js"></script> 


</head>
<body >
 <header>
  <div class="row">

    
     <div class="logo">
        <img src="projet/g-salle.png" / alt="graduation" class="logo-img">
          </div>
           <ul class="main-nav">
             
             <li   class="active"><a href="deconnexion.php"><i class="fa fa-lock"></i><span> Cliquer ici pour vous deconnecter</span> &nbspDECONNEXION</a></li>
             <li><a href="aide.php"><i class="fa fa-question-circle-o"></i><span> Obtenir de l'aide</span> &nbspAIDE</a></li>
             <li><a href="a_propos.php"><i class="fa fa-info-circle"></i><span> Lire Ã  propos de nous</span> &nbspA PROPOS</a></li>
             
           </ul>
    </div> 
  




<?php 
/*  fonction qui affiche les demandes de modification du club et les confirme par envoi du mail*/
function visualiser_demande () 
{ 
	global $conn;
    
$sql= "select  * from demande_de_reservation;";

$results = mysqli_query($conn,$sql); 
$resultscheck = mysqli_num_rows ($results);  

if ($resultscheck>0)  
{   echo "<div  class ='tab'>";

    echo "<table class = 'table-box'>"; 
    echo '<thead>';
    echo "<tr>"; 
    echo "<th>"; echo "id";echo "</th>";
    echo "<th>"; echo "salle";echo "</th>"; 
    echo "<th>"; echo "motif";echo "</th>";
    echo "<th>"; echo "code de la DE";echo "</th>";
    echo "<th>"; echo "date(format)";echo "</th>";
    echo "<th>"; echo "l'heure de debut ";echo "</th>";
    echo "<th>"; echo "l'heure de fin";echo "</th>";
    echo "<th>"; echo "club";echo "</th>";
    echo "<th>"; echo "email";echo "</th>";
    echo "</tr>";  
    echo "</thead>";
	while ($row= mysqli_fetch_assoc($results)) 
  { echo '<tbody>';


    echo "<tr>";
    echo"<td>".$row['ID']."</td>"; 
    echo"<td>".$row['Salle']."</td>";
    echo"<td>".$row['Motif']."</td>";
    echo"<td>".$row['duration']."</td>";
    echo"<td>".$row['new_date']."</td>";
    echo"<td>".$row['debut']."</td>";
    echo"<td>".$row['fin']."</td>";
    echo"<td>".$row['club']."</td>";
    echo"<td>".$row['Email']."</td>";
    echo '<form action ="send.php" method ="POST" >';
    echo '<td>'.'<input type="checkbox" value='.$row['ID'].' name="check[]" >';
    echo "</tr>";
    echo "</tbody>"; 
 }
  echo "</table>";
  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo '<input class="save" type="submit" value ="envoyer" name="send">';  
  echo '</form>'; 
}
} 


visualiser_demande();
?>
</header>
</body>
</html>



