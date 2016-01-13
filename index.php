<!DOCTYPE HTML PU leurBLIC "-//W3C//DTD HTML 4.01 Transitional//FR">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

	<title>MetaComp</title>
	<link href="style.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
</head>
<body>
<script type="text/javascript" src="jquery.min.js" ></script> <br/><br/>
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
	<td>&nbsp;</td>
	<td width="800" class="grisbotle4" >
		<table width=100% >
			<tr valign=top >
				<td align="center" width=80% >
					<div id="title" valign=top  align="center">
						<a  href="index.php">METACOMPUTER</a>&nbsp;
						<b id="id12"> Engineering </b>
					</div>
				</td>
				<td><div style="padding-top:100;border-right:1px dotted #AAA"></td>
				<td>
					<div id="loogin">
					<table valign=top>
						<tr valign=top >
							<td valign=top >
								<form method="post" action="admini.php">   
									<table width="100%" align="center">
										<tr>
											<td></td> 
											<td><input type="text" size="14" name="nom"  placeholder=Pseudo required /></td>
										</tr>
										<tr>
											<td></td>
											<td><input type="password" size="14" name="pass" placeholder=Password  required/></td>
										</tr>
										<tr>	
											<td></td>
											<td align="center"><input class="bar1" type="submit" value="S'identifier" /></td>
										</tr>
									</table>
								</form>
							</td>
						</tr>
					</table>
					</div>
				</td>
			</tr>
		</table>
	</td>
	<td>&nbsp;</td>
</tr>
<tr height=4px">
	<td>&nbsp;</td>
	<td></td>
	<td>&nbsp;</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td width="800" class="grisbotle4" >
		<div style="padding:1px;background-color:#181818"></div>		
		<div id="bodiv">	
<form action="remplissage.php" method="post">
<!--	Debut AFFICHAGE   -->
<table width="800">
<tr valign=top>
	<td   class="grisbotle7" width="190" >
		<div id="redbotle2" style="color:#FDD130">
			TOUS LES PRODUITS
			<div style="color:eee;font-size:13;font-family:'2'">
				Vous trouvrez ici la liste de tous nos produits
				<div style="padding-top:13px; border-bottom:1px dotted #AAA"></div>
				Metacomputer<br/><br/>
			</div>
		</div>
	</td>
	<td width="13.33"></td>
<?php
try
{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=prdOne', 'root', '', $pdo_options);
	$liste_de_produits=$bdd->query('SELECT * FROM produit WHERE VALIDE=1');
	$i=1;	
while ($ligne = $liste_de_produits->fetch())
{
	$i++;
	if($i%4==1) echo '<tr valign="top">';
	$k=$i-1;
	echo '
	<td class="grisbotle0" width="190" border="0" cellspacing="0" cellpadding="0" >
		<div id="redbotle2" style="color:#D01818">
			'.$ligne['NOMP'].'
			<div style="color:#555;font-size:13">
				'.$ligne['DESCRIPTION'].'
				<div style="padding-top:13px; border-bottom:1px dotted #AAA"></div>
				Prix : '.$ligne['PRIX'].' DH<br/><br/>
				<center style="color:#000">Acheter<input name="box[]" type="checkbox" value="'.$ligne['IDPRODUIT'].'" id="'.$ligne['IDPRODUIT'].'" class="'.$ligne['PRIX'].'" > </center></td>
			</div>
		</div>
	</td>';
	if($i%4!=0)	echo '<td width="13.33"></td>';
	else 
		echo '
		</tr>
		<tr height="13.33">
		</tr>';
}
	$boucle = 4 - ($i%4);
	if(($i)%4!=0){
		for($j=1 ;$j<$boucle  ;$j++){
			echo   '<td width=190></td>
					<td width=13.33></td>
			';
		}
		echo '<td width=190></td></tr>';
	}

	$liste_de_produits->closeCursor();
}
catch(Exception $ex)
{
	die('Erreur : '.$ex->getMessage());
}

