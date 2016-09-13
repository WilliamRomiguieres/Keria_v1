<?php
//Connexion à la base de données
session_start();
include("connect.php");
//On verifie si le pseudo existe
if(!empty($_POST['pseudo']) AND !empty($_POST['password']))
{
$req=$bdd->prepare('SELECT * FROM inscription WHERE pseudo=?');
$req->execute(array($_POST['pseudo']));
$donnees=$req->fetch();
if($donnees)
{
if($_POST['password']==$donnees['mdp'])
{
$_SESSION['id']=$donnees['ID'];
$_SESSION['pseudo']=$donnees['pseudo'];
$_SESSION['mdp']=$donnees['mdp'];
$_SESSION['ip']=$donnees['ip'];
$_SESSION['adresse_email']=$donnees['adresse_email'];
$_SESSION['rang']=$donnees['rang'];
echo 'Connexion réussie';
}
else echo 'Mauvais mot de passe';
}
else echo 'Mauvais pseudo';
}?>
<form method="post" action="connexion.php">
Pseudo: <input type="text" name="pseudo"/><br/>
Mot de passe: <input type="password" name="password"/></br/>
<input type="submit" value="Valider"/>
</form>