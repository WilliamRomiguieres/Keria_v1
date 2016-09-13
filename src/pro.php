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
<table>
<?php
$req=$bdd->prepare('SELECT * FROM inscription WHERE ID=?');
$req->execute(array($_GET['id']));
$donnees=$req->fetch();?>
<tr>
<td colspan="2" Style="text-align: center; font-size: 25px;"><b>Pseudo: </b><?php echo $donnees['pseudo'];?></td>
</tr>
<tr>
<td Style="font-size: 20px;"><b>Rang:</b> <?php echo $donnees['rang'];?></td>
<td Style="font-size: 20px;"><b>Adresse:</b> <?php echo $donnees['adresse_email'];?></td>
</tr>
<tr>
<td Style="font-size: 20px"><a href="actions/attaquer.php?id=<?php echo $donnees['ID'];?>">Attaquer</a></td>
<td Style="font-size: 20px; text-align: center;"><a href="actions/utiliser.php?id=<?php echo $donnees['ID'];?>">Utiliser objet</a></td>
</tr>
<tr>
<td Style="font-size: 20px;"><b>Niveau:</b> <?php echo $donnees['lvl'];?></td>
<td Style="font-size: 20px; text-align:center;"><a href="mp.php?dest=<?php echo $donnees['pseudo'];?>">Contacter</a></td></tr>
</table>
</div>
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