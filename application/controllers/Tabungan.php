<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabungan extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        $this->load->model('Tabungan_model');
    }

    public function index()
    {
        $data['title'] = "List Tabungan";
        $data['total_tabungan'] = $this->Tabungan_model->cek_total_tabungan();
        // echo print_r($data); die;
        $data['tabungan'] = $this->Tabungan_model->get_all_tabungan();
        $this->load->view('admin/template/upper.php', $data);
        $this->load->view('admin/tabungan/list.php', $data);
        $this->load->view('admin/template/lower.php');

    }

    public function add()
    {
        $data['title'] = "Add Tabungan";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $config['upload_path'] = './assets/uploads/tabungan/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 1024;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('bukti_pembayaran')) {
                $data['error'] = $this->upload->display_errors();
                log_message('error', 'Upload Error: ' . $data['error']);
                $this->load->view('admin/template/upper.php', $data);
                $this->load->view('admin/tabungan/add.php', $data);
                $this->load->view('admin/template/lower.php');
            } else {
      
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
                $unique_file_name = time() . '_' . $file_name;

                // Logging before renaming
                log_message('debug', 'Attempting to rename ' . './assets/uploads/tabungan/' . $file_name . ' to ' . './assets/uploads/tabungan/' . $unique_file_name);

                if (rename('./assets/uploads/tabungan/' . $file_name, './assets/uploads/tabungan/' . $unique_file_name)) {
                    // Logging successful rename
                    log_message('debug', 'Successfully renamed to ' . $unique_file_name);

                    // Generate kode tabungan baru
                    $last_kode_tabungan = $this->Tabungan_model->get_last_kode_tabungan();
                    $new_kode_tabungan = $this->generate_new_kode_tabungan($last_kode_tabungan);

                    // Ambil inputan lain
                    $data = array(
                        'kode_tabungan' => $new_kode_tabungan,
                        'nik' => $this->session->userdata('nik'),
                        'tanggal_nabung' => date('Y-m-d'),
                        'jumlah_nabung' => $this->input->post('jumlah'),
                        'bukti_pembayaran_tabungan' => $unique_file_name,
                        'status_pembayaran_tabungan' => 'diproses',
                        'keterangan_pembayaran_tabungan' => 'Saat ini, pembayaran tabungan Anda sedang diproses untuk diverifikasi. Proses ini memastikan bahwa semua informasi dan dokumen terkait terverifikasi dengan benar',
                    );
                    $this->Tabungan_model->add_tabungan($data);
                    redirect('tabungan');
                } else {
                    $data['error'] = 'Failed to rename the uploaded file.';
                    log_message('error', 'Rename Error: ' . $data['error']);
                    $this->load->view('admin/template/upper.php', $data);
                    $this->load->view('admin/tabungan/add.php', $data);
                    $this->load->view('admin/template/lower.php');
                }
            }

        } else {
            $this->load->view('admin/template/upper.php', $data);
            $this->load->view('admin/tabungan/add.php', $data);
            $this->load->view('admin/template/lower.php');
        }
    }



    private function generate_new_kode_tabungan($last_kode_tabungan)
    {
        $number = (int) substr($last_kode_tabungan, 3) + 1;
        return 'TAB' . str_pad($number, 3, '0', STR_PAD_LEFT);
    }

    public function update()
    {
        $data['title'] = "Detail Tabungan";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kode_tabungan = $this->input->post('kode_tabungan');
            $data = array(
                'status_pembayaran_tabungan' => $this->input->post('status_pembayaran_tabungan'),
                'keterangan_pembayaran_tabungan' => $this->input->post('keterangan_pembayaran_tabungan')
            );
            $this->Tabungan_model->update_tabungan($kode_tabungan, $data);
            redirect('tabungan');

        }
    }

}
