<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Home - Karya Xylo Abadi';
        $this->load->view('templates_user/header', $data);
        $this->load->view('home/index');
        $this->load->view('templates_user/footer');
    }

    public function contactUs()
    {
        $data['title'] = 'Hubungi kami - Karya Xylo Abadi';
        $this->load->view('templates_user/header', $data);
        $this->load->view('home/contact-us');
        $this->load->view('templates_user/footer');
    }

    public function about()
    {
        $data['title'] = 'Tentang kami - Karya Xylo Abadi';
        $this->load->view('templates_user/header', $data);
        $this->load->view('home/about');
        $this->load->view('templates_user/footer');
    }

    public function client()
    {
        $data['title'] = 'Client - Karya Xylo Abadi';
        $this->load->view('templates_user/header', $data);
        $this->load->view('home/client');
        $this->load->view('templates_user/footer');
    }
}
