<?php
class Tpa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('tpa_model');
    }

    public function index()
    {
        $data['rows'] = $this->tpa_model->tampil($this->input->get('search'));
        $data['title'] = 'TPA';

        load_view('tpa', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('id_tpa', 'Kode TPA', 'required|is_unique[tb_tpa.id_tpa]');
        $this->form_validation->set_rules('nama_tpa', 'Nama TPA', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        $data['title'] = 'Tambah TPA';

        if ($this->form_validation->run() === FALSE) {
            load_view('tpa_tambah', $data);
        } else {
            $fields = array(
                'id_tpa' => $this->input->post('id_tpa'),
                'nama_tpa' => $this->input->post('nama_tpa'),
                'alamat' => $this->input->post('alamat'),
                'keterangan' => $this->input->post('keterangan'),
                'keterangan' => $this->input->post('keterangan'),
                'biaya_daftar' => $this->input->post('biaya_daftar'),
                'spp' => $this->input->post('spp'),
                'fasilitas' => $this->input->post('fasilitas'),
                'kondisi' => $this->input->post('kondisi'),
                'rasio' => $this->input->post('rasio'),
                // 'detail' => $this->input->post('detail'),
            );
            $this->tpa_model->tambah($fields);
            $alter = array(
                'kode_alternatif' => $this->input->post('id_tpa'),
                'nama_alternatif' => $this->input->post('nama_tpa'),
            );
            $this->tpa_model->tambah_alternatif($alter);
            redirect('Tpa');
        }
    }

    public function ubah($ID = null)
    {
        $this->form_validation->set_rules('nama_tpa', 'Nama TPA', 'required');

        $data['title'] = 'Ubah TPA';

        if ($this->form_validation->run() === FALSE) {
            $data['row'] = $this->tpa_model->get_tpa($ID);
            load_view('tpa_ubah', $data);
        } else {
            $fields = array(
                'id_tpa' => $this->input->post('id_tpa'),
                'nama_tpa' => $this->input->post('nama_tpa'),
                'alamat' => $this->input->post('alamat'),
                'keterangan' => $this->input->post('keterangan'),
                'biaya_pdaftar' => $this->input->post('biaya_daftar'),
                'SPP' => $this->input->post('spp'),
                'fasilitas' => $this->input->post('fasilitas'),
                'kondisi' => $this->input->post('biaya_pendaftaran'),
                'rasio_pengasuh' => $this->input->post('rasio_pengasuh'),
                // 'detail' => $this->input->post('detail'),
            );
            $this->tpa_model->ubah($fields, $ID);
            redirect('tpa');
        }
    }

    public function hapus($ID = null)
    {
        $this->tpa_model->hapus($ID);
        redirect('tpa');
    }

    public function cetak($search = '')
    {
        $data['rows'] = $this->alternatif_model->tampil($search);
        load_view_cetak('alternatif_cetak', $data);
    }
    public function detail($id_tpa)
    {
        $this->load->model('Tpa_model');
        $data['title'] = 'Detail Tempat penitipan anak';
        $detail = $this->Tpa_model->detail($id_tpa);
        $data['detail'] = $detail;
        load_view('detail', $data);
    }
}
