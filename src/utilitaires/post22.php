<?php
$z=$bdd->prepare('SELECT * FROM jeu WHERE pseudo=?');
$z->execute(array($_SESSION['pseudo']));
$infe=$z->fetch();
$yy=$bdd->prepare('SELECT * FROM inscription WHERE pseudo=?');
$yy->execute(array($_SESSION['pseudo']));
$orane=$yy->fetch();
$hab_max=maximum($orane['lvl'],'habitants');
if(!empty($_POST['ouvriers']))
{
$_POST['ouvriers']=htmlspecialchars($_POST['ouvriers']);
if(preg_match('#^[0-9]{1,}$#',$_POST['ouvriers']))
{
$ou_max=maximum($orane['lvl'],'ouvriers');
if($infe['ouvriers']+$_POST['ouvriers']<=$ou_max[0])
{
if($infe['argent']>=$_POST['ouvriers']*3)
{
$_POST['ha_true']=1;
$ajoutou=$bdd->prepare('UPDATE jeu SET ouvriers=:ouvriers, argent=:argent WHERE pseudo=:pseudo');
$ajoutou->execute(array(
'ouvriers'=>$infe['ouvriers']+$_POST['ouvriers'],
'argent'=>$infe['argent']-$_POST['ouvriers']*3,
'pseudo'=>$_SESSION['pseudo']));
}
else $_POST['ha_true']=2;
}
else $_POST['ha_true']=3;
}
else $_POST['ha_true']=4;
}
if(!empty($_POST['habitants']))
{
$_POST['habitants']=htmlspecialchars($_POST['habitants']);
if(preg_match('#^[0-9]{1,}$#',$_POST['habitants']))
{
$ou_max=maximum($orane['lvl'],'habitants');
if($infe['habitants']+$_POST['habitants']<=$hab_max[0])
{
if($infe['argent']>=$_POST['habitants']*3)
{
$_POST['ha_true']=1;
$ajoutou=$bdd->prepare('UPDATE jeu SET habitants=:ouvriers, argent=:argent WHERE pseudo=:pseudo');
$ajoutou->execute(array(
'ouvriers'=>$infe['habitants']+$_POST['habitants'],
'argent'=>$infe['argent']-$_POST['habitants']*3,
'pseudo'=>$_SESSION['pseudo']));
}
else $_POST['ha_true']=2;
}
else $_POST['ha_true']=3;
}
else $_POST['ha_true']=4;
}
if(!empty($_POST['agriculteurs']))
{
$_POST['agriculteurs']=htmlspecialchars($_POST['agriculteurs']);
if(preg_match('#^[0-9]{1,}$#',$_POST['agriculteurs']))
{
$ou_max=maximum($orane['lvl'],'agriculteurs');
if($infe['agriculteurs']+$_POST['agriculteurs']<=$hab_max[0])
{
if($infe['argent']>=$_POST['agriculteurs']*3)
{
$_POST['ha_true']=1;
$ajoutou=$bdd->prepare('UPDATE jeu SET agriculteurs=:ouvriers, argent=:argent WHERE pseudo=:pseudo');
$ajoutou->execute(array(
'ouvriers'=>$infe['agriculteurs']+$_POST['agriculteurs'],
'argent'=>$infe['argent']-$_POST['agriculteurs']*3,
'pseudo'=>$_SESSION['pseudo']));
}
else $_POST['ha_true']=2;
}
else $_POST['ha_true']=3;
}
else $_POST['ha_true']=4;
}?>