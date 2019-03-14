<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function CheckIfUsernameExists($Username)
    {
        $this->load->database();
        $query = $this->db->query("SELECT username FROM accounts WHERE username = '" . $Username . "'");
        if ($query->row() == null)
            return false;
        else
            return true;
    }

    public function CheckIfEmailExists($email)
    {
        $this->load->database();
        $query = $this->db->query("SELECT email FROM accounts WHERE email = '" . $email . "'");
        if ($query->row() == null)
            return false;
        else
            return true;
    }

    public function GetAccountData($Username)
    {
        $this->load->database();
        $query = $this->db->query("SELECT * FROM accounts WHERE username = '" . $Username . "'");
        $RowResult = $query->row();
        return $RowResult;
    }
}
