<?php 
include 'form.php'; 
echo "<style>";
include 'CSS/modif.css';
//include 'CSS/TS.css';
include 'CSS/TSSS.css';

echo "</style>"; 



 /** recherche des salles libres selon la date et les heures**/ 
function recherche_salle ($conn,$datte,$begin,$end) 
{ 
 
$salle_libre= array(); 
$position=0; 
$str='';
$sql= "select  * from time_report_ where  new_date = '".$datte."' and  ('".$begin."' BETWEEN debut AND fin or '".$end."' BETWEEN debut AND fin)
UNION 
select  * from  events where  new_date = '".$datte."' and  ('".$begin."' BETWEEN debut AND fin or '".$end."' BETWEEN debut AND fin) 
UNION 
select  * from  reservation where  new_date = '".$datte."' and  ('".$begin."' BETWEEN debut AND fin or '".$end."' BETWEEN debut AND fin);";  

$results = mysqli_query($conn,$sql); 
$resultscheck = mysqli_num_rows ($results); 

if ($resultscheck>0)  
{  
	while ($row= mysqli_fetch_assoc($results)) 
  { 
    array_splice( $salle_libre, $position, 0,$row['Salle']); 
    
    $position= $position+1;
     
  } 
} 
  
  $image= implode("','", $salle_libre);
   //echo $image; 
   $sqll= "SELECT DISTINCT Salle FROM liste_des_salles WHERE Salle NOT in ('$image');";
   $resultss = mysqli_query($conn,$sqll); 
   $resultscheckk = mysqli_num_rows ($resultss); 
   if ($resultscheckk>0)  
 {  
    echo '<form action ="reserv.php" method ="POST" >';
 	while ($roww= mysqli_fetch_assoc($resultss)) 
   {   
       
       $str.='<br/>'.'<div class="lamis">'.$roww['Salle'].'</div>'.'<input class="check" type="checkbox" value='.$roww['Salle'].' name="check[]" class="control-form" style="padding-left: 10px;
  color: white;" >'; 
       
      
    } 
    echo $str;
     echo '<input type="submit" value ="envoyer" class="form1" name="send">';  
     echo '</form>';
    
   
  }

}  
/* fonction de recherche dans le module modification */
function recherche_modif ($conn,$room,$datte,$begin,$end) 
{ 
 
$sql= "select  * from  reservation where  Salle = '".$room."' and  ('".$begin."' BETWEEN debut AND fin or '".$end."' BETWEEN debut AND fin);";

$results = mysqli_query($conn,$sql); 
$resultscheck = mysqli_num_rows ($results); 

if ($resultscheck>0)  
{  
    
   $number=1;
   


} 
else {$number=0;}  
return $number;
} 
/* visualiser les reservation de chaque club selon l'email */
function visualiser_reservation($conn,$email) 
{  

$query="SELECT * FROM User where IDUser ='".$_SESSION['IDUser']."'"; 
$results2 = mysqli_query($conn,$query); 
$row2= mysqli_fetch_assoc($results2);

$mysql="SELECT * FROM reservation where Email='".$email."'"; 
$results = mysqli_query($conn,$mysql); 
$resultscheck = mysqli_num_rows ($results); 

if ($resultscheck>0)  
{ echo "<h2 >les reservation du club ".$row2['club']."</h2>";
  echo '<div class="tab">';
    

    echo '<table class = "table-box">';
    echo '<thead>';
    echo "<tr>"; 
    echo "<th>"; echo "id";echo "</th>";
    echo "<th>"; echo "salle";echo "</th>"; 
    echo "<th>"; echo "motif";echo "</th>";
    echo "<th>"; echo "date(format)";echo "</th>";
    echo "<th>"; echo "l'heure de debut ";echo "</th>";
    echo "<th>"; echo "duration ";echo "</th>";
    echo "<th>"; echo "l'heure de fin";echo "</th>";
    echo "<th>"; echo "email";echo "</th>";

    echo "</tr>"; 
    echo "</thead>";
  while ($row= mysqli_fetch_assoc($results)) 
   { echo "<tbody>";
    echo "<tr>";
    echo"<td>".$row['id']."</td>"; 
    echo"<td>".$row['Salle']."</td>";
    echo"<td>".$row['Motif']."</td>";
    echo"<td>".$row['new_date']."</td>";
    echo"<td>".$row['debut']."</td>";
    echo"<td>".$row['Duration']."</td>";
    echo"<td>".$row['fin']."</td>";
    echo"<td>".$row['Email']."</td>";
  
    echo '<form action ="annuler.php" method ="POST" >';
    echo '<td>'.'<input type="checkbox" value='.$row['id'].' name="check[]" >';
    echo "</tr>"; 
    echo "</tbody>"; 
 }

  echo "</table>";
  echo "</div>";
  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo '<input type="submit" class="form11" value ="envoyer" name="send">';  
  echo '</form>'; 
}
}

