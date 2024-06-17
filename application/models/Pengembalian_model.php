<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengembalian_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_pengembalian()
    {
        $this->db->select('p.*, a.nama_anggota as nama');
        $this->db->from('pengembalian p');
        $this->db->join('anggota a', 'p.nik = a.nik', 'left');
        if ($this->session->userdata('jabatan') == 'anggota') {
            $this->db->where('p.nik', $this->session->userdata('nik'));
        }
        $this->db->order_by('p.kode_pengembalian', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_last_kode_pengembalian()
    {
        $this->db->select('kode_pengembalian');
        $this->db->order_by('kode_pengembalian', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pengembalian');

        if ($query->num_rows() > 0) {
            return $query->row()->kode_pengembalian;
        } else {
            return 'PGM000'; // default kode pengembalian jika tidak ada data
        }
    }

    public function cek_total_pengembalian()
    {
        $this->db->select('SUM(p.jumlah_pengembalian) as total');
        $this->db->from('pengembalian p');
        $this->db->join('anggota a', 'p.nik = a.nik', 'left');
        $this->db->where('p.status_pembayaran_pengembalian', 'diterima');
        if ($this->session->userdata('jabatan') == 'anggota') {
            $this->db->where('p.nik', $this->session->userdata('nik'));
        }
        return $this->db->get()->row()->total;
    }

    public function add_pengembalian($data)
    {
        return $this->db->insert('pengembalian', $data);
    }

    public function update_pengembalian($kode_pengembalian, $data)
    {
        $this->db->where('kode_pengembalian', $kode_pengembalian);
        $this->db->update('pengembalian', $data);
    }

    public function get_pengembalian_by_kode_pinjam($kode_pinjam)
    {
        $this->db->where('kode_pinjam', $kode_pinjam);
        $query = $this->db->get('pengembalian');
        return $query->result_array();
    }

    public function get_total_pengembalian_by_kode_pinjam($kode_pinjam)
    {
        $this->db->select_sum('jumlah_pengembalian');
        $this->db->where('kode_pinjam', $kode_pinjam);
        $this->db->where('status_pembayaran_pengembalian', 'diterima');
        $query = $this->db->get('pengembalian');
        // print_r($this->db->last_query());die;
        return $query->result_array();
    }

}
