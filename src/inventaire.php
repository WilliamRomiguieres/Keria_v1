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
if(!empty($_GET['id']) AND $_GET['id']==1)
{?>
<table>
<tr>
<td Style="background-color: green;">Tout s'est bien passé !</td>
</tr>
</table>
<?php
}
if(!empty($_GET['id']) AND $_GET['id']==2)
{?>
<table>
<tr>
<td Style="background-color: red">Cet objet n'est pas dans ton inventaire !</td>
</tr>
</table>
<?php
}
if(!empty($_GET['id']) AND$_GET['id']==3)
{?>
<table>
<tr>
<td Style="background-color: red">Tu as trafiqué l'adresse !</td>
</tr>
</table>
<?php
}
if(!empty($_GET['id']) AND$_GET['id']==4)
{?>
<table>
<tr>
<td Style="background-color: red">Tu as déjà utilisé un item aujourd'hui !</td>
</tr>
</table>
<?php
}?>

<table>
<?php
$messages=0;
$oppo=$bdd->prepare('SELECT ID FROM inventaire WHERE pseudo=?');
$oppo->execute(array($_SESSION['pseudo']));
while($oppos=$oppo->fetch())
{
$messages++;
}
if(empty($_GET['page']))
{
$_GET['page']=1;
}
$nombreMessagesParPage=5;
$ma=$nombreMessagesParPage*($_GET['page']-1);
$boutique='SELECT * FROM inventaire WHERE pseudo=\''. $_SESSION['pseudo'] .'\' LIMIT '. $ma .','. $nombreMessagesParPage .'';
$req=$bdd->query($boutique);
while($do=$req->fetch())
{
$waa=true;
$reqe=$bdd->prepare('SELECT * FROM boutique WHERE ID=?');
$reqe->execute(array($do['id_achat']));
$donnees=$reqe->fetch();?>
<tr><td colspan="2" Style="font-size: 25px; text-align: center"><?php echo $donnees['titre'];?></td></tr>
<tr><td><img src="<?php echo $donnees['image'];?>" alt="Image"/></td><td><?php echo $donnees['description'];?></td></tr>
<tr><td Style="font-size: 20px;">Utiliser: </td><td Style="font-size: 20px;"><a href="actions/utiliser.php?id=<?php echo $donnees['ID'];?>&&id_y=<?php echo $do['ID'];?>">Utiliser</a></td></tr>
<?php
}
if($waa==false)
{
include("erreur.php");
}
else
{
$nombreDePages=$messages/$nombreMessagesParPage;
$reste=$messages%$nombreMessagesParPage;
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
<a href="inventaire.php?page=<?php echo $i;?>"><?php echo $i;?></a>, 
<?php
}
}
}
?>
</div>
<div id="pied_de_page">
<table>
<?php
include("pied_de_page.php");?>
</table>
</div>
<?php
echo $_SESSION['rang'];
unset($_SESSION['rang']);
echo '<br/>'. $_SESSION['rang'] .'';
}
else
{
header('Location: index.php');
}?>