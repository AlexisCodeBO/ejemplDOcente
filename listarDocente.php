<?php include('parciales/cabecera.php') ?>	
<?php include('parciales/foot_cabecera.php') ?>	
		<?php include('parciales/menu.php'); 
				include('Docente.php');
				$arr = Docente::listarTodo();			
		?>

		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h2>Lista de Docentes</h2>
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>NOMBRES</th>
								<th>APELLIDOS</th>
								<th>CI</th>
								<th>DIRECCION</th>
								<th>GENERO</th>
								<th>FECHANAC</th>
								<th>CELULAR</th>
								<th>FOTO</th>
								<th>ACCIONES</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($arr as $doc) { ?>
							<tr>
								<td><?=$doc->getIdDoc()?></td>
								<td><?=$doc->getNombres()?></td>
								<td><?=$doc->getApellidos()?></td>
								<td><?=$doc->getCi()?></td>
								<td><?=$doc->getDireccion()?></td>
								<td><?=$doc->getGenero()?></td>
								<td><?=$doc->getFechaNac()?></td>
								<td><?=$doc->getCelular()?></td>
								<td><?=$doc->getFoto()?></td>
			
								<td>
									<div class="btn-group">
									<a href="formDocente.php?id=<?=$doc->getIdDoc()?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
									<a href="eliminarDocente.php?id=<?=$doc->getIdDoc()?>" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span></a>
									</div>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>

			<div class="row">
			 <?php foreach ($arr as $doc) { ?>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
					<div class="thumbnail">
						<img src="<?=$doc->getFoto(); ?>" alt="">
						<div class="caption">
							<h3><?=$doc->getNombres(); ?>
							<?=$doc->getApellidos(); ?></h3>
							<p>
								<?=$doc->getCelular()?>
								<div class="btn-group btn-group-justified">
									<a href="formDocente.php?id=<?=$doc->getIdDoc()?>" class="btn btn-default">Modificar</a>
									<a href="eliminarDocente.php?id=<?=$doc->getIdDoc()?>" class="btn btn-warning">Eliminar</a>
								</div>
								
							</p>
						</div>
					</div>
				</div>
			<?php } ?>	
		</div>

		</div>
		<?php include('parciales/cabecera_footer.php') ?>

<?php include('parciales/footer.php') ?>	