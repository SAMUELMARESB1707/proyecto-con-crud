<?php
include("../conexion.php");
include("../barra_lateral.php");
$usuarioingresado = $_SESSION['usuario'];
$pagina = $_GET['pag'];
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM calif WHERE id='$id'");
header("Location:../calificaciones_tabla.php?pag=$pagina");

?>