<?php
class User_detail extends CI_Controller
{
    public function User_detail($id_tpa)
    {
        $this->load->model('User_model');
        $data['title'] = 'Detail Tempat penitipan anak';
        $user_detail = $this->User_model->User_detail($id_tpa);
        $data['user_detail'] = $user_detail;
        load_view('detail_user', $data);
    }
}
