<?php
class User_detail extends CI_Model
{
    public function detail_user($id_tpa = null)
    {
        $query = $this->db->get_where('tb_tpa', array(
            'id_tpa' => $id_tpa
        ))->row();
        return $query;
    }
}
