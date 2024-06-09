<?php
include("../conexion.php");
include("../calificaciones_tabla.php");
$pagina = $_GET['pag'];

if (isset($_GET['valor']) && ($_GET['valor'] >= 1 || $_GET['valor'] <= 6)) {
	$result = mysqli_query($conn, "SELECT * FROM asignaturas");
	$valor = $_GET['valor'];
	$array = array();
	while ($fila = mysqli_fetch_array($result)) {
		$array = array_merge($array, array(
			$fila[$valor]
		));
	}
}

$sql = "SELECT id, nombre, semestre FROM alumnos";
$result = mysqli_query($conn, $sql);

/*$resu = mysqli_query($conn, "SELECT * FROM asignaturas");
$array = array ();
while ($fila = mysqli_fetch_array($resu)) {
	$array = array_merge($array, array(
	$fila[$val]
));
}*/
$i = 0;
?>
<html>
<link rel="stylesheet" href="../css/style.css">

<body>
	<div class="caja_popup2">
		<form class="contenedor_popup" method="POST">
			<table>
				<tr>
					<th colspan="2">Agregar producto</th>
				</tr>
				<tr>
					<td><b>Alumno:</b></td>
					<td>
						<select name="alumno" id="alumno" onchange="semestre(this.options[this.selectedIndex].value)">
							<option value="">Selecciona un alumno</option>
							<?php while($fila = mysqli_fetch_array($result)): $name =  $fila['nombre']; ?>
							<option value="<?php echo $fila['semestre']; ?>">
							<?php echo $fila['nombre']; ?></option>
							<?php endwhile; ?>
						</select>
					</td>
				</tr>

				<?php if (isset($_GET['valor'])) : ?>
				<tr>
					<td><?php echo $array[0]?></td>
					<td><input type="number" class="CajaTexto" name="m1" id="m1" max="10"></td>
				</tr>
				<tr>
					<td><?php echo $array[1]?></td>
					<td><input type="number" class="CajaTexto" name="m2" id="m2" max="10"></td>
				</tr>
				<tr>
					<td><?php echo $array[2]?></td>
					<td><input type="number" class="CajaTexto" name="m3" id="m3" max="10"></td>
				</tr>
				<tr>
					<td><?php echo $array[3]?></td>
					<td><input type="number" class="CajaTexto" name="m4" id="m4" max="10"></td>
				</tr>
				<tr>
					<td><?php echo $array[4]?></td>
					<td><input type="number" class="CajaTexto" name="m5" id="m5" max="10"></td>
				</tr>
				<tr>
					<td><?php echo $array[5]?></td>
					<td><input type="number" class="CajaTexto" name="m6" id="m6" max="10"></td>
				</tr>
				<?php if ($valor > 1) {
					echo '<tr>
						<td>'.$array[6].'</td>
						<td><input type="number" class="CajaTexto" name="m7" id="m7" max="10"></td>
					</tr>';
				}
			endif;
				?>
				<tr>
					<td colspan="2">
						<?php echo "<a class='BotonesTeam' href=\"../calificaciones_tabla.php?pag=$pagina\">Cancelar</a>"; ?>&nbsp;
						<?php if (isset($_GET['valor'])) { echo '<input class="BotonesTeam" type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm("¿Deseas registrar esta calificacion");">'; } ?>
					</td>
				</tr>
			</table>
		</form>
	</div>
	<script>
	function semestre(valor) {
		let url = "./calificaciones_registrar.php?pag=1&valor=" + valor + "&alumno=<?php echo $name; ?>";
		window.location.href = url;
	}
</script>
</body>


</html>
<?php

if (isset($_POST['btnregistrar'])) {
	$name = $_GET ['alumno'];
	$m1 	= $_POST['m1'];
	$m2 	= $_POST['m2'];
	$m3 	= $_POST['m3'];
	$m4 	= $_POST['m4'];
	$m5 	= $_POST['m5'];
	$m6 	= $_POST['m6'];
	$m7 = null;

	if ($valor > 1) {
		$m7 	= $_POST['m7'];
	} else {
		$m7 = 0;
	}

	$id = mysqli_fetch_array(mysqli_query($conn, "SELECT id FROM alumnos WHERE nombre = '$name'"))['id'];
	
	mysqli_query($conn, "INSERT INTO calif(id_alumn, m1, m2, m3, m4, m5, m6, m7) VALUES('$id','$m1','$m2','$m3', '$m4', '$m5', '$m6', '$m7')");

	echo "<script> alert('calificacion registrada con exito: $pronom'); window.location='../calificaciones_tabla.php' </script>";
}
?>