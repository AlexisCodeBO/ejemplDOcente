<?php
	include('Docente.php');
	Docente::eliminar($_GET['id']);
	header('Location:http://localhost/Proyect/listarDocente.php');
?>