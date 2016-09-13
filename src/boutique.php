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
if(!empty($_GET['id']) AND $_GET['id']==1)
{?>
<tr>
<td colspan="2" Style="background-color: red"><b>Tu n'as pas assez d'argent !</b></td>
</tr>
<?php
}
if(!empty($_GET['id']) AND $_GET['id']==2)
{?>
<tr>
<td colspan="2" Style="background-color: red"><b>Tu n'as pas le level requis</b></td>
</tr>
<?php
}
if(!empty($_GET['id']) AND $_GET['id']==3)
{?>
<tr>
<td colspan="2" Style="background-color: red"><b>Ne t'amuses jamais à bidouiller les adresses !</b></td>
</tr>
<?php
}
if(!empty($_GET['id']) AND $_GET['id']==4)
{?>
<tr>
<td colspan="2" Style="background-color: green"><b>Achat effectué !</b></td>
</tr>
<?php
}
$messages=0;
$anksa='SELECT ID FROM boutique WHERE lvl_min <= '. $oran['lvl'] . ' AND lvl_max >='. $oran['lvl'] .'';
$oppo=$bdd->query($anksa);
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
$boutique='SELECT * FROM boutique WHERE lvl_min <= '. $oran['lvl'] . ' AND lvl_max >='. $oran['lvl'] .' LIMIT '. $ma .','. $nombreMessagesParPage .'';
$req=$bdd->query($boutique);
$aa=false;
while($donnees=$req->fetch())
{
$aa=true;?>
<tr><td colspan="2" Style="font-size: 25px; text-align: center"><?php echo $donnees['titre'];?></td></tr>
<tr><td><img src="<?php echo $donnees['image'];?>" alt="Image"/></td><td><?php echo $donnees['description'];?><br/>
Niveau requis: <?php echo $donnees['lvl_min'];?>,    Niveau maximum: <?php echo $donnees['lvl_max'];?></td></tr>
<tr><td Style="font-size: 20px;">Acheter: </td><td Style="font-size: 20px;"><a href="actions/achat.php?id=<?php echo $donnees['ID'];?>">Acheter à <?php echo $donnees['cout'];?> Or</a></td></tr>
<?php
}
if($aa==false)
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
<a href="boutique.php?page=<?php echo $i;?>"><?php echo $i;?></a>, 
<?php
}
}
}?>
<div id="pied_de_page">
<table>
<?php include("pied_de_page.php");?>
</table>
</div>
<?php
}
else
{
header('Location: index.php');
}?>