<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Login_model extends CI_Model
{
  public function GetUser($Username)
  {
		$this->load->database();
    $query = $this->db->query("SELECT * FROM USERS WHERE Username = '".$Username."'");
    $RowResult = $query->row();
    return $RowResult;
  }
}
?>
