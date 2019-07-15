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

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', [
                'menu' => $this->input->post('menu')
            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added</div>');
            redirect('menu');
        }
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

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
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active'),
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Submenu added</div>');
            redirect('menu/submenu');
        }
    }

    public function product()
    {
        $data['title'] = 'Product';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['product'] = $this->db->get('products')->result_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/product', $data);
        $this->load->view('templates/footer');
    }

    public function addProduct()
    {
        $data['title'] = 'Add New Product';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['categories'] = $this->db->get('categories')->result_array();
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('category', 'Category', 'required|trim');
        $this->form_validation->set_rules('unit_price', 'Unit Price', 'required|trim|numeric');
        if (empty($_FILES['photo']['name'])) {
            $this->form_validation->set_rules('photo', 'Photo', 'required');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/add-product', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $category = $this->input->post('category');
            $unit_price = $this->input->post('unit_price');
            $bukalapak = $this->input->post('bukalapak');
            $tokopedia = $this->input->post('tokopedia');
            $olx = $this->input->post('olx');
            $description = $this->input->post('description');
            $photo = $_FILES['photo']['name'];
            $photo1 = $_FILES['photo1']['name'];
            $photo2 = $_FILES['photo2']['name'];
            $photo3 = $_FILES['photo3']['name'];
            $photo4 = $_FILES['photo4']['name'];
            $photo5 = $_FILES['photo5']['name'];

            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/categories/';
            $this->load->library('upload', $config);

            $this->upload->do_upload('photo');
            $this->upload->do_upload('photo1');
            $this->upload->do_upload('photo2');
            $this->upload->do_upload('photo3');
            $this->upload->do_upload('photo4');
            $this->upload->do_upload('photo5');

            $this->db->insert('photo', [
                'photo' => $photo,
                'photo1' => $photo1,
                'photo2' => $photo2,
                'photo3' => $photo3,
                'photo4' => $photo4,
                'photo5' => $photo5
            ]);

            $this->db->insert('products', [
                'name' => $name,
                'category_id' => $category,
                'photo' => $photo,
                'unit_price' => $unit_price,
                'bukalapak' => $bukalapak,
                'tokopedia' => $tokopedia,
                'olx' => $olx,
                'description' => $description,
                'date_created' => time()
            ]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New product added</div>');
            redirect('menu/product');
        }
    }

    public function editProduct($id)
    {
        $data['title'] = 'Detail Product';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['product'] = $this->db->get_where('products', ['id' => $id])->row_array();
        $data['categories'] = $this->db->get('categories')->result_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/edit-product', $data);
        $this->load->view('templates/footer');
    }
}
