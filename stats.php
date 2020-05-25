


<?php 
include 'form.php';
/*  calcul de nombre de reservation pour chaque club*/

$query="SELECT COUNT(club) AS total FROM reservation WHERE club=\"CODE_SHARE\""; 
$results1=mysqli_query($conn, $query);     
 $res1=mysqli_fetch_assoc($results1); 
 $nbr1 = $res1["total"];
 

 $query="SELECT COUNT(club) AS total FROM reservation WHERE club=\"CSE\""; 
$results2=mysqli_query($conn, $query);     
 $res2=mysqli_fetch_assoc($results2); 
 $nbr2 = $res2["total"];


 $query="SELECT COUNT(club) AS total FROM reservation WHERE club=\"GDG\""; 
$results3=mysqli_query($conn, $query);     
 $res3=mysqli_fetch_assoc($results3); 
 $nbr3 = $res3["total"];

 $query="SELECT COUNT(club) AS total FROM reservation WHERE club=\"ETIC\""; 
$results4=mysqli_query($conn, $query);     
 $res4=mysqli_fetch_assoc($results4); 
 $nbr4 = $res4["total"];

 $query="SELECT COUNT(club) AS total FROM reservation WHERE club=\"CVE\""; 
$results5=mysqli_query($conn, $query);     
 $res5=mysqli_fetch_assoc($results5); 
 $nbr5 = $res5["total"];

 $query="SELECT COUNT(club) AS total FROM reservation WHERE club=\"SHELLMATES\""; 
$results6=mysqli_query($conn, $query);     
 $res6=mysqli_fetch_assoc($results6); 
 $nbr6 = $res6["total"];

 $query="SELECT COUNT(club) AS total FROM reservation WHERE club=\"CACE\""; 
$results7=mysqli_query($conn, $query);     
 $res7=mysqli_fetch_assoc($results7); 
 $nbr7 = $res7["total"];



?>













<!DOCTYPE html>
<html>
<head>
  <script src="js/jquery.js"></script>
  <script src="js/chart.min.js"></script>
  

  <title> statistique</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Style des icons -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Style de la page -->
  <link rel="stylesheet" href="statistique.css" type="text/css" />
  <!-- icon de la page -->
  <link rel="SHORTCUT ICON" href="./icon.png" />
  <!-- ******** -->

</head>
<body>
  <div class="khoukhou">
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
   

<div class=container>
  <div >
    <h1 style="position: relative; text-align: center;">Disturbution des clubs</h1>
    <br>
    <br>
    <br>
  </div>
  <canvas id="myChart1" width="200px " height="70px"></canvas>
   <script>
var ctx = document.getElementById("myChart1").getContext("2d");

data = {
    datasets: [{
         backgroundColor: [ 'hsl(204, 100%, 5%)',
                          'hsl(204, 100%, 15%)', 'hsl(204, 100%, 25%)', 'hsl(204, 100%, 50%)', 'hsl(204, 100%, 65%)', 'hsl(204, 100%, 85%)', 'hsl(204, 100%, 95%)' ],
               
               borderWidth: 2 ,
        data: [<?php echo $nbr1 ?>, <?php echo $nbr2 ?>, <?php echo $nbr3 ?>, <?php echo $nbr4 ?>, <?php echo $nbr5 ?>, <?php echo $nbr6 ?>,<?php echo $nbr7 ?> ]

    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    
    labels: [
        ' CODE_SHARE',
        
        ' CSE',

        ' GDG',

        ' ETIC',

        ' CVE',

        ' SHELLMATES',

        ' CACE',
    ]
     
};

var myBarChart = new Chart(ctx, {
    type: 'pie',
    data: data,
  
});

</script> 
</div>  
</body>
</html>


</div>







