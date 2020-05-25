<?php  
/* le code de connexion selon le type d'utilisateur */
include 'form.php'; 
session_start(); 
if (isset($_POST['formconnexion'])) 
{
$Login = $_POST['Login']; 
$Password = ($_POST['Password']); 

$query ="SELECT * FROM user WHERE Email ='".$Login."' AND Password ='".$Password."' "; 
$results = mysqli_query($conn,$query); 
$row= mysqli_fetch_assoc($results);
if ($row['Email']==$Login  && $row['Password']==$Password )  
{   
    
    $_SESSION['IDUser']=$row['IDUser'];
    $query2="SELECT `Type` FROM `user` WHERE `Email`='".$row['Email']."'"; 
    $results2 = mysqli_query($conn,$query2); 
    $resultscheck2 = mysqli_num_rows ($results2); 
    $row2= mysqli_fetch_assoc($results2);

    if ($row2['Type']=="responsable") 
      { 
        header("Location: profil_respo.php?IDUser=".$_SESSION['IDUser']);
      }
    else if ($row2['Type']=="club") 
      { 
        header("Location: profil_respo1.php?IDUser=".$_SESSION['IDUser']);
      }
} 
else  
  echo '<script type ="text/javascript">alert ("verifier votre email");</script>';
 
}
?> 




<html>
<head>
  <title>Connexion</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Style des icons -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Style de la page -->
  <link rel="stylesheet" type="text/css" href="style_connexion2.css">
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
             <li><a href="home.php"><i class="fa fa-home"></i><span> Retourner à la page principale</span> &nbspACCUEIL</a></li>
             <li><a href="aide.php"><i class="fa fa-question-circle-o"></i><span> Obtenir de l'aide</span> &nbspAIDE</a></li>
             <li><a href="a_propos.php"><i class="fa fa-info-circle"></i><span> Lire à propos de nous</span> &nbspA PROPOS</a></li>
           </ul>
         </div>

  <div class="loginbox">
  <h1> Connectez-vous ici </h1>
  <form method="POST" action="">
  <div class="avatar">
   <img src="projet/avatar.png"/ alt="avatar" class="avatar-img">
  </div>
  <form>
    <p>  Email </p>
    <input type="email" class="Email" name="Login" placeholder="Exemple@esi.dz" id=Login="Login"/>
    <p>    Mot de passe </p>
    <input type="password" class="mot2pass" name="Password" placeholder="Entrer le mot de passe" id=Passwork="Password"/>
    <br/>
    <br/>
    <input class="save" type="submit" name="formconnexion"  value="CONNEXION" />
    <br/>
    </form>
  
  </form>
  </div>
</header>
</body>


</html>