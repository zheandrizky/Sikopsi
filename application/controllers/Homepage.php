<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        // $this->check_login();
    }

    public function index()
    {

        $this->load->view('homepage/index.php');
    }


}
