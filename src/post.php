<?php
$z=$bdd->prepare('SELECT * FROM jeu WHERE pseudo=?');
$z->execute(array($_SESSION['pseudo']));
$infe=$z->fetch();
if(!empty($_POST['chars'])) //Si y a on a posté le truc chars
{
if(preg_match('#^[0-9]{1,}$#', $_POST['chars']))
{
$_POST['chars']=htmlspecialchars($_POST['chars']); //Pour eviter de se faire hackeer, tu comprendras plus tard
//Donc si tout est bon on peut se lancer dans la modification
if($_POST['chars']<=maxo($infe['argent'], 100, $infe['taille']))
{
$_POST['ha_true']=1;
$req=$bdd->prepare('UPDATE jeu SET chars=:chars, argent=:argent, taille=:taille WHERE pseudo=:pseudo');
$req->execute(array(
'chars'=>$infe['chars']+$_POST['chars'],
'argent'=>$infe['argent']-($_POST['chars']*100),
'taille'=>$infe['taille']-$_POST['chars'],
'pseudo'=>$_SESSION['pseudo']));
}
else $_POST['ha_true']=2;
}
else $_POST['ha_true']=3;
}
if(!empty($_POST['miliciens'])) //Si y a on a posté le truc chars
{
if(preg_match('#[0-9]{1,}#', $_POST['miliciens']))
{
$_POST['miliciens']=htmlspecialchars($_POST['miliciens']); //Pour eviter de se faire hackeer, tu comprendras plus tard
//Donc si tout est bon on peut se lancer dans la modification
if($_POST['miliciens']<=maxo($infe['argent'], 5, $infe['taille']))
{
$_POST['ha_true']=1;
$req=$bdd->prepare('UPDATE jeu SET miliciens=:chars, argent=:argent, taille=:taille WHERE pseudo=:pseudo');
$req->execute(array(
'chars'=>$infe['miliciens']+$_POST['miliciens'],
'argent'=>$infe['argent']-($_POST['miliciens']*100),
'taille'=>$infe['taille']-$_POST['miliciens'],
'pseudo'=>$_SESSION['pseudo']));
}
else $_POST['ha_true']=2;
}
else $_POST['ha_true']=3;
}
if(!empty($_POST['snipers'])) //Si y a on a posté le truc chars
{
if(preg_match('#[0-9]{1,}#', $_POST['snipers']))
{
$_POST['snipers']=htmlspecialchars($_POST['snipers']); //Pour eviter de se faire hackeer, tu comprendras plus tard
//Donc si tout est bon on peut se lancer dans la modification
if($_POST['snipers']<=maxo($infe['argent'], 100, $infe['taille']))
{
$_POST['ha_true']=1;
$req=$bdd->prepare('UPDATE jeu SET snipers=:chars, argent=:argent, taille=:taille WHERE pseudo=:pseudo');
$req->execute(array(
'chars'=>$infe['snipers']+$_POST['snipers'],
'argent'=>$infe['argent']-($_POST['snipers']*100),
'taille'=>$infe['taille']-$_POST['snipers'],
'pseudo'=>$_SESSION['pseudo']));
}
else $_POST['ha_true']=2;
}
else $_POST['ha_true']=3;
}
if(!empty($_POST['aviations'])) //Si y a on a posté le truc chars
{
if(preg_match('#[0-9]{1,}#', $_POST['aviations']))
{
$_POST['aviations']=htmlspecialchars($_POST['aviations']); //Pour eviter de se faire hackeer, tu comprendras plus tard
//Donc si tout est bon on peut se lancer dans la modification
if($_POST['aviations']<=maxo($infe['argent'], 100, $infe['taille']))
{
$_POST['ha_true']=1;
$req=$bdd->prepare('UPDATE jeu SET avions=:chars, argent=:argent, taille=:taille WHERE pseudo=:pseudo');
$req->execute(array(
'chars'=>$infe['avions']+$_POST['aviations'],
'argent'=>$infe['argent']-($_POST['aviations']*100),
'taille'=>$infe['taille']-$_POST['aviations'],
'pseudo'=>$_SESSION['pseudo']));
}
else $_POST['ha_true']=2;
}
else $_POST['ha_true']=3;
}?>