/* visualiser les modifications faites par le club*/
function visualiser_reservation_modif($conn,$club) 
{ 

$mysql="SELECT * FROM reservation where club='".$club."'"; 
$results = mysqli_query($conn,$mysql); 
$resultscheck = mysqli_num_rows ($results); 

if ($resultscheck>0)  
{   
  echo "<h2>les reservation du club ".$club."</h2>";


   echo '<div class="tab">';
    

    echo '<table class = "table-box">';
    echo '<thead>';
    echo "<tr>"; 
    echo "<th>"; echo "id";echo "</th>";
    echo "<th>"; echo "salle";echo "</th>"; 
    echo "<th>"; echo "motif";echo "</th>";
    echo "<th>"; echo "date(format)";echo "</th>";
    echo "<th>"; echo "l'heure de debut ";echo "</th>";
    echo "<th>"; echo "code ";echo "</th>";
    echo "<th>"; echo "l'heure de fin";echo "</th>";
    echo "<th>"; echo "email";echo "</th>";
    echo "</tr>"; 
    echo '</thead>'; 
  while ($row= mysqli_fetch_assoc($results)) 
   { echo '<tbody>';
    echo "<tr>";
    echo"<td>".$row['id']."</td>"; 
    echo"<td>".$row['Salle']."</td>";
    echo"<td>".$row['Motif']."</td>";
    echo"<td>".$row['new_date']."</td>";
    echo"<td>".$row['debut']."</td>";
    echo"<td>".$row['Duration']."</td>";
    echo"<td>".$row['fin']."</td>";
    echo"<td>".$row['Email']."</td>";
    echo '<form action ="modifier.php" method ="POST" >';
    echo '<td>'.'<input type="checkbox" value='.$row['id'].' name="check[]" >';
    echo "</tr>"; 
    echo '</tbody>';
 }
  echo "</table>";
  echo "</div>";
  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo '<input class="form1" type="submit" value ="envoyer" name="send">';  
  echo '</form>'; 
}
}  
/* visualiser les demande de modification des club*/
function visualiser_demande_modif($conn) 
{ 

$mysql="SELECT * FROM modification";  
$results = mysqli_query($conn,$mysql); 
$resultscheck = mysqli_num_rows ($results); 

if ($resultscheck>0)   
{ 

   echo '<div class="tab">';
    

    echo '<table class = "table-box">';
    echo '<thead>';
    echo "<tr>"; 
    echo "<th>"; echo "id";echo "</th>";
    echo "<th>"; echo "salle";echo "</th>"; 
    echo "<th>"; echo "date";echo "</th>";
    echo "<th>"; echo "l'heure de debut";echo "</th>";
    echo "<th>"; echo "l'heure de fin";echo "</th>";
    echo "<th>"; echo "code";echo "</th>";
    echo "<th>"; echo "motif ";echo "</th>";
    echo "<th>"; echo "nouvelle_salle";echo "</th>";
    echo "<th>"; echo "nouvelle date";echo "</th>";
    echo "<th>"; echo "nouvelle heure de debut";echo "</th>";
    echo "<th>"; echo "nouvelle heure de fin";echo "</th>";
    echo "<th>"; echo "nouveau motif";echo "</th>";
    echo "<th>"; echo "Email";echo "</th>";
    echo "</tr>";
    echo '</thead>'; 
  while ($row= mysqli_fetch_assoc($results)) 
   { echo '<tbody>';

    echo "<tr>";

    echo"<td>".$row['id_reservation']."</td>"; 
    echo"<td>".$row['salle']."</td>";
    echo"<td>".$row['datte']."</td>";
    echo"<td>".$row['heure_debut']."</td>";
    echo"<td>".$row['heure_fin']."</td>";
    echo"<td>".$row['duration']."</td>";
    echo"<td>".$row['motif']."</td>";
    echo"<td>".$row['nouvelle_salle']."</td>";
    echo"<td>".$row['date_nouvelle']."</td>"; 
    echo"<td>".$row['nouvelle_heure_debut']."</td>";
    echo"<td>".$row['nouvelle_heure_fin']."</td>";
    echo"<td>".$row['nouveau_motif']."</td>";
    echo"<td>".$row['Email']."</td>";

    echo '<form action ="respo_modif.php" method ="POST" >';
    echo '<td>'.'<input type="checkbox" value='.$row['id_reservation'].' name="check[]" >';
    echo "</tr>";
    echo '</tbody>'; 
 }
  echo "</table>";
  echo "</div>";
  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo '<input class ="save" type="submit" value ="envoyer" name="send">';  
  echo '</form>'; 
}
}

 

?>  



 


 





