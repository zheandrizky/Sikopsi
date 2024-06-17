<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengembalian extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        $this->load->model('Pengembalian_model');
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $config['upload_path'] = './assets/uploads/pengembalian/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 1024;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('bukti_pembayaran')) {
                $data['error'] = $this->upload->display_errors();
                log_message('error', 'Upload Error: ' . $data['error']);
            } else {
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
                $unique_file_name = time() . '_' . $file_name;

                // Logging before renaming
                log_message('debug', 'Attempting to rename ' . './assets/uploads/pengembalian/' . $file_name . ' to ' . './assets/uploads/pengembalian/' . $unique_file_name);

                if (rename('./assets/uploads/pengembalian/' . $file_name, './assets/uploads/pengembalian/' . $unique_file_name)) {
                    // Logging successful rename
                    log_message('debug', 'Successfully renamed to ' . $unique_file_name);

                    // Generate kode pengembalian baru
                    $last_kode_pengembalian = $this->Pengembalian_model->get_last_kode_pengembalian();
                    $new_kode_pengembalian = $this->generate_new_kode_pengembalian($last_kode_pengembalian);
                    $kode_pinjam = $this->input->post('kode_pinjam');

                    // Ambil inputan lain
                    $data = array(
                        'kode_pengembalian' => $new_kode_pengembalian,
                        'nik' => $this->session->userdata('nik'),
                        'kode_pinjam' => $kode_pinjam,
                        'tanggal_pengembalian' => date('Y-m-d'),
                        'jumlah_pengembalian' => $this->input->post('jumlah_pengembalian'),
                        'status_pembayaran_pengembalian' => 'diproses',
                        'keterangan_pembayaran_pengembalian' => 'Saat ini, pembayaran pengembalian anda sedang diproses untuk diverifikasi. Proses ini memastikan bahwa semua informasi dan dokumen terkait terverifikasi dengan benar',
                        'bukti_pengembalian' => $unique_file_name,
                    );

                    $this->Pengembalian_model->add_pengembalian($data);
                    redirect('pinjam/update/'. $kode_pinjam);
                } else {
                    $data['error'] = 'Failed to rename the uploaded file.';
                    log_message('error', 'Rename Error: ' . $data['error']);
                }
            }

            $this->Pengembalian_model->add_pengembalian($data);
            redirect('pinjam/update/' . $kode_pinjam);
        }
    }



    private function generate_new_kode_pengembalian($last_kode_pengembalian)
    {
        $number = (int) substr($last_kode_pengembalian, 3) + 1;
        return 'PGM' . str_pad($number, 3, '0', STR_PAD_LEFT);
    }

    public function update($kode_pengembalian)
    {
        $kode_pinjam = $this->input->post('kode_pinjam');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil inputan lain
            $data = array(
                'status_pembayaran_pengembalian' => $this->input->post('status_pembayaran_pengembalian'),
                'keterangan_pembayaran_pengembalian' => $this->input->post('keterangan_pembayaran_pengembalian'),
            );
        }

        $this->Pengembalian_model->update_pengembalian($kode_pengembalian, $data);
        redirect('pinjam/update/' . $kode_pinjam);
    }

}
