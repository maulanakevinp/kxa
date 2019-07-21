<?php
defined('BASEPATH') or exit('No direct script access allowed');

class H extends CI_Controller
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
        $data['category'] = $this->products->getAllCategory();

        $this->load->view('templates_user/header', $data);
        $this->load->view('home/index', $data);
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

    public function type($category_id, $type_id)
    {
        $data['types'] = $this->products->getType($category_id);
        $data['type'] = $this->products->getTypeById($type_id);
        $data['title'] = $data['type']['type'];
        $data['company'] = $this->menu->getCompany();
        $data['categories'] = $this->products->getAllCategory();
        $data['category'] = $this->products->getCategoryById($category_id);

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 20;
        $config['base_url'] = 'http://localhost/kxa/h/type/' . $category_id . '/' . $type_id;

        $this->pagination->initialize($config);
        if ($this->uri->segment(5) != null) {
            $data['start'] = $this->uri->segment(5);
        } else {
            $data['start'] = 0;
        }
        $data['product'] = $this->products->getProductByType($type_id, $config['per_page'], $data['start']);

        $this->load->view('templates_user/header', $data);
        $this->load->view('home/category', $data);
        $this->load->view('templates_user/footer', $data);
    }
    public function category($id)
    {
        $data['category'] = $this->products->getCategoryById($id);
        $data['title'] = $data['category']['category'];
        $data['company'] = $this->menu->getCompany();
        $data['categories'] = $this->products->getAllCategory();
        $data['types'] = $this->products->getType($id);

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 15;
        $config['base_url'] = 'http://localhost/kxa/h/category/' . $id;

        $this->pagination->initialize($config);

        if ($this->uri->segment(4) != null) {
            $data['start'] = $this->uri->segment(4);
        } else {
            $data['start'] = 0;
        }
        $data['product'] = $this->products->getProductByCategory($id, $config['per_page'], $data['start']);

        $this->load->view('templates_user/header', $data);
        $this->load->view('home/category', $data);
        $this->load->view('templates_user/footer', $data);
    }

    public function product()
    {
        $data['title'] = 'Semua Produk';
        $data['company'] = $this->menu->getCompany();
        $data['categories'] = $this->products->getAllCategory();

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 15;
        $config['base_url'] = 'http://localhost/kxa/h/product';

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);

        $data['product'] = $this->products->getProduct($config['per_page'], $data['start']);

        $this->load->view('templates_user/header', $data);
        $this->load->view('home/category', $data);
        $this->load->view('templates_user/footer', $data);
    }

    public function search()
    {
        $data['title'] = 'Cari Produk';
        $data['company'] = $this->menu->getCompany();
        $data['categories'] = $this->products->getAllCategory();

        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->db->like('name', $data['keyword']);
        $this->db->from('product');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 15;
        $config['base_url'] = 'http://localhost/kxa/category/search';

        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['product'] = $this->products->getProduct($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates_user/header', $data);
        $this->load->view('home/category', $data);
        $this->load->view('templates_user/footer', $data);
    }

    public function detailProduct($id)
    {
        $data['product'] = $this->products->getProductById($id);
        $data['title'] = $data['product']['name'];
        $data['photo'] = $this->products->getPhotoByPhoto($data['product']['photo1']);
        $data['company'] = $this->menu->getCompany();

        $this->load->view('templates_user/header', $data);
        $this->load->view('home/detail-product', $data);
        $this->load->view('templates_user/footer', $data);
    }
}
