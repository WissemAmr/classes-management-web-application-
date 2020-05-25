<?php 
include('sessions.php');
include_once 'form.php';
include_once 'function.php'; 

?> 

 
<!--  ce code est pour le formulaire de reservation
--> 


<!DOCTYPE html>
<html>
<head>
  <title>reservation</title>
  <link rel="stylesheet" type="text/css" href="reservation.css">
  <meta charset="utf-8"> 
  <script type="text/javascript" src="C:\wamp64\www\site\jequery.js"></script> 


</head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* le model de page d'aide concu avec model css*/
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
<body >

  <div class="formulaire">
   <div class="row">
 <div class="logo">
        <img src="projet/g-salle.png" / alt="graduation" class="logo-img">
      </div>
           <ul class="main-nav">
             
             <li   class="active"><a href="deconnexion.php"><i class="fa fa-lock"></i><span> Cliquer ici pour vous connecter</span> &nbspDECONNEXION</a></li>
             <li><a><i class="fa fa-question-circle-o"></i><span> <button style="border: none;color:#fff;background-color:black; " id="myBtn">Obtenir d aide</button></span> &nbspAIDE</a></li>
             <li><a href="a_propos.php"><i class="fa fa-info-circle"></i><span> Lire à propos de nous</span> &nbspA PROPOS</a></li>
           </ul>
         </div>



    
  
    
  <FORM method="POST" action="load-comments.php" id="frmbox" onsubmit="  return forsubmit()" >

    
      
    <INPUT  type="text" name="namme" class="form-control" placeholder="votre nom et prénom" required  style="margin-top: 40px;">
    
<br>
<br>


<INPUT type="text" name="matricule" class="form-control" placeholder="votre matricule" required >
<br>
<br>

<INPUT type="text" name="role" class="form-control" placeholder="votre role dans le club" required>
<br>
<br>

<INPUT type="text" name="Motif" class="form-control" placeholder="motif" required>
<br>
<br>


<label> Date :</label>
<br>
<br>
<input type="date" name="date_debut" class="form-control" placeholder="Date de début" required >  
  
<br>
<br>
=

<label> Heure de début:</label>
<br>
<br>
<input type="time" name="heure" class="form-control" placeholder="heure de debut" required>
<br>
<br> 


<label> heure de fin :</label>
<br>
<br>
<INPUT type="time" name="heure_fin" class="form-control" placeholder="heure de fin" required>
<br>
<br>


<label> code de confirmation de la DE :</label>
<br>
<br>
<INPUT type="text" name="Duration" class="form-control" placeholder="code" required>
<br>





<INPUT type="submit" class="form1" value="Afficher" name="Afficher" required >
<br> 
<div id="success"></div>


<!-- pour eviter l'actualisation de la page et la perte des données on utlise ajax pour transferer les données -->

<script type="text/javascript">


      function forsubmit()
      { 
        $("form#frmbox").submit(
          
        
      




        $.ajax({
        type:"POST",
        url:'load-comments.php',
        data:$('#frmbox').serialize(),
        success:function(response)
        {
          $('#success').html(response);
        }




      }); 

        function(event)
      {   event.preventDefault();
        event.stopImmediatePropagation();
      
      // var form=document.getElementid('frmbox').reset();
      // return false;




      });}
      




  </script> 
  





   

   


</FORM>

</div>



<!-- Tpage d'aide de reservation -->


<!-- le modele de css -->
<div id="myModal" class="modal">

  <!-- le contenu t -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p><div id="conteneur" >    
    <h1 id="header" ><a title="Colored Design - Accueil"><span>Comment faire pour réserver une salle pour un évenement ?</span></a></h1>

    <p>
      Pour réserver une salle pour un évenement :
      <br>
      1 Cliquez sur "Réservation" en haut à droite.
      <br>
     2 Remplir le formulaire avec vos données personnels en précisons la salle, la date de debut et fin de l'évenement .
      <br>
      3 Cliquez sur réserver pour envoyer vos informations .
      <br>
      4 Si tous les informations sont correctes , vous recevrez un mail de confirmation 
    </p></p>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>