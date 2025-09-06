<div class="row justify-content-center mt-5" id="appLogin">
	<div class="col-sm-4">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0"><i class="fa-solid fa-right-to-bracket"></i> Login</h5>
			</div>
			<div class="card-body">
				<div class="text-center" style="font-size: 54px;">
					<i class="bi bi-shield-check text-success"></i>
				</div>
				
				<h5 class="text-center">Cumple360</h5>
				<h6 class="text-center">Cumplimiento de Leyes</h6>

				<p class="text-center mt-4 text-muted">
					<small>Por tu seguridad y la nuestra, inicia sesión.</small>
				</p>

				<div class="p-5 pt-3">

					<div class="alert alert-danger" v-if="mensaje != null">
						{{ mensaje }}
					</div>

					<form @submit.prevent="login">
						<div class="mb-3">
							<label for="inpUsuario" class="form-label mb-0"><i class="fa-regular fa-user"></i> Usuario:</label>
							<input
								type="text"
								class="form-control"
								id="inpUsuario"
								v-model="form.alias"
								:required="true"
							>
						</div>
						<div class="mb-3">
							<label for="inpClave" class="form-label mb-0"><i class="fa-solid fa-key"></i> Contraseña:</label>
							<input
								type="password"
								class="form-control"
								id="inpClave"
								v-model="form.clave"
								:required="true"
							>
						</div>
						<div class="d-grid gap-2">
							<button
								type="submit"
								class="btn btn-success"
								:disabled="iniciando"
							>
								{{ iniciando ? 'Iniciando sesión' : 'Ingresar'}}
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>