<?php
session_start();
if(!empty($_SESSION['pseudo']))
{
$waaaa=false;
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
<tr>
<td>
<?php
if(empty($_GET['page']))
{
$_GET['page']=1;
}
if($_GET['page']==1)
{
$nombreMessagesParPages=5;
$ra=$bdd->prepare('SELECT pseudo,message,DATE_FORMAT(date, \'%Hh%imin %ss\') AS heure, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_c FROM sujet WHERE ID=?');
$ra->execute(array($_GET['id']));
$do=$ra->fetch();
if($do)
{?>
<table Style="border-collapse: collapse; width: 400px; margin-bottom: 10px; margin-top: 10px;">
<tr>
<td colspan="2" Style="font-size: 18px; text-align: center; background-color: rgb(26,181,257);;"><?php if($do['date_c']==date('d/m/Y'))
{
echo 'Aujourd\'hui';
}
else echo $do['date_c'];?> à <?php echo $do['heure'];?></td>
</tr>
<tr>
<td Style="width: 120px; background-color: rgb(158,228,243);"><?php echo $do['pseudo'];?></td>
<td colspan="3" Style="background-color: rgb(158,228,243); height:50px;"><?php echo $do['message'];?></td>
</tr>
</table>
<?php
}
}
else
{
$nombreMessagesParPages=5;
}
if(empty($_GET['page']))
{
$_GET['page']=1;
}
include("connect.php");
$re=$bdd->prepare('SELECT pseudo FROM reponse WHERE id_topic=?');
$re->execute(array($_GET['id']));
$messages=0;
while($donne=$re->fetch())
{
$messages++;
}
$ma=$nombreMessagesParPages*($_GET['page']-1);
$requete='SELECT ID,ip,pseudo,message, DATE_FORMAT(date, \'%Hh%imin %ss\') AS heure, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_c FROM reponse WHERE id_topic='. $_GET['id'] .' ORDER BY date LIMIT '. $ma .','. $nombreMessagesParPages .'';
$req=$bdd->query($requete);
while($donnees=$req->fetch())
{
$waaaa=true;
$date=date('d/m/Y');
?>
<table Style="width: 400px; margin-bottom: 10px;">
<tr>
<?php
if($donnees['date_c']==$date)
{?>
<td colspan="2" Style="font-size: 18px; text-align: center; background-color: rgb(26,181,257);">Aujourd'hui à <?php echo $donnees['heure'];?></td>
<?php
}
else
{?>
<td colspan="2" Style="font-size: 18px; text-align: center; background-color: rgb(26,181,257);;"><?php echo $donnees['date_c'];?> à <?php echo $donnees['heure'];?></td>
<?php
}?>
</tr>
<tr>
<td Style="background-color: rgb(158,228,243);"><?php echo $donnees['pseudo'];?></td>
<td colspan="2" id="<?php echo $donnees['ID'];?>" Style="background-color: rgb(158,228,243); height: 50px; "><?php echo $donnees['message'];?></td>
</tr>
</table>
<?php
}
if($waaaa==false)
{
include("erreur.php");
}
else
{?>
<table>
<tr>
<td colspan="2" Style="text-align: center; font-size: 25px; background-color: blue;">Nouveau message</td>
</tr>
<?php
if(!empty($_SESSION['pseudo']))
{?>
<tr>
<td>
<form method="post" action="rep.php?id=<?php echo $_GET['id'];?>&&page_der=<?php if($messages%$nombreMessagesParPages==0 AND $messages!=0)
{
echo $_GET['page']+1;
}
else echo $_GET['page'];?>">
<textarea cols=30 rows=8 name="message"></textarea><br/>
<input type="submit" name="submit" value="Envoyer"/>
<?php
}?>
</td>
</tr>
</table>
<?php
$nombreDePages=$messages/$nombreMessagesParPages;
$reste=$messages%$nombreMessagesParPages;
if($reste!=0)
{
$nombreDePages=ceil($nombreDePages);
}?>
Pages: 
<?php
for($i=1;$i<=$nombreDePages;$i++)
{
if($_GET['page']==$i)
{
echo ''. $i .', ';
}
else
{?>
<a href="viewtopic.php?id=<?php echo $_GET['id'];?>&&page=<?php echo $i;?>"><?php echo $i;?>, </a>
<?php
}
}?>
</div>
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
}?>
