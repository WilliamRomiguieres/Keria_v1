<?php
session_start();
if(!empty($_SESSION['pseudo']))
{
include("connect.php");
include("utilitaires/bot.php");
function maximum($lvl,$domaine)
{
include("connect.php");
$wala='SELECT * FROM jobs WHERE lvl_min<=\''. $lvl .'\' AND lvl_max>=\''. $lvl .'\' AND domaine=\''. $domaine .'\'';
$req=$bdd->query($wala);
$donnees=$req->fetch();
$max[0]=$donnees['maximum'];
$max[1]=$donnees['raportation'];
return $max;
}?>
<head>
<title>Keria</title>
 <link rel="stylesheet" media="screen" type="text/css" title="Design" href="design.css" />
</head>
<body>
<table>
<div id="banniere">
<?php
include("banniere.php");?>
</table>
</div>
<table>
<?php
include("/utilitaires/post22.php");
?>
</table>
<div id="info">
<table>
<?php
include('informations.php');?>
</table>
</div>
<div id="menu">
<table>
<?php
include("menu.php");?>
</table>
</div>
<div id="corps">
<?php
if(!empty($_POST['ha_true']) AND $_POST['ha_true']==1)
{?>
<table>
<tr>
<td Style="background-color: green;">Augmentation réussie !</td>
</tr>
</table>
<?php
}
if(!empty($_POST['ha_true']) AND $_POST['ha_true']==2)
{?>
<table>
<tr>
<td Style="background-color: red;">Tu n'as pas assez d'argent !</td>
</tr>
</table>
<?php
}
if(!empty($_POST['ha_true']) AND $_POST['ha_true']==3)
{?>
<table>
<tr>
<td Style="background-color: red;">A ton niveau tu ne peux pas en faire autant !</td>
</tr>
</table>
<?php
}
if(!empty($_POST['ha_true']) AND $_POST['ha_true']==4)
{?>
<table>
<tr>
<td Style="background-color: red;">Mauvais caractères !</td>
</tr>
</table>
<?php
}
$ou_max=maximum($oran['lvl'],'ouvriers');
$hab_max=maximum($oran['lvl'],'habitants');
?>
<table><td Style="width: 222px;"><a href="gestion.php">Armée</a></td><td Style="background-color: blue;">Jobs</td></table>
<table>
<tr>
<td><img src="images/ouvrier.png" alt="Ouvriers"/></td>
<td><a href="plus_dinf.php?page=Ouvriers"/>Plus d'infos ?</a><br/>Tu as <?php echo $inf['ouvriers'];?> ouvriers. Un ouvrier rapporte <?php echo $ou_max[1];?> de superficie par heure. Maximum: <?php echo $ou_max[0];?>.Tu veux en rajouter 
combien ?<br/> Prix: 3or
<form method="post" action="jobs.php">
<input type="text" name="ouvriers"/> 
<input type="submit" value="Ok !"/>
</form></td>
</tr>
<tr>
<td><img src="images/habitants.png" alt="Habitants"/></td>
<td><a href="plus_dinf.php?page=Habitants"/>Plus d'infos ?</a><br/>Tu as <?php echo $inf['habitants'];?> habitants. Un habitant paye <?php echo $hab_max[1];?> or par heure. Maximum: <?php echo $hab_max[0];?>. Tu veux en rajouter 
combien ? <br/> Prix: 3 or
<form method="post" action="jobs.php">
<input type="text" name="habitants"/> 
<input type="submit" value="Ok !"/>
</form></td>
</tr>
<tr>
<td><img src="images/agriculteur.png" alt="Agriculteurs"/></td>
<td><a href="plus_dinf.php?page=Agriculteurs"/>Plus d'infos ?</a><br/>Tu as <?php echo $inf['agriculteurs'];?> agriculteurs. Un argriculteur paye <?php echo $hab_max[1];?> or par heure. Maximum: <?php echo $hab_max[0];?>. Tu veux en rajouter 
combien ? <br/> Prix: 3 or
<form method="post" action="jobs.php">
<input type="text" name="agriculteurs"/> 
<input type="submit" value="Ok !"/>
</form></td>
</tr>
</table>
</div>
<div id="pied_de_page">
<table>
<?php include("pied_de_page.php");?>
</table>
</div>
<?php
}
else
{
header('Location: index.php');
}?>
</body>