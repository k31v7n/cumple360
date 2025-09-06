<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome 6 (Última versión estable) -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" referrerpolicy="no-referrer" />

	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
	<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

    <style>
    	.navbar-brand span { font-weight: 800; letter-spacing: .2px; }
    .card { border: 0; box-shadow: 0 6px 18px rgba(0,0,0,.06);}
    .card-header { background: linear-gradient(90deg, rgba(25,135,84,.12), rgba(13,110,253,.12)); border-bottom: 0; }
    .badge-round { border-radius: 2rem; padding: .5rem .75rem; font-weight: 600; }
    .status-Cumple { background:#d1e7dd; color:#0f5132; }
    .status-"No cumple" { background:#f8d7da; color:#842029; }
    .status-Parcial { background:#fff3cd; color:#664d03; }
    .status-"N/A" { background:#e2e3e5; color:#41464b; }
    .status-Pendiente { background:#cff4fc; color:#055160; }
    .category-chip { border-radius:999px; padding:.25rem .6rem; background:#eef6ff; color:#0b5ed7; font-size:.8rem; }
    .pointer { cursor: pointer; }
    .table th { font-size:.85rem; text-transform: uppercase; letter-spacing:.04em; }
    .table td { vertical-align: middle; }
    .form-floating>label { color:#6c757d; }
    .sticky-actions { position: sticky; bottom: 0; background: #fff; padding: .75rem; border-top: 1px solid #eee; }
    @media print {
      .no-print { display:none !important; }
      .card { box-shadow:none; }
      body { background:#fff; }
    }
		}
    </style>

    <title>Cumple360</title>
  </head>
  <body style="background: #f6f8fa;">

    <?php if (isset($menu)): ?>
      <?php $this->load->view($menu); ?>
    <?php endif ?>

  	<?php if (isset($vista)): ?>
  		<div class="container-fluid mt-3">
  		<?php $this->load->view($vista); ?>
  		</div>
  	<?php endif ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.11.0/axios.min.js"></script>

    <?php 
    if (isset($scripts)) {
	    foreach ($scripts as $src) {
	      if ( is_object($src) ) {
	        echo link_script(sys_base($src->ruta), $src->print);
	      } else {
	        echo link_script($src, true);
	      }
	    }
	  }
    ?>
  </body>
</html>