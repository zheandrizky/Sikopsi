<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saham_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_saham()
    {
        $this->db->select('s.*, a.nama_anggota as nama');
        $this->db->from('saham s');
        $this->db->join('anggota a', 's.nik = a.nik', 'left');

        if ($this->session->userdata('jabatan') == 'anggota') {
            $this->db->where('s.nik', $this->session->userdata('nik'));
        }
        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_last_kode_saham()
    {
        $this->db->select('kode_saham');
        $this->db->order_by('kode_saham', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('saham');

        if ($query->num_rows() > 0) {
            return $query->row()->kode_saham;
        } else {
            return 'SHM000'; // default kode saham jika tidak ada data
        }
    }

    public function add_saham($data)
    {
        return $this->db->insert('saham', $data);
    }

    public function update_saham($kode_saham, $data)
    {
        $this->db->where('kode_saham', $kode_saham);
        $this->db->update('saham', $data);
    }
}
