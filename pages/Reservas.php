<div class="card">
	<div class="card-header">
		<h3 class="mb-0 card-title">Reservas</h3>
	</div>
	<div class="card-body">
		<button type="button" class="btn btn-success btn-block" onclick="CrearPlan();"><i class="fa fa-plus"></i> Nueva reserva</button>
		<br>
		<table id="HabitacionTabla" class="table table-striped table-bordered nowrap" style="width:100%">
			<thead>
				<tr>
					<th>Id</th>
					<th>Habitacion</th>
					<th>Estado</th>
					<th>Fecha entrada</th>
					<th>Fecha Salida</th>
					<th data-priority="1">Accion</th>
				</tr>
			</thead>
		</table>
	</div>
</div>

<script type="text/javascript">
	function CrearPlan() {
		Swal.fire({
			title: 'Nueva reserva',
			html: '<select class="swal2-input" id="NombreHabitacion" required></select>',
			customClass: 'swal2-overflow',
		}).then(function(result) {
			if(result.value){
				let NombreHabitacion = $('#NombreHabitacion').val();
				if(NombreHabitacion!==""){
					Swal.showLoading()
					$.ajax({
						type:'POST',
						url:'Api/CrearReserva.php',
						data:{'NombreHabitacion':NombreHabitacion},
						dataType: 'json',
						success:function(Response){
							Swal.close();
							if(Response.Estado=="OK"){
								Swal.fire({
									icon: 'success',
									title: '¡Exito!',
									text: '¡Se reservó correctamente la habitación!',
									html : "<table class='table table-striped table-bordered'><tbody><tr><td>Pin</td><td><input type='text' class='form-control' value='"+Response.Pin+"' ></td></tr><tr><td>Usuarios</td><td><input type='text' class='form-control' value='"+Response.NumeroCamas+"' ></td></tr></tbody></table>"
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
		/*Llenar selects de reversa*/
		$('#NombreHabitacion').append('<option value="">Nombre de la habitación</option>');
		$.ajax({
			type:'GET',
			url:'Api/HabitacionTabla.php',
			dataType: 'json',
			success:function(Response){
				Response.aaData.forEach(function(Value) {
					$('#NombreHabitacion').append('<option value="'+Value.NombreHabitacion+'">'+Value.NombreHabitacion+'</option>');
				});
			}
		});
	}
	/*Cargo la tabla*/
	var table=$('#HabitacionTabla').DataTable({
		"responsive" : true,
		"order": [[ 0, "desc" ]],
		"bProcessing": false,
		"lengthMenu": [ [10, 20, 25, 50, -1], [10, 20, 25, 50, "All"] ],
		"sAjaxSource": "Api/ReservaTabla.php",
		"aoColumns": [
		{ mData: 'Id' },
		{ mData: 'NombreHabitacion' },
		{ mData: 'Estado' },
		{ mData: 'FechaEntrada' },
		{ mData: 'FechaSalida' },
		{ mData: 'Acciones' }
		],
	});
	/*Modificar*/
	$('#HabitacionTabla').on('click', '.Liberar', function () {
		data = table.row($(this).closest('tr')).data();
		const swalWithBootstrapButtons = Swal.mixin({
			customClass: {
				confirmButton: 'btn btn-success',
				cancelButton: 'btn btn-danger'
			},
			buttonsStyling: false
		})

		swalWithBootstrapButtons.fire({
			title: '¿Está seguro?',
			text: "¿Desea liberar la habitación?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonText: '¡Si!',
			cancelButtonText: '¡No!',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				data = table.row($(this).closest('tr')).data();
				/*Consulto la fecha del último pago*/
				$.ajax({
					type:'POST',
					url:'Api/Liberar.php',
					data:{'Data': data},
					dataType: 'json',
					success:function(Response){
						if(Response.Estado=="OK"){
							Swal.fire({
								icon: 'success',
								title: '¡Exito!',
								text: '¡Se liberó correctamente la habitación!'
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
			} else if (
				/* Read more about handling dismissals below */
				result.dismiss === Swal.DismissReason.cancel
				) {
				swalWithBootstrapButtons.fire(
					'Cancelado',
					'No se liberó la habitación',
					'error'
					)
			}
		})
	});
</script>
