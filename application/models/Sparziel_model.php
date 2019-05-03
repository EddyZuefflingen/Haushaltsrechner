<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Sparziel_model extends CI_Model
{
    public function neuesSparzielAnlegen($sparziel, $betrag, $userid) {
        $this->load->database();
        $query = $this->db->query("INSERT INTO sparziele (user_id,name,stand,ziel) VALUES (" . $userid . ",'".$sparziel."', 0, ".$betrag.")");
    }

    public function getSparziele($userid) {
        $this->load->database();
        $query = $this->db->query("SELECT * FROM sparziele WHERE user_id = " . $userid);
        return $query->result();
    }

    public function sparzielBearbeiten($sparzielId, $betrag) {
        $this->load->database();
        $query = $this->db->query("UPDATE sparziele SET stand = " . $betrag . " WHERE sparziel_id = " . $sparzielId);
    }
}
