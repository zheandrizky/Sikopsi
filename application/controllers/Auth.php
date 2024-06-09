<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('Auth_model');
    }

    public function login()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }
        // echo print_r($this->session->userdata('nik'));die;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nik = $this->input->post('nik');
            $password = $this->input->post('password');

            $user = $this->Auth_model->get_user($nik);
            // print_r(password_verify($password, $user['password']));die;
            if ($user && password_verify($password, $user['password'])) {
                // Login berhasil, atur session
                $userdata = array(
                    'nik' => $user['nik'],
                    'nama_anggota' => $user['nama_anggota'],
                    'jabatan' => $user['jabatan'],
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($userdata);

                // Arahkan ke halaman dashboard atau halaman lain yang diinginkan
                redirect('dashboard');
            } else {
                // Login gagal, tampilkan pesan error
                $data['error'] = 'Username atau password salah';
                $this->load->view('auth/login', $data);
            }
        } else {
            $this->load->view('auth/login');

        }

    }

    public function register($nik, $password)
    {
        // Hash the password using bcrypt
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user data into the database
        $data = array(
            'nik' => $nik,
            'password_hash' => $hashed_password
        );
        $this->db->insert('anggota', $data);
    }


    public function logout()
    {
        // Destroy the session to log the user out
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    public function success()
    {
        // This is a protected page, ensure the user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('index.html');
        }

        echo "Login successful! Welcome NIK " . $this->session->userdata('nik');
    }
}
