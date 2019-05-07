<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_Controller extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('register_view');
	}

	public function Register()
	{
		$this->load->helper('url');
		$this->load->view('register_view');
		$this->load->helper('form');
	}

	public function Registration()
	{
		$this->load->model('Login_model');
		if ($this->input->post("username") == null OR $this->input->post("password") == null OR $this->input->post("email") == null) 
		{
			$this->sendError("Bitte alle Felder ausfüllen!");
			return;
		}
		else if ($this->Login_model->CheckIfUsernameExists($this->input->post("username"))) 
		{
			$this->sendError("Username bereits vergeben!");
			return;
		}
		else if ($this->Login_model->CheckIfEmailExists($this->input->post("email"))) 
		{
			$this->sendError("Email bereits vergeben!");
			return;
		}

		else if (!$this->CheckIfEmailIsValid($this->input->post("email"))) 
		{
			$this->sendError("Email ist ungültig!");
			return;
		}

		 $hash = md5(rand(0,1000)); // Generate random 32 character hash and assign it to a local variable.
		 $this->CreateAccount($this->input->post("username"), $this->input->post("password"), $this->input->post("email"), $hash);
		 $this->SendEmailVerification($this->input->post("email"), $hash);
	}

	public function sendError($message)
	{
		echo '<script type="text/javascript"> window.alert("'.$message.'") </script>';

        $data = array(
			"username" => $this->input->post("username"),
			"mail" => $this->input->post("email"),
        ); 

		$this->load->helper('url');
		$this->load->view("register_view", $data);
	}

	private function CreateAccount($username, $password, $email, $hash)
	{
		$this->load->model('Register_model');
		$encryptedPassword = openssl_encrypt($password,"AES-128-CBC","UltraSavePassword",0,"0244545367373570");
		$this->Register_model->CreateAccount($username, $encryptedPassword, $email, $hash);
	}	

	private function SendEmailVerification($email, $hash)
	{
		//https://www.homeconstructor.net/de/email-versand-unter-xampp-einrichten

		$this->load->library("email");
		$this->email->from("noreply@localhost.com", "Haushaltsrechner");
		$this->email->to($email);
		
		$this->email->subject("Haushaltsrechner Verification");
		$this->email->message("Please click this link to verify your account:\r\n
		http://localhost/Haushaltsrechner/index.php/Verification_Controller/verify?email=".$email."&hash=".$hash);
		
		$this->email->send();
	}

	private function CheckIfEmailIsValid($email)
	{
		if (preg_match ("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) return true;
		else return false;
	}
}
