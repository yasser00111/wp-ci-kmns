<?php
class Hitung extends CI_Controller
{


    protected $alternatif = array();
    protected $kriteria = array();
    protected $matriks = array();
    protected $vektor = array();
    protected $hasil = array();
    protected $total = array();
    protected $rank = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model('hitung_model');
        $this->load->model('kriteria_model');
        $this->load->model('alternatif_model');
    }

    public function index()
    {
        $data['title'] = 'Perhitungan';
        $data['kriteria'] = $this->kriteria_model->tampil();
        $data['alternatif'] = $this->get_alternatif();
        if (!$_POST) {
            load_view('hitung', $data);
        } else {
            $data['bobot_kepentingan'] = $this->get_bobot_kepentingan();
            $data['matriks'] = $this->get_matriks();
            $data['vektor'] = $this->get_vektor();
            $data['rank'] = $this->get_rank($data['vektor']);
            load_view('hitung', $data);
        }
    }

    public function get_kriteria()
    {
        $rows = $this->kriteria_model->tampil();
        foreach ($rows as $row) {
            $this->kriteria[$row->kode_kriteria] = $row;
        }
        return $this->kriteria;
    }

    public function get_alternatif()
    {
        $rows = $this->alternatif_model->tampil();
        foreach ($rows as $row) {
            $this->alternatif[$row->kode_alternatif] = $row;
        }
        return $this->alternatif;
    }

    function get_bobot_kepentingan()
    {
        $data = array();
        $kriteria = $this->get_kriteria();
        $total = 0;
        foreach ($kriteria as $key => $value) {
            $total += $this->input->post($key);
        }
        foreach ($kriteria as $key => $value) {
            $data['kepentingan'][$key] = $this->input->post($key);
            $data['bobot'][$key] = $this->input->post($key) / $total;
            if ($value->atribut == 'Benefit') {
                $data['pangkat'][$key] = $this->input->post($key) / $total;
            } else {
                $data['pangkat'][$key] = (-1 * $this->input->post($key) / $total);
            }
        }
        return $data;
    }

    public function get_matriks($relasi = array())
    {
        $rows = $this->hitung_model->get_relasi();
        foreach ($rows as $row) {
            $this->matriks[$row->kode_alternatif][$row->kode_kriteria] = $row->nilai;
        }
        return $this->matriks;
    }

    public function get_vektor()
    {
        $rows = $this->get_matriks();
        $bobot = $this->get_bobot_kepentingan();
        $data = array();
        foreach ($rows as $key => $value) {
            $nilai_total = 1;
            foreach ($value as $k => $v) {
                $nilai_total = $nilai_total * pow($v, $bobot['pangkat'][$k]);
            }
            $data[$key] = $nilai_total;
        }
        foreach ($data as $key => $value) {
            $this->vektor[$key]['s'] = $value;
            $this->vektor[$key]['v'] = $value / array_sum($data);
        }

        return $this->vektor;
    }
    private function get_rank($vektor_v = array())
    {
        $data = $vektor_v;
        $newdata = array();
        foreach ($data as $key => $value) {
            $newdata[$key] = $value['v'];
        }
        arsort($newdata);
        $no = 1;
        $new = array();
        foreach ($newdata as $key => $value) {
            $new[$key] = $no++;
        }
        return $new;
    }

    // public function get_crips()
    // {
    //     $rows = $this->crips_model->tampil();
    //     foreach ($rows as $row) {
    //         $this->crips[$row->kode_crips] = $row;
    //     } 
    //     return $this->crips;
    // }

    // public function get_matriks($relasi = array())
    // {
    //     $rows = $this->hitung_model->get_relasi();        
    //     foreach ($rows as $row) {
    //         $this->matriks[$row->kode_alternatif][$row->kode_kriteria] = $row->kode_crips;
    //     } 
    //     return $this->matriks;
    // }

    // function get_normal($array)
    // {
    //     $data = array();
    //     $kuadrat = array();

    //     foreach($array as $key => $value){     
    //         foreach($value as $k => $v){
    //             if(!isset($kuadrat[$k]))
    //                 $kuadrat[$k] = 0;
    //             $kuadrat[$k]+= ($v * $v);           
    //         }                
    //     }    

    //     foreach($array as $key => $value){                
    //         foreach($value as $k => $v){
    //             $data[$key][$k] = $v / sqrt($kuadrat[$k]);
    //         }
    //     }
    //     return $data;
    // }

    // function get_terbobot($array, $kriteria){
    //     $data = array();

    //     foreach($array as $key => $value){                
    //         foreach($value as $k => $v){
    //             $data[$key][$k] = $v * $kriteria[$k]->bobot;
    //         }
    //     }    

    //     return $data;
    // }

    // function get_solusi_ideal($array, $kriteria){
    //     $data = array();

    //     $temp = array();

    //     foreach($array as $key => $value){                
    //         foreach($value as $k => $v){
    //             $temp[$k][] = $v;
    //         }
    //     }    

    //     foreach($temp as $key => $value) {
    //         $max = max ($value);
    //         $min = min ($value);
    //         if($kriteria[$key]->atribut=='benefit')
    //         {
    //             $data['positif'][$key] = $max;
    //             $data['negatif'][$key] = $min;
    //         }            
    //         else
    //         {
    //             $data['positif'][$key] = $min;
    //             $data['negatif'][$key] = $max;            
    //         }
    //     }

    //     return $data;
    // }

    // function get_jarak_solusi($array, $ideal){    
    //     $temp = array();

    //     foreach($array as $key => $value){       
    //         $temp[$key]['positif'] = 0;
    //         $temp[$key]['negatif'] = 0;
    //         foreach($value as $k => $v){
    //             $temp[$key]['positif']+= ($v - $ideal['positif'][$k]) * ($v - $ideal['positif'][$k]);
    //             $temp[$key]['negatif']+= ($v - $ideal['negatif'][$k]) * ($v - $ideal['negatif'][$k]);
    //         }
    //         $temp[$key]['positif'] = sqrt($temp[$key]['positif']);
    //         $temp[$key]['negatif'] = sqrt($temp[$key]['negatif']);
    //     }    

    //     return $temp;
    // }

    // function get_preferensi($array){        
    //     $temp = array();

    //     foreach($array as $key => $value){                
    //         $temp[$key] = $value['negatif'] / ($value['positif'] + $value['negatif']);
    //     }                
    //     return $temp;
    // }

    // function get_hasil()
    // {
    //     foreach($this->normal as $key => $val)
    //     {
    //         foreach($val as $k => $v)
    //         {
    //             $this->hasil[$key][$k] = $v * $this->kriteria[$k]->bobot;
    //         }
    //     }
    //     return $this->hasil;
    // }

    // function get_total()
    // {
    //     foreach($this->hasil as $key => $val)
    //     {
    //         $this->total[$key] = 0;
    //         foreach($val as $k => $v)
    //         {
    //             $this->total[$key]+=$v;
    //         }
    //     }
    //     return $this->total;
    // }

    // private function get_rank($vektor_v = array()){
    //     $data = $vektor_v;
    //     arsort($data);
    //     $no=1;
    //     $new = array();
    //     foreach($data as $key => $value){
    //         $new[$key] = $no++;
    //     }
    //     return $new;
    // }

    // public function cetak( $ID = NULL)
    // {
    //     $data['kriteria'] = $this->get_kriteria();
    //     $data['alternatif'] = $this->get_alternatif();
    //     $data['crips'] = $this->get_crips();
    //     $data['matriks'] = $this->get_matriks();
    //     $data['normal'] = $this->get_normal();
    //     $data['hasil'] = $this->get_hasil();
    //     $data['total'] = $this->get_total();
    //     $data['rank'] = $this->get_rank();

    //     load_view_cetak('hitung_cetak', $data);  
    // }
}
