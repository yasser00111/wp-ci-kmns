<?php
class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Home';

        $this->load->view('header', $data);
        $this->load->view('home');
        $this->load->view('footer');
    }
}
