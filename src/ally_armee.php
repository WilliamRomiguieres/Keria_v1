<?php
session_start();
if(!empty($_SESSION['pseudo']))
{
include("connect.php");
include("utilitaires/bot.php");?>
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
$reqee=$bdd->prepare('SELECT * FROM alliances WHERE pseudo=?');
$reqee->execute(array($_SESSION['pseudo']));
$donnees=$reqee->fetch();
if($donnees)
{
$lvl=0;
$taille=0;
$chars=0;
$snipers=0;
$miliciens=0;
$avions=0;
$reqea=$bdd->prepare('SELECT * FROM alliances WHERE nom=?');
$reqea->execute(array($donnees['nom']));
while($do=$reqea->fetch())
{
$wa=$bdd->prepare('SELECT taille,chars,snipers,miliciens,avions,lvl FROM jeu WHERE pseudo=?');
$wa->execute(array($do['pseudo']));
$wai=$wa->fetch();
$taille=$taille+$wai['taille'];
$chars=$chars+$wai['chars'];
$snipers=$snipers+$wai['snipers'];
$miliciens=$miliciens+$wai['miliciens'];
$avions=$avions+$wai['avions'];
$lvl=$lvl+$wai['lvl'];
}?>
<table>
<tr>
<td><a href="alliance.php">T'chat</a></td>
<td Style="background-color: blue;">Armée</td>
</tr>
</table>
<table>
<tr>
<td colspan="2">Les différentes classes sont l'addition de toutes les classes de chaque membres.</td>
</tr>
<tr>
<td>Superficie: <?php echo $taille;?></td><td>Niveau: <?php echo $lvl;?></td>
<tr>
<td><img src="images/chars.png"/></td><td>L'alliance a <?php echo $chars;?> chars de combats.</td>
</tr>
<tr>
<td><img src="images/miliciens.png"/></td><td>L'alliance a <?php echo $miliciens;?> miliciens.</td>
</tr>
<tr>
<td><img src="images/snipers.png"/></td><td>L'alliance a <?php echo $snipers;?> snipers. </td>
</tr>
<tr>
<td><img src="images/aviation.png"/></td><td>L'alliance a <?php echo $avions;?> avions.</td>
</tr>
</table>
<?php
}?>
<div id="pied_de_page">
<table>
<?php
include("pied_de_page.php");?>
</table>
</div>
<?php
}
else
{
header('Location: index.php');
}