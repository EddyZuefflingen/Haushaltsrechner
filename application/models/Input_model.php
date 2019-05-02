<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Input_model extends CI_Model
{
  public function loadCategories()
  {
     $this->load->database();
     $query = $this->db->query("SELECT k.kategorie_ID,k.Kategorie FROM kategorie as k INNER JOIN kontocat as kc on kc.kategorie_ID = k.kategorie_ID WHERE KC.Recnum_ID = '" . $_SESSION['userid'] ."' OR k.Standartwert = 1");
     if($query->row() == null) return;
     else
     {
       $results=array();
       foreach($query->result() as $value)
       {
        $results[$value->kategorie_ID] = $value->Kategorie;
       }

     return $results;
    }
  }
  public function doNegativeTransaction($categorie, $amount, $sign,$date)
  {
    $this->load->database();
    $query = $this->db->query("INSERT INTO transactions(Recnum_ID,Menge,kategorie_ID,Datum) Values(4,'" . $sign . "" . $amount . "','" . $categorie . "','" . $date . "')");
  }
  public function doPositiveTransaction($categorie, $amount,$date)
  {
    $this->load->database();
    $query = $this->db->query("INSERT INTO transactions(Recnum_ID,Menge,kategorie_ID,Datum) Values(4,'" . $amount . "','" . $categorie . "','" . $date . "')");
  }
}
?>
