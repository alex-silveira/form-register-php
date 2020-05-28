<?php

class Conexao extends PDO{

	private static $instancia;
	
	public function Conexao($dns, $user, $pass){
		parent::__construct($dns, $user, $pass);
	}
	public static function getInstancia(){
		if(!isset(self::$instancia)){
			try{
				self::$instancia=new Conexao(
				"pgsql:dbname=user;host=localhost",
				"postgres","12345");
			}catch(Exception $e){
				die('Erro ao conectar na base de dados');
			}
		}
		return self::$instancia;
	}
}
?>