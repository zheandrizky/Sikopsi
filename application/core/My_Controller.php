<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_Controller extends CI_Controller {

    protected function check_login() {
        // Jika pengguna belum login, arahkan ke halaman login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }
}
