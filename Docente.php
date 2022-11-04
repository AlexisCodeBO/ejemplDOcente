<?php 
include('Conexion.php');
	/**
	* 
	*/
	class Docente
	{
		private $IdDocente,$Nombres,$Apellidos,$CI,$Direccion,$Genero,$FechaNac,$Celular,$Foto;
		function __construct($Nombres,$Apellidos,$CI,$Direccion,$Genero,$FechaNac,$Celular,$Foto,$IdDocente=null)
		{
			$this->IdDocente=$IdDocente;
			$this->Nombres=$Nombres;
			$this->Apellidos=$Apellidos;
			$this->CI=$CI;
			$this->Direccion=$Direccion;
			$this->Genero=$Genero;
			$this->FechaNac=$FechaNac;
			$this->Celular=$Celular;
			$this->Foto=$Foto;
		}
		public function insertar()
		{
			$pdo = Conexion::conectar();
			$sql="INSERT INTO docente(Nombres,Apellidos,CI,Direccion,Genero,FechaNac,Celular,Foto) VALUES
			(:Nombres,:Apellidos,:CI,:Direccion,:Genero,:FechaNac,:Celular,:Foto)";
			$query = $pdo->prepare($sql);
			$query->bindParam(':Nombres',$this->Nombres);
			$query->bindParam(':Apellidos',$this->Apellidos);
			$query->bindParam(':CI',$this->CI);
			$query->bindParam(':Direccion',$this->Direccion);
			$query->bindParam(':Genero',$this->Genero);
			$query->bindParam(':FechaNac',$this->FechaNac);
			$query->bindParam(':Celular',$this->Celular);
			$query->bindParam(':Foto',$this->Foto);
			return $query->execute();
		}
		static public function listarTodo()
		{
			$pdo = Conexion::conectar();
			$sql = 'SELECT * FROM docente';
			$query = $pdo->prepare($sql);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'docente',array('Nombres','Apellidos','CI','Direccion','Genero','FechaNac','Celular','Foto'));
		}
		static function ListarDocente($id)
		{
			$pdo = Conexion::conectar();
			$sql="SELECT * FROM docente WHERE IdDocente = :id";
			$query = $pdo->prepare($sql);
			$query->bindParam(':id',$id);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'docente',array('Nombres','Apellidos','CI','Direccion','Genero','FechaNac','Celular','Foto'));
		}
		public function modificar()
		{
			$pdo = Conexion::conectar();
			$sql = "UPDATE docente set Nombres =:Nombres, Apellidos= :Apellidos, CI= :CI, Direccion= :Direccion, Genero= :Genero, FechaNac= :FechaNac, Celular= :Celular, Foto= :Foto WHERE IdDocente = :id";
			$query = $pdo->prepare($sql);
			$query->bindParam(':Nombres',$this->Nombres);
			$query->bindParam(':Apellidos',$this->Apellidos);
			$query->bindParam(':CI',$this->CI);
			$query->bindParam(':Direccion',$this->Direccion);
			$query->bindParam(':Genero',$this->Genero);
			$query->bindParam(':FechaNac',$this->FechaNac);
			$query->bindParam(':Celular',$this->Celular);
			$query->bindParam(':Foto',$this->Foto);
			$query->bindParam(':id',$this->IdDocente);
			return $query->execute();	
		}
		static function eliminar($id)
		{
			$pdo = Conexion::conectar();
			$sql = "DELETE FROM docente WHERE IdDocente = :id";
			$query = $pdo->prepare($sql);
			$query->bindParam(':id',$id);
			return $query->execute();
		}
		public function getNombres()
		{
			return $this->Nombres;
		}
		public function getApellidos()
		{
			return $this->Apellidos;
		}
		public function getCI()
		{
			return $this->CI;
		}
		public function getDireccion()
		{
			return $this->Direccion;
		}
		public function getGenero()
		{
			return $this->Genero;
		}
		public function getFechaNac()
		{
			return $this->FechaNac;
		}
		public function getCelular()
		{
			return $this->Celular;
		}
		public function getIdDoc()
		{
			return $this->IdDocente;
		}
		public function getFoto()
		{
			return $this->Foto;
		}
		
	}
 ?>