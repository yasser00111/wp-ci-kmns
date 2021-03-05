<?php
class Hitung_model extends CI_Model {
    
    public function get_data()
    {
        $rows = $this->db->get('tb_alternatif')->result();
        foreach($rows as $row){
            $data['alternatif'][$row->kode_alternatif] = $row;
        }        
        $rows = $this->db->get('tb_kriteria')->result();
        foreach($rows as $row){
            $data['kriteria'][$row->kode_kriteria] = $row;
        }
        $data['relasi'] = $this->db->query("SELECT * FROM tb_rel_alternatif ORDER BY kode_alternatif, kode_kriteria")->result();
        
        return $data;
    }
        
    public function cetak ()
    {        
        $query = $this->db->query("SELECT * FROM tb_alternatif a ORDER BY a.total DESC");
        return $query->result();
    }
    
    public function simpan_hasil( $rank = array(), $total = array() )
    {        
        foreach ($rank as $key => $value)
        {            
            $this->db->update(
                'tb_alternatif', 
                array ( 'total' => $total[$key], 'rank' => $value ), 
                array ( 'kode_alternatif' => $key)
            );    
        }
    }
}