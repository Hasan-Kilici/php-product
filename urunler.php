<?php require_once('Connections/urun.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_urun, $urun);
$query_Recordset1 = "SELECT * FROM urun_giris";
$Recordset1 = mysql_query($query_Recordset1, $urun) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ürünler</title>
</head>
<body>
<img src="img/banner.jpg" class="banner"/>
<div class="sidebar">
<a href="index.php">Anasayfa</a>
<a href="hakkimizda.php">Hakkımızda</a>
<a href="iletisim.php">İletişim</a>
<a href="urunler.php">Ürünler</a>
</div>
<div class="main">
<center><br />
<table border="1">
  <tr>
    <td>numara</td>
    <td>urunad</td>
    <td>urunfiyat</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Recordset1['numara']; ?></td>
      <td><?php echo $row_Recordset1['urunad']; ?></td>
      <td><?php echo $row_Recordset1['urunfiyat']; ?></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
</center>
</div>
<div class="footer">
Hasan KILICI
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
