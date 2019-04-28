<div class="main-content-inner">
	<div class="card">
		<div class="card-body">
			<h4 class="header-title">Administrar Usuarios</h4>
			<div class="single-table">
				<div class="table-responsive">
					<table class="table table-hover text-center">
						<thead class="text-uppercase">
						<tr>
							<th scope="col">Nombre</th>
							<th scope="col">Cedula</th>
							<th scope="col">Perfil</th>
							<th scope="col">Nivel Permiso</th>
							<th scope="col">Acción</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($usuarios as $user): ?>
							<tr>
								<td><?php echo $user->nombre ." " .$user->apellido; ?></td>
								<td><?php echo $user->dni; ?></td>
								<td><?php echo $user->perfil; ?></td>
								<td><?php echo $user->lvl_permiso; ?></td>
								<td>Editar - Ver Reporte</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-12">
					<div class="dataTables_paginate paging_simple_numbers">
						<ul class="pagination justify-content-end" id="pagination-cliente">
							<?php echo $pag_links;?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
