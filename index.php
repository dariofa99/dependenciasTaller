<html>
<head>
<title>Taller</title>
</head>
<body>

<?php

// Dirección o IP del servidor MySQL
   $host = "54.158.192.144";
   // Puerto del servidor MySQL
   $puerto = "3306";
   // Nombre de usuario del servidor MySQL
   $usuario = "userApp";
   // Contraseña del usuario
   $contrasena = "userpass";
   // Nombre de la base de datos
   $baseDeDatos ="dependencias";
   // Nombre de la tabla a trabajar
   $tabla = "dependencias";
// Ip Instancia
echo "IP Instancia: ".$_SERVER['SERVER_ADDR']."<br/>";
 
function connect()
{
global $host, $puerto, $usuario, $contrasena, $baseDeDatos, $tabla;
if (!($connect = mysqli_connect($host.":".$puerto, $usuario, $contrasena)))
{
echo "Error conectando a la base de datos.<br>"; exit();
}
else
{
echo "Conectado al servidor de bases de datos.<br>";
}
if (!mysqli_select_db($connect, $baseDeDatos))
{
echo "Error seleccionando la base de datos.<br>"; exit();
}
else
{
echo "Base de datos: $baseDeDatos <br>";
}
return $connect;
}

$connect = connect();
$query = "SELECT dependencia, telefono, area, extension,direccion FROM $tabla;";

$result = mysqli_query($connect, $query);

?>

<table border="1">
<table border="1">
<tr>
<td>Dependencia</td>
<td>Teléfono</td>
<td>Área</td>
<td>Ext.</td>
<td>
    Dirección
</td>
<tr>

<?php

while($row = mysqli_fetch_array($result))
{
 
printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",
$row["dependencia"],$row["telefono"],$row["area"],$row["extension"],$row["direccion"]);
}

mysqli_free_result($result); mysqli_close($link);

?>

</table>
</body>
</html>
