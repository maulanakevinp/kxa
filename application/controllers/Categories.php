<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Products_model', 'products');
        $this->load->model('Menu_model', 'menu');
    }

    public function index()
    {
        $data['title'] = 'Kategori';
        $data['company'] = $this->menu->getCompany();

        $data['categories'] = $this->products->getAllCategories();

        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->db->like('name', $data['keyword']);
        $this->db->from('products');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 20;
        $config['base_url'] = 'http://localhost/kxa/categories/index';

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['product'] = $this->products->getProduct($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates_user/header', $data);
        $this->load->view('categories/catalog-page', $data);
        $this->load->view('templates_user/footer', $data);
    }

    public function livingroom()
    {
        $data['title'] = 'Ruang Tamu';
        $data['company'] = $this->menu->getCompany();

        $data['categories'] = $this->products->getAllCategories();

        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->db->like('name', $data['keyword']);
        // $this->db->or_like('email', $data['keyword']);
        $this->db->from('products');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 20;
        $config['base_url'] = 'http://localhost/kxa/categories/livingroom';

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['product'] = $this->products->getCategory(1, $config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates_user/header', $data);
        $this->load->view('categories/catalog-page', $data);
        $this->load->view('templates_user/footer', $data);
    }

    public function workspace()
    {
        $data['title'] = 'Ruang Kerja';
        $data['company'] = $this->menu->getCompany();

        $data['categories'] = $this->products->getAllCategories();

        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->db->like('name', $data['keyword']);
        // $this->db->or_like('email', $data['keyword']);
        $this->db->from('products');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 20;
        $config['base_url'] = 'http://localhost/kxa/categories/workspace';

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['product'] = $this->products->getCategory(2, $config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates_user/header', $data);
        $this->load->view('categories/catalog-page', $data);
        $this->load->view('templates_user/footer', $data);
    }

    public function bedroom()
    {
        $data['title'] = 'Ruang Tidur';
        $data['company'] = $this->menu->getCompany();

        $data['categories'] = $this->products->getAllCategories();

        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->db->like('name', $data['keyword']);
        // $this->db->or_like('email', $data['keyword']);
        $this->db->from('products');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 20;
        $config['base_url'] = 'http://localhost/kxa/categories/bedroom';

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['product'] = $this->products->getCategory(3, $config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates_user/header', $data);
        $this->load->view('categories/catalog-page', $data);
        $this->load->view('templates_user/footer', $data);
    }

    public function diningroom()
    {
        $data['title'] = 'Ruang Makan';
        $data['company'] = $this->menu->getCompany();

        $data['categories'] = $this->products->getAllCategories();

        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->db->like('name', $data['keyword']);
        // $this->db->or_like('email', $data['keyword']);
        $this->db->from('products');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 20;
        $config['base_url'] = 'http://localhost/kxa/categories/diningroom';

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['product'] = $this->products->getCategory(4, $config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates_user/header', $data);
        $this->load->view('categories/catalog-page', $data);
        $this->load->view('templates_user/footer', $data);
    }

    public function hoteldecoration()
    {
        $data['title'] = 'Dekorasi Hotel & Restouran';
        $data['company'] = $this->menu->getCompany();

        $data['categories'] = $this->products->getAllCategories();

        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->db->like('name', $data['keyword']);
        // $this->db->or_like('email', $data['keyword']);
        $this->db->from('products');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 20;
        $config['base_url'] = 'http://localhost/kxa/categories/hoteldecoration';

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['product'] = $this->products->getCategory(5, $config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates_user/header', $data);
        $this->load->view('categories/catalog-page', $data);
        $this->load->view('templates_user/footer', $data);
    }

    public function homedecoration()
    {
        $data['title'] = 'Dekorasi Rumah';
        $data['company'] = $this->menu->getCompany();

        $data['categories'] = $this->products->getAllCategories();

        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->db->like('name', $data['keyword']);
        // $this->db->or_like('email', $data['keyword']);
        $this->db->from('products');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 20;
        $config['base_url'] = 'http://localhost/kxa/categories/homedecoration';

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['product'] = $this->products->getCategory(6, $config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates_user/header', $data);
        $this->load->view('categories/catalog-page', $data);
        $this->load->view('templates_user/footer', $data);
    }

    public function detailProduct($id)
    {
        $data['product'] = $this->products->getProductById($id);
        $data['title'] = $data['product']['name'];
        $data['photo'] = $this->products->getPhotoByPhoto($data['product']['photo1']);
        $data['company'] = $this->menu->getCompany();

        $this->load->view('templates_user/header', $data);
        $this->load->view('categories/detail-product', $data);
        $this->load->view('templates_user/footer', $data);
    }
}
