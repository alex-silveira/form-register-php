<?php

require '../vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
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
        $this->user = $userName;
    }

	public function getPassword() {
        return $this->password;
    }

    public function setPassword($userPassword) {
        $this->password = $userPassword;
    }

	public function getcPassword() {
        return $this->cPassword;
    }

    public function setcPassword($usercPassword) {
        $this->cPassword =$usercPassword;
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
        $email = $userEmail;
        $this->mail =$email;
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
				utf8_encode($msg);
				header("Location: ../index.php?msg=$msg");
				return false;
			}
			if($mail == $email){
				$msg = "Este e-mail já existe, tente outro!";
				utf8_encode($msg);
				header("Location: ../index.php?msg=$msg");
				return false;
			}
		}

		return true;
	}

    public function verificarEmail($email){
        $com = $this->conexao->prepare('SELECT mail
			FROM users
			WHERE mail = ?');
        $com->bindValue(1, $email);
        $com->execute() or die(print_r($com->errorInfo(), true));

        $row = $com->fetch(PDO::FETCH_ASSOC);

        if(!$row){
            $msg = "Este email não está cadastrado!";
            utf8_encode($msg);
            header("Location: ../index.php?page=2&msg=$msg");
            return false;
        }

        return true;
    }

    public function verificarKey($key){
        $com = $this->conexao->prepare('SELECT resetcode, resetcodestatus
			FROM users
			WHERE resetcode = ? AND resetcodestatus = 1');
        $com->bindValue(1, $key);
        $com->execute() or die(print_r($com->errorInfo(), true));

        $row = $com->fetch(PDO::FETCH_ASSOC);

        if($row){
            $msg = "Você já utilizou esse código!";
            utf8_encode($msg);
            header("Location: ../index.php?page=4&msg=$msg");
            return false;
        }

        return true;
    }

    public function sendEmail($emailPost,$msg){

        //Create a new PHPMailer instance
        $mail = new PHPMailer;

        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        // SMTP::DEBUG_OFF = off (for production use)
        // SMTP::DEBUG_CLIENT = client messages
        // SMTP::DEBUG_SERVER = client and server messages
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;

        //Set the hostname of the mail server
        $mail->Host = '127.0.0.1';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6

        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 1025;

        //Set the encryption mechanism to use - STARTTLS or SMTPS
        //$mail->SMTPSecure = 'tls';

        //Whether to use SMTP authentication
        $mail->SMTPAuth = false;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = 'SMTP EMAIL';

        //Password to use for SMTP authentication
        $mail->Password = 'SMTP PASSWORD';

        //Set who the message is to be sent from
        $mail->setFrom('admin@localhost.com', 'Administrator');

        //Set an alternative reply-to address
        //$mail->addReplyTo($mail, 'Player');

        //Set who the message is to be sent to
        $mail->addAddress($emailPost, 'PLAYER');

        //Set the subject line
        $mail->Subject = 'teste';

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->msgHTML($msg);

        //Replace the plain text body with one created manually
        $mail->AltBody = '';

        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');

        //send the message, check for errors
        if (!$mail->send()) {
            echo 'Mailer Error: '. $mail->ErrorInfo;
        } else {
            echo 'Message sent!';
            //Section 2: IMAP
            //Uncomment these to save your message in the 'Sent Mail' folder.
            #if (save_mail($mail)) {
            #    echo "Message saved!";
            #}
        }

    }

    public function updateResetPasswordCode($code, $email){
        $com = $this->conexao->prepare('UPDATE users SET resetcode = ?, resetcodestatus = 0 WHERE mail = ?');
        $com->bindValue(1, $code);
        $com->bindValue(2, $email);
        $com->execute() or die(print_r($com->errorInfo(), true));

        if($com->rowCount() > 0){
            $msg = "Um link de recuperação de senha foi enviado para seu e-mail!";
            header("Location: ../index.php?page=2&msg=$msg");
        }
    }

    public function updatePassword($password, $key){
        $com = $this->conexao->prepare('UPDATE users SET password = ?, resetcodestatus = 1 where resetcode = ?');
        $com->bindValue(1, $password);
        $com->bindValue(2, $key);
        $com->execute() or die(print_r($com->errorInfo(), true));

        if($com->rowCount() > 0){
            $msg = "Senha Atualizada com sucesso!";
            header("Location: ../index.php?page=4&msg=$msg");
        }
    }

    public function generateKey($email){
        $key = md5((2418*2).$email);
        $addKey = substr(md5(uniqid(rand(),1)),3,10);
        $key = $key . $addKey;
        return $key;
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
