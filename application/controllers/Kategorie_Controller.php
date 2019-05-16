<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategorie_Controller extends CI_Controller 
{
    public function index()
    {
        $this->load->helper('url');
        $this->load->view("kategorie_view", $data); 
    }

    public function GetInputControlValues()
    {
        $this->load->model("Input_model");
        $this->load->model("Login_model");
        $sqlResult = $this->Input_model->getKontostand($_SESSION['userid']);
        $data = array(
            "kategories" => $this->Input_model->loadCategories(),
            "transactionKategories" => $this->Login_model->loadTransactionKategories($_SESSION['userid']),
            "kontostand" => $sqlResult->Kontostand,
            //Hier neue Array Werte für die Input view zum füllen der Controls einfügen !
        ); 
        
        return $data;
    }

    public function ButtonSwitch()
	{
        session_start();
        $this->load->helper('url');
        $this->load->model("Input_model");
        if ($this->input->post("add") !== null){
            $this->AddCategorie();
            $this->load->view("kategorie_view",$this->GetInputControlValues());
        }

        if ($this->input->post("rename") !== null){
          $this->RenameCategorie();
          $this->load->view("kategorie_view",$this->GetInputControlValues());
        }

        if ($this->input->post("delete") !== null){
        
            $this->DeleteCategorie();
            $this->load->view("kategorie_view",$this->GetInputControlValues());
        }
    }

    private function AddCategorie()
    {
        $this->load->model("Kategorie_model");
        $sqlResult = $this->Kategorie_model->CheckKategorieName($this->input->post("KategorieName"));
        if ($sqlResult >= 0)
        {
            if (0 == $sqlResult)
            {
                $sqlInsert = $this->Kategorie_model->AddKategorie($this->input->post("KategorieName"));
                $sqlID = $this->Kategorie_model->getKategorieID($this->input->post("KategorieName"));
                $sqlAdd = $this->Kategorie_model->AddConnection($sqlID,$_SESSION['userid']);
            }
            else
            {
                $sqlID = $this->Kategorie_model->getKategorieID($this->input->post("KategorieName"));
                $sqlCatConnection = $this->Kategorie_model->CheckConnection($sqlID,$_SESSION['userid']);
                if(0 == $sqlCatConnection)
                {
                    $sqlAdd = $this->Kategorie_model->AddConnection($sqlID,$_SESSION['userid']);
                }
                else
                {
                    exit("Die Kategorie ist bereits vorhanden...");
                }
            }
                
        }
        else
            exit("Ein unerwarteter Fehler ist beim Hinzufügen aufgetreten!");
    }
    private function RenameCategorie()
    {
        $this->load->model("Kategorie_model");
        $this->AddCategorie();
        {
            $sqlID = $this->Kategorie_model->getKategorieID($this->input->post("KategorieName"));
            $sqlRemove = $this->Kategorie_model->RemoveConnection($this->input->post("kategories"),$_SESSION['userid']);
            $sqlChange = $this->Kategorie_model->ChangeTransactions($this->input->post("kategories"),$sqlID,$_SESSION['userid']);
        }
    }
    private function DeleteCategorie()
    {
        $this->load->model("Kategorie_model");
        $sqlResult = $this->Kategorie_model->CheckStandard($this->input->post("kategories"));
        if ($sqlResult >= 0)
        {
            if(0 == $sqlResult)
            {
              $sqlRemove = $this->Kategorie_model->RemoveConnection($this->input->post("kategories"),$_SESSION['userid']);
              $sqlChange = $this->Kategorie_model->ChangeTransactions($this->input->post("kategories"),1,$_SESSION['userid']);
            }
            else
                exit("Kategorie ist ein Standardwert!");
        }
        else
            exit("Ein unerwarteter Fehler ist beim Löschen aufgetreten!");
    }

}
?>