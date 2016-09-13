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
$req=$bdd->prepare('SELECT ar_gagne,pseudo1,pseudo2,gagnant,attaquant,miliciens_a,miliciens_b,chars_a,chars_b,snipers_a,snipers_b,avions_a,avions_b, DATE_FORMAT(date, \'%Hh%imin\') AS heure, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_c FROM tableau WHERE pseudo1=? OR pseudo2=? ORDER BY ID DESC');
$req->execute(array($_SESSION['pseudo'],$_SESSION['pseudo']));
while($donnees=$req->fetch())
{
if($donnees['attaquant']==$_SESSION['pseudo'])
{?>
<tr>
<td colspan="2" Style="background-color: blue; text-align: center; font-size: 18px;"><b><?php if($donnees['date_c']==date('d/m/Y'))
{
echo 'Aujourd\'hui à ';
}
else
{
echo 'Le ' . $donnees['date_c'] .' à ';
}
echo $donnees['heure'];?></b></td>
<tr>
<td><img src="images/sup.jpg"/></td>
<td>Vous attaquez <?php echo $donnees['pseudo2'];?>, vous <?php if($donnees['gagnant']==$_SESSION['pseudo'])
{
echo 'gagnez '. $donnees['ar_gagne'] .' or.';
}
else echo 'perdez.'?>
Vous perdez <?php echo $donnees['miliciens_b'];?> fantassins, <?php echo $donnees['chars_b'];?> chars, <?php echo $donnees['snipers_b'];?> snipers, et <?php echo $donnees['avions_b'];?> avions.<br/>
<?php echo $donnees['pseudo2'];?> perd <?php echo $donnees['miliciens_a'];?> fantassins, <?php echo $donnees['chars_a'];?> chars, <?php echo $donnees['snipers_a'];?> snipers, et <?php echo $donnees['avions_a'];?> avions.
</td>
</tr>
<?php
}
else
{?>
<tr>
<td colspan="2" Style="background-color: blue; text-align: center; font-size: 18px;"><b><?php if($donnees['date_c']==date('d/m/Y'))
{
echo 'Aujourd\'hui à ';
}
else
{
echo 'Le ' . $donnees['date_c'] .' à ';
}
echo $donnees['heure'];?></b></td>
<tr>
<td><img src="images/sup.jpg"/></td>
<td><?php echo $donnees['pseudo1'];?> vous attaque vous <?php if($donnees['gagnant']==$_SESSION['pseudo'])
{
echo 'gagnez.';
}
else echo 'perdez.'?>
<?php echo $donnees['pseudo1'];?> perd <?php echo $donnees['miliciens_b'];?> fantassins, <?php echo $donnees['chars_b'];?> chars, <?php echo $donnees['snipers_b'];?> snipers, et <?php echo $donnees['avions_b'];?> avions.<br/>
Vous perdez <?php echo $donnees['miliciens_a'];?> fantassins, <?php echo $donnees['chars_a'];?> chars, <?php echo $donnees['snipers_a'];?> snipers, et <?php echo $donnees['avions_a'];?> avions.
</td>
</tr>
<?php
}
}?>
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