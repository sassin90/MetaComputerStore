<?php 
if(isset($_POST['s'])) {

try {

	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=prdOne', 'root', '', $pdo_options);
echo "1";
}
	
catch(Exception $e)
{
    
    echo"0";

}
$req = $bdd->prepare('UPDATE achats SET VALID=1  WHERE IDACHAT=?');
	$req->execute(array($_POST['s']));
   
	
}
?>