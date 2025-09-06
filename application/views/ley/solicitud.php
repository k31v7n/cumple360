<div class="row justify-content-center">
	<div class="col-sm-8">
		<div class="card mt-4">
			<div class="card-header">
				<button class="btn-close float-end" @click="regresar"></button>
				<h5 class="mb-0">
					<i class="bi bi-card-checklist"></i>
					Nueva evaluación
				</h5>
			</div>
			<div class="card-body">
				<p class="text-end text-muted">
					<i class="far fa-calendar"></i>
					<?php echo formatoFecha(Hoy(true)); ?>
				</p>
				<form @submit.prevent="guardarSolicitud">
					<div class="row mb-2">
						<label for="empresa" class="col-sm-3 col-form-label">Empresa:</label>
						<div class="col-sm-9">
							<select name="empresa_id" class="form-select" required>
								<option value="">---------</option>
								<?php foreach ($empresas as $key => $value): ?>
									<option value="<?php echo $value->id; ?>"><?php echo $value->nombre; ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>

					<div class="row mb-2">
						<label for="representante" class="col-sm-3 col-form-label">Solicitante:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="representante" name="encargado" required>
						</div>
					</div>

					<div class="row mb-2">
						<label for="ley" class="col-sm-3 col-form-label">Ley:</label>
						<div class="col-sm-9">
							<select name="ley_id" class="form-select" required>
								<option value="">---------</option>
								<?php foreach ($leyes as $key => $value): ?>
									<option value="<?php echo $value->id; ?>"><?php echo $value->nombre; ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>

					<div class="row mb-2">
						<label for="fecha" class="col-sm-3 col-form-label">Fecha termina:</label>
						<div class="col-sm-9">
							<input type="date" class="form-control" id="fecha" name="fecha_entrega" required>
						</div>
					</div>

					<div class="row mb-2">
						<div class="col-sm-12 text-end">
							<button class="btn btn-success" :disabled="btnSol">
								<i class="fa fa-save"></i> {{ btnSol ? 'Guardando...' : 'Guardar' }}
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>