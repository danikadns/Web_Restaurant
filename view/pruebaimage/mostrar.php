<!DOCTYPE html>
<html>
<head>
<title>Mostrar Imagenes</title>
</head>
<body>
<center>
<table border="2">
<thead>
    <tr> 
        <th colspan="5"><a href="index.php">Nuevo</a></th>
    </tr>
<tr>
<th>id</th>
<th>Nombre</th>
<th>Imagen</th>
<th colspan="2">Operaciones</th>
</tr>
</thead>
<tbody>
<?php
include("conexion.php");
Squery= "SELECT * FROM images"; $resultado $conexion->query($query); while($row = $resultado->fetch_assoc()){
?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['user_id']; ?></td>
<td><img height="70px" src="data:image/png;base64,<?php echo base64_encode($row['image']); ?>"/></td>
<th><a href="#">Modificar</a></th>
<th><a href="#">Eliminar</a></th>
</tr>
<?php
}
?>
</table>
</center>
</body>
</html>