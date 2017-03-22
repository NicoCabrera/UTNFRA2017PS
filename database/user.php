<?php
require_once"db.php";
class User
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	private $userid;
	private $username;
 	private $password;

//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
  	public function GetUserId()
	{
		return $this->userid;
	}
	public function GetUsername()
	{
		return $this->username;
	}
	public function GetPassword()
	{
		return $this->password;
	}
	public function SetUserId($valor)
	{
		$this->userid = $valor;
	}
	public function SetUsername($valor)
	{
		$this->username = $valor;
	}
	public function SetPassword($valor)
	{
		$this->password = $valor;
	}
//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($dni=NULL)
	{
		if($dni != NULL){

		}
	}

//--METODO DE CLASE
	public static function getPDO() 
	{	
		return $objetoAccesoDato = db::getInstance(); 
	}

	public static function getUser($username,$password)
	{
		try{
			$db = User::getPDO();
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

	public static function getUserByUsername($username)
	{
		try{
			$db = User::getPDO();
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
			$db = User::getPDO();
			$sql = "insert into users(username,password)values(:username,:password)";
			$resultado = $db->RetornarConsulta($sql);
			$resultado->bindValue(":username",$username);
			$resultado->bindValue(":password",$password);

			$resultado->execute();

		}catch(Exception $ex){
			die("Error: " . $ex->getMessage());
		}
	}
	public static function getAllUsers()
	{
		try{
			$db = User::getPDO();
			$sql = "select * from users";
			$resultado = $db->RetornarConsulta($sql);

			$resultado->execute();

		}catch(Exception $ex){
			die("Error: " . $ex->getMessage());
		}
	}



}
