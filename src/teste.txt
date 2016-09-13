<?php
include("connect.php");
for($i=0;$i<12;$i++)
{
$req=$bdd->query('DELETE FROM sujet');
}?>