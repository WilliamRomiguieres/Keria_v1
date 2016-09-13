<?php
$req=$bdd->prepare('SELECT date_co FROM inscription WHERE pseudo=?');
$req->execute(array($_SESSION['pseudo']));
$donnees=$req->fetch();
$timestamp=time();
$timestamp=$timestamp;
$donnees['date_co']=$donnees['date_co'];
$nombreHeures=$timestamp-$donnees['date_co'];
$nombreHeures=$nombreHeures/3600;
$nombreHeures=floor($nombreHeures);
for($i=1; $i<=$nombreHeures; $i++)
{
$seconda=date('s');
$minera=date('i');
$minera=$minera*60;
$datera=time();
$datera=$datera-$minera-$seconda;
$reqe=$bdd->prepare('UPDATE inscription SET date_co=:date WHERE pseudo=:pseudo');
$reqe->execute(array(
'date'=>$datera,
'pseudo'=>$_SESSION['pseudo']));
$info=$bdd->prepare('SELECT * FROM jeu WHERE pseudo=?');
$info->execute(array($_SESSION['pseudo']));
$inf=$info->fetch();
$reqa=$bdd->prepare('UPDATE jeu SET taille=:taille, argent=:argent, attaque_restante=:att WHERE pseudo=:pseudo');
$reqa->execute(array(
'taille'=>$inf['taille']+$inf['ouvriers']*1,
'argent'=>$inf['argent']+$inf['habitants']*2+$inf['agriculteurs']*2,
'att'=>9,
'pseudo'=>$_SESSION['pseudo']));
}?>