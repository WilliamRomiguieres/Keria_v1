<?php
session_start();
include("connect.php");
$bon=false;
if(!empty($_POST['pseudo']) AND !empty($_POST['password']) AND $_POST['password']==$_POST['c_password'] AND !empty($_POST['adresse_email']))
{
$_POST['pseudo']=htmlspecialchars($_POST['pseudo']);
$_POST['password']=htmlspecialchars($_POST['password']);
$_POST['adresse_email']=htmlspecialchars($_POST['adresse_email']);
$_POST['captcha']==htmlspecialchars($_POST['captcha']);
$lk=$bdd->prepare('SELECT * FROM inscription WHERE pseudo=?');
$lk->execute(array($_POST['pseudo']));
$donne=$lk->fetch();
if($donne==false)
{
if(md5($_POST['captcha'])==$_SESSION['code'])
{
if(preg_match("#^[A-Za-z0-9]{3,}$#", $_POST['pseudo']))//Si le pseudo est valide
{
if(preg_match("#^[A-Za-z0-9]{3,}$#",$_POST['password']))
{
   if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['adresse_email']))
   {
$bon=true;
   }
   else $erreur=5;
}
else $erreur=4;
}
else $erreur=3;
}
else $erreur=7;
}
else $erreur=8;
}
else $erreur=2;
if($bon==true)
{
$membre='Membre';
include("connect.php");!
$req=$bdd->prepare('INSERT INTO inscription(ip,pseudo,mdp,adresse_email,rang) VALUES (?,?,?,?,?)');
$req->execute(array($_SERVER['REMOTE_ADDR'],$_POST['pseudo'],$_POST['password'],$_POST['adresse_email'],$membre));
$reqe=$bdd->prepare('INSERT INTO jeu(ip,pseudo,taille,chars,snipers,argent,miliciens,avions,attaque,défense,ouvriers,habitants,agriculteurs,attaque_restante) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
$reqe->execute(array($_SERVER['REMOTE_ADDR'],$_POST['pseudo'],1000,0,0,1000,0,0,0,0,0,0,0,9));
$_SESSION['id']=1;
header('Location: index.php');
}
else
{
$_SESSION['id']=$erreur;
header('Location: index.php');
}
?>