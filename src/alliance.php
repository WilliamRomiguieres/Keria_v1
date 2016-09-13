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
if(!empty($_POST['message']) AND !empty($_SESSION['pseudo']))
{
$_POST['message']=htmlspecialchars($_POST['message']);
$_POST['message']=stripslashes($_POST['message']);
$pl=$bdd->prepare('INSERT INTO allichat(ip,pseudo,message,heure,nom) VALUES(?,?,?,?,?)');
$pl->execute(array($_SERVER['REMOTE_ADDR'],$_SESSION['pseudo'],$_POST['message'],date('H:i:s'),$donnees['nom']));
}?>
<table>
<tr>
<td Style="background-color: blue;">T'chat</td>
<td><a href="ally_armee.php">Armée</a></td>
</tr>
<tr>
<td colspan="3">Bienvenue sur le t'chat de l'alliance <?php echo $donnees['nom'];?> !</td>
</tr>
<tr>
<td colspan="3" Style="background-color: blue; text-align: center;">Poster un message:</td>
</tr>
<tr>
<td colspan="3"> <form method="post" action="alliance.php">
<input type="text" name="message"/> <input type="submit" value="Ok !"/>
</form>
</td>
</tr>
<tr>
<td colspan="3" Style="background-color: blue; text-align: center;">Messages</td>
</tr>
<?php
$req=$bdd->prepare('SELECT * FROM allichat WHERE nom=? ORDER BY ID DESC');
$req->execute(array($donnees['nom']));
while($do=$req->fetch())
{?>
<tr>
<td colspan="3">
[<?php echo $do['heure'];?>] <?php echo $do['pseudo'];?>: <?php echo $do['message'];?>
</td>
</tr>
<?php
}?>
</table>
<?php
}
else
{?>
<table>
<tr>
<td>Tu n'as pas d'alliance mon ami ! Tu peux choisir d'en <a href="actions/create.php">créer une</a> ou bien d'en <a href="actions/rejoindre.php">rejoindre une</a>.</td>
</tr>
</table>
<?php
}
}
else
{
header('Location: index.php');
}?>