<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_Controller extends CI_Controller 
{
    public function index()
    {
        $this->load->model("Input_model");
        session_start();
        $data=$this->GetInputControlValues();
        $this->load->helper('url');
        $this->load->view("input_view", $data); 
    }

    //public function load

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
        $this->load->model("Input_model");
        session_start();
        $this->load->helper('url');
        if ($this->input->post("save") !== null){
            $this->TransactionInput();
            $this->load->view("input_view",$this->GetInputControlValues());
        }

        if ($this->input->post("KategorieDetails") !== null){
            $this->load->view("kategorie_view",$this->GetInputControlValues());
        }

    }

    public function getTransactions()
    {
        $this->load->model("Input_model");
        $sqlResult = $this->Input_model->loadTransactions($_SESSION['userid']);
        echo $sqlResult;
    }

    public function TransactionInput()
    {
        $this->load->helper('date');
        $this->load->model("Input_model");
        if($this->input->post("auswahl") == "ausgaben")
            $sqlResult = $this->Input_model->doNegativeTransaction($this->input->post("kategories"),$this->input->post("amount"),"-",mdate("%Y-%m-%d %H:%i:%s"),$_SESSION['userid']);
        else
            $sqlResult = $this->Input_model->doPositiveTransaction($this->input->post("kategories"),$this->input->post("amount"),mdate("%Y-%m-%d %H:%i:%s"),$_SESSION['userid']);
    }

}
?>