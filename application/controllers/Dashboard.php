<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->check_login();
    }

    public function index()
    {
        // echo print_r($this->session->userdata('logged_in'));die;
        $data['title'] = "Dashboard";
        $data['user_count'] = $this->db->get('anggota')->num_rows(); 
        $this->load->view('admin/template/upper.php', $data);
        $this->load->view('admin/template/content.php', $data);
        $this->load->view('admin/template/lower.php');
    }

   
}
