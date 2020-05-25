 
<head>
    <?php 
    include('sessions.php');
   

    ?> 
</head> 

<!DOCTYPE html>
<html>
<head>
	<title>profil de responsable </title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Style des icons -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Style de la page -->
  <link rel="stylesheet" href="styleprofil22.css" type="text/css" />
  <!-- icon de la page -->
  <link rel="SHORTCUT ICON" href="./icon.png" />
  <!-- ******** -->
</head>
<body>
<header>
    <div class="profil1">
      <div class="logo">
        <img src="projet/g-salle.png" / alt="graduation" class="logo-img">
      </div>
      <ul class="main-nav">
        <!-- barre de navigation -->
        <!--<li ><a href="home.php"><i class="fa fa-home"></i><span> Retourner à la page principale</span> &nbsp ACCUEIL</a></li>-->
        <li class="active" ><a href="deconnexion.php"><i class="fa fa-lock"></i><span> Cliquer ici pour vous deconnecter</span> &nbspDECONNEXION</a></li>
        <li  ><a href="aide.php"><i class="fa fa-question-circle-o"></i><span> Obtenir de l'aide</span> &nbspAIDE</a></li>
        <li><a href="a_propos.php"><i class="fa fa-info-circle"></i><span> Lire à propos de nous</span> &nbspA PROPOS</a></li>
      </ul>
  
    
<div class="pro">
 <a href="confirmation.php"> <span> <div id="pro"> cliquer ici pour confirmer une demande de reservation</div></span> &nbsp   <p>demandes de resevation </p> </a> <?php  
  $quer="SELECT * FROM notification WHERE statut ='unread'";
  $results = mysqli_query($conn,$quer); 
  $resultscheck = mysqli_num_rows ($results); 
  if ($resultscheck>0) {
  ?>
 	 <span class="badge" > 
 
<?php echo $resultscheck; }?>

   
 </span>
</div>

<div class="pro2">
<a href="confirmation1.php"></i><span><div id="pro"> cliquer ici pour valider une demande de modification</div></span> &nbsp  demandes de modification</a> 
<?php  
  $querr="SELECT * FROM notification2 WHERE statut ='unread'";
  $resultsr = mysqli_query($conn,$querr); 
  $resultscheckr = mysqli_num_rows ($resultsr); 
  if ($resultscheckr>0) {
  ?>
   <span class="badge" > 
 
<?php echo $resultscheckr; }?>

   
 </span>
</div>

<div class="pro3">
 <a href="planning.php"></i><span><div id="pro"> cliquer ici pour visualiser le planning par salle et par période</div></span> &nbsp visualisation du planning</a>		
</div>

<div class="pro4">
 <a href="stats.php"></i><span><div id="pro"> cliquer ici pour voir les statistiques</div></span> &nbsp statistiques</a>    
</div>

</div>
</header>
</body>
</html>
