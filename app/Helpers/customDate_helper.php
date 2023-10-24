<?php

/* 
 * Helper criado para alterar a data antes de salvar no banco
 */

function novaData ($data){
  $novaData = date_format(new DateTime($data), 'Y-m-d');
  return $novaData;
}
function importData($data){
  $novaData = explode("/",$data);
  $outraData = $novaData[2]."-".$novaData[1]."-".$novaData[0];
  return $outraData;
}