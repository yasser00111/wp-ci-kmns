<?php
class User_model extends CI_Model
{

    public function login($user, $pass)
    {
        $query = $this->db->query("SELECT * FROM tb_admin where username='$user' AND password='$pass'");
        return $query->row();
    }

    public function cek_pass($level, $user, $pass)
    {
        return $this->db->get_where('tb_admin', array('username' => $user, 'password' => $pass))->result();
    }

    public function update($data, $user)
    {
        $this->db->update('tb_admin', $data, array('username' => $user));
    }

    public function detail_user($id_tpa = null)
    {
        $query = $this->db->get_where('tb_tpa', array(
            'id_tpa' => $id_tpa
        ))->row();
        return $query;
    }
}
