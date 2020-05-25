<!DOCTYPE html>
<html>

<head>
  <title> envoi du mail </title>
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
      <h1 id="some" style="margin-top:200px; margin-left: 150px;"> un mail  de confirmation est envoyé au club</h1>
      
    </div>
 <form> 
        <input type="button" class="form1" value="retour" name="button" onclick="history.go(-2);"> 
    </form>
  </header>
</body>

</html>























<?php  
require 'C:\wamp64\PHPMailer-master\PHPMailer-5.2-stable/PHPMailerAutoload.php';
include 'form.php'; 

 if(!isset($_POST['check']))  
       { 
          header("Location:no_select.php");
          exit();

       }
   

if(isset($_POST['send'])) 
    { 

      $checkbox1=$_POST['check'];
      $word="";
      foreach ($checkbox1 as $word2)
{ 
   $quert="UPDATE  notification SET statut='read' where id='".$word2."'"; 
   mysqli_query($conn,$quert);
   $mini="SELECT * from demande_de_reservation WHERE ID= '".$word2."'"; 
   $reesults = mysqli_query($conn,$mini); 
   $ressultscheck = mysqli_num_rows ($reesults);  
   while ($rowww= mysqli_fetch_assoc($reesults)) 
   { 
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username ="wiss0508@gmail.com";
   $mail ->Password ="080519wiss";
   $mail ->SetFrom("wiss0508@gmail.com","administration.esi");
   $mail ->Subject = "Gsalle";
   $mail ->Body = "votre reservation a été confirmée";
   $mail ->AddAddress($rowww['Email']);

   
  
    $mysql2= "insert into reservation (club,Email,Motif,new_date,debut,fin,Duration,Salle) VALUES ('".$rowww['club']."' , '".$rowww['Email']."', '".$rowww['Motif']."','".$rowww['new_date']."','".$rowww['debut']."','".$rowww['fin']."','".$rowww['duration']."','".$rowww['Salle']."');"; 
       $resultss = mysqli_query($conn,$mysql2);  
       $mysql3="DELETE FROM demande_de_reservation WHERE ID= '".$word2."'"; 
       $resultsss= mysqli_query($conn,$mysql3);
      
    

   
} 
} 
} 






   