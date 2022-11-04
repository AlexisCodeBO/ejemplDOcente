<?php
	include('Docente.php');
	if ($_FILES['foto']['name']!='') {
		$dir = 'img/'.$_FILES['foto']['name'];
		move_uploaded_file($_FILES['foto']['tmp_name'],$dir);
	}
	else{
		$dir = $_POST['dir'];
	}
	$Docente = new Docente($_POST['nombres'],$_POST['apellidos'],$_POST['ci'],$_POST['direccion'],$_POST['genero'],$_POST['fechaNac'],$_POST['celular'],$dir,$_POST['id']);
	echo $Docente->modificar();
?>