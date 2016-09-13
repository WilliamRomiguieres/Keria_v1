<?php

session_start();
include("connect.php");

$bon=false;
$req=$bdd->prepare('SELECT * FROM inscription WHERE pseudo=?');
$req->execute(array($_POST['pseudo']));
$donnees=$req->fetch();
if($donnees)
{
if($_POST['password']==$donnees['mdp'])
{
$_SESSION['pseudo']=$donnees['pseudo'];
$_SESSION['mdp']=$donnees['mdp'];
$_SESSION['ip']=$donnees['ip'];
$_SESSION['adresse_email']=$donnees['adresse_email'];
$_SESSION['rang']=$donnees['rang'];
$bon=true;
}
}
if($bon)
{
header('Location: tchat.php');
}
else
{
$_SESSION['id']=6;
header('Location: index.php');
}?>