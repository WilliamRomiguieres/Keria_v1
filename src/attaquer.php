<?php
session_start();
if(!empty($_SESSION['pseudo']))
{
include("connect.php");
include("utilitaires/bot.php");
?>
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
<div id="corps"/>
<table>
<?php
$coeffi=-1;
include("connect.php");
$cherche=$bdd->query('SELECT * FROM inscription');
while($che=$cherche->fetch())
{
$coeffi++;
}
if($coeffi>9)
{
$oioi=10;
}
else $oioi=$coeffi;
for($i=0;$i<$oioi;$i++)
{
$rand=rand(0,$coeffi);
if(!empty($verif))
{
while(in_array($rand, $verif))
{
$rand=rand(0,$coeffi);
}
}
$verif[$i]=$rand;
$pom='SELECT * FROM inscription LIMIT '. $rand .',1';
$req=$bdd->query($pom);
$lili=$req->fetch();
$pome='SELECT ID FROM jeu LIMIT '. $rand .',1';
$reqe=$bdd->query($pome);
$lilie=$reqe->fetch();
echo '<tr><td><a href="pro.php?id='. $lili['ID'] .'">'. $lili['pseudo'] .'</a><br/></td><td>Niveau '. $lili['lvl'] .'</td><td><a href="actions/attaquer.php?id='. $lilie['ID'] .'">Attaquer</a></td></tr>';
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