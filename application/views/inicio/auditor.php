<div class="card mb-2">
  <div class="card-header">
    <h4 class="fw-normal m-0">Auditoría de leyes</h4>
  </div>
</div>

<div class="row">
  <?php foreach ($empresas as $key => $value): ?>
    <div class="col-sm-4">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4 text-center pt-3">
            <img src="<?php echo base_url("assets/img/{$value->logo}") ?>" class="img-fluid rounded-start" alt="..." width="100px">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">
                <a href="<?php echo base_url("empresa/solicitudes/{$value->id}") ?>" class="text-decoration-none text-dark"><?php echo $value->nombre; ?>    
                </a>
              </h5>
              <p class="card-text">Identificación: <?php echo $value->identificacion; ?> <br>
                Representante: <?php echo $value->representante; ?> <br>
                Teléfono: <?php echo $value->telefono; ?> <br>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>  
  <?php endforeach ?>
</div>