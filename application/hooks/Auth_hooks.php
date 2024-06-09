<?php
class AuthHook {
    public function checkAuth() {
        $CI =& get_instance();
        $CI->load->library('session');
        $CI->load->helper('url');
        
        // Daftar controller yang tidak memerlukan otentikasi
        $exceptions = array('auth');
        
        // Mendapatkan nama controller saat ini
        $current_controller = $CI->router->class;
        $current_method = $CI->router->method;
        
        // Jika pengguna belum login dan controller saat ini bukan dalam daftar exceptions, arahkan ke halaman login
        if (!in_array($current_controller, $exceptions) && !$CI->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        // Jika pengguna sudah login dan mengakses halaman login, arahkan ke dashboard
        if ($CI->session->userdata('logged_in') && $current_controller == 'auth' && $current_method == 'login') {
            redirect('dashboard');
        }
    }
}
