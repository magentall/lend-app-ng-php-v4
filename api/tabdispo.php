<?php
include 'inc/headjson.php';
include 'inc/req.php';
include 'inc/func.php';

$today=date("Y-m-d");


/*
$categorie = sprinf($_POST['categorie']);
if ($categorie!="Choix...") {
*/

$result = req("SELECT jeux.num_jeu,jeux.ref_jeu,nom_jeu,code_cat,code FROM jeux as jeux LEFT JOIN prets ON jeux.num_jeu = prets.num_jeu WHERE (prets.num_jeu IS NULL OR '$today' >= prets.date_retour) AND (jeux.code = '' OR jeux.code = '2' OR jeux.code = '1') ORDER BY num_jeu ASC");


$outp = res2json_only($result);

echo($outp);
?>
