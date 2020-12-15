<?php
require_once "../clases/Conexion.php";
$obj=new Conexion();
$conexion=$obj->conectar();
$sql="SELECT id_gasto,conceptoG,cantidadG,fecha FROM t_gasto";
$result=mysqli_query($conexion,$sql);
?>
<div>
	<table class="table table-hover table-condensed table-bordered" id="iddatatable">
		<thead style="background-color: #dc3545;color: white; font-weight: bold;">
			<tr>
				<td>Concepto</td>
				<td>Cantidad</td>
				<td>Fecha</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<td>Concepto</td>
				<td>Cantidad</td>
				<td>Fecha</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</tfoot>
		<tbody style="background-color:white;">
			<?php
			while ($mostrar=mysqli_fetch_row($result)) {
				?>
				<tr>
					<td><?php echo $mostrar[1]; ?></td>
					<td><?php echo $mostrar[2]; ?></td>
					<td><?php echo $mostrar[3]; ?></td>
					<td style="text-align: center;">
						<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditar" onclick="agregarActualizar('<?php echo $mostrar[0]?>')">
							<span class="fa fa-pencil-square"></span>
						</span>
					</td>
					<td style="text-align: center;">
						<span class="btn btn-danger btn-sm" onclick="eliminarDatos('<?php echo $mostrar[0]?>')">
							<span class="fa fa-trash"></span>
						</span>
					</td>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
	<a class="btn btn-danger" href="../procesos/salir.php">salir</a>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#iddatatable').DataTable();
	} );
</script>