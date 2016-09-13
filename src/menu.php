<tr>
<td><a href="accueil.php">Index</a></td>
<td><a href="gestion.php">Gestion</a></td>
<td><a href="boutique.php">Boutique</a></td>
<td><a href="forum.php">Forum</a></td>
</tr>
<tr>
<td><a href="alliance.php">Alliance</a></td>
<td><a href="attaquer.php">Attaquer <?php echo $inf['attaque_restante'];?></a></td>
<?php
$nomb=0;
$nn=$bdd->prepare('SELECT * FROM mp WHERE destinataire=? AND lu=?');
$nn->execute(array($_SESSION['pseudo'],0));
while($pp=$nn->fetch())
{
$nomb++;
}
if($nomb>0)
{?>
<td Style="background-color: red;"><a href="mp.php">Mp <?php echo $nomb;?> </a></td>
<?php
}
else
{?>
<td><a href="mp.php">Mp</a></td>
<?php
}?>
<td><a href="inventaire.php">Inventaire</a></td>
</tr>