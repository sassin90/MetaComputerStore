<?php 

session_start();

if(isset($_POST['nom'] ) && isset($_POST['pass'])){
$_POST['nom'] = htmlspecialchars($_POST['nom']);
$_POST['pass'] = htmlspecialchars($_POST['pass']);
try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=prdOne', 'root', '', $pdo_options);
	$req = $bdd->prepare('SELECT * FROM admins WHERE pseudo = ? AND Mot_de_passe= ?');
	$req->execute(array($_POST['nom'],$_POST['pass']));
    while($donnees = $req->fetch())
	{
    
$_SESSION['pseudo']=$_POST['nom'];  
$_SESSION['Mot_de_passe']=$_POST['pass']; 

    $req->closeCursor(); 
	
}
}
catch(Exception $e)
{
    
    die('Erreur : '.$e->getMessage());

}

}

if(isset($_SESSION['pseudo']) && isset($_SESSION['Mot_de_passe'])
 && $_SESSION['pseudo']==$_POST['nom'] && $_SESSION['Mot_de_passe']==$_POST['pass']){?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>

  <meta http-equiv="content-type" content="text/html; charset=windows-1252 " /><meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
 <script type="text/javascript" src="js/scripto.js"></script>
 <script src="js/jquery-1.7.2.min.js"></script>
 
</head>

<body valign="center">
	<h2><center>Validation Des Produit</center></h2><br><br>
	 <table width="80%"	style="margin:  auto; ">
	 <tr>
 <td id="prd1">Date</td><td id="prd1">Adresse IP </td> <td id="prd1">E-mail  </td> <td id="prd1">Nom  </td> <td id="prd1">Adresse  </td> <td id="prd1">Produit  </td> <td id="prd1">Refer  </td> <td id="prd1">prix  </td> <td >  </td>
</tr>
<?php 
$reponse = $bdd->query('SELECT achats.*,acheter.*,client.*,produit.* FROM achats,acheter,client,produit where achats.IDACHAT=acheter.IDACHAT && achats.IDPRODUIT=produit.IDPRODUIT && acheter.IDCLIENT=client.IDCLIENT && achats.VALID=0 ');   
	while ($donnees = $reponse->fetch() )
    {
echo"<tr><td id='prd1'>".$donnees['DATE']."</td>";		
echo"<td id='prd1'>".$donnees['IP']."</td>";
echo"<td id='prd1'>".$donnees['EMAIL']."</td>";
echo"<td id='prd1'>".$donnees['NOM']."</td>";
echo"<td id='prd1'>".$donnees['ADRESSE']."</td>";
echo"<td id='prd1'>".$donnees['NOMP']."</td>";
echo"<td id='prd1'>".$donnees['REF']."</td>";
echo"<td id='prd1'>".$donnees['PRIXX']."</td>";

echo"<td ><input id='valider' value='Valider' class='".$donnees['IDACHAT']."' type='button'/></td></tr>";

   
}
 $reponse->closeCursor();
?>

 	
 </table><center>
 		<a href="deco.php">Se deconnecter</a>
 	</center></body></html>
<?php }
else header('Location: index.php');
?>