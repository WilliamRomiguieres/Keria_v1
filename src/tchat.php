<?php
session_start();
include("connect.php");
if(!empty($_SESSION['pseudo']) AND !empty($_POST['message']))
{
$texte=htmlspecialchars($_POST['message']);
$texte=stripslashes($texte);
$texte = preg_replace('#\[b\](.+)\[/b\]#isU', '<strong>$1</strong>', $texte);
    $texte = preg_replace('#\[i\](.+)\[/i\]#isU', '<em>$1</em>', $texte);
    $texte = preg_replace('#\[color=(red|green|blue|yellow|purple|olive)\](.+)\[/color\]#isU', '<span style="color:$1">$2</span>', $texte);
    $texte = preg_replace('#http://[a-z0-9._/-]+#i', '<a href="$0">$0</a>', $texte);
	$texte = str_replace(':)', '<img src="emos/01.png"/>', $texte);
		$texte = str_replace('=)', '<img src="emos/01.png"/>', $texte);
			$texte = str_replace(':(', '<img src="emos/03.png"/>', $texte);
			$texte = str_replace('=(', '<img src="emos/03.png"/>', $texte);
$heure=date('H:i:s');
$reqe=$bdd->prepare('INSERT INTO tchat(ip,pseudo,message,heure) VALUES(?,?,?,?)');
$reqe->execute(array($_SERVER['REMOTE_ADDR'], $_SESSION['pseudo'], $texte, $heure));
}?>
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
<div id="corps">
<table>
<tr>
<td>Bienvenue sur le t'chat ! </td>
</tr>
<?php
if(!empty($_SESSION['pseudo']))
{?>
<tr>
<td Style="background-color: blue">Nouveau message</td>
</tr>
<tr>
<td><form method="post" action="tchat.php">
Message: <input type="text" name="message"/>
<input type="submit" value="Envoyer !"/>
</form></td>
</tr>
<?php
}
$req=$bdd->query('SELECT * FROM tchat ORDER BY ID DESC LIMIT 0,15');
while($donnees=$req->fetch())
{?>
<tr><td>[<?php echo $donnees['heure'];?>] <?php echo $donnees['pseudo'];?>: <?php echo $donnees['message'];?></td></tr>
<?php
}?>
</table>
</div>
<div id="pied_de_page">
<table>
<?php
include("pied_de_page.php");?>
</table>
</div>