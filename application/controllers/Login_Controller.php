<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

	public function index()
	{
		$this->load->view("login_view");
	}

	public function Login()
	{
		$this->load->view("login_view");
		$this->load->helper("form");
	}

	public function LoginRegisterSwitch()
	{
		if($this->input->post("Login") !== null) $this->LoginValidation();
		else if ($this->input->post("Register") !== null) $this->load->view("register_view");
		else if ($this->input->post("Test") !== null) $this->load->view("input_view"); // Workaround, wird später entfernt
	}

	private function LoginValidation()
	{
		$this->load->model("Login_model");
		$sqlResult = $this->Login_model->GetAccountData($this->input->post("username"));
		if ($sqlResult !== null AND openssl_decrypt($sqlResult->password,"AES-128-CBC","UltraSavePassword",0,"0244545367373570") == $this->input->post("password"))
		{
			if ($sqlResult->verified == 0) exit("Account noch nicht freigeschaltet !");
			else $this->load->view("input_view");
		}
		else exit("Username oder Password fehlerhaft !");
	}
}
