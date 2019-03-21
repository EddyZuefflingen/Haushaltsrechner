<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Sparziel_model extends CI_Model
{
    public function neuesSparzielAnlegen($sparziel, $betrag) {
        $this->load->database();
        $query = $this->db->query("INSERT INTO sparziele (user_id,name,stand,ziel) VALUES (1,'".$sparziel."', 0, ".$betrag.")");
    }

    public function getSparziele() {
        $this->load->database();
        $query = $this->db->query("SELECT * FROM sparziele WHERE user_id = 1");
        return $query->result();
    }
}
