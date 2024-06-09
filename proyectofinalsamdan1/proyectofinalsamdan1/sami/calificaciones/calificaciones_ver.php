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

$querybuscar = mysqli_query($conn, "SELECT calif.id, calif.id_alumn, calif.m1, calif.m2, calif.m3, calif.m4, calif.m5, calif.m6, calif.m7, calif.promedioFinal, alumnos.nombre, alumnos.semestre FROM calif, alumnos where calif.id_alumn = alumnos.id  and calif.id = '$id'");

while ($fila = mysqli_fetch_array($querybuscar)):
?>
<html>
<link rel="stylesheet" href="../css/style.css">
<body>
	<div class="caja_popup2">
		<form class="contenedor_popup" method="POST">
			<table>
				<tr>
					<th colspan="2">Ver producto</th>
				</tr>
				<tr>
					<td><b>Id:</b></td>
					<td><?php echo $fila['id']; ?></td>
				</tr>
				<tr>
					<td><b>Nombre: </b></td>
					<td><?php echo $fila['nombre']; ?></td>
				</tr>
				<tr>
					<td><b><?php echo $array[0]?></b></td>
					<td><?php echo $fila['m1']; ?></td>
				</tr>
				<tr>
					<td><b><?php echo $array[1]?></b></td>
					<td><?php echo $fila['m2']; ?></td>
				</tr>
				<tr>
					<td><b><?php echo $array[2]?></b></td>
					<td><?php echo $fila['m3']; ?></td>
				</tr>
				<tr>
					<td><b><?php echo $array[3]?></b></td>
					<td><?php echo $fila['m4']; ?></td>
				</tr>
				<tr>
					<td><b><?php echo $array[4]?></b></td>
					<td><?php echo $fila['m5']; ?></td>
				</tr>
				<tr>
					<td><b><?php echo $array[5]?></b></td>
					<td><?php echo $fila['m6']; ?></td>
				</tr>

				<?php if ($_GET['valor'] > 1) {
						echo "<tr>
						<td><b> ".$array[6]."</b></td>
						<td> ".$fila['m7']."</td>
						</tr>";
					}
				?>

				<?php endwhile;?>

					<td colspan="2">
						<?php echo "<a class='BotonesTeam' href=\"../calificaciones_tabla.php?pag=$pagina&valor=$valor\">Regresar</a>"; ?>
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>

</html>