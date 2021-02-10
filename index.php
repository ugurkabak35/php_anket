<?php
require_once("baglan.php");
 ?>
<!DOCTYPE html>
<html lang="tr-TR" >
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $anketsorgusu = $VeritabaniBaglantisi->prepare("SELECT * FROM anket LIMIT 1");
    $anketsorgusu->execute();
    $kayitsayisi = $anketsorgusu->rowCount();
    $kayit       = $anketsorgusu->fetch(PDO::FETCH_ASSOC);

    if($kayitsayisi>0){
     ?>
     <form action="oyver.php" method="post">
    <table width="300" align="center" border="0" cellpadding="0" cellspacing="0">
      <tr height="30">
          <td colspan="2"><?php echo $kayit["soru"]; ?></td>
      </tr>
      <tr height="30">
          <td width="25"><input type="radio" name="cevap" value="1"></td>
          <td width="275"> <?php echo $kayit["cevapbir"]; ?></td>
      </tr>
      <tr height="30">
          <td width="25"><input type="radio" name="cevap" value="2"></td>
          <td width="275"> <?php echo $kayit["cevapiki"]; ?></td>
      </tr>
      <tr height="30">
          <td width="25"><input type="radio" name="cevap" value="3"></td>
          <td width="275"> <?php echo $kayit["cevapuc"]; ?></td>
      </tr>
      <tr height="30">
          <td colspan="2"><input type="submit" value="Oyumu Gönder"></td>
      </tr>
      <tr height="30">
          <td colspan="2" align="right"><a href="sonuclar.php" style="color:blue; text-decoration:none;">Anket Sonuçlarını Göster</a></td>
      </tr>
    </table>
  </form>
    <?php
    }else {
    ?>
    Anket Bulunmuyor .
    <?php
    }
     ?>
  </body>
</html>
<?php
$VeritabaniBaglantisi = null;
 ?>
