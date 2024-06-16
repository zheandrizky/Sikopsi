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
        $data['title'] = "Dashboard";
        $data['user_count'] = $this->db->get('anggota')->num_rows();
        $data['saham_count'] = $this->db->get('saham')->num_rows();
        $data['tabungan_count'] = $this->db->get('tabungan')->num_rows();
        $data['pinjam_count'] = $this->db->get('pinjam')->num_rows();

        $this->db->select("SUM(jumlah_saham) as total, MONTH(tanggal_pembayaran_saham) as bulan");
        $this->db->order_by('MONTH(tanggal_pembayaran_saham)');
        $saham_bar_chart = $this->db->get_where('saham', [
            'YEAR(tanggal_pembayaran_saham)=' => date('Y'),
            'status_pembayaran_saham' => 'diterima'
        ])->result();

        $this->db->select("SUM(jumlah_nabung) as total, MONTH(tanggal_nabung) as bulan");
        $this->db->order_by('MONTH(tanggal_nabung)');
        $tabungan_bar_chart = $this->db->get_where('tabungan', [
            'YEAR(tanggal_nabung)=' => date('Y'),
            'status_pembayaran_tabungan' => 'diterima'
        ])->result();

        $this->db->select("SUM(jumlah_pinjam) as total, MONTH(tgl_pinjam) as bulan");
        $this->db->order_by('MONTH(tgl_pinjam)');
        $pinjam_bar_chart = $this->db->get_where('pinjam', [
            'YEAR(tgl_pinjam)=' => date('Y'),
            'status_pengajuan_pinjam' => 'diterima'
        ])->result();

        $this->db->select("SUM(jumlah_pengembalian) as total, MONTH(tanggal_pengembalian) as bulan");
        $this->db->order_by('MONTH(tanggal_pengembalian)');
        $pengembalian_bar_chart = $this->db->get_where('pengembalian', [
            'YEAR(tanggal_pengembalian)=' => date('Y'),
            'status_pembayaran_pengembalian' => 'diterima'
        ])->result();

        for ($i = 0; $i < 12; $i++) {
            $data['saham_bar_chart'][] = (!empty($saham_bar_chart[$i]->total)) ? $saham_bar_chart[$i]->total : 0;
            $data['tabungan_bar_chart'][] = (!empty($tabungan_bar_chart[$i]->total)) ? $tabungan_bar_chart[$i]->total : 0;
            $data['pinjam_bar_chart'][] = (!empty($pinjam_bar_chart[$i]->total)) ? $pinjam_bar_chart[$i]->total : 0;
            $data['pengembalian_bar_chart'][] = (!empty($pengembalian_bar_chart[$i]->total)) ? $pengembalian_bar_chart[$i]->total : 0;
        }

        $data['saham_bar_chart'] = json_encode($data['saham_bar_chart']);
        $data['tabungan_bar_chart'] = json_encode($data['tabungan_bar_chart']);
        $data['pinjam_bar_chart'] = json_encode($data['pinjam_bar_chart']);
        $data['pengembalian_bar_chart'] = json_encode($data['pengembalian_bar_chart']);

        $this->db->select("SUM(jumlah_saham) as total");
        $saham_bar_doughnut = $this->db->get_where('saham', [
            'status_pembayaran_saham' => 'diterima'
        ])->row()->total;

        $this->db->select("SUM(jumlah_nabung) as total");
        $tabungan_bar_doughnut = $this->db->get_where('tabungan', [
            'status_pembayaran_tabungan' => 'diterima'
        ])->row()->total;

        $this->db->select("SUM(jumlah_pinjam) as total");
        $pinjam_bar_doughnut = $this->db->get_where('pinjam', [
            'status_pengajuan_pinjam' => 'diterima'
        ])->row()->total;

        $this->db->select("SUM(jumlah_pengembalian) as total");
        $pengembalian_bar_doughnut = $this->db->get_where('pengembalian', [
            'status_pembayaran_pengembalian' => 'diterima'
        ])->row()->total;

        $data['doughnut_chart'] = json_encode([$saham_bar_doughnut, $tabungan_bar_doughnut, $pinjam_bar_doughnut, $pengembalian_bar_doughnut]);

        $this->load->view('admin/template/upper.php', $data);
        $this->load->view('admin/dashboard/content.php', $data);
        $this->load->view('admin/template/lower.php', $data);
    }


}
