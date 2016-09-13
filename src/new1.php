<?php
session_start();
if(!empty($_SESSION['pseudo']) AND !empty($_POST['titre']) AND !empty($_POST['message']))
{
include("connect.php");
$req=$bdd->prepare('INSERT INTO sujet(ip,pseudo,message,cat_id,date,date_derniere,titre) VALUES(?,?,?,?,?,?,?)');
$req->execute(array($_SERVER['REMOTE_ADDR'],$_SESSION['pseudo'],$_POST['message'],$_GET['id'],date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),$_POST['titre']));
header('Location: viewcat.php?id='. $_GET['id'] .'');
}
else echo'Beurk';?>