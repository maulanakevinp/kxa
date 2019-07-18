<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Products_model', 'products');
        $this->load->model('Menu_model', 'menu');
    }
    public function index()
    {
        $data['title'] = 'Xylo Official Mebel';
        $data['photo'] = $this->products->getHomePicture();
        $data['company'] = $this->menu->getCompany();

        $this->load->view('templates_user/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates_user/footer', $data);
    }

    public function contactUs()
    {
        $data['title'] = 'Hubungi kami - Karya Xylo Abadi';
        $data['company'] = $this->menu->getCompany();
        $this->load->view('templates_user/header', $data);
        $this->load->view('home/contact-us');
        $this->load->view('templates_user/footer', $data);
    }

    public function about()
    {
        $data['title'] = 'Tentang kami - Karya Xylo Abadi';
        $data['company'] = $this->menu->getCompany();
        $this->load->view('templates_user/header', $data);
        $this->load->view('home/about');
        $this->load->view('templates_user/footer', $data);
    }

    public function client()
    {
        $data['title'] = 'Client - Karya Xylo Abadi';
        $data['company'] = $this->menu->getCompany();
        $this->load->view('templates_user/header', $data);
        $this->load->view('home/client');
        $this->load->view('templates_user/footer', $data);
    }
}
