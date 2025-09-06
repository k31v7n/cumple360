<div id="appAdmin">

	<template v-if="vista === 0">
		<div class="row justify-content-center mt-5">
			<div class="col-sm-3">
				<div class="card shadow">
					<div class="card-header"></div>
					<div class="card-body text-center" style="cursor:pointer;" @click="cambiarVista(1)">
						<img src="<?php echo base_url("assets/img/agregar.png") ?>" alt="..." width="100px" class="mt-4">
						<h4 class="fw-normal mt-4">Cargar Leyes</h4>
					</div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="card shadow">
					<div class="card-header"></div>
					<div class="card-body text-center" style="cursor:pointer;" @click="cambiarVista(2)">
						<img src="<?php echo base_url("assets/img/empresa.png") ?>" alt="..." width="100px" class="mt-4">
						<h4 class="fw-normal mt-4">Registro de empresas</h4>
					</div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="card shadow">
					<div class="card-header"></div>
					<div class="card-body text-center" style="cursor:pointer;" @click="cambiarVista(3)">
						<img src="<?php echo base_url("assets/img/evaluacion.jpg") ?>" alt="..." width="100px" class="mt-4">
						<h4 class="fw-normal mt-4">Generar evaluación</h4>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="card shadow">
					<div class="card-header"></div>
					<div class="card-body text-center" style="cursor:pointer;" @click="cambiarVista(4)">
						<img src="<?php echo base_url("assets/img/consultar.png") ?>" alt="..." width="100px" class="mt-4">
						<h4 class="fw-normal mt-4">Consultar auditoría</h4>
					</div>
				</div>
			</div>
		</div>
	</template>

	<template v-if="vista === 1">
		<?php $this->load->view("ley/form"); ?>
	</template>

	<template v-if="vista === 2">
		<?php $this->load->view("ley/empresa"); ?>
	</template>

	<template v-if="vista === 3">
		<?php $this->load->view("ley/solicitud"); ?>
	</template>

	<template v-if="vista === 4">
		<div class="card mt-4">
			<div class="card-header">
				<button class="btn-close float-end" @click="regresar"></button>
				<h5 class="mb-0">
					<i class="bi bi-card-checklist"></i>
					Evaluaciones realizadas
				</h5>
			</div>
			<div class="card-body">
				<?php $this->load->view("ley/evaluacion") ?>
			</div>
		</div>
	</template>

</div>