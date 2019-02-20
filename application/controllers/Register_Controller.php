<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_Controller extends CI_Controller {

	public function index()
	{
		$this->load->view('register_view');
	}

	public function Login()
	{
		$this->load->view('register_view');
		$this->load->helper('form');
	}

	public function Registration()
	{
		$registrationInformation = array
		(
			'username' => $this->input->post("username"),
			'password' => $this->input->post("password"),
			'email' => $this->input->post("email")
		);

		//Create Account in DB 
		$this->CreateAccount($registrationInformation);
		//Send Mail with verification
	}

	private function CreateAccount($information)
	{
		

		$username = $information["username"];
		//$password = $information["password"];
		$email = $information["email"];
		$encryptedPassword = openssl_encrypt($information["password"],"AES-128-CBC","UltraSavePassword",0,"0244545367373570");

		$this->load->model('Register_model');
		$UserCreated = $this->Register_model->CreateAccount($username, $encryptedPassword,$email);
		if ($UserCreated) echo "Benutzter erfolgreich erstellt";
		else echo "Benutzter bereits vergeben";
	}	
}
