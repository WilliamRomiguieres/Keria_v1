<?php
session_start();
if(!empty($_SESSION['pseudo']) AND !empty($_POST['message']))
{
include("connect.php");
$req=$bdd->prepare('INSERT INTO reponse(ip,pseudo,message,id_topic,date) VALUES(?,?,?,?,?)');
$req->execute(array($_SERVER['REMOTE_ADDR'],$_SESSION['pseudo'],$_POST['message'],$_GET['id'],date('Y-m-d H:i:s')));
$aa=$bdd->prepare('SELECT ID FROM reponse WHERE message=? AND pseudo=?');
$aa->execute(array($_POST['message'],$_SESSION['pseudo']));
$donnees=$aa->fetch();
$reqe=$bdd->prepare('UPDATE sujet SET date_derniere = :date_derniere, derniere_page=:der, dernier_id=:dernier WHERE ID = :ID');
$reqe->execute(array(
'date_derniere' => date('Y-m-d H:i:s'),
'der'=>$_GET['page_der'],
'dernier'=>$donnees['ID'],
'ID' => $_GET['id']));
header('Location: viewtopic.php?page='. $_GET['page_der'] .'&&id='. $_GET['id'] .'');
}
else echo'Beurk';?>