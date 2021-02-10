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

    $anketinbirincisikkiicinoysayisi = $kayit["oysayisibir"];
    $anketinikincisikkiicinoysayisi  = $kayit["oysayisiiki"];
    $anketinucuncusikkiicinoysayisi  = $kayit["oysayisiuc"];
    $anketintoplamoysayisi           = $kayit["toplamoysayisi"];

    $birincisecenekicinyuzdehesapla  = ($anketinbirincisikkiicinoysayisi/$anketintoplamoysayisi)*100;
    $birincisecenekicinyuzde         = number_format($birincisecenekicinyuzdehesapla, 2, ",","");//virgülden sonra 2 basamak olsun virgülle ayırsın binlik hanesi boş olsun
    $ikincisecenekicinyuzdehesapla  = ($anketinikincisikkiicinoysayisi/$anketintoplamoysayisi)*100;
    $ikincisecenekicinyuzde         = number_format($ikincisecenekicinyuzdehesapla, 2, ",","");
    $ucuncusecenekicinyuzdehesapla  = ($anketinucuncusikkiicinoysayisi/$anketintoplamoysayisi)*100;
    $ucuncusecenekicinyuzde        = number_format($ucuncusecenekicinyuzdehesapla, 2, ",","");
    if($kayitsayisi>0){
     ?>
    <table width="300" align="center" border="0" cellpadding="0" cellspacing="0">
      <tr height="30">
          <td colspan="2"><?php echo $kayit["soru"]; ?></td>
      </tr>
      <tr height="30">
          <td width="75">% <?php echo $birincisecenekicinyuzde; ?></td>
          <td width="225"> <?php echo $kayit["cevapbir"]; ?></td>
      </tr>
      <tr height="30">
        <td width="75">% <?php echo $ikincisecenekicinyuzde; ?></td>
          <td width="225"> <?php echo $kayit["cevapiki"]; ?></td>
      </tr>
      <tr height="30">
        <td width="75">% <?php echo $ucuncusecenekicinyuzde; ?></td>
          <td width="225"> <?php echo $kayit["cevapuc"]; ?></td>
      </tr>
      <tr height="30">
          <td colspan="2" align="right"><a href="index.php" style="color:blue; text-decoration:none;">Anasayfaya Dön</a></td>
      </tr>
    </table>
    <?php
    }else {
      header("Location:index.php");
      exit();
    }
     ?>
  </body>
</html>
<?php
$VeritabaniBaglantisi = null;
 ?>
