<?php $user = $this->session->userdata("user"); ?>

<nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
  <div class="container-fluid px-4">
    <h1 class="fw-bold navbar-brand d-flex align-items-center gap-2 m-0" href="#">
      <i class="bi bi-shield-check text-success fs-4"></i>
      Cumple360
    </h1>
    <div class="ms-auto d-flex align-items-center gap-2">
      <span id="roleChip" class="badge rounded-pill bg-secondary">Rol: <?php echo $user["rol_nombre"]; ?></span>

      <div class="dropdown no-print">
        <button class="btn btn-outline-dark btn-sm dropdown-toggle" data-bs-toggle="dropdown" id="authBtn">
          <i class="bi bi-gear-fill"></i> <?php echo $user["nombre"]; ?>
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item pointer" href="<?php echo base_url("sesion/logout") ?>" id="logoutBtn">
            <i class="bi bi-box-arrow-left"></i> Cerrar sesión</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>