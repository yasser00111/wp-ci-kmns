<?php
class User_tampil extends CI_Controller
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
        $this->load->model('tpa_model');
        $this->load->model('hitung_model');
        $this->load->model('kriteria_model');
        $this->load->model('alternatif_model');
    }

    public function index()
    {
        $data['rows'] = $this->tpa_model->tampil($this->input->get('search'));
        $data['title'] = 'Daftar TPA';
        load_view_user('home_user', $data);
    }


    public function perhitungan()
    {
        $data['title'] = 'Perhitungan';
        $data['kriteria'] = $this->kriteria_model->tampil();
        $data['alternatif'] = $this->get_alternatif();
        if (!$_POST) {
            load_view_user('hitung', $data);
        } else {
            $data['bobot_kepentingan'] = $this->get_bobot_kepentingan();
            $data['matriks'] = $this->get_matriks();
            $data['vektor'] = $this->get_vektor();
            $data['rank'] = $this->get_rank($data['vektor']);
            load_view_user('hitung', $data);
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
    public function detail($id_tpa)
    {
        $this->load->model('Tpa_model');
        $data['title'] = 'Detail Tempat penitipan anak';
        $detail = $this->Tpa_model->detail($id_tpa);
        $data['detail'] = $detail;
        load_view_user('detail', $data);
    }
    public function dashboard()
    {
        $data['title'] = '';
        load_view_user('dashboard', $data);
    }
}
