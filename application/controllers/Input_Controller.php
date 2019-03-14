<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_Controller extends CI_Controller 
{
    public function index()
    {
        
        $this->load->view("input_view");       
    }

    public function ButtonSwitch()
	{
        if (!empty($_POST)) 
        {
            switch ($_POST)
            {
            case $_POST['A']:
                #do something;
            break;
            case $_POST['B']:
                #do something;
            break;
            case $_POST['C']:
                #do something;
            break;
            }
        }
    }
}