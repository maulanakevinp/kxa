<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products_model extends CI_Model
{

    public function getAllProduct()
    {
        return $this->db->get('product')->result_array();
    }

    public function getAllCategory()
    {
        return $this->db->get('category')->result_array();
    }

    public function getAllType()
    {
        $query = "SELECT t.id as id , t.type as type , c
                    FROM type t JOIN category c
                    On t.category_id = c.id
        ";
        return $this->db->query($query)->result_array();
    }

    public function getProductById($id)
    {
        $query = "SELECT pr.id as id , pr.name as name , pr.type_id as type_id , t.type as type , t.category_id as category_id , c.category as category , 
                    pr.photo1 as photo1 , ph.photo2 as photo2 , ph.photo3 as photo3 , ph.photo4 as photo4 , ph.photo5 as photo5 ,
                    ph.photo6 as photo6 , pr.price as price , pr.bukalapak as bukalapak , pr.tokopedia as tokopedia , pr.olx as olx , 
                    pr.description as description , pr.date_created as date_created 
                    FROM product pr JOIN type t ON pr.type_id = t.id 
                    JOIN photo ph ON pr.photo1 = ph.photo1 
                    JOIN category c ON t.category_id = c.id 
                    WHERE pr.id = $id
                ";
        return $this->db->query($query)->row_array();
    }

    public function getPhotoByPhoto($photo)
    {
        return $this->db->get_where('photo', ['photo1' => $photo])->row_array();
    }

    public function getCategoryById($id)
    {
        return $this->db->get_where('category', ['id' => $id])->row_array();
    }

    public function getType($category_id)
    {
        return $this->db->get_where('type', ['category_id' => $category_id])->result_array();
    }

    public function getTypeById($id)
    {
        return $this->db->get_where('type', ['id' => $id])->row_array();
    }

    public function getHomePicture()
    {
        $data['picture'] =  $this->db->get_where('home_picture', ['id' => '1'])->row_array();

        return $this->db->get_where('photo', ['photo1' => $data['picture']['photo1']])->row_array();
    }

    public function insertProduct()
    {
        $config['upload_path'] = './assets/img/products/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $data = array();
        $this->load->library('upload', $config);
        for ($i = 1; $i <= 6; $i++) {
            if (!empty($_FILES['photo' . $i]['name'])) {
                if (!$this->upload->do_upload('photo' . $i))
                    $this->upload->display_errors();
                else
                    $data['photo' . $i] = $this->upload->data('file_name');
            }
        }

        $insert = [
            'name' => $this->input->post('name'),
            'type_id' => $this->input->post('type'),
            'photo1' => $data['photo1'],
            'price' => $this->input->post('price'),
            'bukalapak' => $this->input->post('bukalapak'),
            'tokopedia' => $this->input->post('tokopedia'),
            'olx' => $this->input->post('olx'),
            'description' => $this->input->post('description'),
            'date_created' => time()
        ];

        if ($this->db->insert('photo', $data)) {
            if ($this->db->insert('product', $insert)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New product added</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New product has not been added</div>');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New photo has not been added</div>');
        }
    }

    public function updateProduct($id)
    {
        $this->db->set('name', $this->input->post('name'));
        $this->db->set('type_id', $this->input->post('type'));
        $this->db->set('price', $this->input->post('price'));
        $this->db->set('bukalapak', $this->input->post('bukalapak'));
        $this->db->set('tokopedia', $this->input->post('tokopedia'));
        $this->db->set('olx', $this->input->post('olx'));
        $this->db->set('description', $this->input->post('description'));
        $this->db->where('id', $id);
        if ($this->db->update('product')) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Product has been changed</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Product has not been changed</div>');
        }
    }

    public function updateImage($i, $photo)
    {
        $data['photo'] = $this->db->get_where('photo', ['photo1' => $photo])->row_array();
        $config['upload_path'] = './assets/img/products/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $this->load->library('upload', $config);

        if (!empty($_FILES['photo' . $i]['name'])) {
            if (!$this->upload->do_upload('photo' . $i)) {
                $this->upload->display_errors();
            } else {
                $new_image = $this->upload->data('file_name');
                $this->db->set('photo' . $i, $new_image);
                $this->db->where('photo1', $photo);
                if ($this->db->update('photo')) {
                    if ($data['photo']['photo' . $i] != '') {
                        unlink(FCPATH . 'assets/img/products/' . $data['photo']['photo' . $i]);
                    }
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Photo has been updated</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Photo has not been updated</div>');
                }
            }
        }
    }

    public function updatePicture($i, $photo)
    {
        $data['photo'] = $this->db->get_where('photo', ['photo1' => $photo])->row_array();
        $config['upload_path'] = './assets/img/carousel/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $this->load->library('upload', $config);

        if (!empty($_FILES['photo' . $i]['name'])) {
            if (!$this->upload->do_upload('photo' . $i)) {
                $this->upload->display_errors();
            } else {
                $new_image = $this->upload->data('file_name');
                $this->db->set('photo' . $i, $new_image);
                $this->db->where('photo1', $photo);
                if ($this->db->update('photo')) {
                    if ($data['photo']['photo' . $i] != '') {
                        unlink(FCPATH . 'assets/img/carousel/' . $data['photo']['photo' . $i]);
                    }
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Photo has been updated</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Photo has not been updated</div>');
                }
            }
        }
    }

    public function deleteProduct($id, $photo)
    {
        $data['photo'] = $this->db->get_where('photo', ['photo1' => $photo])->row_array();

        if ($this->db->delete('product', ['id' => $id])) {
            for ($i = 1; $i <= 6; $i++) {
                if ($data['photo']['photo' . $i] != '') {
                    unlink(FCPATH . 'assets/img/products/' . $data['photo']['photo' . $i]);
                }
            }
            if ($this->db->delete('photo', ['photo1' => $photo])) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Product has been deleted</div>');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Product has not been deleted</div>');
        }
    }

    public function deleteImage($i, $photo)
    {
        $data['photo'] = $this->db->get_where('photo', ['photo1' => $photo])->row_array();

        $this->db->set('photo' . $i, '');
        $this->db->where('photo1', $photo);
        if ($this->db->update('photo')) {
            unlink(FCPATH . 'assets/img/products/' . $data['photo']['photo' . $i]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Photo has been deleted</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Photo has not been deleted</div>');
        }
    }

    public function getProductByCategory($id, $limit, $start)
    {
        $query = "SELECT pr.id as id , pr.name as name , t.category_id as category_id , c.category as category , 
                    pr.photo1 as photo1 , ph.photo2 as photo2 , ph.photo3 as photo3 , ph.photo4 as photo4 , ph.photo5 as photo5 ,
                    ph.photo6 as photo6 , pr.price as price , pr.bukalapak as bukalapak , pr.tokopedia as tokopedia , pr.olx as olx , 
                    pr.description as description , pr.date_created as date_created 
                    FROM product pr JOIN type t ON pr.type_id = t.id 
                    JOIN photo ph ON pr.photo1 = ph.photo1 
                    JOIN category c ON t.category_id = c.id 
                    WHERE t.category_id = '$id'
                    LIMIT $start , $limit
                ";
        return $this->db->query($query)->result_array();
    }

    public function getProductByType($id, $limit, $start)
    {
        $query = "SELECT pr.id as id , pr.name as name , t.category_id as category_id , c.category as category , 
                    pr.photo1 as photo1 , ph.photo2 as photo2 , ph.photo3 as photo3 , ph.photo4 as photo4 , ph.photo5 as photo5 ,
                    ph.photo6 as photo6 , pr.price as price , pr.bukalapak as bukalapak , pr.tokopedia as tokopedia , pr.olx as olx , 
                    pr.description as description , pr.date_created as date_created 
                    FROM product pr JOIN type t ON pr.type_id = t.id 
                    JOIN photo ph ON pr.photo1 = ph.photo1 
                    JOIN category c ON t.category_id = c.id 
                    WHERE t.id = '$id'
                    LIMIT $start , $limit
                ";
        return $this->db->query($query)->result_array();
    }

    public function deletePicture($i, $photo)
    {
        $data['photo'] = $this->db->get_where('photo', ['photo1' => $photo])->row_array();

        $this->db->set('photo' . $i, '');
        $this->db->where('photo1', $photo);
        if ($this->db->update('photo')) {
            unlink(FCPATH . 'assets/img/carousel/' . $data['photo']['photo' . $i]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Photo has been deleted</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Photo has not been deleted</div>');
        }
    }

    public function getProduct($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('name', $keyword);
            $this->db->or_like('description', $keyword);
        }
        return $this->db->get('product', $limit, $start)->result_array();
    }

    public function insertCategory()
    {
        $config['upload_path'] = './assets/img/categories/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $data = array();
        $this->load->library('upload', $config);
        if (!empty($_FILES['photo']['name'])) {
            if (!$this->upload->do_upload('photo')) {
                $this->upload->display_errors();
            } else {
                $data['photo'] = $this->upload->data('file_name');
                $data['category'] = $this->input->post('category');
                if ($this->db->insert('category', $data)) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Category has been added</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Category has not been added</div>');
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Photo is empty</div>');
        }
    }

    public function updateCategory($id)
    {
        $config['upload_path'] = './assets/img/categories/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $old = $this->getCategoryById($id);
        $data = array();
        $this->load->library('upload', $config);

        if (!empty($_FILES['photo']['name'])) {
            if (!$this->upload->do_upload('photo')) {
                $this->upload->display_errors();
            } else {
                $data['photo'] = $this->upload->data('file_name');
            }
        }

        $data['category'] = $this->input->post('category');
        $this->db->where('id', $id);
        if ($this->db->update('category', $data)) {
            unlink(FCPATH . 'assets/img/categories/' . $old['photo']);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Category has been changed</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Category has not been chaned</div>');
        }
    }

    public function deleteCategory($id)
    {
        $old = $this->getCategoryById($id);

        if ($this->db->delete('type', ['category_id' => $id])) {
            if ($this->db->delete('category', ['id' => $id])) {
                unlink(FCPATH . 'assets/img/categories/' . $old['photo']);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Category has been deleted</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Category has not been deleted</div>');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Type has not been deleted</div>');
        }
    }

    public function insertType($category_id)
    {
        $query = $this->db->insert('type', [
            'category_id' => $category_id,
            'type' => $this->input->post('type')
        ]);

        if ($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Type has been added</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Type has not been added</div>');
        }
    }

    public function updateType($id)
    {
        $this->db->where('id', $id);
        if ($this->db->update('type', ['type' => $this->input->post('type')])) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Type has been changed</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Type has not been changed</div>');
        }
    }

    public function deleteType($id)
    {
        if ($this->db->delete('type', ['id' => $id])) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Type has been deleted</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Type has not been deleted</div>');
        }
    }
}
