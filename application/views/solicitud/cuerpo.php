<div id="appAuditor">
  <div class="row">
    <div class="col-sm-4">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="bi bi-buildings me-2"></i> Empresa
          </h5>
        </div>
        <div class="card-body">

          <div class="d-flex align-items-start gap-3">
            <div>
              <div class="fw-bold fs-5"><?= $emp->nombre; ?></div>
              <div class="text-muted small">Identificación: <?= $emp->identificacion; ?></div>
              <div class="text-muted small">Dirección: <?= $emp->direccion; ?></div>
            </div>
          </div>
        </div>
      </div>

      <div class="card mt-3">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="bi bi-bar-chart-line"></i> Indicadores
          </h5>
        </div>
        <div class="card-body">

          <div class="text-muted small">Índice de Cumplimiento</div>
          <div class="progress" role="progressbar" :aria-valuenow="avance" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-success" :style="'width:'+avance+'%'">{{ avance }}%</div>
          </div>
          <br><br>

          <span class="badge badge-round status-Cumple">Cumple: {{ cumEstado.cumple }}</span>
          <span class="badge badge-round status-Parcial">Parcial: {{ cumEstado.parcial }}</span>
          <span class="badge badge-round status-na">No cumple: {{ cumEstado.nocumple }}</span>
          <span class="badge badge-round status-Pendiente">No aplica: {{ cumEstado.noaplica }}</span>
          <br><br>
          <span v-if="madurez">Nivel de madurez: <span :class="madurez.color">Nivel {{ madurez.id }} - {{ madurez.nombre }}</span></span>

        </div>
      </div>
    </div>

    <div class="col-sm-8">
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">
            <i class="bi bi-card-checklist"></i> Evaluación <span class="text-danger">No. <?php echo $sol->id; ?></span>
          </h5>
        </div>
        <div class="card-body p-0">
          <div class="p-3">
            <h5 class="float-start">
              Ley <?php echo $sol->nombre_ley; ?>
            </h5>
            <input type="hidden" value="<?php echo $sol->id ?>" id="xsolicitud">

            <div class="text-end">
              <a href="<?php echo $regresar; ?>" class="btn btn-sm btn-ligth border">
                <i class="bi bi-arrow-90deg-left"></i> Salir
              </a>
              <!--button class="btn btn-sm btn-secondary">
                <i class="bi bi-clock-history me-1"></i> Bitácora
              </button-->

              <a href="<?php echo base_url("solicitud/constancia/{$sol->id}"); ?>" class="btn btn-sm btn-success" target="_blank">
                <i class="bi bi-printer"></i> Constancia
              </a>
            </div>
          </div>

          <div v-if="cargando" class="p-3">
            <div class="d-flex justify-content-center">
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </div>
          </div>
          <div v-else>

            <div class="accordion" id="accordionExample">
              <div class="accordion-item" v-for="(i, idx) in cat.ley.capitulos">
                <h2 class="accordion-header" :id="'headingOne'+idx">
                  <button class="accordion-button" :class="idx > 0 ? 'collapsed': ''" type="button" data-bs-toggle="collapse" :data-bs-target="'#collapseOne'+idx" :aria-expanded="idx == 0" :aria-controls="'collapseOne'+idx">
                    <b>{{ i.titulo }}</b> <span class="ms-5 badge bg-info">Ponderación: {{ i.ponderacion }}%</span> <span class="ms-5 badge bg-success">Cumplimiento: {{ capCumplimiento(i) }}%</span>
                  </button>
                </h2>
                <div :id="'collapseOne'+idx" class="accordion-collapse collapse" :class="idx == 0 ? 'show' : '' " :aria-labelledby="'headingOne'+idx" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    {{ i.descripcion }}

                    <div class="row" v-for="j in i.articulos">
                      <div class="col-sm-10 p-2 px-4">
                        <b>{{ j.titulo }}:</b> {{ j.descripcion }}
                      </div>
                      <div class="col-sm-2" v-if="cat.estados">
                        <select class="form-select form-select-sm" @change="actualizar(j)" v-model="j.estado_id">
                          <option :value="null">Estado</option>
                          <option v-for="x in cat.estados" :value="x.id">
                            {{ x.nombre }}
                          </option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>