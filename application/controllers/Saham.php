<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saham extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        $this->load->model('Saham_model');
    }

    public function index()
    {
        $data['title'] = "List Saham";
        $data['saham'] = $this->Saham_model->get_all_saham();
        $data['total_saham'] = $this->Saham_model->cek_total_saham();
        $this->load->view('admin/template/upper.php', $data);
        $this->load->view('admin/saham/list.php', $data);
        $this->load->view('admin/template/lower.php');

    }

    public function add()
    {
        $data['title'] = "Add Saham";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $config['upload_path'] = './assets/uploads/saham/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 1024;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('bukti_pembayaran')) {
                $data['error'] = $this->upload->display_errors();
                log_message('error', 'Upload Error: ' . $data['error']);
                $this->load->view('admin/template/upper.php', $data);
                $this->load->view('admin/saham/add.php', $data);
                $this->load->view('admin/template/lower.php');
            } else {
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
                $unique_file_name = time() . '_' . $file_name;

                // Logging before renaming
                log_message('debug', 'Attempting to rename ' . './assets/uploads/saham/' . $file_name . ' to ' . './assets/uploads/saham/' . $unique_file_name);

                if (rename('./assets/uploads/saham/' . $file_name, './assets/uploads/saham/' . $unique_file_name)) {
                    // Logging successful rename
                    log_message('debug', 'Successfully renamed to ' . $unique_file_name);

                    // Generate kode saham baru
                    $last_kode_saham = $this->Saham_model->get_last_kode_saham();
                    $new_kode_saham = $this->generate_new_kode_saham($last_kode_saham);

                    // Ambil inputan lain

                    $data = array(
                        'kode_saham' => $new_kode_saham,
                        'nik' => $this->session->userdata('nik'),
                        'tanggal_pembayaran_saham' => date('Y-m-d'),
                        'jumlah_saham' => $this->input->post('jumlah_saham'),
                        'bukti_pembayaran_saham' => $unique_file_name,
                        'status_pembayaran_saham' => 'diproses',
                        'keterangan_pembayaran_saham' => 'Saat ini, pembayaran saham Anda sedang diproses untuk diverifikasi. Proses ini memastikan bahwa semua informasi dan dokumen terkait terverifikasi dengan benar',
                    );

                    $this->Saham_model->add_saham($data);
                    redirect('saham');
                } else {
                    $data['error'] = 'Failed to rename the uploaded file.';
                    log_message('error', 'Rename Error: ' . $data['error']);
                    $this->load->view('admin/template/upper.php', $data);
                    $this->load->view('admin/saham/add.php', $data);
                    $this->load->view('admin/template/lower.php');
                }
            }

        } else {
            $this->load->view('admin/template/upper.php', $data);
            $this->load->view('admin/saham/add.php', $data);
            $this->load->view('admin/template/lower.php');
        }
    }



    private function generate_new_kode_saham($last_kode_saham)
    {
        $number = (int) substr($last_kode_saham, 3) + 1;
        return 'SHM' . str_pad($number, 3, '0', STR_PAD_LEFT);
    }

    public function update()
    {
        $data['title'] = "Detail Saham";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kode_saham = $this->input->post('kode_saham');
            $data = array(
                'status_pembayaran_saham' => $this->input->post('status_pembayaran_saham'),
                'keterangan_pembayaran_saham' => $this->input->post('keterangan_pembayaran_saham')
            );
            $this->Saham_model->update_saham($kode_saham, $data);
            redirect('saham');

        }
    }

    public function delete($kode_saham)
    {
        if ($this->Saham_model->delete_saham($kode_saham)) {
            $this->session->set_flashdata('message', 'Saham berhasil dihapus.');
            $this->session->set_flashdata('message_type', 'success');
        } else {
            $this->session->set_flashdata('message', 'Gagal menghapus saham.');
            $this->session->set_flashdata('message_type', 'error');
        }

        redirect('saham');
    }


}
