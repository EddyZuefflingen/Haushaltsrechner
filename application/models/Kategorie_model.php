<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategorie_model extends CI_Model
{
    public function CheckKategorieName($CatName)
    {
        $this->load->database();
        $query = $this->db->query("SELECT * FROM kategorie WHERE Kategorie = '" . $CatName . "'");
        $result = $query->num_rows();
        return $result;
    }
    public function AddKategorie($CatName)
    {
        $this->load->database();
        $query = $this->db->query("INSERT INTO kategorie(Kategorie,Standartwert) Values('" . $CatName . "',0)");
    }
    public function getKategorieID($CatName)
    {
        $this->load->database();
        $query = $this->db->query("SELECT kategorie_ID FROM kategorie WHERE Kategorie = '" . $CatName . "'");
        $result = $query->row("kategorie_ID");
        return $result;
    }
    public function addConnection($KategorieID)
    {
        $this->load->database();
        $query = $this->db->query("INSERT INTO kontoCat(Recnum_ID,kategorie_ID) Values(4,'" . $KategorieID . "')");  
    }
    public function CheckStandard($CatName)
    {
        $this->load->database();
        $query = $this->db->query("SELECT * FROM kategorie WHERE kategorie_ID = '" . $CatName . "' AND standartWert = 1");
        $result = $query->num_rows();
        return $result;
    }
    public function RemoveConnection($CatName)
    {
        $this->load->database();
        $query = $this->db->query("DELETE kc FROM KontoCat as kc WHERE kategorie_ID = '" . $CatName . "' AND Recnum_ID = 4");
    }
}
