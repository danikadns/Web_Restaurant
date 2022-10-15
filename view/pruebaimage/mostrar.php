<!DOCTYPE html>
<html>
<head>
<title>Mostrar Imagenes</title>
</head>
<body>

<?php
include("conexion.php");
$query= "SELECT * FROM tabla_imagen"; 
$resultado = $conexion->query($query); 
$row = $resultado->fetch_assoc();
?>
<img height="70px" src="data:image/jpg;base64,<?php echo base64_encode($row['Imagen']); ?>"/>
<?php
?>
</body>
</html>