<?php
require_once("baglan.php");

$gelencevap   = Filtre($_POST["cevap"]);

$kontrolsorgusu = $VeritabaniBaglantisi->prepare("SELECT * FROM oykullananlar WHERE ipadresi = ? AND tarih >= ?");
$kontrolsorgusu->execute([$ipadresi, $zamanigerial]);
$kontrolsayisi  = $kontrolsorgusu->rowCount();

if ($kontrolsayisi>0) {
  echo "HATA <br>";
  echo "Daha önce oy kullanmışsınız. Lütfen en az 24 saat sonra tekrar deneyiniz.<br>";
  echo "Anasayfaya dönmek için <a href='index.php'>Tıklayınız</a>";
}else {
  if ($gelencevap==1) {
    $Guncelle = $VeritabaniBaglantisi->prepare("UPDATE anket SET oysayisibir=oysayisibir+1, toplamoysayisi=toplamoysayisi+1 ");
    $Guncelle->execute();
  }elseif ($gelencevap==2) {
    $Guncelle = $VeritabaniBaglantisi->prepare("UPDATE anket SET oysayisiiki=oysayisiiki+1, toplamoysayisi=toplamoysayisi+1 ");
    $Guncelle->execute();
  }elseif ($gelencevap==3) {
    $Guncelle = $VeritabaniBaglantisi->prepare("UPDATE anket SET oysayisiuc=oysayisiuc+1, toplamoysayisi=toplamoysayisi+1 ");
    $Guncelle->execute();
  }else {
    echo "HATA <br>";
    echo "Cevap Kaydı Bulunamıyor.<br>";
    echo "Anasayfaya dönmek için <a href='index.php'>Tıklayınız</a>";
  }

  $ekle = $VeritabaniBaglantisi->prepare("INSERT INTO oykullananlar (ipadresi, tarih) values (?, ?)");
  $ekle->execute([$ipadresi, $zamandamgasi]);
  $eklekontrol  = $ekle->rowCount();

  if ($eklekontrol>0) {
    echo "TEŞEKKÜRLER <br>";
    echo "Vermiş olduğunuz oy sisteme kaydedildi.<br>";
    echo "Anasayfaya dönmek için <a href='index.php'>Tıklayınız</a>";
  }else {
    echo "HATA <br>";
    echo "İşlem sırasında beklenmeyen bir hata oluştu. Lütfen daha sonra tekrar deneyiniz.<br>";
    echo "Anasayfaya dönmek için <a href='index.php'>Tıklayınız</a>";
  }















}
 ?>
