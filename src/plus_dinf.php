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
<?php
if(!empty($_GET['page']) AND $_GET['page']=='Chars')
{?>
<table>
<tr>
<td colspan="2" Style="text-align: center; background-color: blue;">
<span Style="font-size: 25px;">Chars</span><br/>
</td>
</tr>
<tr>
<td><img src="images/chars.png"></td>
<td>
<p>Les chars produisent 100 de dégats mais seulement 50 de protection.<br/>
Les chars sont une classe qui attaque fort, mais il ne faut pas oublier d'acheter d'autres. Il ne faut pas oublier qu'une population importante peut dissuader un adversaire de vous attaque ;)<br/>
Le coût d'un char est relativement élevé vu qu'il est de 100 or.</p>
</td>
</tr>
</table>
<?php
}?>
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
header('Location: index.pp');
}?>