<?php  include ("seguridad.php");
include ('conexion.php');
$id_nota = $_GET['id'];
$sql = "DELETE FROM notas WHERE id = $id_nota";
$result = $con->query( $sql );	

if ($result) 
    header('location: notas.php');

echo "<p>Error!</p> <a href='notas.php'>Volver</a>";

?>