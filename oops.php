<!DOCTYPE html>
<html>
<head>
  <title>table salle</title>
  <link rel="stylesheet" type="text/css" href="TSS.css">
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

</head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
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
<body>

  <div class="formulaire">
   <div class="row">
 <div class="logo">
        <img src="projet/g-salle.png" / alt="graduation" class="logo-img">
      </div>
           <ul class="main-nav"> 

             <li><a href="home.php"><i class="fa fa-home"></i><span> Retourner à la page principale</span> &nbspACCUEIL</a></li>
             <li   class="active"><a href="deconnexion.php"><i class="fa fa-lock"></i><span> Cliquer ici pour vous deconnecter</span> &nbspDECONNEXION</a></li>
             <li><a><i class="fa fa-question-circle-o"></i><span> <button style="border: none;color:#fff;background-color:black; " id="myBtn">Obtenir d aide</button></span> &nbspAIDE</a></li>
             <li><a href="a_propos.php"><i class="fa fa-info-circle"></i><span> Lire à propos de nous</span> &nbspA PROPOS</a></li>
           </ul>
         </div> 
         <div>
      <h1 style="  position: absolute;
  color: white;
  text-transform: uppercase;
  font-size: 40px;
  text-align: center;
  margin-left: 390px;
  margin-top: 300px;
  font-family: "Roboto", cursive;
  float: right;"> reservation terminée </h1>
      
    </div>
    <form> 
        <input type="button" value="retour" name="button" onclick="history.go(-3);"> 
    </form> 
  </div>
  <!-- Trigger/Open The Modal -->


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
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

=































 