<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Register_model extends CI_Model
{
  public function CreateUser($Username, $Password)
  {
    $this->load->register_model();
    $this->load->database();
    $RowResult = 
    $RowResult = $query->row();
    if (isset($RowResult->Username) & isset($RowResult->Password))
    {
      return false;
    }
    else
    {
      $query = $this->db->query("INSERT INTO users (Username,Password) VALUES ('".$Username."','".$Password."')");
      return true;
    }
  }
}
?>
