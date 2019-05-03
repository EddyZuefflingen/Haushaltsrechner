<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sparziel_Controller extends CI_Controller {

	public function index() {
		session_start();
		$this->load->model('Sparziel_model');

		$arrSparziele = $this->Sparziel_model->getSparziele($_SESSION['userid']);

		$data = array(
			'sparziele' => $arrSparziele
		);

		$this->load->library('table');
        $this->load->helper('url');
		$this->load->view('sparziel_view', $data);
	}

	public function anlegen() {
		session_start();
		$this->load->model('Sparziel_model');
		$error = null;
		$sparziel = isset($_POST['sparziel_name']) ? $_POST['sparziel_name'] : null;
		$betrag   = isset($_POST['sparziel_betrag']) ? $_POST['sparziel_betrag'] : null;

		$error = $this->Sparziel_model->neuesSparzielAnlegen($sparziel, $betrag, $_SESSION['userid']);
		
		$data = array(
			'fehler' 			=> $error,
			'sparziel'			=> $sparziel,
			'betrag'			=> $betrag
		);
		
		$this->load->helper('url');
		$this->load->view('sparziel_details', $data);
	}

	public function hinzufuegen() {
		$this->load->model('Sparziel_model');
		$this->Sparziel_model->sparzielBearbeiten($_POST['sparzielId'], $_POST['betrag']);
	}
}