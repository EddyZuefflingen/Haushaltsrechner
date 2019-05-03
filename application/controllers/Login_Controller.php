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
        {
            $this->load->helper('cookie');
            if ($this->input->post("KeepUsername") !== null)
                setcookie("KeepUsername",$this->input->post("Username"), time()+60*60*24*30,"/","localhost",false,false); //  time()+60*60*24*30 = 30 Tage
            else
                delete_cookie("KeepUsername");

            $this->LoginValidation();
        }
        else if ($this->input->post("Register") !== null)
        {
            $this->load->helper('url');
            $this->load->view("register_view");
        }
    }

    private function LoginValidation()
    {
        $this->load->model("Login_model");
        $sqlResult = $this->Login_model->GetAccountData($this->input->post("Username"));
        if (null !== $sqlResult and openssl_decrypt($sqlResult->password, "AES-128-CBC", "UltraSavePassword", 0, "0244545367373570") == $this->input->post("Password"))
        {
            if (0 == $sqlResult->verified)
                exit("Account noch nicht freigeschaltet !");
            else
                session_start();
                $_SESSION['userid'] = $sqlResult->recnum;
                $this->load->helper('url');
                $this->load->view("input_view",$this->GetInputControlValues());
        }
        else
        {
            echo '<script type="text/javascript"> window.alert("Username oder Password fehlerhaft!") </script>';

            $this->load->helper('url');
            $this->load->view("login_view");
        }
    }

    public function test() {
        echo "test";
    }
}
