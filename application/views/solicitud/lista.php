<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-4 text-center">
				<img src="<?php echo base_url("assets/img/{$emp->logo}"); ?>" alt=".." width="100%" height="200px"/>
			</div>
			<div class="col-sm-8">
				<h1><?php echo $emp->nombre; ?></h1>
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
		<a class="btn btn-sm btn-secondary float-start" href="<?php echo base_url("principal"); ?>">
			<i class="fa fa-arrow-left"></i>
		</a>
		<h5 class="mb-0 ps-5">
			<i class="bi bi-card-checklist"></i>
			Evaluaciones
		</h5>
	</div>
	<div class="card-body">
		<?php $this->load->view("ley/evaluacion") ?>
	</div>
</div>