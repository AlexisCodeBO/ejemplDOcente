<?php include('parciales/cabecera.php') ?>
<?php include('parciales/foot_cabecera.php') ?>	
		<?php include('parciales/menu.php');
		include('Docente.php');
		if (isset($_GET['id'])){
			$arr=Docente::ListarDocente($_GET['id']);
		} 
		$sw = isset($arr);
		
		?>
		<div class="container">
		<form action="" method="POST" role="form" id="fDocente">
			<?php if ($sw) { ?>
				<legend>Modificar Datos del Docente</legend>
			<?php }
			else {
			 ?>
			
			<legend>Añadir Nuevo Docente</legend>
			<?php } ?>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" class="form-control" id="nombres" name="nombres" value="<?=$sw?$arr[0]->getNombres():''?>" placeholder="Nombres" required="required">
				<label for="apellidos">Apellidos</label>
				<input type="text" class="form-control" id="apellidos" name="apellidos" value="<?=$sw?$arr[0]->getApellidos():''?>" placeholder="Apellidos" required="required">
				<label for="ci">C.I.</label>
				<input type="text" class="form-control" id="ci" name="ci" value="<?=$sw?$arr[0]->getCI():''?>" placeholder="Carnet de Identidad" required="required">
				<label for="direccion">Direccion</label>
				<input type="text" class="form-control" id="direccion" name="direccion" value="<?=$sw?$arr[0]->getDireccion():''?>" placeholder="Direccion/Domicilio" required="required">
				<label for="genero">Genero</label>
				<input type="text" class="form-control" id="genero" name="genero" value="<?=$sw?$arr[0]->getGenero():''?>" placeholder="Sexo" required="required">
				<label for="fechaNac">Fecha de Nacimiento</label>
				<input type="text" class="form-control" id="fechaNac" name="fechaNac" value="<?=$sw?$arr[0]->getFechaNac():''?>" placeholder="Fecha de Nacimiento" required="required">
				<label for="celular">Celular</label>
				<input type="text" class="form-control" id="celular" name="celular" value="<?=$sw?$arr[0]->getCelular():''?>" placeholder="Numero de celular" required="required">
			</div>
			<input type="file" name="foto">
			<?php if($sw){ ?>
			<input type="hidden" name="id" value="<?=$sw?$arr[0]->getIdDoc():''?>">
			<input type="hidden" name="dir" value="<?=$sw?$arr[0]->getFoto():''?>">
			<div class="row">
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
				<div class="thumbnail">
					<img src="<?=$sw?$arr[0]->getFoto():''?>" alt="">
					<p>Si desea cambiar la imagen suba otra foto</p>
				</div>
			</div>
			</div>
			<?php } ?>
			<hr>
			<?php if($sw){ ?>
			<button type="submit" class="btn btn-primary" id="btn">Modificar</button>
			<?php } 
			else { ?>
			<button type="submit" class="btn btn-primary" id="btn">Guardar</button>
			<?php } ?>
		</form>
		<div id="res"></div>

		<?php include('parciales/cabecera_footer.php') ?>
		<script type="text/javascript">
			var f = document.getElementById('fDocente');
			f.onsubmit=insertar;
			function insertar(e) {
				e.preventDefault();
				var xht = new XMLHttpRequest();
				xht.onreadystatechange=function () {
					if (this.status==200&&this.readyState==4) {
						if(document.getElementById('res').innerHTML=this.responseText);	
					}
				}
				var btn=document.getElementById("btn").innerHTML;
				if (btn == 'Modificar') {
					xht.open('POST','modificarDocente.php');
				}
				else{
					xht.open('POST','insercionDocente.php');
				}
				xht.send(new FormData(f));	
			}
		</script>

<?php include('parciales/footer.php') ?>