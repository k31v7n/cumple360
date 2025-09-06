<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-4 text-center">
				<img src="<?php echo $user["empresa_logo"]; ?>" alt=".." width="100%" height="200px"/>
			</div>
			<div class="col-sm-8">
				<h1><?php echo $user["empresa_nombre"]; ?></h1>
				<p>Identificación: <?= $emp->identificacion; ?></p>
				<p>Representante: <?= $emp->representante; ?></p>
				<p>Dirección: <?= $emp->direccion; ?></p>
				<p>Teléfono: <?= $emp->telefono; ?></p>
			</div>
		</div>
	</div>
</div>


<div class="card mt-4">
	<div class="card-header">
		<h5 class="mb-0">
			<i class="bi bi-card-checklist"></i>
			Evaluaciones realizadas
		</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-sm table-hover">
				<tr style="cursor:pointer">
					<td class="text-center">
						Evaluación <br> <span class="fw-bold text-danger">No. 1</span>
					</td>
					<td class="text-center">
						Fecha de solicitud <br> <span class="fw-bold">15/09/2025</span>
					</td>
					<td class="text-center">
						Ley <br> <span class="fw-bold">JM-140-2021</span>
					</td>
					<td class="text-center">
						Encargado de la empresa <br> <span class="fw-bold">Lourdes Teleguario</span>
					</td>
					<td class="text-center">
						Evaluador <br> <span class="fw-bold">Yosimar Xajpot</span>
					</td>
					<td class="text-center">
						Fecha de evaluación <br> <span class="fw-bold">15/09/2025</span>
					</td>
					<td class="text-center">
						% de cumplimiento <br>

						<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
</div>
					</td>

					<td class="text-center">
						Nivel de madurez <br>
						<span class="badge bg-success">
							Inicial
						</span>
					</td>

					<td class="text-center" title="Imprimir constancia">
						<button class="btn btn-sm btn-light border">
							<i class="fa fa-print"></i>
						</button>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>