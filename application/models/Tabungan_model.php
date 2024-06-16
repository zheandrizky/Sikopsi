<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabungan_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_tabungan()
    {
        $this->db->select('t.*, a.nama_anggota as nama');
        $this->db->from('tabungan t');
        $this->db->join('anggota a', 't.nik = a.nik', 'left');
        $this->db->order_by('t.kode_tabungan', 'DESC');

        if ($this->session->userdata('jabatan') == 'anggota') {
            $this->db->where('t.nik', $this->session->userdata('nik'));
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    public function cek_total_tabungan()
    {
        $this->db->select('SUM(t.jumlah_nabung) as total');
        $this->db->from('tabungan t');
        $this->db->where('t.status_pembayaran_tabungan', 'diterima');
        if ($this->session->userdata('jabatan') == 'anggota') {
            $this->db->where('t.nik', $this->session->userdata('nik'));
        }
        return $this->db->get()->row()->total;
    }

    public function get_last_kode_tabungan()
    {
        $this->db->select('kode_tabungan');
        $this->db->order_by('kode_tabungan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tabungan');

        if ($query->num_rows() > 0) {
            return $query->row()->kode_tabungan;
        } else {
            return 'TAB000'; // default kode tabungan jika tidak ada data
        }
    }

    public function add_tabungan($data)
    {
        return $this->db->insert('tabungan', $data);
    }

    public function update_tabungan($kode_tabungan, $data)
    {
        $this->db->where('kode_tabungan', $kode_tabungan);
        $this->db->update('tabungan', $data);
    }

    public function delete_tabungan($kode_tabungan)
    {
        $this->db->where('kode_tabungan', $kode_tabungan);
        return $this->db->delete('tabungan');
    }
}
