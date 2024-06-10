<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pinjam_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_pinjam()
    {
        $this->db->select('p.*, a.nama_anggota as nama');
        $this->db->from('pinjam p');
        $this->db->join('anggota a', 'p.nik = a.nik', 'left');
        if ($this->session->userdata('jabatan') == 'anggota') {
            $this->db->where('p.nik', $this->session->userdata('nik'));
        }
        $this->db->order_by('p.kode_pinjam', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_last_kode_pinjam()
    {
        $this->db->select('kode_pinjam');
        $this->db->order_by('kode_pinjam', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pinjam');

        if ($query->num_rows() > 0) {
            return $query->row()->kode_pinjam;
        } else {
            return 'TAB000'; // default kode pinjam jika tidak ada data
        }
    }

    public function add_pinjam($data)
    {
        return $this->db->insert('pinjam', $data);
    }

    public function update_pinjam($kode_pinjam, $data)
    {
        $this->db->where('kode_pinjam', $kode_pinjam);
        $this->db->update('pinjam', $data);
    }

    public function get_pinjaman_by_kode_pinjam($kode_pinjam) {
        $this->db->select('kode_pinjam, jumlah_pinjam, bunga_pinjaman, jatuh_tempo');
        $this->db->from('pinjam');
        $this->db->where('kode_pinjam', $kode_pinjam);
        $query = $this->db->get();
        return $query->row_array();
    }
}
