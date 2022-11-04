<?php
	include('Docente.php');
	$dir = 'img/'.$_FILES['foto']['name'];
	move_uploaded_file($_FILES['foto']['tmp_name'],$dir);
	$Docente = new Docente($_POST['nombres'],$_POST['apellidos'],$_POST['ci'],$_POST['direccion'],$_POST['genero'],$_POST['fechaNac'],$_POST['celular'],$dir);
	echo $Docente->insertar();
?>