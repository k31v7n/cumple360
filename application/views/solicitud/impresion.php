<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<div id="contenido" style="font-size: arial;">
	Guatemala, <?php echo formatoFecha(Hoy()); ?><br>

	<?php $emp = $sol->empresa(); ?>
	<?php $ley = $sol->ley(); ?>
	<?php $madurez = $this->catalogo->verMadurez([
		"id" => $sol->madurez_id,
		"_uno" => true
	]); ?>

	Señores: <br>
	<b><?php echo $emp->nombre; ?><br>
	<?php echo $emp->direccion; ?> </b><br><br>

	Estimados/as: <br><br>

	Por este medio, me complace presentarles el informe de resultados de la Evaluación de Cumplimiento realizada con base a la ley <b><?php echo $ley->nombre; ?></b>. <br><br>

	El proceso de evaluación permitió determinar el nivel de madurez alcanzado por la organización, el cual corresponde a <b>Nivel <?php echo $madurez->id ?>: <?php echo $madurez->nombre ?></b>, de acuerdo con la escala definida en el modelo de madurez utilizado. Este resultado refleja el grado de avance en la implementación de los controles normativos, así como la capacidad de la organización para sostener y mejorar su cumplimiento en el tiempo. <br><br>

	En el informe adjunto se detallan: resultados globales y desglosados por capítulos y artículos de la normativa, observaciones sobre las fortalezas y debilidades detectadas en la aplicación de la normativa. Recomendaciones específicas orientadas a fortalecer el cumplimiento y alcanzar niveles superiores de madurez en evaluaciones futuras. <br><br>

	Este análisis no solo permite conocer la situación actual de cumplimiento, sino que también sirve como guía para la toma de decisiones estratégicas y la definición de planes de mejora continua en la gestión regulatoria. <br><br>

	Quedamos a su disposición para ampliar cualquier aspecto del informe y acompañar a su equipo en el diseño e implementación de acciones que eleven el nivel de madurez de cumplimiento. <br><br>

	Atentamente,<br>

	<div style="text-align: center;">
	<?php $user = $sol->evaluador(); ?>
	<img height="100px" src="<?php echo base_url("assets/img/firma.png") ?>" alt=""> <br>
	<?php echo $user->nombre; ?> <br>
	Auditor <br>
	Cumple360
	</div>
</div>


<script>
        function descargarPDF() {
            const elemento = document.getElementById('contenido');

            const opciones = {
                margin: 10,
                filename: 'reporte.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };

            html2pdf().set(opciones).from(elemento).save();

            setTimeout(function() {

            	window.close();
            }, 100)
        }

        descargarPDF()
    </script>