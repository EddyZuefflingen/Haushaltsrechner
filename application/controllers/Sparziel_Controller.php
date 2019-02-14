<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sparziel_Controller extends CI_Controller {

	public function index()
	{
		$this->load->view('sparziel_view');
	}

}