<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Menu_model', 'menu');
        $this->load->model('Products_model', 'products');
        $this->load->model('User_model', 'user');
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->user->getUserByEmail();
        $data['menu'] = $this->menu->getAllMenu();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->menu->insertMenu();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added</div>');
            redirect('menu');
        }
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->user->getUserByEmail();
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->menu->getAllMenu();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->menu->insertSubMenu();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Submenu added</div>');
            redirect('menu/submenu');
        }
    }

    public function product()
    {
        $data['title'] = 'Product';
        $data['user'] = $this->user->getUserByEmail();
        $data['menu'] = $this->menu->getAllMenu();
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
        $config['base_url'] = 'http://localhost/kxa/menu/product';

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['product'] = $this->products->getProduct($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/product', $data);
        $this->load->view('templates/footer');
    }

    public function addProduct()
    {
        $data['title'] = 'Add New Product';
        $data['user'] = $this->user->getUserByEmail();
        $data['menu'] = $this->menu->getAllMenu();
        $data['categories'] = $this->products->getAllCategories();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('category', 'Category', 'required|trim');
        $this->form_validation->set_rules('unit_price', 'Unit Price', 'required|trim|numeric');

        if (empty($_FILES['photo1']['name'])) {
            $this->form_validation->set_rules('photo1', 'Photo', 'required');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/add-product', $data);
            $this->load->view('templates/footer');
        } else {
            $this->products->insertProduct();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New product added</div>');
            redirect('menu/product');
        }
    }

    public function editProduct($id)
    {
        $data['title'] = 'Edit Product';
        $data['user'] = $this->user->getUserByEmail();
        $data['product'] = $this->products->getProductById($id);
        $data['photo'] = $this->products->getPhotoByPhoto($data['product']['photo1']);
        $data['categories'] = $this->products->getAllCategories();
        $data['category'] = $this->products->getCategoryById($data['product']['category_id']);
        $data['menu'] = $this->menu->getAllMenu();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('category', 'Category', 'required|trim');
        $this->form_validation->set_rules('unit_price', 'Unit Price', 'required|trim|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit-product', $data);
            $this->load->view('templates/footer');
        } else {
            $this->products->updateProduct($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Product has been changed</div>');
            redirect('menu/editProduct/' . $id);
        }
    }

    public function updateImage($id, $i, $photo)
    {
        $this->products->updateImage($i, $photo);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Photo has been updated</div>');
        redirect('menu/editProduct/' . $id);
    }

    public function deleteProduct($id, $photo)
    {
        $this->products->deleteProduct($id, $photo);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Product has been deleted</div>');
        redirect('menu/product');
    }

    public function deleteImage($id, $i, $photo)
    {
        $this->products->deleteImage($i, $photo);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Photo has been deleted</div>');
        redirect('menu/editProduct/' . $id);
    }
    public function category()
    {
        $category_id = $this->input->post('categoryId');
        $this->products->category($category_id);
    }

    public function homePicture()
    {
        $data['title'] = 'Home Picture';
        $data['user'] = $this->user->getUserByEmail();
        $data['photo'] = $this->products->getHomePicture();
        $data['menu'] = $this->menu->getAllMenu();


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/home-picture', $data);
            $this->load->view('templates/footer');
        } else {
            $this->products->updateImage();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Product has been changed</div>');
            redirect('menu/homePicture');
        }
    }

    public function editPicture($i, $photo)
    {
        $this->products->updatePicture($i, $photo);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Product has been changed</div>');
        redirect('menu/homePicture');
    }

    public function deletePicture($i, $photo)
    {
        $this->products->deletePicture($i, $photo);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Photo has been deleted</div>');
        redirect('menu/homePicture/');
    }

    public function company()
    {
        $data['title'] = 'Company';
        $data['user'] = $this->user->getUserByEmail();
        $data['menu'] = $this->menu->getAllMenu();
        $data['company'] = $this->menu->getCompany();

        $this->form_validation->set_rules('company_name', 'Company Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/company', $data);
            $this->load->view('templates/footer');
        } else {
            $this->menu->updateCompany();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Company has been changed</div>');
            redirect('menu/company');
        }
    }
}
