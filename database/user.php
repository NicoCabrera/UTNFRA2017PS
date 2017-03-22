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
	public static function getUser($userid,$password) 
	{	
		$objetoAccesoDato = db::getPDO(); 
	}
}
