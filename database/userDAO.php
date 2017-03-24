<?php
require_once"db.php";
class UserDAO
{

//--METODO DE CLASE
	public static function getPDO() 
	{	
		return $objetoAccesoDato = db::getInstance(); 
	}

	public static function getUser($username,$password)
	{
		try{
			$db = UserDAO::getPDO();
			$sql = "select * from users where username = :username and password = :password";
			$resultado = $db->RetornarConsulta($sql);
			$resultado->bindValue(":username",$username);
			$resultado->bindValue(":password",$password);

			$resultado->execute();
			$numero_registro = $resultado->rowCount();

			if($numero_registro !=0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}catch(Exception $ex){
			die("Error: " . $ex->getMessage());
		}
	}

	public static function getUserByName($username)
	{
		try{
			$db = UserDAO::getPDO();
			$sql = "select * from users where username = :username";
			$resultado = $db->RetornarConsulta($sql);
			$resultado->bindValue(":username",$username);

			$resultado->execute();
			$numero_registro = $resultado->rowCount();

			if($numero_registro !=0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}catch(Exception $ex){
			die("Error: " . $ex->getMessage());
		}
	}


	public static function saveUser($username,$password)
	{
		try{
			$rv = "";

			if(UserDAO::getUserByName($username)){
				$rv = "El usuario ya existe";
			}
			else{

				$db = UserDAO::getPDO();
				$sql = "insert into users(username,password)values(:username,:password)";
				$resultado = $db->RetornarConsulta($sql);
				$resultado->bindValue(":username",$username);
				$resultado->bindValue(":password",$password);

				if($resultado->execute())
				{
					$rv = "El usuario " . $username . " fue creado exitosamente.";
				}
				else{
					$rv = "Error: el usuario no pude ser creado. COmuniquese con el administrador de su sistema.";
				}	
			}
			return $rv;

		}catch(Exception $ex){
			die("Error: " . $ex->getMessage());
		}
	}

	public static function updateUser($userId,$username,$password)
	{
		try{

			$rv = "";

			if(UserDAO::validateUserToUpdate($userId,$username)){
				$rv = "Ya existe un usuario con ese nombre. Eliga otro nombre ";
			}
			else{
				$db = UserDAO::getPDO();
				$sql = "update users set username = :username, password = :password where userid = :userid";
				
				$resultado = $db->RetornarConsulta($sql);
				
				$resultado->bindValue(":userid",$userId);
				$resultado->bindValue(":username",$username);
				$resultado->bindValue(":password",$password);

				if($resultado->execute()){
					$rv = "Usuario " . $username . " actualizado correctamente.";
				}
				else{
					$rv = "El usuario no se pudo actualizar. Comuniquese con el administrador de su sistema.";
				}
			}
			return $rv;

		}catch(Exception $ex){
			die("Error: " . $ex->getMessage());
		}
	}

	private static function validateUserToUpdate($userId,$username){
			$rv = false;
			$db = UserDAO::getPDO();
			$sql = "select * from users where username = :username and userid != :userid";
			
			$resultado = $db->RetornarConsulta($sql);
			
			$resultado->bindValue(":userid",$userId);
			$resultado->bindValue(":username",$username);

			$resultado->execute();

			$matches = $resultado->rowCount();

			if($matches != 0)
			{
				$rv = true;
			}
			else{
				$rv =  false;
			}

			return $rv;
	}	

	public static function deleteUser($userId,$textResponse)
	{
		try{
			$db = UserDAO::getPDO();
			$sql = "Delete from users where userid = :userid";
			
			$resultado = $db->RetornarConsulta($sql);
			
			$resultado->bindValue(":userid",$userId);
			
			if($resultado->execute())
			{
				$textResponse = "El usuario ha sido eliminado exitosamente";
			}
			else
			{
				$textResponse = "No ha sido posible eliminar el usuario, comuniquese con el aministrador de su sistema";
			}

			return $textResponse;

		}catch(Exception $ex){
			die("Error: " . $ex->getMessage());
		}
	}

	public static function getUserById($userid)
	{
		try{
			$textResponse = "";
			$db = UserDAO::getPDO();
			$sql = "select * from users where userid = :userid";
			$resultado = $db->RetornarConsulta($sql);
			$resultado->bindValue(":userid",$userid);

			$resultado->execute();

			$numero_registro = $resultado->rowCount();
			if($numero_registro != 0)
			{
				$textResponse = UserDAO::deleteUser($userid,$textResponse);
			}
			else{
				$textResponse = "El usuario no existe";
			}
			
			return $textResponse;

		}catch(Exception $ex){
			die("Error: " . $ex->getMessage());
		}
	}


}
