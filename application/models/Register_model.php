<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Register_model extends CI_Model
{
  public function CreateAccount($Username, $Password, $Email)
  {
    $this->load->model("Login_model");
    $this->load->database();
    $RowResult = $this->Login_model->GetUser($Username);
    $RowResult = $query->row();
    if (isset($RowResult->Username) & isset($RowResult->Password))
    {
      return false;
    }
    else
    {
      $query = $this->db->query("INSERT INTO users (Username,Password,email) VALUES ('".$Username."','".$Password."','".$Email."')");
      return true;
    }
  }
}
?>
