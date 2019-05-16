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
    public function addConnection($KategorieID,$RecnumID)
    {
        $this->load->database();
        $query = $this->db->query("INSERT INTO kontoCat(Recnum_ID,kategorie_ID) Values('" . $RecnumID ."','" . $KategorieID . "')");  
    }
    public function CheckStandard($CatID)
    {
        $this->load->database();
        $query = $this->db->query("SELECT * FROM kategorie WHERE kategorie_ID = '" . $CatID . "' AND standartWert = 1");
        $result = $query->num_rows();
        return $result;
    }
    public function CheckConnection($CatID,$RecnumID)
    {
        $this->load->database();
        $query = $this->db->query("SELECT * FROM kontoCat where kategorie_ID = '" . $CatID . "' AND Recnum_ID = '" . $RecnumID ."'");
        $result = $query->num_rows();
        return $result;
    }
    public function RemoveConnection($CatID,$RecnumID)
    {
        $this->load->database();
        $query = $this->db->query("DELETE FROM KontoCat WHERE kategorie_ID = '" . $CatID . "' AND Recnum_ID = '" . $RecnumID ."'");
    }
    public function ChangeTransactions($oldID,$newID,$RecnumID)
    {
        $this->load->database();
        $query = $this->db->query("UPDATE transactions SET kategorie_ID = '" . $newID . "' WHERE Recnum_ID = '" . $RecnumID ."' AND kategorie_ID = '" . $oldID . "'");
    }
}
