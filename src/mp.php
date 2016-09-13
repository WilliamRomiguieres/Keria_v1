<?php
session_start();
$messages=0;
if(!empty($_SESSION['pseudo']))
{
include("connect.php");
include("utilitaires/bot.php");
if(!empty($_POST['destinataire']) AND !empty($_POST['message']))
{
$req=$bdd->prepare('SELECT * FROM inscription WHERE pseudo=?');
$req->execute(array($_POST['destinataire']));
$donnees=$req->fetch();
if($donnees)
{
$_POST['erreur']=2;
$r=$bdd->prepare('INSERT INTO mp(ip,destinataire,expediteur,message,date,lu) VALUES(?,?,?,?,?,?)');
$r->execute(array($_SERVER['REMOTE_ADDR'], $_POST['destinataire'], $_SESSION['pseudo'], $_POST['message'], date('Y-m-d H:i:s'),0));
}
else $_POST['erreur']=1;
}
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
<div id="corps">
<table>
<?php
if(!empty($_POST['erreur']) AND $_POST['erreur']==1)
{?>
<tr>
<td colspan="2" Style="background-color: red"><b>Le destinataire n'exixte pas.</b></td>
</tr>
<?php
}
if(!empty($_POST['erreur']) AND $_POST['erreur']==2)
{?>
<tr>
<td colspan="2" Style="background-color: green"><b>Message envoyé !</b></td>
</tr>
<?php
}?>
<tr>
<td colspan="2" Style="background-color: blue; text-align: center; font-size: 20px;";>
Nouveau message:</td></tr>
<tr>
<td colspan="2">
<form method="post" action="mp.php">
Destinataire: <input type="text" name="destinataire" <?php if(!empty($_GET['dest'])){?> value="<?php echo $_GET['dest'];?>"<?php } ?>/><br/>
<textarea cols=30 rows=8 name="message"></textarea><br/>
<input type="submit" name="submit" value="Envoyer"/></div></div></div>
</form>
<tr>
<?php
if(!empty($_GET['id']) AND $_GET['id']='envoyes')
{?>
<td Style="width: 218px;"><a href="mp.php">Reçus</a></td><td Style="width: 218px; background-color: blue;">Envoyés</td>
</tr>
<tr>
<td colspan="2">
<p Style="text-align: center; font-size: 30px;"><b>Envoyés (maximum 20)</b> </p>
<?php
$waa=false;
$messagesa=0;
$oppo=$bdd->prepare('SELECT ID FROM mp WHERE expediteur=?');
$oppo->execute(array($_SESSION['pseudo']));
while($oppos=$oppo->fetch())
{
$messagesa++;
}
if(empty($_GET['page']))
{
$_GET['page']=1;
}
$nombreMessagesParPage=5;
$ma=$nombreMessagesParPage*($_GET['page']-1);
$azaz='SELECT destinataire,expediteur,lu,message, DATE_FORMAT(date, \'%Hh%imin\') AS heure, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_c FROM mp WHERE expediteur=\''. $_SESSION['pseudo'] .'\' ORDER BY date DESC LIMIT '.$ma.','. $nombreMessagesParPage .'';
$a=$bdd->query($azaz);
while($do=$a->fetch())
{
$waa=true;?>
<table Style="width: 350px; margin-bottom: 5px;">
<tr>
<td colspan="2" Style="text-align:center; background-color: rgb(51,97,219)">Envoyé à <?php echo $do['destinataire'];?> <?php if($do['date_c']==date('d/m/Y'))
{
echo 'aujourd\'hui, ';
}
else echo 'le ' . $do['date_c'] .'';?> à <?php echo $do['heure'];?></td>
</tr>
<tr>
<td rowspan="2" Style="background-color: rgb(158,228,243); width: 200px;"><?php echo $do['message'];?></td>
<td rowspan="2"><a href="supprimer.php">Supprimer</a></td>
</tr>
</table>
<?php
$messages++;
}
if($waa==false)
{?>
</table>
<?php
include("erreur.php");
}
else
{
if($messages==0)
{?>
<tr><td Style="font-size: 18px; text-align: center;">Aucuns messages envoyés.</td></tr>
<?php
}?>
</td>
</tr>
</table>
<?php
$nombreDePages=$messagesa/$nombreMessagesParPage;
$reste=$messagesa%$nombreMessagesParPage;
if($reste!=0)
{
$nombreDePages=ceil($nombreDePages);
}?>
</table>
Pages: 
<?php
for($i=1;$i<=$nombreDePages;$i++)
{
if($i==$_GET['page'])
{?>
<?php echo $i;?>, 
<?php
}
else
{?>
<a href="mp.php?id=envoyes&&page=<?php echo $i;?>"><?php echo $i;?></a>, 
<?php
}
}
}
}
else
{?>
<td Style="width: 218px; background-color: blue;">Reçus</td><td Style="width: 218px"><a href="mp.php?id=envoyes">Envoyés</a></td>
</tr>
<tr>
<td colspan="2">
<p Style="text-align: center; font-size: 30px;"><b>Reçus (maximum 20)</b> </p>
<?php
$messagesa=0;
$oppo=$bdd->prepare('SELECT ID FROM mp WHERE destinataire=?');
$oppo->execute(array($_SESSION['pseudo']));
while($oppos=$oppo->fetch())
{
$messagesa++;
}
if(empty($_GET['page']))
{
$_GET['page']=1;
}
$nombreMessagesParPage=5;
$ma=$nombreMessagesParPage*($_GET['page']-1);
$azaz='SELECT destinataire,expediteur,lu,message, DATE_FORMAT(date, \'%Hh%imin\') AS heure, DATE_FORMAT(date, \'%d/%m/%Y\') AS date_c FROM mp WHERE destinataire=\''. $_SESSION['pseudo'] .'\' ORDER BY date DESC LIMIT '.$ma.','. $nombreMessagesParPage .'';
$a=$bdd->query($azaz);
while($do=$a->fetch())
{
$e=$bdd->prepare('UPDATE mp SET lu = :lu WHERE destinataire = :pseudo');
$e->execute(array(
'lu'=>1,
'pseudo' => $_SESSION['pseudo']));?>
<table Style="width: 350px; margin-bottom: 5px;">
<tr>
<td colspan="2" Style="text-align:center; background-color: rgb(51,97,219)"><?php if($do['date_c']==date('d/m/Y'))
{
echo 'Aujourd\'hui';
}
else echo $do['date_c'];?> à <?php echo $do['heure'];?> par <?php echo $do['expediteur'];?></td>
</tr>
<tr>
<td rowspan="2" Style="background-color: rgb(158,228,243); width: 200px;"><?php echo $do['message'];?></td><td>
<a href="mp.php?dest=<?php echo $do['expediteur'];?>">Répondre</a></td>
</tr>
<tr>
<td><a href="supprimer.php">Supprimer</a></td>
</tr>
</table>
<?php
$messages++;
}
if($messages==0)
{?>
<tr><td Style="font-size: 18px; text-align: center;">Aucuns messages</td></tr>
<?php
}?>
</td>
</tr>
</table>
<?php
$nombreDePages=$messagesa/$nombreMessagesParPage;
$reste=$messagesa%$nombreMessagesParPage;
if($reste!=0)
{
$nombreDePages=ceil($nombreDePages);
}?>
</table>
Pages: 
<?php
for($i=1;$i<=$nombreDePages;$i++)
{
if($i==$_GET['page'])
{?>
<?php echo $i;?>, 
<?php
}
else
{?>
<a href="mp.php?page=<?php echo $i;?>"><?php echo $i;?></a>, 
<?php
}
}
}?>
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
}?>