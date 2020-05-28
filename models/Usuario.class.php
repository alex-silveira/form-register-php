<?php

require '../vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

include_once 'Conexao.class.php';

class Usuario{
	
	private $id;
	private $user;
	private $password;
	private $cPassword;
	private $user_type;
	private $ip;
	private $server;
	private $ncash;
	private $bank_gold;
	private $mail;
	private $create_at;
	private $disabled_until;
	

	public function getId() {
        return $this->id;
    }
	
    public function setId($userId) {
        $this->id = $userId;
    }

	public function getUser() {
        return $this->user;
    }

    public function setUser($userName) {
        $this->user = trim($userName);
    }
	
	public function getPassword() {
        return $this->password;
    }
	
    public function setPassword($userPassword) {
        $this->password = trim($userPassword);
    }
	
	public function getcPassword() {
        return $this->cPassword;
    }
	
    public function setcPassword($usercPassword) {
        $this->cPassword = trim($usercPassword);
    }

	public function getUserType() {
        return $this->user_type;
    }
	
    public function setUserType($userType) {
        $this->user_type = $userType;
    }
	
	public function getIp() {
        return $this->ip;
    }
	
    public function setIp($userIp) {
        $this->ip = $userIp;
    }
	
	public function getServer() {
        return $this->server;
    }
	
    public function setServer($userServer) {
        $this->server = $userServer;
    }
	
	public function getNCash() {
        return $this->ncash;
    }
	
    public function setNCash($userNCash) {
        $this->ncash = $userNCash;
    }

	public function getBankGold() {
        return $this->bank_gold;
    }
	
    public function setBankGold($userBankGold) {
        $this->bank_gold = $userBankGold;
    }	

	public function getEmail() {
        return $this->mail;
    }

    public function setEmail($userEmail) {
        $email = filter_var($userEmail, FILTER_SANITIZE_EMAIL);
        $this->mail = trim($email);
    }

	public function getCreateAt() {
        return $this->create_at;
    }
	
    public function setCreateAt($userCreateAt) {
        $this->create_at = $userCreateAt;
    }	
	
	public function getDisabledUntil() {
        return $this->disabled_until;
    }
	
    public function setDisabledUntil($userDisabledUntil) {
        $this->disabled_until = $userDisabledUntil;
    }
	
	private $conexao;

	public function __construct(){
		$this->conexao = Conexao::getInstancia();
	}

	public function cadastrar($usuario){

		$com = $this->conexao->prepare("
			insert into users
			(
				id,
				user_name,
				password,
				user_type,
				ip,
				server,
				ncash,
				bank_gold,
				mail,
				created_at,
				disabled_until
			)
			values
			(
				?,
				?,
				?,
				?,
				?,
				?,
				?,
				?,
				?,
				?,
				NULL
			);
		");
		
		$com->bindValue(1,$usuario->id);
		$com->bindValue(2,$usuario->user);
		$com->bindValue(3,$usuario->password);
		$com->bindValue(4,$usuario->user_type);
		$com->bindValue(5,$usuario->ip);
		$com->bindValue(6,$usuario->server);
		$com->bindValue(7,$usuario->ncash);
		$com->bindValue(8,$usuario->bank_gold);
		$com->bindValue(9,$usuario->mail);
		$com->bindValue(10,$usuario->create_at);

		$com->execute() or die(print_r($com->errorInfo(), true));
	}
	
	public function verificarUsuario($usuario, $email){
		$com = $this->conexao->prepare('SELECT user_name, mail
			FROM users
			WHERE user_name = ? OR mail = ?');
		$com->bindValue(1, $usuario);
		$com->bindValue(2, $email);
		$com->execute() or die(print_r($com->errorInfo(), true));
		
		foreach($com->fetchAll(PDO::FETCH_ASSOC) as $row){
			
			$user_name = $row['user_name'];
			$mail = $row['mail'];
			
			if($user_name == $usuario){
				$msg = "Este usuário já existe, tente outro!";
				$msg = utf8_encode($msg);
				header("Location: ../index.php?msg=$msg");
				return false;
			}
			if($mail == $email){
				$msg = "Este e-mail já existe, tente outro!";
				$msg = utf8_encode($msg);
				header("Location: ../index.php?msg=$msg");
				return false;
			}
		}
		
		return true;
	}
	
	public function generateUuid($user){
		$uuid3 = Uuid::uuid3(Uuid::NAMESPACE_DNS, $user);
		return $uuid3->toString();
	}
	
	public function getUserIP()
	{
		$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_X_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if(isset($_SERVER['REMOTE_ADDR']))
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}
	
	function anti_injection($sql){
	   $sql = preg_replace("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/", "" ,$sql);
	   $sql = trim($sql);
	   $sql = strip_tags($sql);
	   $sql = (get_magic_quotes_gpc()) ? $sql : addslashes($sql);
	   return $sql;
	}

}
?>