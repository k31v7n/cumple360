<div class="table-responsive">
	<table class="table table-sm table-hover">
		<?php foreach ($solicitudes as $key => $row): ?>
			<tr>
				<td class="text-center">
					Evaluación <br> <span class="fw-bold text-danger">No. <?= $row->id; ?></span>
				</td>
				<td class="text-center">
					Fecha de solicitud <br> <span class="fw-bold"><?= formatoFecha($row->fecha); ?></span>
				</td>
				<td class="text-center">
					Ley <br> <span class="fw-bold"><?= $row->nombre_ley; ?></span>
				</td>
				<td class="text-center">
					Encargado de la empresa <br> <span class="fw-bold"><?= $row->encargado; ?></span>
				</td>
				<td class="text-center">
					Evaluador <br> <span class="fw-bold"><?= $row->evaluador; ?></span>
				</td>
				<td class="text-center">
					Fecha de evaluación <br> <span class="fw-bold"><?= $row->fecha_entrega; ?></span>
				</td>
				<td class="text-center">
					Cumplimiento <br>

					<div class="progress">
							<div class="progress-bar" role="progressbar" style="width: <?= round($row->cumple) ?>%;" aria-valuenow="<?= round($row->cumple) ?>" aria-valuemin="0" aria-valuemax="100"><?= round($row->cumple) ?>%</div>
					</div>
				</td>

				<td class="text-center">
					Nivel de madurez <br>
					<span class="badge bg-success">
						<?= $row->nombre_madurez; ?>
					</span>
				</td>

				<td class="text-center" title="Imprimir constancia">
					<a href="<?= base_url("solicitud/constancia/{$row->id}"); ?>" target="_blank" class="btn btn-sm btn-light border">
						<i class="fa fa-print"></i>
					</a>
				</td>
			</tr>
		<?php endforeach ?>
	</table>
</div>