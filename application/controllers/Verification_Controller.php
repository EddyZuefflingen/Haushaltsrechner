<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verification_Controller extends CI_Controller {
	public function verify()
	{
		if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
		{
			$this->load->model("Verification_model");
			if($this->Verification_model->EnableAccount($_GET['email'], $_GET['hash'])) exit("Verification succesfull");
			else exit("Verification failed");
		}
	}
}
