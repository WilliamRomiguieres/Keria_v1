<?php
session_start();
include("../connect.php");
include("../informations.php");
$donnees['classe_rajoutage']='chars';
echo 'Voila i' . $inf[''. $donnees['classe_rajoutage'] .'']  +  $inf['chars']  .'';
?>