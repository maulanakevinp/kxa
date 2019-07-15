<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Kategori - Karya Xylo Abadi';
        $this->load->view('templates_user/header', $data);
        $this->load->view('categories/catalog-page');
        $this->load->view('templates_user/footer');
    }
}
