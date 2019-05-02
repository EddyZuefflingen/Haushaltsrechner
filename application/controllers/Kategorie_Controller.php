<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategorie_Controller extends CI_Controller 
{
    public function index()
    {
        $this->load->view("kategorie_view"); 
    }

    public function ButtonSwitch()
	{
        session_start();
        if ($this->input->post("add") !== null){
            $this->AddCategorie();
        }

        if ($this->input->post("rename") !== null){
          $this->RenameCategorie();
        }

        if ($this->input->post("delete") !== null){
        
            $this->DeleteCategorie();
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
                exit("Kategorie erfolgreich hinzugefügt.");
            }
            else
            {
                $sqlID = $this->Kategorie_model->getKategorieID($this->input->post("KategorieName"));
                $sqlCatConnection = $this->Kategorie_model->CheckConnection($sqlID,$_SESSION['userid']);
                if(0 == $sqlCatConnection)
                {
                    $sqlAdd = $this->Kategorie_model->AddConnection($sqlID,$_SESSION['userid']);
                    exit("Kategorie erfolgreich hinzugefügt.");
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
        {
            /*$this->load->model("Kategorie_model");
            $sqlResult = $this->Kategorie_model->CheckAvailability($this->input->post("KategorieName"));
            if (null !== $sqlResult)
            {
                if(0 == $sqlResult)
                    $sqlRemove = $this->Kategorie_model->RemoveConnection($this->input_post("kategories"));
                else
                    exit("Kategorie ist ein Standardwert!");
            }
            else */
                exit("Will be Implemented Later");
        }
    }
    private function DeleteCategorie()
    {
        $this->load->model("Kategorie_model");
        $sqlResult = $this->Kategorie_model->CheckStandard($this->input->post("kategories"));
        if ($sqlResult >= 0)
        {
            if(0 == $sqlResult)
              $sqlRemove = $this->Kategorie_model->RemoveConnection($this->input->post("kategories"),$_SESSION['userid']);
            else
                exit("Kategorie ist ein Standardwert!");
        }
        else
            exit("Ein unerwarteter Fehler ist beim Löschen aufgetreten!");
    }

}
?>