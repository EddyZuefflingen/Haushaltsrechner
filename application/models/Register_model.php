<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Register_model extends CI_Model
{
  public function CreateAccount($Username, $Password, $Email, $hash)
  {
    $this->load->database();
    $query = $this->db->query("INSERT INTO accounts (username,password,email,verificationHash) VALUES ('".$Username."','".$Password."','".$Email."','".$hash."')");
  }
}
?>
