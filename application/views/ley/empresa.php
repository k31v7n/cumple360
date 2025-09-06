<div class="card mt-4">
	<div class="card-header">
		<button class="btn-close float-end" @click="regresar"></button>
		<h5 class="mb-0">
			<i class="bi bi-card-checklist"></i>
			Empresas
		</h5>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-5">
				<form @submit.prevent="guardarEmpresa">
					<div class="row mb-2">
						<label for="nombre" class="col-sm-3 col-form-label">Nombre:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="nombre" name="nombre" required>
						</div>
					</div>

					<div class="row mb-2">
						<label for="direccion" class="col-sm-3 col-form-label">Dirección:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="direccion" name="direccion" required>
						</div>
					</div>

					<div class="row mb-2">
						<label for="identificacion" class="col-sm-3 col-form-label">Identificación:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="identificacion" name="identificacion" required>
						</div>
					</div>

					<div class="row mb-2">
						<label for="telefono" class="col-sm-3 col-form-label">Teléfono:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="telefono" name="telefono" required>
						</div>
					</div>

					<div class="row mb-2">
						<label for="representante" class="col-sm-3 col-form-label">Representante:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="representante" name="representante" required>
						</div>
					</div>

					<div class="row mb-2">
						<label for="logo" class="col-sm-3 col-form-label">Logo:</label>
						<div class="col-sm-9">
							<input type="file" class="form-control" id="logo" name="logo">
						</div>
					</div>

					<h5 class="fw-normal mt-4">
						<i class="far fa-user"></i> Datos de usuario
					</h5>

					<div class="row mb-2">
						<label for="logo" class="col-sm-3 col-form-label">Usuario:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="logo" name="alias" required>
						</div>
					</div>

					<div class="row mb-2">
						<label for="logo" class="col-sm-3 col-form-label">Clave:</label>
						<div class="col-sm-9">
							<input type="password" class="form-control" id="logo" name="clave" required>
						</div>
					</div>

					<div class="row mb-2">
						<div class="col-sm-12 text-end">
							<button class="btn btn-success" :disabled="btnEmp">
								<i class="fa fa-save"></i> {{ btnEmp ? 'Guardando...' : 'Guardar' }}
							</button>
						</div>
					</div>

				</form>
			</div>

			<div class="col-sm-7">
				<div class="table-responsive">
					<table class="table table-sm">
						<tr>
							<th>Logo</th>
							<th>Nombre</th>
							<th>Dirección</th>
							<th>Representante</th>
							<th>Identificación</th>
							<th>Teléfono</th>
						</tr>
						<tr v-for="i in listaEmp">
							<td>
								<img v-if="i.logo" :src="'assets/img/'+i.logo" width="80px" alt="...">
							</td>
							<td>
								<a href="#" @click.prevent="verEmpresa(i)" class="text-decoration-none fw-bold text-dark">
									{{ i.nombre }}
								</a>
							</td>
							<td>{{ i.direccion }}</td>
							<td>{{ i.representante }}</td>
							<td>{{ i.identificacion }}</td>
							<td>{{ i.telefono }}</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>