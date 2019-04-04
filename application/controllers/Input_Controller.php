<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_Controller extends CI_Controller 
{
    public function index()
    {
        $this->load->view("input_view"); 
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

        if ($this->input->post("save") !== null){
            $this->TransactionInput();
        }

        if ($this->input->post("show") !== null){
            $this->load->view("input_view");
        }

        if ($this->input->post("KategorieDetails") !== null){
        
            $this->load->view("kategorie_view",$this->GetCategories());
        }

    }
    public function TransactionInput()
    {

    }

}
?>