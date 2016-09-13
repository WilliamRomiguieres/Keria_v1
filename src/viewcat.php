<?php
session_start();
if(!empty($_SESSION['pseudo']))
{
$waa=false;
include("connect.php");
include("utilitaires/bot.php");?>
<head>
<title>Keria</title>
 <link rel="stylesheet" media="screen" type="text/css" title="Design" href="design.css" />
</head>
<body>
<div id="banniere">
<table>
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
if(empty($_GET['page']))
{
$_GET['page']=1;
}
$re=$bdd->prepare('SELECT pseudo FROM sujet WHERE cat_id=?');
$re->execute(array($_GET['id']));
$messages=0;
while($donne=$re->fetch())
{
$messages++;
}
$nombreMessagesParPages=10;
$ma=$nombreMessagesParPages*($_GET['page']-1);
$requete='SELECT ID,titre,pseudo,derniere_page,dernier_id, DATE_FORMAT(date, \'%Hh%imin\') AS heure, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_c, DATE_FORMAT(date_derniere, \'%Hh%imin\') AS heure2, DATE_FORMAT(date_derniere, \'%d/%m/%Y\') AS date_c2 FROM sujet WHERE cat_id='. $_GET['id'] .' ORDER BY date_derniere DESC LIMIT '. $ma .','. $nombreMessagesParPages .'';
$req=$bdd->query($requete);?>
<tr>
<td Style="width: 150px;">Nom du sujet</td>
<td >Auteur</td>
<td>Date</td>
<td>Date dernier message</td>
</tr>
<?php
while($donnees=$req->fetch())
{
$waa=true;?>
<tr>
<td><a href="viewtopic.php?id=<?php echo $donnees['ID'];?>"><?php echo $donnees['titre'];?></a></td>
<td><?php echo $donnees['pseudo'];?></td>
<td><?php if($donnees['date_c']==date('d/m/Y'))
{
echo 'Aujourd\'hui, ';
}
else echo 'Le ' . $donnees['date_c'] .'';?> à <?php echo $donnees['heure'];?></td></td>
<td><a href="viewtopic.php?id=<?php echo $donnees['ID'];?>&&page=<?php echo $donnees['derniere_page'];?>#<?php echo $donnees['dernier_id'];?>"><?php if($donnees['date_c2']==date('d/m/Y'))
{
echo 'Aujourd\'hui, ';
}
else echo 'le ' . $donnees['date_c2'] .'';?> à <?php echo $donnees['heure2'];?></a></td></td>
</tr>
<?php
}
if($waa==false)
{
include("erreur.php");
}
else
{
if(!empty($_SESSION['pseudo']))
{?>
<tr>
<td colspan="4" Style="background-color: blue; text-align: center; font-size: 20px;">Nouveau sujet:
</td>
</tr>
<tr>
<td colspan="4">
<form method="post" action="new1.php?id=<?php echo $_GET['id'];?>">
Titre: <input type="text" name="titre"/><br/>
<textarea cols=30 rows=8 name="message"></textarea><br/>
<input type="submit" name="submit" value="Envoyer"/></div></div></div>
</td>
</tr>
<?php
}?>
<tr>
<td colspan="4">
<?php
$nombreDePages=$messages/$nombreMessagesParPages;
$reste=$messages%$nombreMessagesParPages;
if($reste!=0)
{
$nombreDePages=ceil($nombreDePages);
}?>
Pages: <?php
for($i=1;$i<=$nombreDePages;$i++)
{
if($_GET['page']==$i)

{
echo '' . $i .', ';
}
else
{?>
<a href="viewcat.php?id=<?php echo $_GET['id'];?>&&page=<?php echo $i;?>"><?php echo $i;?>, </a>
<?php
}
}?>
</td>
</tr>
</table>
</div>
<?php
}?>
<div id="pied_de_page">
<table>
<?php
include("pied_de_page.php");?>
</table>
<?php
}
else
{
header('Location: index.php');
}?>