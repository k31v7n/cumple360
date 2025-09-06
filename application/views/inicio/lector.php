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
		<?php $this->load->view("ley/evaluacion") ?>
	</div>
</div>