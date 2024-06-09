<?php
include('conexion.php');
include("barra_lateral.php");
?>
<html>
<title>crud4AMP</title>

<body>
	<div class="ContenedorPrincipal">
		<?php

		$filasmax = 7;

		if (isset($_GET['pag'])) {
			$pagina = $_GET['pag'];
		} else {
			$pagina = 1;
		}

		$resultadoMaximo = mysqli_query($conn, "SELECT count(*) as num_calif FROM calif");

		$maxusutabla = mysqli_fetch_assoc($resultadoMaximo)['num_calif'];

		if (isset($_GET['valor']) && ($_GET['valor'] >= 1 || $_GET['valor'] <= 6)) {
			$result = mysqli_query($conn, "SELECT * FROM asignaturas");
			$valor = $_GET['valor'];
			$array = array ();
			while ($fila = mysqli_fetch_array($result)) {
				$array = array_merge($array, array(
					$fila[$valor]
				));
			}
		}
		?>
		<div class="ContenedorTabla">
			<form method="POST">
				<h1>Lista de calificaciones</h1>
				<div class="ContBuscar">
					<div style="float: left;">
						<a href="calificaciones_tabla.php" class="BotonesTeam">Inicio</a>
					</div>
					<div style:="float: center">
					</div>
					<div style="float:right;">
						<?php echo "<a class='BotonesTeam5' href=\"calificaciones/calificaciones_registrar.php?pag=$pagina\">Agregar calificacion</a>"; ?>
					</div>
				</div>
			</form>
			<table>
				<tr>
					<?php if(!isset($_GET['valor'])) :?>
						<th colspan="6">
							<select id="seme" onchange="semestre(this.options[this.selectedIndex].value)">
								<option value="">Selecciona un semestre</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
							</select>
						</th>

					<?php endif; if (isset($_GET['valor'])): ?>
					<th>Id</th>
					<th>Nombre</th>
					<th><?php echo $array[0]?></th>
					<th><?php echo $array[1]?></th>
					<th><?php echo $array[2]?></th>
					<th><?php echo $array[3]?></th>
					<th><?php echo $array[4]?></th>
					<th><?php echo $array[5]?></th>
					<?php if (isset($_GET['valor'])) {
						if ($_GET['valor'] > 1) {
							echo "<th> $array[6]</th>";
						}
					}
					?>
					<th>Acción</th>
				<?php endif; ?>
				</tr>

				<?php
				if (isset($_GET['valor'])) {
					$semestre = $_GET['valor'];
					$sem = mysqli_query($conn, "SELECT calif.id, calif.id_alumn, calif.m1, calif.m2, calif.m3, calif.m4, calif.m5, calif.m6, calif.m7, calif.promedioFinal, alumnos.nombre, alumnos.semestre FROM calif, alumnos where calif.id_alumn = alumnos.id AND semestre = '$semestre' ORDER BY id ASC LIMIT " . (($pagina - 1) * $filasmax)  . "," . $filasmax);

					while ($mostrar = mysqli_fetch_assoc($sem)) {
							/*switch ($semestre) {
								case 1: {
									
								}
							}*/
						echo "<tr>";
						echo "<td>" . $mostrar['id'] . "</td>";
						echo "<td>" . $mostrar['nombre'] . "</td>";
						echo "<td>" . $mostrar['m1'] . "</td>";
						echo "<td>" . $mostrar['m2'] . "</td>";
						echo "<td>" . $mostrar['m3'] . "</td>";
						echo "<td>" . $mostrar['m4'] . "</td>";
						echo "<td>" . $mostrar['m5'] . "</td>";
						echo "<td>" . $mostrar['m6'] . "</td>";
						echo "<td>" . $mostrar['m7'] . "</td>";
						echo "<td style='width:24%'>
						<a class='BotonesTeam1' href=\"./calificaciones/calificaciones_ver.php?id=$mostrar[id]&pag=$pagina&valor=$valor\">&#x1F50D;</a> 
						<a class='BotonesTeam2' href=\"./calificaciones/calificaciones_modificar.php?id=$mostrar[id]&pag=$pagina&valor=$valor\">&#128397;</a> 
						<a class='BotonesTeam3' href=\"./calificaciones/calificaciones_eliminar.php?id=$mostrar[id]&pag=$pagina&valor=$valor\" onClick=\"return confirm('¿Estás seguro de eliminar el producto $mostrar[nombre]?')\">&#10006;</a>
						</td>";
					}
				}

				?>
			</table>
		</div>
		<div style='text-align:right'>
			<br>
		</div>
		<div style="text-align:center">
			<?php
			if (isset($_GET['pag'])) {
				if ($_GET['pag'] > 1) {
			?>
					<a class="BotonesTeam4" href="productos_tabla.php?pag=<?php echo $_GET['pag'] - 1; ?>">Anterior</a>
				<?php
				} else {
				?>
					<a class="BotonesTeam4" href="#" style="pointer-events: none">Anterior</a>
				<?php
				}
				?>

			<?php
			} else {
			?>
				<a class="BotonesTeam4" href="#" style="pointer-events: none">Anterior</a>
				<?php
			}

			if (isset($_GET['pag'])) {
				if ((($pagina) * $filasmax) < $maxusutabla) {
				?>
					<a class="BotonesTeam4" href="productos_tabla.php?pag=<?php echo $_GET['pag'] + 1; ?>">Siguiente</a>
				<?php
				} else {
				?>
					<a class="BotonesTeam4" href="#" style="pointer-events: none">Siguiente</a>
				<?php
				}
				?>
			<?php
			} else {
			?>
				<a class="BotonesTeam4" href="productos_tabla.php?pag=2">Siguiente</a>
			<?php
			}
			?>
		</div>
	</div>
	<script>
		function semestre(valor) {
			let url = "./calificaciones_tabla.php?pag=1&valor="+valor;
				window.location.href = url;
		}
	</script>
</body>

</html>