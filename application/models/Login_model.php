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

    public function loadTransactionKategories($Recnum_ID)
    {
      $this->load->database();
      $query = $this->db->query("SELECT t.Menge,t.Datum,k.Kategorie FROM transactions as t INNER JOIN kategorie as k on k.kategorie_ID = t.kategorie_ID WHERE t.Recnum_ID = '" . $_SESSION['userid'] ."'");
      if($query->row() == null) return;
       else 
       {
        $results = array();
        $id = 0;
         foreach($query->result() as $row)
         {
            $results[$id]["kate"] = $row->Kategorie;
            $results[$id]["menge"] = $row->Menge;
            $results[$id]["datum"] = $row->Datum;
            $id++;
         }
         return $results;
        }
    }

}
