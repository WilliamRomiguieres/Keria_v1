<?php

$info=$bdd->prepare('SELECT * FROM jeu WHERE pseudo=?');
$info->execute(array($_SESSION['pseudo']));
$inf=$info->fetch();
$ora=$bdd->prepare('SELECT * FROM inscription WHERE pseudo=?');
$ora->execute(array($_SESSION['pseudo']));
$oran=$ora->fetch();
$population= $inf['chars']+$inf['snipers']+$inf['miliciens']+$inf['avions'];?>
<tr>
<td colspan="1.33">Argent: <?php echo $inf['argent'];?></td>
<td colspan="1.33">Superficie: <?php echo $inf['taille'];?></td>
<td colspan="2">Population: <?php echo $population;?></td>
</tr>
<?php
include("/utilitaires/utilisation.php");?>