?>
</table>
<!--	Fine AFFICHAGE  --->


<!-- Debut PRDS SELECTIONNEES -->

<table width="800" align="center"><tr><td class="grisbotle11"><div id="redbotle2" style="color:#000; font-family:'2' ">
	<font style="color:#D01818">Liste des produits selectionnees</font>
	<div style="padding-top:1px; border-bottom:1px dotted #AAA"></div>
<?php
try
{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=prdOne', 'root', '', $pdo_options);
	$liste_des_achats=$bdd->query('SELECT * FROM produit WHERE VALIDE=1');
	echo '<ul id="menu10">';
	while ($ligne = $liste_des_achats->fetch())
	{
		//echo '<font id="id4"><div id="d'.$ligne['IDPRODUIT'].'"><font id="prixo"> '.$ligne['NOMP'].' </font><font id="prixo">'.$ligne['PRIX'].' Dh</font></div></font>';
		echo '<li id="d'.$ligne['IDPRODUIT'].'">'.$ligne['NOMP'].' <br/>'.$ligne['PRIX'].' Dh</li>';
	}
	echo '</ul><br/><br/><br/>';
	$liste_des_achats->closeCursor();
}
catch(Exception $ex)
{
	die('Erreur : '.$ex->getMessage());
}
?>	
	<font id="bold1">&nbsp;&nbsp;Total &nbsp;&nbsp;&nbsp;&nbsp;<input id="total"  type="text" size="15" name="total" value="0" readonly="true"/></font>
	<br/><br/>

<!-- Fine PRDS SELECTIONNEES --->
		<div style="padding-top:1px; border-bottom:1px dotted #AAA"></div><br/>
		<table width="100%" align="center" border=0>
			<tr valign=top>
				<td  width="50%" id="id5" align="center">Informations personnelles<br/></td>
				<td><div style="padding-top:28;border-right:1px dotted #AAA"></td>
				<td  width="50%" id="id5" align="center">Mode de paiement<br/></td>
			</tr>
		</table>
		<table width="100%" align="center" border=0>
			<tr valign=top>
				<td width="50%">
					<table width="100%" valign=top>
						<tr>
							<td width="40%" style="color:#111" align="right"  >Nom</td> 
							<td align="center"><input type="text" size="20" name="nom" class=barre onFocus="this.style.backgroundColor='#FDD130';this.style.color='#000'" onBlur="this.style.backgroundColor='#000';this.style.color='#fff';" required /></td>
						</tr>
						<tr>
							<td style="color:#111" align="right"  >E-mail </td> 
							<td align="center"><input type="text" size="20" name="mail" class=barre onFocus="this.style.backgroundColor='#FDD130';this.style.color='#000'" onBlur="this.style.backgroundColor='#000';this.style.color='#fff'" required /></td>
						</tr>
						<tr>
							<td style="color:#111" align="right"  >Password </td>
							<td align="center"><input type="password" size="20" name="password" class=barre onFocus="this.style.backgroundColor='#FDD130';this.style.color='#000'" onBlur="this.style.backgroundColor='#000';this.style.color='#fff';" required/></td>
						</tr>
						<tr>
							<td style="color:#111" align="right"  >Telephone </td> 
							<td align="center"><input type="text" size="20" name="telephone" class=barre onFocus="this.style.backgroundColor='#FDD130';this.style.color='#000'" onBlur="this.style.backgroundColor='#000';this.style.color='#fff';" /></td>
						</tr>
						<tr>
							<td style="color:#111" align="right"  >Adresse </td> 
							<td align="center"><input type="text" size="20" name="adresse"  class=barre onFocus="this.style.backgroundColor='#FDD130';this.style.color='#000'" onBlur="this.style.backgroundColor='#000';this.style.color='#fff';" /></td>
						</tr>
					</table>
				</td>
				<td><div style="padding-top:150;border-right:1px dotted #AAA"></td>
				<td width="50%">
					<table width=100% valign=top>
						<tr valign=top>
							<td align="center" width=20% style="color:#111;" >&nbsp;<input type="radio" id="bnq" class=barre size="20" name="paiment" value="carte"/></td>
							<td align="left"  width=80%><label>Par Carte Bancaire</label><br/><input type="text" size="20" name="Ncarte" class=barreyellow readonly=true value="1692925160" placeholder="No Carte Bancaire"/><br/><input type="text" size="20" name="ref" class=barre onFocus="this.style.backgroundColor='#FDD130';this.style.color='#000'" onBlur="this.style.backgroundColor='#000';this.style.color='#fff';" placeholder="Reference"/></td>
						</tr>
						<tr valign=top>
							<td align="center" style="color:#111;" >&nbsp;<input type="radio" size="20" id="ppl" checked=checked name="paiment" value="paypal" class=barre/></td>
							<td align="left"><label><a href=""><img  src="image/paypal-logo.png"/></a></label></td>
						</tr>
						<tr valign=top>
							<td align="center"></td>
							<td align="left"><br/><input class="bar1" type="submit" value="Valider" /></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
