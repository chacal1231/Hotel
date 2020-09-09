<div class="row">
	<div class="col-sm-12 col-lg-12 col-xl-6">
		<div class="row">
			<div class="col-sm-6 col-md-12 col-lg-6 col-xl-6">
				<div class="card">
					<div class="card-body">
						<div class="d-flex clearfix">
							<div class="text-left mt-3">
								<p class="card-text text mb-1">Total reservas</p>
								<h3 class="mb-1 text-dark mainvalue" id="Reservas"></h3>
							</div>
							<div class="ml-auto">
								<span class="bg-primary-transparent icon-service text-primary ">
									<i class="si si-briefcase  fs-2"></i>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-12 col-lg-6 col-xl-6">
				<div class="card">
					<div class="card-body">
						<div class="d-flex clearfix">
							<div class="text-left mt-3">
								<p class="card-text text mb-1">Total pines</p>
								<h2 class="mb-0 text-dark mainvalue" id="Pines"></h2>
							</div>
							<div class="ml-auto">
								<span class="bg-success-transparent icon-service text-success">
									<i class="si si-layers fs-2"></i>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-12 col-lg-12 col-xl-6">
		<div class="card">
			<div class="card-header custom-header">
				<div>
					<h3 class="card-title">Analisis de ventas</h3>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-4 col-sm-6 text-center">
						<h5 class="mb-1 text-muted">Hoy</h5>
						<h4 class=" mt-2 fs-1 mb-3 text-primary mainvalue" id="Hoy"></h4>
					</div>
					<div class="col-lg-4 col-sm-6 text-center">
						<h5 class="mb-1 text-muted">Semana</h5>
						<h2 class=" mt-2 fs-1 mb-6 text-success mainvalue" id="Semana"></h2>
					</div>
					<div class="col-lg-4 col-sm-6 text-center">
						<h5 class="mb-1 text-muted">Mes</h5>
						<h2 class=" mt-2 fs-1 mb-6 text-danger mainvalue" id="Mes"></h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$.ajax({
		type:'GET',
		url:'Api/ConsultarHome.php',
		dataType: 'json',
		success:function(Response){
			$('#Reservas').html(Response.Reservas);
			$('#Pines').html(Response.Pines);
			$('#Hoy').html(Response.Dia+" COP");
			$('#Semana').html(Response.Semanal+" COP");
			$('#Mes').html(Response.Mensual+" COP");
		}
	});
</script>