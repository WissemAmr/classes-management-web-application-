<?php 
include 'form.php'; 
echo "<style>";
include 'CSS/mini_reservation.css';
echo "</style>"; 
//** fonction qui visualise le planning de chaque salle dans une période**//
 function visualiser ($salle,$date_debut,$date_fin) 

{ global $conn; 

$sql= "select  * from time_report_ where Salle = '".$salle."' and (new_date BETWEEN '".$date_debut."' AND '".$date_fin."')
UNION 
select  * from events where Salle = '".$salle."' and  (new_date BETWEEN '".$date_debut."' AND '".$date_fin."')
UNION 
select  * from time_report_ where Salle = '".$salle."' and (new_date BETWEEN '".$date_debut."' AND '".$date_fin."');";    
$results = mysqli_query($conn,$sql); 
$resultscheck = mysqli_num_rows ($results);   
if ($resultscheck>0)  
{   echo '<div class="tab">';
    

    echo '<table class = "table-box">';
    echo '<thead>';
    echo "<tr>"; 
    echo "<th>"; echo "salle";echo "</th>";
    echo "<th>"; echo "date";echo "</th>"; 
    echo "<th>"; echo "l'heure de debut";echo "</th>"; 
    echo "<th>"; echo "l'heure de fin";echo "</th>";
    echo "</tr>";
    echo "</thead>";
	while ($row= mysqli_fetch_assoc($results)) 
  { echo "<tbody>";

    echo "<tr>";
    echo"<td>".$row['Salle']."</td>"; 
    echo"<td>".$row['new_date']."</td>";
    echo"<td>".$row['debut']."</td>";
    echo"<td>".$row['fin']."</td>";
    echo "</tr>";
    echo "</tbody>"; 
}
  echo "</table>";
  echo "</div>";
  echo "<br>";
  echo "<br>";
  echo "<br>"; 
}
}

 






