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
       $results=array();
       $RowResult = mysql_fetch_row($query);
       foreach($RowResult as $value)
       {
         array_push($a,$value);
       }
     return $a;
     }
  }
}
?>
