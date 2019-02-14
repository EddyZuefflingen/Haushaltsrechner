<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

	public function index()
	{
		$this->load->view('login_view');
	}

	public function Login()
	{
		$this->load->view('login_view');
		$this->load->helper('form');
	}

	public function LoginRegisterSwitch()
	{
		$login = $this->input->post('Login');
		$register = $this->input->post('Register');

		if(isset($login))
		{
			$this->LoginValidation();
		}
		else if (isset($register))
		{
			$this->Register();
		}
	}

	private function LoginValidation()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$encryptedPassword = openssl_encrypt($password,"AES-128-CBC","UltraSavePassword",0,"0244545367373570");

		$this->load->model('Login_model');
		$UserInformation = $this->Login_model->GetUser($username, $encryptedPassword);
		if (isset($UserInformation->Username) & isset($UserInformation->Password))
		{
			$decryptedPassword = openssl_decrypt($UserInformation->Password,"AES-128-CBC","UltraSavePassword",0,"0244545367373570");
			if ($decryptedPassword == $password)
			{
				echo "YEAH";
			}
		}
		else echo "Nope";
	}

	private function Register()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$encryptedPassword = openssl_encrypt($password,"AES-128-CBC","UltraSavePassword",0,"0244545367373570");

		$this->load->model('Login_model');
		$UserCreated = $this->Login_model->CreateUser($username, $encryptedPassword);
		if ($UserCreated) echo "Benutzter erfolgreich erstellt";
		else echo "Benutzter bereits vergeben";
	}

}
