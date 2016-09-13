<?php
session_start();
include("../connect.php");
include('../informations.php');
if(!empty($_GET['id']) AND !empty($_SESSION['pseudo']))
{
$req=$bdd->prepare('SELECT * FROM boutique WHERE id=?');
$req->execute(array($_GET['id']));
$donnees=$req->fetch();
if($donnees)
{
if($donnees['lvl_min']<=$oran['lvl'] AND $donnees['lvl_max']>=$oran['lvl'])
{
if($inf['argent']>=$donnees['cout'])
{
echo 'Achat effectué !';
$izi=$bdd->prepare('UPDATE jeu SET argent=:agent WHERE pseudo=:pseudo');
$izi->execute(array(
'agent'=>$inf['argent']=$inf['argent']-$donnees['cout'],
'pseudo'=>$_SESSION['pseudo']));
$zozo=$bdd->prepare('INSERT INTO inventaire(ip,pseudo,id_achat) VALUES(?,?,?)');
$zozo->execute(array($_SERVER['REMOTE_ADDR'],$_SESSION['pseudo'],$_GET['id']));
header('Location: ../boutique.php?id=4');
}
else header('Location: ../boutique.php?id=1');
}
else header('Location: ../boutique.php?id=2');
}
else header('Location: ../boutique.php?id=3');
}
else header('Location: ../boutique.php?id=3');