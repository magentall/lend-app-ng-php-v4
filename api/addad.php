<?php

include 'inc/req.php';

//session_start();

//id_adh,prenoms_responsables,prenoms_enfants,date_adh,type_adh,code_postal,ville,num_tel,num_portable,adresse,alias,pswd,noms_adherent

$_POST = json_decode(file_get_contents('php://input'), true);
if (isset($_POST)&& !empty($_POST)){
  $id_adh = intval($_POST['id_adh'])  ;
  $noms_adherent = sprinf($_POST['noms_adherent']);
  $prenoms_responsables = sprinf($_POST['prenoms_responsables']);
  $prenoms_enfants = sprinf($_POST['prenoms_enfants']);
  $alias = sprinf($_POST['alias']);
  $key = sprinf($_POST['pswd']);
  $date_adh = sprinf($_POST['date_adh']);
  $type_adh = sprinf($_POST['type_adh']);
  $code_postal = sprinf($_POST['code_postal']);
  $ville = sprinf($_POST['ville']);
  $num_tel = intval($_POST['num_tel']);
  $num_portable = intval($_POST['num_portable']);
  $adresse = sprinf($_POST['adresse']);


// HAVE TO CHECK IF alias already exists
  $isalias = "SELECT num_adherent FROM adherents WHERE adherents.alias='$alias'";

  $res1 = req($isalias);

  while($rs = $res1->fetch_array(MYSQLI_ASSOC)) {
     $test=$rs["num_adherent"];
   }

  if ($test!='') {
    ?>
               {
                 "success": false,
                 "message": "Existe déjà ou Alias et password incomplets"
               }
    <?php
    exit();
  }

  $sql = "INSERT INTO adherents (id_adh, noms_adherent, prenoms_responsables, prenoms_enfants, alias, key_ad, date_adh, type_adh, code_postal, ville, num_tel, num_portable, adresse) VALUES ('$id_adh', '$noms_adherent', '$prenoms_responsables', '$prenoms_enfants', '$alias', '$key', '$date_adh', '$type_adh', '$code_postal', '$ville', '$num_tel', '$num_portable', '$adresse')";

    $result = req($sql);
    if($result){


    ?>
              {
                "success": true,
                "message": "Adhérent enregistré"
              }
   <?php
   }else{
   ?>
              {
                "success": false,
                "message": "Existe déjà."
              }
   <?php
   }

} else {
  //var_dump($_POST);
  ?>
              {
                "success": false,
                "message": "Only Post Access"
              }
  <?php
}
?>
