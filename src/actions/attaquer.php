<?php
session_start();
include("../connect.php");
include("../informations.php");
$attaquant=$_SESSION['pseudo'];
$req=$bdd->prepare('SELECT * FROM jeu WHERE ID=?');
$req->execute(array($_GET['id']));
$donnees=$req->fetch();
$defenseur=$donnees['pseudo'];
if($inf['attaque']>$donnees['défense'])
{
$gagnant=$_SESSION['pseudo'];
$perdant=$donnees['pseudo'];
}
else
{
$gagnant=$donnees['pseudo'];
$perdant=$_SESSION['pseudo'];
}
if($gagnant==$_SESSION['pseudo'])
{
$pourcentage_perd=($inf['attaque']/$donnees['défense']);
if($pourcentage_perd>7)
{
$pourcentage_perd=7;
}
$pourcentage_gagn=($donnees['défense']/$inf['attaque'])*2;
}
else
{
$pourcentage_perd=($donnees['défense']/$inf['attaque']);
if($pourcentage_perd>7)
{
$pourcentage_perd=7;
}
$pourcentage_gagn=($inf['attaque']/$donnees['défense'])*2;
}
if($gagnant==$_SESSION['pseudo'])
{
$chargagn=round(($pourcentage_gagn/100)*$inf['chars']);
$milgagn=round(($pourcentage_gagn/100)*$inf['miliciens']);
$snigagn=round(($pourcentage_gagn/100)*$inf['snipers']);
$avgagn=round(($pourcentage_gagn/100)*$inf['avions']);
$orgagn=round((10/100)*$donnees['argent']);
$charperd=round(($pourcentage_perd/100)*$donnees['chars']);
$milperd=round(($pourcentage_perd/100)*$donnees['miliciens']);
$sniperd=round(($pourcentage_perd/100)*$donnees['snipers']);
$avperd=round(($pourcentage_perd/100)*$donnees['avions']);
$reqe=$bdd->prepare('UPDATE jeu SET argent=:argent, chars = :chars, miliciens= :miliciens, avions=:avions, snipers=:snipers, attaque_restante=:att WHERE pseudo=:pseudo');
$reqe->execute(array(
'argent'=>$inf['argent']+$orgagn,
'chars'=>$inf['chars']-$chargagn,
'miliciens'=>$inf['miliciens']-$milgagn,
'avions'=>$inf['avions']-$avgagn,
'snipers'=>$inf['snipers']-$snigagn,
'att'=>$inf['attaque_restante']-1,
'pseudo'=>$_SESSION['pseudo']));
$reqea=$bdd->prepare('UPDATE jeu SET argent=:argent, chars = :chars, miliciens= :miliciens, avions=:avions, snipers=:snipers WHERE pseudo=:pseudo');
$reqea->execute(array(
'argent'=>$donnees['argent']-$orgagn,
'chars'=>$donnees['chars']-$charperd,
'miliciens'=>$donnees['miliciens']-$milperd,
'avions'=>$donnees['avions']-$avperd,
'snipers'=>$donnees['snipers']-$sniperd,
'pseudo'=>$donnees['pseudo']));
$tableau=$bdd->prepare('INSERT INTO tableau(avions_a,avions_b,snipers_a,snipers_b,miliciens_a,miliciens_b,chars_a,chars_b,or_gagne,attaquant,gagnant,pseudo1,pseudo2,date) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
$tableau->execute(array($avgagn,$avperd,$snigagn,$sniperd,$milgagn,$milperd,$chargagn,$charperd,$orgagn, $_SESSION['pseudo'],$_SESSION['pseudo'],$_SESSION['pseudo'],$donnees['pseudo'],date('d-m-Y H:i:s')));
}
else
{
$chargagn=round(($pourcentage_gagn/100)*$donnees['chars']);
$milgagn=round(($pourcentage_gagn/100)*$donnees['miliciens']);
$snigagn=round(($pourcentage_gagn/100)*$donnees['snipers']);
$avgagn=round(($pourcentage_gagn/100)*$donnees['avions']);

$charperd=round(($pourcentage_perd/100)*$inf['chars']);
$milperd=round(($pourcentage_perd/100)*$inf['miliciens']);
$sniperd=round(($pourcentage_perd/100)*$inf['snipers']);
$avperd=round(($pourcentage_perd/100)*$inf['avions']);
$reqe=$bdd->prepare('UPDATE jeu SET chars = :chars, miliciens= :miliciens, avions=:avions, snipers=:snipers WHERE pseudo=:pseudo');
$reqe->execute(array(
'chars'=>$donnees['chars']-$chargagn,
'miliciens'=>$donnees['miliciens']-$milgagn,
'avions'=>$donnees['avions']-$avgagn,
'snipers'=>$donnees['snipers']-$snigagn,
'pseudo'=>$donnees['pseudo']));
$reqea=$bdd->prepare('UPDATE jeu SET chars = :chars, miliciens= :miliciens, avions=:avions, snipers=:snipers, attaque_restante=:att WHERE pseudo=:pseudo');
$reqea->execute(array(
'chars'=>$inf['chars']-$charperd,
'miliciens'=>$inf['miliciens']-$milperd,
'avions'=>$inf['avions']-$avperd,
'snipers'=>$inf['snipers']-$sniperd,
'att'=>$inf['attaque_restante']-1,
'pseudo'=>$_SESSION['pseudo']));
$tableau=$bdd->prepare('INSERT INTO tableau(avions_a,avions_b,snipers_a,snipers_b,miliciens_a,miliciens_b,chars_a,chars_b,or_gagne,attaquant,gagnant,pseudo1,pseudo2,date) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
$tableau->execute(array($avgagn,$avperd,$snigagn,$sniperd,$milgagn,$milperd,$chargagn,$charperd,0, $_SESSION['pseudo'],$donnees['pseudo'],$_SESSION['pseudo'],$donnees['pseudo'],date('Y-m-d H:i:s')));
}?>