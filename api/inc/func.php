<?php
/*
function res2json_only($result){
  $rows=[];
  while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
  	$rows[]=$rs;
  }
  $tabjson = '{"obj":'.json_encode($rows).'}';
  return $tabjson;
}

function res2json($result){
  $rows=[];
  while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
  	$rows[]=$rs;
  }
  $tabjson = json_encode($rows);
  return $tabjson;
}*/

function res2json_only($result){
  $rows=[];
  while($rs = $result->fetch_assoc()) {
  	$rows[]=$rs;
  }
  $tabjson = '{"obj":'.json_encode($rows).'}';
  return $tabjson;
}

function res2json($result){
  $rows=[];
  while($rs = $result->fetch_assoc()) {
  	$rows[]=$rs;
  }
  $tabjson = json_encode($rows);
  return $tabjson;
}

function easy($easy){
  $coef = '5BY**246f6b386f6b87jH';

  $hexa ='';
  $a=0;
  $tab=$easy;

  for ($i=0; $i < strlen($tab);$i++){
    if ($a==2) {
      $hexa.=$tab[$i] ;
      $a=0;
    }
    elseif ($a==1){
      $a=2;
    }
    else{
      $a=1;
    }
  }

  $fp = fopen('results.txt', 'w');
  fwrite($fp, $hexa);
  fclose($fp);

  $hex='';
  $hex=str_replace('5BY**246f6b36f6b87jH', '', $hexa);//$password);
  //$hex=utf8_encode($hex);

  $string1='';
  for ($i=0; $i < strlen($hex)-1; $i+=2){
      $string1 .= chr(hexdec($hex[$i].$hex[$i+1]));
  }
  return $string1;
}

?>
