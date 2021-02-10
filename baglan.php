<?php
  try {
      $VeritabaniBaglantisi = new PDO("mysql:host=localhost;dbname=extraegitim;charset=UTF8", "root", "");
  } catch (Exception $e) {
    echo $e->getMessage();
    die();
  }

  function Filtre($deger){
    $bir = trim($deger);
    $iki = strip_tags($bir);
    $uc  = htmlspecialchars($iki, ENT_QUOTES);
    $sonuc = $uc;
    return $sonuc;
  }

  $ipadresi         = $_SERVER["REMOTE_ADDR"]; //kullanıcının ip adresini buluyor.
  $zamandamgasi     = time();
  $oykullanmasiniri = 86400;
  $zamanigerial     = $zamandamgasi-$oykullanmasiniri;

 ?>
