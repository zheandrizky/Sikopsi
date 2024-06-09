<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pinjam extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        $this->load->model('Pinjam_model');
    }

    public function index()
    {
        $data['title'] = "List Pinjam";
        $data['pinjam'] = $this->Pinjam_model->get_all_pinjam();
        $this->load->view('admin/template/upper.php', $data);
        $this->load->view('admin/pinjam/list.php', $data);
        $this->load->view('admin/template/lower.php');

    }

    public function add()
    {
        $data['title'] = "Add Pinjam";

        // Generate kode pinjam baru
        $last_kode_pinjam = $this->Pinjam_model->get_last_kode_pinjam();
        $new_kode_pinjam = $this->generate_new_kode_pinjam($last_kode_pinjam);

        // Ambil inputan lain
        $data = array(
            'kode_pinjam' => $new_kode_pinjam,
            'nik' => $this->session->userdata('nik'),
            'jumlah_pinjam' => $this->input->post('jumlah'),
            'status_pengajuan_pinjam' => 'diproses',
        );
        $this->Pinjam_model->add_pinjam($data);
        redirect('pinjam');

    }



    private function generate_new_kode_pinjam($last_kode_pinjam)
    {
        $number = (int) substr($last_kode_pinjam, 3) + 1;
        return 'TAB' . str_pad($number, 3, '0', STR_PAD_LEFT);
    }

    public function update()
    {
        $data['title'] = "Update Saham";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $config['upload_path'] = './assets/uploads/pinjam/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 1024;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('bukti_pembayaran')) {
                $data['error'] = $this->upload->display_errors();
                log_message('error', 'Upload Error: ' . $data['error']);
                $this->load->view('admin/template/upper.php', $data);
                $this->load->view('admin/pinjam/add.php', $data);
                $this->load->view('admin/template/lower.php');
            } else {
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
                $unique_file_name = time() . '_' . $file_name;

                // Logging before renaming
                log_message('debug', 'Attempting to rename ' . './assets/uploads/pinjam/' . $file_name . ' to ' . './assets/uploads/pinjam/' . $unique_file_name);

                if (rename('./assets/uploads/pinjam/' . $file_name, './assets/uploads/pinjam/' . $unique_file_name)) {
                    // Logging successful rename
                    log_message('debug', 'Successfully renamed to ' . $unique_file_name);

                    // Generate kode pinjam baru
                    $last_kode_pinjam = $this->Saham_model->get_last_kode_pinjam();
                    $new_kode_pinjam = $this->generate_new_kode_pinjam($last_kode_pinjam);

                    // Mendapatkan tanggal hari ini
                    $today = date('Y-m-d');

                    // Menambahkan 5 bulan ke tanggal hari ini
                    $jatuh_tempo = date('Y-m-d', strtotime('+5 months', strtotime($today)));
                    // Ambil inputan lain
                    $data = array(
                        'kode_pinjam' => $this->input->post('kode_pinjam'),
                        'nik' => $this->session->userdata('nik'),
                        'jumlah' => $this->input->post('jumlah'),
                        'status_pengajuan_pinjam' => $this->input->post('status_pengajuan_pinjam'),
                        'keterangan_pengajuan_pinjam' => $this->input->post('keterangan_pengajuan_pinjam'),
                    );

                    if ($this->input->post('status_pengajuan_pinjam') !== 'ditolak') {
                        $data['tgl_pinjam'] = $today;
                        $data['bukti_peminjaman'] = $unique_file_name;
                        $data['jatuh_tempo'] = $jatuh_tempo;
                    }

                    $this->Saham_model->add_pinjam($data);
                    redirect('pinjam');

                } else {
                    $data['error'] = 'Failed to rename the uploaded file.';
                    log_message('error', 'Rename Error: ' . $data['error']);
                    $this->load->view('admin/template/upper.php', $data);
                    $this->load->view('admin/pinjam/add.php', $data);
                    $this->load->view('admin/template/lower.php');
                }
            }

        } else {
            $this->load->view('admin/template/upper.php', $data);
            $this->load->view('admin/pinjam/add.php', $data);
            $this->load->view('admin/template/lower.php');
        }
    }

}
