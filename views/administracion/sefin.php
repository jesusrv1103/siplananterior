<?php 
function _get($route) {
	$headers = array('Authorization: Basic dXNyX3VwbGE6RjFoNy4ha1px');
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://10.113.6.212:8080/finanzas_cve/restservices/".$route);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

$return_eje = _get('eje');
$return_linea = _get('linea');
$return_estrategia = _get('estrategia');
$return_proyecto = _get('proyecto');
$return_componente = _get('componente');
$return_actividad = _get('actividad');
$return_dependencia = _get('dependencia');
$return_unidad = _get('unidad');
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1 align="center">
			WS-SEFIN<br>
		</h1>
	</section>
	<section class="content">
		<div class="box box-success">
			<div class="box-header">
				<h3 class="box-title">Programas</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<hr>
				<table id="example1" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th><small>Depen</small></th>
							<th><small>Programa</small></th>
							<th><small>Descripción</small></th>
							<th><small>Eje</small></th>
							<th><small>Linea</small></th>
							<th><small>Estrategia</small></th>
							<th><small>Unidad</small></th>
							<th><small>IdPP's</small></th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach(json_decode($return_proyecto) as $obj){
							echo "<tr>";
							echo "<td>".$obj->depen."</td>";
							echo "<td>".$obj->proyecto."</td>";
							echo "<td>".$obj->descripcion."</td>";
							echo "<td>".$obj->eje."</td>";
							echo "<td>".$obj->linea."</td>";
							echo "<td>".$obj->estrategia."</td>";
							echo "<td>".$obj->unidad."</td>";
							echo "<td>".$obj->idpps."</td>";
							echo "</tr>";
						}
						?>
					</tbody>
					<tfoot>
						<tr>
							<th><small>Depen</small></th>
							<th><small>Programa</small></th>
							<th><small>Descripción</small></th>
							<th><small>Eje</small></th>
							<th><small>Linea</small></th>
							<th><small>Estrategia</small></th>
							<th><small>Unidad</small></th>
							<th><small>IdPP's</small></th>
						</tr>
					</tfoot>
				</table>
			</div></div>
		</section>
		
		<section class="content">
			<div class="box box-success">
				<div class="box-header">
					<h3 class="box-title">Componentes</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<hr>
					<table id="example1" class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th><small>Depen</small></th>
								<th><small>Programa</small></th>
								<th><small>Componente</small></th>
								<th><small>Descripción</small></th>
								<th><small>Eje</small></th>
								<th><small>Linea</small></th>
								<th><small>Estrategia</small></th>
								<th><small>Unidad</small></th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach(json_decode($return_componente) as $obj){
								echo "<tr>";
								echo "<td>".$obj->depen."</td>";
								echo "<td>".$obj->proyecto."</td>";
								echo "<td>".$obj->componente."</td>";
								echo "<td>".$obj->descripcion."</td>";
								echo "<td>".$obj->eje."</td>";
								echo "<td>".$obj->linea."</td>";
								echo "<td>".$obj->estrategia."</td>";
								echo "<td>".$obj->unidad."</td>";
								
								echo "</tr>";
							}
							?>
						</tbody>
						<tfoot>
							<tr>
								<th><small>Depen</small></th>
								<th><small>Programa</small></th>
								<th><small>Componente</small></th>
								<th><small>Descripción</small></th>
								<th><small>Eje</small></th>
								<th><small>Linea</small></th>
								<th><small>Estrategia</small></th>
								<th><small>Unidad</small></th>
							</tr>
						</tfoot>
					</table>
				</div></div>
			</section>

			<section class="content">
				<div class="box box-success">
					<div class="box-header">
						<h3 class="box-title">Actividades</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<hr>
						<table id="example1" class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th><small>Depen</small></th>
									<th><small>Programa</small></th>
									<th><small>Componente</small></th>
									<th><small>Actividad</small></th>
									<th><small>Descripción</small></th>
									<th><small>Eje</small></th>
									<th><small>Linea</small></th>
									<th><small>Estrategia</small></th>
									<th><small>Unidad</small></th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach(json_decode($return_actividad) as $obj){
									echo "<tr>";
									echo "<td>".$obj->depen."</td>";
									echo "<td>".$obj->proyecto."</td>";
									echo "<td>".$obj->componente."</td>";
									echo "<td>".$obj->accion."</td>";
									echo "<td>".$obj->descripcion."</td>";
									echo "<td>".$obj->eje."</td>";
									echo "<td>".$obj->linea."</td>";
									echo "<td>".$obj->estrategia."</td>";
									echo "<td>".$obj->unidad."</td>";
									echo "</tr>";
								}
								?>
							</tbody>
							<tfoot>
								<tr>
									<th><small>Depen</small></th>
									<th><small>Programa</small></th>
									<th><small>Componente</small></th>
									<th><small>Actividad</small></th>
									<th><small>Descripción</small></th>
									<th><small>Eje</small></th>
									<th><small>Linea</small></th>
									<th><small>Estrategia</small></th>
									<th><small>Unidad</small></th>
								</tr>
							</tfoot>
						</table>
					</div></div>
				</section>

				<section class="content">
					<div class="box box-success">
						<div class="box-header">
							<h3 class="box-title">Estrategia</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<hr>
							<table id="example1" class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th><small>Depen</small></th>
										<th><small>Descripción</small></th>
										<th><small>Eje</small></th>
										<th><small>Linea</small></th>
										<th><small>Estrategia</small></th>
										<th><small>Unidad</small></th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach(json_decode($return_estrategia) as $obj){
										echo "<tr>";
										echo "<td>".$obj->depen."</td>";
										echo "<td>".$obj->descripcion."</td>";
										echo "<td>".$obj->eje."</td>";
										echo "<td>".$obj->linea."</td>";
										echo "<td>".$obj->estrategia."</td>";
										echo "<td>".$obj->unidad."</td>";
										echo "</tr>";
									}
									?>
								</tbody>
								<tfoot>
									<tr>
										<th><small>Depen</small></th>
										<th><small>Descripción</small></th>
										<th><small>Eje</small></th>
										<th><small>Linea</small></th>
										<th><small>Estrategia</small></th>
										<th><small>Unidad</small></th>
									</tr>
								</tfoot>
							</table>
						</div></div>
					</section>

					<section class="content">
						<div class="box box-success">
							<div class="box-header">
								<h3 class="box-title">Linea</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<hr>
								<table id="example1" class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th><small>Depen</small></th>
											<th><small>Descripción</small></th>
											<th><small>Eje</small></th>
											<th><small>Linea</small></th>
											<th><small>Unidad</small></th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach(json_decode($return_linea) as $obj){
											echo "<tr>";
											echo "<td>".$obj->depen."</td>";
											echo "<td>".$obj->descripcion."</td>";
											echo "<td>".$obj->eje."</td>";
											echo "<td>".$obj->linea."</td>";
											echo "<td>".$obj->unidad."</td>";
											echo "</tr>";
										}
										?>
									</tbody>
									<tfoot>
										<tr>
											<th><small>Depen</small></th>
											<th><small>Descripción</small></th>
											<th><small>Eje</small></th>
											<th><small>Linea</small></th>
											<th><small>Unidad</small></th>
										</tr>
									</tfoot>
								</table>
							</div></div>
						</section>

						<section class="content">
							<div class="box box-success">
								<div class="box-header">
									<h3 class="box-title">Eje</h3>
								</div>
								<!-- /.box-header -->
								<div class="box-body">
									<hr>
									<table id="example1" class="table table-bordered table-striped table-hover">
										<thead>
											<tr>
												<th><small>Depen</small></th>
												<th><small>Descripción</small></th>
												<th><small>Eje</small></th>
												<th><small>Unidad</small></th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach(json_decode($return_eje) as $obj){
												echo "<tr>";
												echo "<td>".$obj->depen."</td>";
												echo "<td>".$obj->descripcion."</td>";
												echo "<td>".$obj->eje."</td>";
												echo "<td>".$obj->unidad."</td>";
												echo "</tr>";
											}
											?>
										</tbody>
										<tfoot>
											<tr>
												<th><small>Depen</small></th>
												<th><small>Descripción</small></th>
												<th><small>Eje</small></th>
												<th><small>Unidad</small></th>
											</tr>
										</tfoot>
									</table>
								</div></div>
							</section>

							<section class="content">
								<div class="box box-success">
									<div class="box-header">
										<h3 class="box-title">Unidad</h3>
									</div>
									<!-- /.box-header -->
									<div class="box-body">
										<hr>
										<table id="example1" class="table table-bordered table-striped table-hover">
											<thead>
												<tr>
													<th><small>Depen</small></th>
													<th><small>Descripción</small></th>
													<th><small>Sector</small></th>
													<th><small>Unidad</small></th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach(json_decode($return_unidad) as $obj){
													echo "<tr>";
													echo "<td>".$obj->depen."</td>";
													echo "<td>".$obj->descripcion."</td>";
													echo "<td>".$obj->sector."</td>";
													echo "<td>".$obj->unidad."</td>";
													echo "</tr>";
												}
												?>
											</tbody>
											<tfoot>
												<tr>
													<th><small>Depen</small></th>
													<th><small>Descripción</small></th>
													<th><small>Sector</small></th>
													<th><small>Unidad</small></th>
												</tr>
											</tfoot>
										</table>
									</div></div>
								</section>

								<section class="content">
									<div class="box box-success">
										<div class="box-header">
											<h3 class="box-title">Dependencia</h3>
										</div>
										<!-- /.box-header -->
										<div class="box-body">
											<hr>
											<table id="example1" class="table table-bordered table-striped table-hover">
												<thead>
													<tr>
														<th><small>Depen</small></th>
														<th><small>Descripción</small></th>
														<th><small>Sector</small></th>
													</tr>
												</thead>
												<tbody>
													<?php
													foreach(json_decode($return_dependencia) as $obj){
														echo "<tr>";
														echo "<td>".$obj->depen."</td>";
														echo "<td>".$obj->descripcion."</td>";
														echo "<td>".$obj->sector."</td>";
														echo "</tr>";
													}
													?>
												</tbody>
												<tfoot>
													<tr>
														<th><small>Depen</small></th>
														<th><small>Descripción</small></th>
														<th><small>Sector</small></th>
													</tr>
												</tfoot>
											</table>
										</div></div>
									</section>

								</div>
