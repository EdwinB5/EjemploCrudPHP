<?php
class Profesor
{
	private $pdo;

	public $idProfesor;
	public $Nombre;
	public $Apellido;
	public $Sexo;
	public $FechaNacimiento;
	public $FechaRegistro;
	public $Correo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM profesores");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idProfesor)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM profesores WHERE idProfesor = ?");
			$stm->execute(array($idProfesor));

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idProfesor)
	{
		try
		{
			$stm = $this->pdo->prepare("DELETE FROM profesores WHERE idProfesor = ?");
			$stm->execute(array($idProfesor));
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE profesores SET
						Nombre = ?,
						Apellido = ?,
						Sexo = ?,
						FechaNacimiento = ?,
						Correo = ?
					WHERE idProfesor = ?";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->Nombre,
						$data->Apellido,
						$data->Sexo,
						$data->FechaNacimiento,
						$data->Correo,
						$data->idProfesor
						)
				);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Profesor $data)
	{
		try
		{
			$sql = "INSERT INTO profesores (Nombre,Apellido,Sexo,FechaNacimiento,Correo,FechaRegistro)
					VALUES(?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
				->execute(
					array(
						$data->Nombre,
						$data->Correo,
						$data->Apellido,
						$data->Sexo,
						$data->FechaNacimiento,
						$data->Correo,
						date('Y-m-d')
					)
				);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
}