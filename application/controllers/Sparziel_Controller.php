<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sparziel_Controller extends CI_Controller {

	public function index() {
		$this->load->model('Sparziel_model');
		
		$error = null;
		$sparziel = isset($_POST['sparziel_name']) ? $_POST['sparziel_name'] : null;
		$betrag   = isset($_POST['sparziel_betrag']) ? $_POST['sparziel_betrag'] : null;

		if($sparziel != null && $sparziel != '') {
			$error = $this->Sparziel_model->neuesSparzielAnlegen($sparziel, $betrag);
		}

		$arrSparziele = $this->Sparziel_model->getSparziele();

		$data = array(
			'fehler' 			=> $error,
			'neues_sparziel'	=> $sparziel,
			'sparziele'			=> $arrSparziele
		);

		$this->load->library('table');
		$this->load->view('sparziel_view', $data);
	}
}