<?php

<head>
<title>Keria</title>
 <link rel="stylesheet" media="screen" type="text/css" title="Design" href="design.css" />
</head>
<body>
<table>
<div id="banniere">
<?php
include("banniere.php")
?>
</div>
<div id="corps">
<?php
if(!empty($_SESSION['id']) AND $_SESSION['id']==1)
{?>
<tr>
<td Style="background-color: green"><b>Inscription réussie ! Connecte toi dès maintenant.</b></td>
</tr>
<?php
}
if(!empty($_SESSION['id']) AND $_SESSION['id']==2)
{?>
<tr>
<td Style="background-color: red"><b>Tous les champs ne sont pas remplis ou le mdp est différent de la confirmation.</b></td>
</tr>
<?php
}
if(!empty($_SESSION['id']) AND $_SESSION['id']==3)
{?>
<tr>
<td Style="background-color: red"><b>Le pseudo doit faire au moins 3 caractères et doit contenir que des majuscules des minuscules et des chiffres.</b></td>
</tr>
<?php
}
if(!empty($_SESSION['id']) AND $_SESSION['id']==4)
{?>
<tr>
<td Style="background-color: red"><b>Le mot de passe doit faire au moins 3 caractères et ne pas contenir de caractères spéciaux</b></td>
</tr>
<?php
}
if(!empty($_SESSION['id']) AND $_SESSION['id']==5)
{?>
<tr>
<td Style="background-color: red"><b>Adresse e-mail invalide !</b></td>
</tr>
<?php
}
if(!empty($_SESSION['id']) AND $_SESSION['id']==6)
{?>
<tr>
<td Style="background-color: red"><b>Erreur dans la connexion.</b></td>
</tr>
<?php
}
if(!empty($_SESSION['id']) AND $_SESSION['id']==7)
{?>
<tr>
<td Style="background-color: red"><b>Mauvais code de confirmation.</b></td>
</tr>
<?php
}if(!empty($_SESSION['id']) AND $_SESSION['id']==8)
{?>
<tr>
<td Style="background-color: red"><b>Le pseudo est déjà utilisé.</b></td>
</tr>
<?php
}?>
<tr>
<td colspan="4">
<form method="post" action="co.php" class="test">
Psd:<input type="text" name="pseudo"/>
Mdp:<input type="password" name="password"/>
<input type="submit" name="submit" value="Go"/>
</form>
</p>
</td>
</tr>
<tr>
<td colspan="4">
<p class="connect"> S'inscrire</p>
<?php
if(!empty($_POST['ins']) AND $_POST['ins']==1)
{
echo 'Inscription réussie';
}?>
<p>
<form method="post" action="ins.php">
Pseudo:<input type="text" name="pseudo"/><br/>
Mot de passe:<input type="password" name="password"/></br>
Confirmer:<input type="password" name="c_password"/></br>
Adresse e-mail: <input type="text" name="adresse_email"/></br>
<img src="captcha.php"/> <input type="text" name="captcha"/><br/>
<input type="submit" name="submit" value="S'enregistrer !"/>
</form>
</td>
</tr>
</div>
<div id="pied_de_page">
<?php
include("pied_de_page.php");?>
</div>
<?php
session_destroy();?>