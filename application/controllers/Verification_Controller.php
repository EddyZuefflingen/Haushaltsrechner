<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verification_Controller extends CI_Controller {
	public function verify()
	{
		if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
		{
			$this->load->model("Verification_model");
			if($this->Verification_model->EnableAccount($_GET['email'], $_GET['hash']))
			{
				$this->load->model("Login_model");
				$data = array(
					"verfUsername" => $this->Login_model->GetUsernameFromEmail($_GET['email'])
				); 
		
				$this->load->helper('url');
				$this->load->view("login_view", $data);
				echo '<script type="text/javascript"> window.alert("Erfolgreich verifiziert!") </script>';
			} 
			else 
			{
				
				$this->load->helper('url');
				$this->load->view("login_view", $data);
				echo '<script type="text/javascript"> window.alert("Erfolgreich fehlgeschlagen!") </script>';
			}
		}
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
}
