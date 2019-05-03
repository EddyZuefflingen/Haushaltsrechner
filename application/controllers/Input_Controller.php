<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_Controller extends CI_Controller 
{
    public function index()
    {
        $this->load->model("Input_model");
        session_start();
        $data = array(
            "kategories" => $this->Input_model->loadCategories()
            //Kategorien für die Kategorie Bearbeitung laden.
        ); 
        $this->load->helper('url');
        $this->load->view("input_view", $data); 
    }

    public function GetCategories()
    {
        $this->load->model("Input_model");
        $data = array(
            "kategories" => $this->Input_model->loadCategories()
            //Kategorien für die Kategorie Bearbeitung laden.
        ); 
        return $data;
    }

    public function ButtonSwitch()
	{
        $this->load->model("Input_model");
        session_start();
        $data = array(
            "kategories" => $this->Input_model->loadCategories()
            //Kategorien für die Kategorie Bearbeitung laden.
        ); 
        $this->load->helper('url');
        if ($this->input->post("save") !== null){
            $this->TransactionInput();
        }

        if ($this->input->post("show") !== null){
            $this->load->view("input_view", $data);
        }

        if ($this->input->post("KategorieDetails") !== null){
            $this->load->view("kategorie_view",$this->GetCategories());
        }

    }
    public function TransactionInput()
    {
        $this->load->helper('date');
        $this->load->model("Input_model");
        if($this->input->post("auswahl") == "ausgaben")
            $sqlResult = $this->Input_model->doNegativeTransaction($this->input->post("kategories"),$this->input->post("amount"),"-",mdate("%Y-%m-%d %H:%i:%s"));
        else
        $sqlResult = $this->Input_model->doPositiveTransaction($this->input->post("kategories"),$this->input->post("amount"),mdate("%Y-%m-%d %H:%i:%s"));
         //   $sqlResult = $this->Input_model->doPositiveTransaction($this->input->post("kategories"),$this->input->post("amount"),date(DATE_COOKIE, time()));
        if ($sqlResult >= 0)
        {
            if(0 == $sqlResult)
            {
                $this->load->model("Kategorie_model");
                $sqlRemove = $this->Kategorie_model->RemoveConnection($this->input->post("kategories"));
            }
            else
                exit("Kategorie ist ein Standardwert!");
        }
        else
            exit("Ein unerwarteter Fehler ist beim Löschen aufgetreten!");
    }

}
?>