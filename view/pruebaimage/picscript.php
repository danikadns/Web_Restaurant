
<?php

include_once("../../model/functions.php");

$rs = mysql_query("SELECT Imagen FROM tabla_imagen");
$row = mysql_fetch_assoc($rs);
$imagebytes = $row['Imagen'];
header("Content-type: image/jpeg");
print $imagebytes;  
?>