<?php
class Crips extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('crips_model');   
        $this->load->model('kriteria_model');           
    }

    public function index()
    {      
        $data['rows'] = $this->crips_model->tampil($this->input->get('search'));
        $data['title'] = 'Crips';

        load_view('crips', $data);
    }
    
    public function tambah() 
    {            
        $this->form_validation->set_rules( 'kode_kriteria', 'Kriteria', 'required' );
        $this->form_validation->set_rules( 'nama_crips', 'Nama Crips', 'required' );
        $this->form_validation->set_rules( 'nilai', 'Nilai', 'required|is_natural_no_zero' );
        
        $data['title'] = 'Tambah Crips';
        
        if ($this->form_validation->run() === FALSE)
        {
            load_view('crips_tambah', $data);     
        }
        else
        {
            $fields = array(
                'kode_kriteria' => $this->input->post('kode_kriteria'),
                'nama_crips' => $this->input->post('nama_crips'),
                'nilai' => $this->input->post('nilai'),
            );
            $this->crips_model->tambah($fields);
            redirect('crips');
        }                        
    }
            
    public function ubah( $ID = null )
    {                     
        $this->form_validation->set_rules( 'kode_kriteria', 'Kriteria', 'required' );
        $this->form_validation->set_rules( 'nama_crips', 'Nama Crips', 'required' );
        $this->form_validation->set_rules( 'nilai', 'Nilai', 'required|is_natural_no_zero' );
        
        $data['title'] = 'Ubah Crips';
        
        if ($this->form_validation->run() === FALSE)
        {
            $data['row'] = $this->crips_model->get_crips($ID);
            load_view('crips_ubah', $data);      
        }
        else
        {
            $fields = array(
                'kode_kriteria' => $this->input->post('kode_kriteria'),
                'nama_crips' => $this->input->post('nama_crips'),
                'nilai' => $this->input->post('nilai'),
            );
            $this->crips_model->ubah($fields, $ID);
            redirect('crips');
        }            
    }
    
    public function hapus( $ID = null )
    {
        $this->crips_model->hapus($ID);
        redirect('crips');
    }
    
    public function cetak( $search ='' )
    {
        $data['rows'] = $this->crips_model->tampil($search);
        load_view_cetak('crips_cetak', $data);
    }
}