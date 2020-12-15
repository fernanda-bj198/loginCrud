
 <!DOCTYPE html>
<html>
<head>
	<title>Control de gastos</title>
	<?php 
	require_once "dependencias.php";
	?>
</head>
<body><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header">
						Tablas dinámicas con datatable y php
					</div>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregar">Agregar nuevo
							<span class="fa fa-plus-circle"></span>
						</span>
						<hr>
						<div id="tablaDatatable"></div>
					</div>
					<div class="card-footer text-muted">
						Práctica
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnnuevo">
						<label>Concepto</label>
						<input type="text" class="form-control input-sm" id="concepto" name="concepto">
						<label>Cantidad</label>
						<input type="text" class="form-control input-sm" id="cantidad" name="cantidad">
						<label>fecha</label>
						<input type="text" class="form-control input-sm" id="fecha" name="fecha">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnnuevo" class="btn btn-primary">Agregar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnnuevoU">
						<input type="text" hidden="" id="idgasto" name="idgasto">
						<label>Concepto</label>
						<input type="text" class="form-control input-sm" id="conceptoU" name="conceptoU">
						<label>Cantidad</label>
						<input type="text" class="form-control input-sm" id="cantidadU" name="cantidadU">
						<label>fecha</label>
						<input type="text" class="form-control input-sm" id="fechaU" name="fechaU">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-warning" id="btnactualizar">Actualizar</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#btnnuevo').click(function(){
			datos=$('#frmnnuevo').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/agregar.php",
				success:function(r){
					if (r==1) {
						$('#frmnnuevo')[0].reset();
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Agregado con exito");
					}else{
						alertify.error("fallo");
					}
				}
			});
		});
		$('#btnactualizar').click(function(){
			datos=$('#frmnnuevoU').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/actulizar.php",
				success:function(r){
					console.log(r);
					if (r==1) {
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Actualizado con exito");
					}else{
						alertify.error("fallo al actualizar");
					}
				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('tabla.php');
	});
</script>

<script type="text/javascript">
	function agregarActualizar(idgasto){
		$.ajax({
			type:"POST",
			data:"idgasto=" + idgasto,
			url:"../procesos/obtenDatos.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#idgasto').val(datos['id_gasto']);
				$('#conceptoU').val(datos['conceptoG']);
				$('#cantidadU').val(datos['cantidadG']);
				$('#fechaU').val(datos['fecha']);
				console.log(datos);
			}
		});
	}
	function eliminarDatos(idgasto){
		alertify.confirm('Eliminar registro','¿Seguro de eliminar este registro?',function (){
			$.ajax({
				type:"POST",
				data:"idgasto=" + idgasto,
				url:"../procesos/eliminar.php",
				success:function(r){
					if (r==1) {
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Eliminado con exito");
					}else{
						alertify.error("No se pudo eliminar");
					}
				}
			});
		}
		,function(){
		});
	}
</script>