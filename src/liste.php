<?php
session_start();
include("menu.php");
include("connect.php");?>
<table>
<?php
$mes=$bdd->query('SELECT ID FROM inscription');
while($do=$mes->fetch())
{
$messages++;
}
if(empty($_GET['page']))
{
$_GET['page']=1;
}
$nombreUtilisateursParPage=10;
$ma=$nombreUtilisateursParPage*($_GET['page']-1);
$requete='SELECT pseudo, DATE_FORMAT(date, \'%d-%m-%Y %Hh%imin %ss\') AS date FROM inscription LIMIT '. $ma .','. $nombreUtilisateursParPage .'';
$req=$bdd->query($requete);
while($donnees=$req->fetch())
{
echo '<tr><td>'. $donnees['pseudo'] .'</td><td>'. $donnees['date'] .'</td></tr>';
}
$nombreDePages=$messages/$nombreUtilisateursParPage;
$reste=$messages%$nombreUtilisateursParPage;
if($reste!=0)
{
$nombreDePages=ceil($nombreDePages);
}?>
</table>
Pages: 
<?php
for($i=1;$i<=$nombreDePages;$i++)
{
if($i==$_GET['page'])
{?>
<?php echo $i;?>, 
<?php
}
