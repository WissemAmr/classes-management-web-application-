<!DOCTYPE html>
<html>

<head>
  <title> demande effectuee</title>
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
        <li><a href="home.php"><i class="fa fa-home"></i><span> Retourner Ã  la page principale</span> &nbspACCUEIL</a></li>
             <li   class="active"><a href="deconnexion.php"><i class="fa fa-lock"></i><span> Cliquer ici pour vous deconnecter</span> &nbspDECONNEXION</a></li>
             <li><a href="aide.php"><i class="fa fa-question-circle-o"></i><span> Obtenir de l'aide</span> &nbspAIDE</a></li>
             <li><a href="a_propos.php"><i class="fa fa-info-circle"></i><span> Lire Ã  propos de nous</span> &nbspA PROPOS</a></li>
      </ul>
    </div>
    <div>
      <h1 style="margin-left: 450px;
  margin-top: 200px; margin-right: 300px;">           Demande éffectuée ! </h1>
  <form> 
        <input type="button" class="form1" value="retour" name="button" onclick="history.go(-3);"> 
    </form> 
      
    </div>
  </header>
</body>

</html>




















<?php 
session_start();
include 'form.php';
include 'function.php'; 
 
/* récuperation des données d'apres le formulaire */
if(isset($_POST['send']))  
{  
	if (isset($_POST['salle']))
    {
     $namme= $_POST['salle'];} 
    if (isset($_POST['date_debut'])) 
    {$date_debut=$_POST['date_debut'];}
    if (isset($_POST['heure'])) 
    { 
     $heure= $_POST['heure'];}
    if (isset($_POST['heure_fin'])) 
    { 
     $heure_fin= $_POST['heure_fin'];}
     if (isset($_POST['Motif'])) 
    {
     $Motif= $_POST ['Motif'];} 

    


    
     $newDate= date("Y-m-d", strtotime($date_debut));
     /* insertion de demande au niveau du table modification */

     $queries="INSERT into modification(id_reservation,salle,datte,heure_debut,heure_fin,duration,motif,Email,nouvelle_salle,date_nouvelle,nouvelle_heure_debut,nouvelle_heure_fin,nouveau_motif,club) values ('".$_SESSION['ID']."' ,'".$_SESSION['room']."','".$_SESSION['date']."','".$_SESSION['beg']."','".$_SESSION['end']."','".$_SESSION['Duration']."','".$_SESSION['why']."','".$_SESSION['email']."','".$namme."','".$newDate."','".$heure."','".$heure_fin."','".$Motif."','".$_SESSION['club']."')"; 
     $reesults = mysqli_query($conn,$queries); 
     $arbre="INSERT INTO notification2(id,statut) values ('".$_SESSION['ID']."','unread')"; /* notification de demande de reservation*/
     $reesultsr = mysqli_query($conn,$arbre); 

        



       
     






} 

 
