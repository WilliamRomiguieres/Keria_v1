<?php
session_start();
if(!empty($_SESSION['pseudo']))
{
include("connect.php");
include("utilitaires/bot.php");?>
<head>
<title>Keria</title>
 <link rel="stylesheet" media="screen" type="text/css" title="Design" href="design.css" />
</head>
<body>
<div id="banniere">
<table>
<?php
include("banniere.php");?>
</table>
</div>
<div id="info">
<table>
<?php
include('informations.php');?>
</table>
</div>
<div id="menu">
<table>
<?php
include("menu.php");?>
</table>
</div>
<div id="corps">
<table>
<tr>
<td Style="text-align: center; background-color: blue;">Nom du forum</td>
</tr>
<tr>
<td ><a href="viewcat.php?id=1">Premier forum</td>
</tr>
</table>
</div>
<div id="pied_de_page">
<table>
<?php
include("pied_de_page.php");?>
</table>
</div>
<?php
}
else
{
header('Location: index.php');
}?>