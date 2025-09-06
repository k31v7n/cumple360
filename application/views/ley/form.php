<div class="card">
	<div class="card-header">
		<button class="btn-close float-end" @click="regresar"></button>
		<h5><i class="fa fa-add"></i> Cargar Nueva Ley</h5>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-4">
				<form @submit.prevent="guardarLey">
					<div class="row mb-2">
						<label for="leyNombre" class="col-sm-3 col-form-label">Nombre:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="leyNombre" v-model="fley.nombre" required>
						</div>
					</div>

					<div class="row mb-2">
						<label for="leyDescripcion" class="col-sm-3 col-form-label">Descripción:</label>
						<div class="col-sm-9">
							<textarea id="leyDescripcion" rows="4" class="form-control" v-model="fley.descripcion" required></textarea>
						</div>
					</div>

					<div class="row mb-2">
						<div class="col-sm-12 text-end">
							<button class="btn btn-success" :disabled="btnLey">
								<i class="fa fa-save"></i> {{ btnLey ? 'Guardando...' : 'Guardar' }}
							</button>
						</div>
					</div>
				</form>
			</div>

			<div class="col-sm-8" v-if="idLey">
				<button class="btn btn-sm btn-light border float-end" title="Agregar" @click="abrirModal(0,1)">
					<i class="fa fa-add"></i>
				</button>
				<h5 class="border-bottom pb-2">Capitulos</h5>

				<div v-for="i in capitulos">
					<button class="btn btn-sm btn-light border float-end" title="Agregar" @click="abrirModal(1, 1, i)">
					<i class="fa fa-add"></i>
				</button>
					<h5 @click="abrirModal(3, 2, i)">{{ i.titulo }}</h5>
					<p>{{ i.descripcion }}</p>

					<p v-for="j in i.articulos">
						<b @click="abrirModal(2, 2, j)">{{ j.titulo }}:</b> {{ j.descripcion }}
					</p>	
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-header">
		<h5><i class="fa fa-list"></i> Lista de leyes</h5>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-sm table-hover">
				<tr v-for="(i,idx) in listaLeyes">
					<td>
						Ley: <br> <b>{{ i.nombre }}</b>
					</td>

					<td>
						Descripción: <br> <b>{{ i.descripcion }}</b>
					</td>

					<td>
						Capítulos: <br> <b>{{ i.capitulos.length }}</b>
					</td>
					<td>
						<button class="btn btn-sm btn-light border" @click="verLey(i, idx)">
							<i class="fa fa-edit"></i>
						</button>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>

<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" id="leyModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form @submit.prevent="guardarLeyd">
        	<div class="row mb-2">
				<label for="leyNombreD" class="col-sm-3 col-form-label">Título:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="leyNombreD" v-model="fleyd.titulo" required>
				</div>
			</div>

			<div class="row mb-2">
				<label for="leyDescripcionD" class="col-sm-3 col-form-label">Descripción:</label>
				<div class="col-sm-9">
					<textarea id="leyDescripcionD" rows="4" class="form-control" v-model="fleyd.descripcion" required></textarea>
				</div>
			</div>

			<div class="row mb-2">
				<label for="leyPonderacionD" class="col-sm-3 col-form-label">Ponderación/Peso:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="leyPonderacionD" v-model="fleyd.ponderacion" required>
				</div>
			</div>

			<div class="row mb-2">
				<div class="col-sm-12 text-end">
					<button class="btn btn-success" :disabled="btnLey">
						<i class="fa fa-save"></i> {{ btnLeyd ? 'Guardando...' : 'Guardar' }}
					</button>
				</div>
			</div>
        </form>
      </div>
    </div>
  </div>
</div>