<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Input_model extends CI_Model
{
  public function loadCategories()
  {
     $this->load->database();
     $query = $this->db->query("SELECT kategorie_ID,Kategorie FROM kategorie");
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
}
?>