</div></td></tr></table>
	</form>

<!-- F O O T E R -->
	<br/><br/><br/><br/><br/><br/>
	<div style="padding-top:13px; border-bottom:1px dotted #AAA"></div><br/>
	</div>
</td>
<td>&nbsp;</td>
</tr>
</table>
<br/>
<br/>
<script type="text/javascript">
var total=0;
$('#total').val(total);
<?php
try
{	
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=prdOne', 'root', '', $pdo_options);
	$ID=$bdd->query('SELECT * FROM produit WHERE VALIDE=1');
	while ($ligne = $ID->fetch())
	{
?>
var a<?php echo $ligne['IDPRODUIT']; ?>=1;
$('#d<?php echo $ligne['IDPRODUIT']; ?>').slideToggle();
$('#<?php echo $ligne['IDPRODUIT']; ?>').change(function(){
					$('#d<?php echo $ligne['IDPRODUIT']; ?>').slideToggle(); 
					a<?php echo $ligne['IDPRODUIT']; ?>++;
					if(a<?php echo $ligne['IDPRODUIT']; ?>%2==0){	
						total+=parseInt($(this).attr("class"));
						$(this).parent().parent().parent().parent().attr("class","grisbotle8");
					}
					else{	
						total-=parseInt($(this).attr("class"));
						$(this).parent().parent().parent().parent().attr("class","grisbotle0");
					}
					$('#total').val(total);
					
				}
		);

<?php
	}
	$ID->closeCursor();
}
catch(Exception $ex)
{
	die('Erreur : '.$ex->getMessage());
}
?>

</script>
<script type="text/javascript">
$("input#bnq").parent().next("td").children("input").hide();
$("input#ppl").click(function()
	
	{
	$("input#bnq").parent().next("td").children("input").hide();}
	
	);
	$("input#bnq").click(function()
	
	{
	$("input#bnq").parent().next("td").children("input").show();}
	
	);
</script>
</body>
</html>


<style>
	#id8{
	font-size:22px;
	}
	#id8g{
	font-size:22px;
	color:green;
	}
	#id12{
	font-size:30px;
	color:#D01818;
	}
	#id10{
	font-size:22px;
	}
	#id6{
	font-size:18px;
	color:#D01818;
	}
	#id5{
	font-size:18px;
	color:#555;
	}
	#bold1,#total{
		font-size:14px;
		color:#D01818;
		font-family:'1';
	}
	#id4{font-size:14px; font-family:'2'; color:#333;}
	#id2{font-size:20px}
	#id24{font-size:24px;}
	#id21{font-size:21px;}
	#prixo{
	padding-left:50px;
	padding-right:10px;
	}
	
</style>