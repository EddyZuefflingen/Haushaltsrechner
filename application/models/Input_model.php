<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Input_model extends CI_Model
{
  public function loadCategories()
  {
     $this->load->database();
     $query = $this->db->query("SELECT Kategorie FROM kategorie");
     if($query->row() == null) return;
     else
     {
      $RowResult = array();
      foreach($query->row() as $value)
      {
        array_push($RowResult,$value);
      }
      return $RowResult;
    }
  }
}
?>
