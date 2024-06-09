<?php
include("../conexion.php");
include("../calificaciones_tabla.php");

$pagina = $_GET['pag'];
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM asignaturas");
$valor = $_GET['valor'];
$array = array ();
while ($fila = mysqli_fetch_array($result)) {
	$array = array_merge($array, array(
		$fila[$valor]
	));
}

$querybuscar = mysqli_query($conn, "SELECT calif.id, calif.id_alumn, calif.m1, calif.m2, calif.m3, calif.m4, calif.m5, calif.m6, calif.m7, calif.promedioFinal, alumnos.nombre FROM calif, alumnos WHERE calif.id = '$id'");

while ($fila = mysqli_fetch_array($querybuscar)):

?>
<html>
<link rel="stylesheet" href="../css/style.css">
<body>
	<div class="caja_popup2">
		<form class="contenedor_popup" method="POST">
			<table>
				<tr>
					<th colspan="2">Modificar producto</th>
				</tr>
				<tr>
					<td><b>Nombre: </b></td>
					<td><b><?php echo $fila['nombre']; ?></b></td>
				</tr>
				<tr>
					<td><b><?php echo $array[0]?></b></td>
					<td><input class="CajaTexto" type="number" step="1" name="m1" value="<?php echo $fila['m1']; ?>" required></td>
				</tr>
				<tr>
					<td><b><?php echo $array[1]?></b></td>
					<td><input class="CajaTexto" type="number" step="1" name="m2" value="<?php echo $fila['m2'];; ?>" required></td>
				</tr>
				<tr>
					<td><b><?php echo $array[2]?></b></td>
					<td><input class="CajaTexto" type="number" step="1" name="m3" value="<?php echo $fila['m3']; ?>" required></td>
				</tr>
				<tr>
					<td><b><?php echo $array[3]?></b></td>
					<td><input class="CajaTexto" type="number" step="1" name="m4" value="<?php echo $fila['m4']; ?>" required></td>
				</tr>
				<tr>
					<td><b><?php echo $array[4]?></b></td>
					<td><input class="CajaTexto" type="number" step="1" name="m5" value="<?php echo $fila['m5']; ?>" required></td>
				</tr>
				<tr>
					<td><b><?php echo $array[5]?></b></td>
					<td><input class="CajaTexto" type="number" step="1" name="m6" value="<?php echo $fila['m6']; ?>" required></td>
				</tr>

				<?php if ($_GET['valor'] > 1) {
						echo '<tr>
						<td><b> '.$array[6].'</b></td>
						<td><input class="CajaTexto" type="number" step="any" name="m7" value="'.$fila['m7'].'" required></td>
					</tr>';
					}
				?>
				<?php endwhile; ?>
				<tr>
					<td colspan="2">
						<?php echo "<a class='BotonesTeam' href=\"../calificaciones_tabla.php?pag=$pagina\">Cancelar</a>"; ?>&nbsp;
						<input class='BotonesTeam' type="submit" name="btnregistrar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar esta calificacion?');">
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>

</html>

<?php

if (isset($_POST['btnregistrar'])) {
	$m1	= $_POST['m1'];
	$m2 = $_POST['m2'];
	$m3 = $_POST['m3'];
	$m4 = $_POST['m4'];
	$m5 = $_POST['m5'];
	$m6 = $_POST['m6'];
	if ($_GET['valor'] > 1) {
		$m7 = $_POST['m7'];
	} else {
		$m7 = 0;
	}
	
	$consulta = mysqli_query($conn,"UPDATE calif SET m1='$m1', m2='$m2', m3='$m3', m4='$m4', m5='$m5', m6='$m6', m7='$m7' WHERE id = '$id'");
	echo "<script>window.location= '../calificaciones_tabla.php?pag=$pagina&valor=$valor'</script>";
}
?>