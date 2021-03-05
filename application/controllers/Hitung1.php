<?php
class Hitung extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->model('hitung_model');      
    }
    
    public function index()
    {        
        $data['title'] = 'Perhitungan';
        $data['rows'] = $this->hitung_model->get_data();        
        $this->form_validation->set_rules( 'bobot[]', 'Kriteria', 'required|is_natural' );
                    
        $dt['rows'] = $this->hitung_model->get_data();
        
        $this->load->view('header', $data);                      
        
        $data['kriteria'] =  $dt['rows']['kriteria'];
        $data['alternatif'] =  $dt['rows']['alternatif'];
        
        $data['analisa'] = $this->get_analisa($dt['rows']['relasi']);                
        $data['normal'] = $this->get_normal($data['analisa']);
        $data['terbobot'] = $this->get_terbobot($data['normal'], $data['kriteria']);
        $data['solusi'] = $this->get_solusi_ideal($data['terbobot'], $data['kriteria']);
        $data['jarak'] = $this->get_jarak_solusi($data['terbobot'], $data['solusi']);
        $data['pref'] = $this->get_preferensi($data['jarak']);
        $data['rank'] = $this->get_rank($data['pref']);
        
        //print_R($data['terbobot']);
        
        $this->hitung_model->simpan_hasil( $data['rank'], $data['pref'] );
        
        $this->load->view('hitung', $data);
        $this->load->view('footer');
    
    }
    
    public function cetak( $ID = NULL)
    {
        $data['title'] = 'Perhitungan';
        $data['rows'] = $this->hitung_model->get_data();        
        $this->form_validation->set_rules( 'bobot[]', 'Kriteria', 'required|is_natural' );
                    
        $dt['rows'] = $this->hitung_model->get_data();                                   
        
        $data['kriteria'] =  $dt['rows']['kriteria'];
        $data['alternatif'] =  $dt['rows']['alternatif'];
        $data['analisa'] = $this->get_analisa($dt['rows']['relasi']);                
        $data['normal'] = $this->get_normal($data['analisa']);
        $data['terbobot'] = $this->get_terbobot($data['normal'], $data['kriteria']);
        $data['solusi'] = $this->get_solusi_ideal($data['terbobot'], $data['kriteria']);
        $data['jarak'] = $this->get_jarak_solusi($data['terbobot'], $data['solusi']);
        $data['pref'] = $this->get_preferensi($data['jarak']);
        $data['rank'] = $this->get_rank($data['pref']);
        
        load_view_cetak('hitung_cetak', $data);
    }
    
    function get_analisa($relasi  = array()){
        $arr = array();
        foreach($relasi as $row){
            $arr[$row->kode_alternatif][$row->kode_kriteria] = $row->nilai;
        }
        return $arr;
    }
    
    function get_normal($array){
        
    }
    
    function get_terbobot($array, $kriteria){
        
    }
    
    function get_solusi_ideal($array, $kriteria){
        
    }
    
    function get_jarak_solusi($array, $ideal){    
        
    }
    
    function get_preferensi($array){        
        
    }

    private function get_rank($vektor_v = array()){
        
    }
}
