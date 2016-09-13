<?php
session_start();
if(!empty($_GET['id']) AND !empty($_GET['id_y']) AND !empty($_SESSION['pseudo'])) // Si l'Id est présent
{
// On regarde si il est dans l'inventaire
include("../connect.php");
$r=$bdd->prepare('SELECT * FROM inventaire WHERE id_achat=? AND ID=?');
$r->execute(array($_GET['id'],$_GET['id_y']));
$do=$r->fetch();
if($do) // Tout est bon, on fais ce que dit l'objet
{
$ezo=$bdd->prepare('SELECT date FROM utilisation WHERE pseudo=? ORDER BY ID DESC');
$ezo->execute(array($_SESSION['pseudo']));
$enzo=$ezo->fetch();
if($enzo['date']!=date('d-m-Y'))
{
$req=$bdd->prepare('SELECT * FROM boutique WHERE ID=?');
$req->execute(array($_GET['id']));
$donnees=$req->fetch();
if($donnees['multiplication']!=0)
{
include("../informations.php");
$requete=$bdd->prepare('UPDATE jeu SET attaque=:attaque, défense=:defense WHERE pseudo=:pseudo');
$requete->execute(array(
'attaque'=>$inf['attaque']*$donnees['multiplication'], 
'defense'=>$inf['défense']*$donnees['multiplication'],
'pseudo'=>$_SESSION['pseudo']));
$util=$bdd->prepare('INSERT INTO utilisation(pseudo,titre,temps,timestamp,fin,multiplication,rajout,classe_rajout,date) VALUES(?,?,?,?,?,?,?,?,?)');
$util->execute(array($_SESSION['pseudo'], $donnees['des'],$donnees['duree'],time(),time()+($donnees['duree']*60),$donnees['multiplication'],0,0,date('d-m-Y')));
$delete=$bdd->prepare('DELETE FROM inventaire WHERE ID=?');
$delete->execute(array($_GET['id_y']));
header('Location: ../inventaire.php?id=1');
}
if($donnees['rajoutage']!=0)
{
include("../informations.php");
if($donnees['classe_rajoutage']=='tout')
{
$add=$inf['chars'] + $donnees['rajoutage'];
$adde=$inf['snipers'] + $donnees['rajoutage'];
$adee=$inf['miliciens'] + $donnees['rajoutage'];
$adeee=$inf['avions']+$donnees['rajoutage'];
$pop='UPDATE jeu SET chars='.$add. ', snipers='. $adde .', miliciens='. $addee .', avions='. $addeee .' WHERE pseudo=\''. $_SESSION['pseudo'] .'\'';
echo $pop;
$requete=$bdd->query($pop);
$util=$bdd->prepare('INSERT INTO utilisation(pseudo,titre,temps,timestamp,fin,multiplication,rajout,classe_rajout,date) VALUES(?,?,?,?,?,?,?,?,?)');
$util->execute(array($_SESSION['pseudo'], $donnees['des'], $donnees['duree'],time(),time()+($donnees['duree']*60), 0, $donnees['rajoutage'], $donnees['classe_rajoutage'],date('d-m-Y')));
$delete=$bdd->prepare('DELETE FROM inventaire WHERE ID=?');
$delete->execute(array($_GET['id_y']));
header('Location: ../inventaire.php?id=1');
}
else
{
$add=$inf['' . $donnees['classe_rajoutage'] .''] + $donnees['rajoutage'];
$pop='UPDATE jeu SET '. $donnees['classe_rajoutage'] .'='.$add. ' WHERE pseudo=\''. $_SESSION['pseudo'] .'\'';
echo $pop;
$requete=$bdd->query($pop);
$util=$bdd->prepare('INSERT INTO utilisation(pseudo,titre,temps,timestamp,fin,multiplication,rajout,classe_rajout,date) VALUES(?,?,?,?,?,?,?,?,?)');
$util->execute(array($_SESSION['pseudo'], $donnees['des'], $donnees['duree'],time(),time()+($donnees['duree']*60), 0, $donnees['rajoutage'], $donnees['classe_rajoutage'],date('d-m-Y')));
$delete=$bdd->prepare('DELETE FROM inventaire WHERE ID=?');
$delete->execute(array($_GET['id_y']));
header('Location: ../inventaire.php?id=1');
}
}
}
else header('Location: ../inventaire.php?id=4');
}
else header('Location: ../inventaire.php?id=2');
}
else header('Location: ../inventaire.php?id=3');