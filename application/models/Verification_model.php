<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Verification_model extends CI_Model
{
  public function EnableAccount($email, $hash)
  {
    $this->load->database();
    $query = $this->db->query("UPDATE accounts SET verified = 1 WHERE email = '".$email."' AND verificationHash = '".$hash."'");
    if ($this->db->affected_rows() > 0) return true;
    else return false;
  }
}
?>
