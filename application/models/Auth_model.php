<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_user($nik) {
        return $this->db->get_where('anggota', array('nik' => $nik))->row_array();
    }

}
?>
