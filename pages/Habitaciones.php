<div class="card">
	<div class="card-header">
		<h3 class="mb-0 card-title">Habitaciones</h3>
	</div>
	<div class="card-body">
		<button type="button" class="btn btn-success btn-block" onclick="CrearPlan();"><i class="fa fa-plus"></i> Añadir habitación</button>
		<br>
		<table id="HabitacionTabla" class="table table-striped table-bordered nowrap" style="width:100%">
			<thead>
				<tr>
					<th>Habitacion</th>
					<th>Tipo</th>
					<th>Camas</th>
					<th>Precio</th>
					<th>Estado</th>
					<th>Accion</th>
				</tr>
			</thead>
		</table>
	</div>
</div>

<script type="text/javascript">
	function CrearPlan() {
		Swal.fire({
			title: 'Nueva Habitacion',
			html: '<input id="NombreHabitacion" type="text" placeholder="Nombre habitación" class="swal2-input"><br><select class="swal2-input" Id="TipoHabitacion"><option value="">Tipo de habitación</option><option>Habitación cama doble</option><option>Habitación sencilla cama doble.</option><option>Presidencial</option></select><br><select class="swal2-input" id="CamasHabitacion"><option value="">Número de camas</option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><br><input id="PrecioHabitacion" type="number" placeholder="Precio de habitación x día" class="swal2-input">',
			customClass: 'swal2-overflow',
		}).then(function(result) {
			if(result.value){
				let NombreHabitacion = $('#NombreHabitacion').val();
				let TipoHabitacion = $('#TipoHabitacion').val();
				let CamasHabitacion = $('#CamasHabitacion').val();
				let PrecioHabitacion = $('#PrecioHabitacion').val();
				if(NombreHabitacion!=="" || TipoHabitacion!=="" || CamasHabitacion!=="" || PrecioHabitacion!==""){
					Swal.showLoading()
					$.ajax({
						type:'POST',
						url:'Api/CrearHabitaciones.php',
						data:{'NombreHabitacion':NombreHabitacion,'TipoHabitacion':TipoHabitacion, 'CamasHabitacion':CamasHabitacion, 'PrecioHabitacion':PrecioHabitacion},
						dataType: 'json',
						success:function(Response){
							Swal.close();
							if(Response.Estado=="OK"){
								Swal.fire({
									icon: 'success',
									title: '¡Exito!',
									text: '¡Se agregó correctamente la habitación!'
								})
							}else{
								Swal.fire({
									icon: 'error',
									title: 'Oops...',
									text: Response.Error
								})
							}

						}
					});
				}else{
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: "¡Los campos no deben estar vacios!"
					})
				}
			}
		});

	}
	/*Cargo la tabla*/
	var table=$('#HabitacionTabla').DataTable({
		"responsive" : true,
		"order": [[ 0, "desc" ]],
		"bProcessing": false,
		"lengthMenu": [ [10, 20, 25, 50, -1], [10, 20, 25, 50, "All"] ],
		"sAjaxSource": "Api/HabitacionTabla.php",
		"aoColumns": [
		{ mData: 'NombreHabitacion' },
		{ mData: 'TipoHabitacion' },
		{ mData: 'CamasHabitacion' },
		{ mData: 'Precio' },
		{ mData: 'Estado' },
		{ mData: 'Acciones' }
		],
	});
	/*Modificar*/
	$('#MaquinaTabla').on('click', '.Modificar', function () {
		data = table.row($(this).closest('tr')).data();
		console.log(data);
	});
	/*Eliminar*/
	$('#MaquinaTabla').on('click', '.Eliminar', function () {
		data = table.row($(this).closest('tr')).data();
		console.log(data);
	});
</script>

<!--Select2 js -->
<script src="assets/plugins/select2/select2.full.min.js"></script>
<script src="assets/js/select2.js"></script>