<?php
function convertir($secondes)
{
$heures=$secondes/3600;
$reste1=$secondes%3600;
if($reste1!=0)
{
$heures=floor($heures);
$minutes=$reste1/60;
$reste2=$reste1%60;
if($reste2!=0)
{
$minutes=floor($minutes);
$secondes=$reste2;
}
else $secondes=0;
}
else
{
$minutes=0;
$secondes=0;
}
$temps=''. $heures .' H ' . $minutes .' min '. $secondes .' secondes.'; 
return $temps;
}
$req=$bdd->prepare('SELECT * FROM utilisation WHERE pseudo=?');
$req->execute(array($_SESSION['pseudo']));
$popoi=$bdd->prepare('SELECT * FROM utilisation WHERE pseudo=?');
$popoi->execute(array($_SESSION['pseudo']));
$popoiu=$popoi->fetch();
if($popoiu)
{
$upup=$bdd->prepare('UPDATE utilisation SET timestamp=:time WHERE pseudo=:pseudo');
$upup->execute(array(
'time'=>time(),
'pseudo'=>$_SESSION['pseudo']));
}
while($tamb=$req->fetch())
{?>
<table>
<tr>
<td Style="background-color: orange;"><?php echo $tamb['titre'];?>. Ca se termine dans <?php echo convertir($tamb['fin']-$tamb['timestamp']);?></td>
</tr>
</table>
<?php
if($tamb['multiplication']!=0)
{
$lilolo=true;
}
if(time()>=$tamb['fin'])
{
$supprimutil=$bdd->prepare('DELETE FROM utilisation WHERE ID=?');
$supprimutil->execute(array($tamb['ID']));
if($tamb['rajout']!=0)
{
$addon=$inf['' . $tamb['classe_rajout'] .''] - $tamb['rajout'];
$aaa='UPDATE jeu SET '. $tamb['classe_rajout'] .'='.$addon. ' WHERE pseudo=\''. $_SESSION['pseudo'] .'\'';
$utilis=$bdd->query($aaa);
}
if($tamb['multiplication']!=0)
{
$requete=$bdd->prepare('UPDATE jeu SET attaque=:attaque, défense=:defense WHERE pseudo=:pseudo');
$requete->execute(array(
'attaque'=>$inf['attaque']/$tamb['multiplication'], 
'defense'=>$inf['défense']/$tamb['multiplication'],
'pseudo'=>$_SESSION['pseudo']));
}
}
}?>
