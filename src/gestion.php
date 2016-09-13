<?php
session_start();
function maxi($argent,$coef)
{
$max=$argent/$coef;
$reste=$argent%$coef;
if($reste!=0)
{
$max=floor($max);
}
return $max;
}
function maxo($argent,$coef,$superficie)
{
$max=$argent/$coef;
$reste=$argent%$coef;
if($reste!=0)
{
$max=floor($max);
}
if($max>$superficie*2)
{
$max=($superficie*2);
}
return $max;
}
if(!empty($_SESSION['pseudo']))
{
include("connect.php");
include("utilitaires/bot.php");
include("post.php");?>
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
if(!empty($_POST['ha_true']) AND $_POST['ha_true']==1)
{?>
<table>
<tr>
<td Style="background-color: green"><b>Augmentation réussie !</b></td>
</tr>
</table>
<?php
}
if(!empty($_POST['ha_true']) AND $_POST['ha_true']==2)
{?>
<table>
<tr>
<td Style="background-color: red"><b>Nombre maximum dépassé !</b></td>
</tr>
</table>
<?php
}
if(!empty($_POST['ha_true']) AND $_POST['ha_true']==3)
{?>
<table>
<tr>
<td Style="background-color: red"><b>Mauvais caractères !</b></td>
</tr>
</table>
<?php
}
$izizi=$bdd->prepare('SELECT * FROM jeu WHERE pseudo=?');
$izizi->execute(array($_SESSION['pseudo']));
$infee=$izizi->fetch();
$degats=$infee['chars']*100+$infee['miliciens']*5+$infee['snipers']*50+$infee['avions']*150;
$protection=$infee['chars']*50+$infee['miliciens']*5+$infee['snipers']*100+$infee['avions']*150;
if(empty($lilolo))
{
$oioioioioi=$bdd->prepare('UPDATE jeu SET attaque=:attaque, défense=:defense WHERE pseudo=:pseudo');
$oioioioioi->execute(array(
'attaque'=>$degats,
'defense'=>$protection,
'pseudo'=>$_SESSION['pseudo']));
}?>
<table><td Style="background-color: blue; width: 222px;">Armée</td><td><a href="jobs.php">Jobs</a></td></table>
<table>
<tr><td Style="width: 222px;">Dégats: <?php echo $inf['attaque'];?></td><td>Protection: <?php echo $inf['défense'];?>
</tr>
</table>
<table>
<tr>
<td><img src="images/chars.png" alt="Chars"/></td>
<td><a href="plus_dinf.php?page=Chars"/>Plus d'infos ?</a><br/>Tu as <?php echo $inf['chars'];?> chars. Un char rapporte 100 de dégats et 50 de protection. Maximum: <?php echo maxo($inf['argent'],100,$inf['taille']);?>.Tu veux en rajouter 
combien ?<br/> Prix: 100 or
<form method="post" action="gestion.php">
<input type="text" name="chars"/> 
<input type="submit" value="Ok !"/>
</form></td>
</tr>
<tr>
<td><img src="images/miliciens.png" alt="Miliciens"/></td>
<td><a href="plus_dinf.php?page=Infanteries"/>Plus d'infos ?</a><br/>Tu as <?php echo $inf['miliciens'];?> fantassins. Un fantassin , raporte 5 de dégats et 5 de protection. Maximum: <?php echo maxo($inf['argent'],5,$inf['taille']);?>.Tu veux en rajouter 
combien ?<br/> Prix: 5 or
<form method="post" action="gestion.php">
<input type="text" name="miliciens"/> 
<input type="submit" value="Ok !"/>
</form></td>
</tr>
<tr>
<td><img src="images/snipers.png" alt="snipers"/></td>
<td><a href="plus_dinf.php?page=Snipers"/>Plus d'infos ?</a><br/>Tu as <?php echo $inf['snipers'];?> snipers. Un sniper rapporte 50 de dégats et 100 de protection. Maximum: <?php echo maxo($inf['argent'],100,$inf['taille']);?>.Tu veux en rajouter 
combien ?<br/> Prix: 100 or
<form method="post" action="gestion.php">
<input type="text" name="snipers"/> 
<input type="submit" value="Ok !"/>
</form></td>
</tr>
<tr>
<td><img src="images/aviation.png" alt="Aviation"/></td>
<td><a href="plus_dinf.php?page=Aviations"/>Plus d'infos ?</a><br/>Tu as <?php echo $inf['avions'];?> avions. L'aviation rapporte 150 de dégats et 150 de protection. Maximum: <?php echo maxo($inf['argent'],200,$inf['taille']);?>.Tu veux en rajouter 
combien ?<br/> Prix: 200 or
<form method="post" action="gestion.php">
<input type="text" name="aviations"/> 
<input type="submit" value="Ok !"/>
</form></td>
</tr>
</table>
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
}?>
</body>