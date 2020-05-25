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
        
        <li><a href="connexion.php"><i class="fa fa-lock"></i> &nbspCONNEXION</a></li>
        <li><a href="aide.php"><i class="fa fa-question-circle-o"></i> &nbspAIDE</a></li>
        <li><a href="a_propos.php"><i class="fa fa-info-circle"></i> &nbspA PROPOS</a></li>
      </ul>
    </div>
    <div>
      <h1 id="some2"> vous avez sélectionée aucune salle ! </h1>
      <form> 
        <input type="button" value="retour" name="button" onclick="history.go(-3);"> 
      </form>
      
    </div>
  </header>
</body>

</html>