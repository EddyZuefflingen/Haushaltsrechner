<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_Controller extends CI_Controller
{

    public function index()
    {
        $this->load->helper('url');
        $this->load->view("login_view");
    }

    public function Login()
    {
        $this->load->helper('url');
        $this->load->helper("form");
        $this->load->view("login_view");
    }

    public function GetInputControlValues()
    {
        $this->load->model("Input_model");
        $data = array(
            "kategories" => $this->Input_model->loadCategories(),
            //Hier neue Array Werte für die Input view zum füllen der Controls einfügen !
        ); 
        return $data;
    }

    public function LoginRegisterSwitch()
    {
        if ($this->input->post("Login") !== null)
            $this->LoginValidation();
        else if ($this->input->post("Register") !== null)
            $this->load->view("register_view");
        else if ($this->input->post("Test") !== null)
            $this->load->view("input_view",$this->GetInputControlValues());
        // Workaround, wird später entfernt
    }

    private function LoginValidation()
    {
        $this->load->model("Login_model");
        $sqlResult = $this->Login_model->GetAccountData($this->input->post("username"));
        if (null !== $sqlResult and openssl_decrypt($sqlResult->password, "AES-128-CBC", "UltraSavePassword", 0, "0244545367373570") == $this->input->post("password"))
        {
            if (0 == $sqlResult->verified)
                exit("Account noch nicht freigeschaltet !");
            else
                $this->load->view("input_view",$this->GetInputControlValues());
        }
        else
            exit("Username oder Password fehlerhaft !");
    }
}
