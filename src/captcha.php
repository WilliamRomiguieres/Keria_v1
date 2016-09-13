<?php
// Démarage d'une session
session_start();
// création d'une chaine de caractères (faire attention à ne pas avoir d'éléments qui peuvent parraitre confus tels que 1,l,I,0,O....
$liste = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
// Initialisation du code finale
$code = '';
 
// Tant que le code n'a pas 4 caractère, on lui en ajoute un aléatoirement à partir de la chaine de caractères
while(strlen($code) != 4){
    $code .= $liste[rand(0,strlen($liste))];
}
 
//On va maintenant générer l'image
// on crée une image de 50 pixels par 20 pixels :
$img = imageCreate(200, 30);
 
//On lui attribue des couleurs
$white = imageColorAllocate($img,255,255,255);
$noir = imageColorAllocate($img,0,0,0);
 
//On crée le header qui permettra de savoir que ce document est une image
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header("Content-type: image/jpeg");
 
/* On insère la variable $code dans l'image avec la fonction ImageTTFText
 Cette fonction permet aussi de choisir la police avec laquelle on écrit, donc autant en mettre une qui soit le plus difficile à lire*/
ImageTTFText($img,30,0,15,25,$noir, 'visitor1.ttf',$code);
// on crée ensuite l'image jpg compréssé à 40%
imagejpeg($img,'',40);
imageDestroy($img);
 
/* Pour finir On initialise la variable $_SESSION['code'] avec le code aléatoire, cette variable se retrouvera donc dans la page suivante crypté en md5...*/
$_SESSION['code']= md5($code);
?>