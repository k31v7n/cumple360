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

	<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

    <style>
    	.card {
    		border: 0;
    		box-shadow: 0 6px 18px rgba(0, 0, 0, .06);
    		border-radius: 1rem;
    	}
    	.card-header {
	    	background: linear-gradient(90deg, rgba(25, 135, 84, .12), rgba(13, 110, 253, .12));
    		border-bottom: 0;
		}
    </style>

    <title>Cumple360</title>
  </head>
  <body style="background: #f6f8fa;">

  	<?php if (isset($vista)): ?>
  		<div class="container-fluid mt-3">
  		<?php $this->load->view($vista); ?>
  		</div>
  	<?php endif ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php 
    if (isset($scripts)) {
	    foreach ($scripts as $src) {
	      if ( is_object($src) ) {
	        echo link_script(sys_base($src->ruta), $src->print);
	      } else {
	        echo link_script($src);
	      }
	    }
	  }
    ?>
  </body>
</html>