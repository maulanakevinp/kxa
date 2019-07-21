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
        $data['category'] = $this->products->getAllCategory();

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 20;
        $config['base_url'] = 'http://localhost/kxa/menu/product';

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['product'] = $this->products->getProduct($config['per_page'], $data['start']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/product', $data);
        $this->load->view('templates/footer');
    }

    public function productByCategory($category_id)
    {
        $data['title'] = 'Product';
        $data['user'] = $this->user->getUserByEmail();
        $data['menu'] = $this->menu->getAllMenu();
        $data['category'] = $this->products->getAllCategory();
        $data['type'] = $this->products->getType($category_id);

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 20;
        $config['base_url'] = 'http://localhost/kxa/menu/product/' . $category_id;

        $this->pagination->initialize($config);
        if ($this->uri->segment(4) != null) {
            $data['start'] = $this->uri->segment(4);
        } else {
            $data['start'] = 0;
        }
        $data['product'] = $this->products->getProductByCategory($category_id, $config['per_page'], $data['start']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/product', $data);
        $this->load->view('templates/footer');
    }

    public function productByType($category_id, $type_id)
    {
        $data['title'] = 'Product';
        $data['user'] = $this->user->getUserByEmail();
        $data['menu'] = $this->menu->getAllMenu();
        $data['category'] = $this->products->getAllCategory();
        $data['type'] = $this->products->getType($category_id);

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 20;
        $config['base_url'] = 'http://localhost/kxa/menu/product/' . $category_id . '/' . $type_id;

        $this->pagination->initialize($config);
        if ($this->uri->segment(5) != null) {
            $data['start'] = $this->uri->segment(5);
        } else {
            $data['start'] = 0;
        }
        $data['product'] = $this->products->getProductByType($type_id, $config['per_page'], $data['start']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/product', $data);
        $this->load->view('templates/footer');
    }

    public function searchProduct()
    {
        $data['title'] = 'Search Product';
        $data['user'] = $this->user->getUserByEmail();
        $data['menu'] = $this->menu->getAllMenu();
        $data['category'] = $this->products->getAllCategory();

        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->db->like('name', $data['keyword']);
        // $this->db->or_like('email', $data['keyword']);
        $this->db->from('product');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 20;
        $config['base_url'] = 'http://localhost/kxa/menu/searchProduct';

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
        $data['category'] = $this->products->getAllCategory();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('category', 'Category', 'required|trim');
        $this->form_validation->set_rules('type', 'Type', 'required|trim');
        $this->form_validation->set_rules('price', 'Price', 'required|trim|numeric');

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
            redirect('menu/product');
        }
    }

    public function editProduct($id)
    {
        $data['title'] = 'Edit Product';
        $data['user'] = $this->user->getUserByEmail();
        $data['product'] = $this->products->getProductById($id);
        $data['photo'] = $this->products->getPhotoByPhoto($data['product']['photo1']);
        $data['categories'] = $this->products->getAllCategory();
        $data['category'] = $this->products->getCategoryById($data['product']['category_id']);
        $data['menu'] = $this->menu->getAllMenu();
        $data['type'] = $this->products->getType($data['product']['category_id']);

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('category', 'Category', 'required|trim');
        $this->form_validation->set_rules('price', 'Price', 'required|trim|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit-product', $data);
            $this->load->view('templates/footer');
        } else {
            $this->products->updateProduct($id);
            redirect('menu/editProduct/' . $id);
        }
    }

    public function updateImage($id, $i, $photo)
    {
        $this->products->updateImage($i, $photo);
        redirect('menu/editProduct/' . $id);
    }

    public function deleteProduct($id, $photo)
    {
        $this->products->deleteProduct($id, $photo);
        redirect('menu/product');
    }

    public function deleteImage($id, $i, $photo)
    {
        $this->products->deleteImage($i, $photo);
        redirect('menu/editProduct/' . $id);
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
            $this->products->updatePicture();
            redirect('menu/homePicture');
        }
    }

    public function editPicture($i, $photo)
    {
        $this->products->updatePicture($i, $photo);
        redirect('menu/homePicture');
    }

    public function deletePicture($i, $photo)
    {
        $this->products->deletePicture($i, $photo);
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
        $this->form_validation->set_rules('number_phone', 'Number Phone', 'trim');
        $this->form_validation->set_rules('number_whatsapp', 'Number Whatsapp', 'trim');
        $this->form_validation->set_rules('descriptioin', 'Descriptioin', 'trim');
        $this->form_validation->set_rules('address', 'Address', 'trim');
        $this->form_validation->set_rules('bukalapak', 'Bukalapak', 'trim');
        $this->form_validation->set_rules('tokopedia', 'Tokopedia', 'trim');
        $this->form_validation->set_rules('olx', 'OLX', 'trim');
        $this->form_validation->set_rules('whatsapp', 'WhatsApp', 'trim');
        $this->form_validation->set_rules('line', 'Line', 'trim');
        $this->form_validation->set_rules('maps', 'Maps', 'trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/company', $data);
            $this->load->view('templates/footer');
        } else {
            $this->menu->updateCompany();
            redirect('menu/company');
        }
    }

    public function categoryId()
    {
        $id = $this->input->post('id');
        $type = $this->products->getType($id);

        echo "<option value=''> Select Type </option>";
        foreach ($type as $t) {
            if (condition) {
                # code...
            }
            echo "<option value='" . $t['id'] . "'>" . $t['type'] . "</option>";
        }
    }

    public function category()
    {
        $data['title'] = 'Category';
        $data['user'] = $this->user->getUserByEmail();
        $data['category'] = $this->products->getAllCategory();
        $data['menu'] = $this->menu->getAllMenu();

        $this->form_validation->set_rules('category', 'Category', 'required|trim');
        if (empty($_FILES['photo']['name'])) {
            $this->form_validation->set_rules('photo', 'Photo', 'required|trim');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/category', $data);
            $this->load->view('templates/footer');
        } else {
            $this->products->insertCategory();
            redirect('menu/category');
        }
    }

    public function editCategory($id)
    {
        $data['title'] = 'Edit Category';
        $data['user'] = $this->user->getUserByEmail();
        $data['category'] = $this->products->getCategoryById($id);
        $data['menu'] = $this->menu->getAllMenu();
        $data['type'] = $this->products->getType($id);

        $this->form_validation->set_rules('category', 'Category', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit-category', $data);
            $this->load->view('templates/footer');
        } else {
            $this->products->updateCategory($id);
            redirect('menu/editCategory/' . $id);
        }
    }

    public function deleteCategory($id)
    {
        $this->products->deleteCategory($id);
        redirect('menu/category');
    }

    public function addType($category_id)
    {
        $this->products->insertType($category_id);
        redirect('menu/editCategory/' . $category_id);
    }

    public function editType($category_id, $id)
    {
        $this->products->updateType($id);
        redirect('menu/editCategory/' . $category_id);
    }

    public function deleteType($category_id, $id)
    {
        $this->products->deleteType($id);
        redirect('menu/editCategory/' . $category_id);
    }

    public function getType()
    {
        echo json_encode($this->products->getTypeById($this->input->post('id')));
    }
}
