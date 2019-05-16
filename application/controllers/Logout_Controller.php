<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout_Controller extends CI_Controller {

	public function index() {
        session_start();
        session_destroy();

        $this->load->helper('url');
		$this->load->view('logout_view');
	}
}