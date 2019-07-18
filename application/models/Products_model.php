<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products_model extends CI_Model
{

    public function getAllProduct()
    {
        return $this->db->get('products')->result_array();
    }

    public function getAllCategories()
    {
        return $this->db->get('categories')->result_array();
    }

    public function getProductById($id)
    {
        // $query = "SELECT p.id as id , p.name as name , 
        //             FROM product p JOIN categories c ON p.category_id = c.id
        //             WHERE p.id = $id";

        return $this->db->get_where('products', ['id' => $id])->row_array();
    }

    public function getPhotoByPhoto($photo)
    {
        return $this->db->get_where('photo', ['photo1' => $photo])->row_array();
    }

    public function getCategoryById($id)
    {
        return $this->db->get_where('categories', ['id' => $id])->row_array();
    }

    public function getHomePicture()
    {
        $data['picture'] =  $this->db->get_where('home_picture', ['id' => '1'])->row_array();

        return $this->db->get_where('photo', ['photo1' => $data['picture']['photo1']])->row_array();
    }

    public function insertProduct()
    {
        $config['upload_path'] = './assets/img/categories/'; //path folder
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
        $this->db->insert('photo', $data);

        $name = $this->input->post('name');
        $category = $this->input->post('category');
        $unit_price = $this->input->post('unit_price');
        $bukalapak = $this->input->post('bukalapak');
        $tokopedia = $this->input->post('tokopedia');
        $olx = $this->input->post('olx');
        $description = $this->input->post('description');


        $this->db->insert('products', [
            'name' => $name,
            'category_id' => $category,
            'photo1' => $data['photo1'],
            'unit_price' => $unit_price,
            'bukalapak' => $bukalapak,
            'tokopedia' => $tokopedia,
            'olx' => $olx,
            'description' => $description,
            'date_created' => time()
        ]);
    }

    public function updateProduct($id)
    {
        $name = $this->input->post('name');
        $category = $this->input->post('category');
        $unit_price = $this->input->post('unit_price');
        $bukalapak = $this->input->post('bukalapak');
        $tokopedia = $this->input->post('tokopedia');
        $olx = $this->input->post('olx');
        $description = $this->input->post('description');

        $this->db->set('name', $name);
        $this->db->set('category_id', $category);
        $this->db->set('unit_price', $unit_price);
        $this->db->set('bukalapak', $bukalapak);
        $this->db->set('tokopedia', $tokopedia);
        $this->db->set('description', $description);
        $this->db->set('olx', $olx);
        $this->db->where('id', $id);
        $this->db->update('products');
    }

    public function updateImage($i, $photo)
    {
        $data['photo'] = $this->db->get_where('photo', ['photo1' => $photo])->row_array();
        $config['upload_path'] = './assets/img/categories/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $this->load->library('upload', $config);

        if (!empty($_FILES['photo' . $i]['name'])) {
            if (!$this->upload->do_upload('photo' . $i)) {
                $this->upload->display_errors();
            } else {
                $old_image = $data['photo']['photo' . $i];
                if ($old_image != '') {
                    unlink(FCPATH . 'assets/img/categories/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('photo' . $i, $new_image);
                $this->db->where('photo1', $photo);
                $this->db->update('photo');
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
                $old_image = $data['photo']['photo' . $i];
                if ($old_image != '') {
                    unlink(FCPATH . 'assets/img/carousel/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('photo' . $i, $new_image);
                $this->db->where('photo1', $photo);
                $this->db->update('photo');
            }
        }
    }

    public function deleteProduct($id, $photo)
    {
        $this->db->delete('products', ['id' => $id]);
        $this->db->delete('photo', ['photo1' => $photo]);
    }

    public function deleteImage($i, $photo)
    {
        $this->db->set('photo' . $i, '');
        $this->db->where('photo1', $photo);
        $this->db->update('photo');
    }

    public function deletePicture($i, $photo)
    {
        $this->db->set('photo' . $i, '');
        $this->db->where('photo1', $photo);
        $this->db->update('photo');
    }

    public function getProduct($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('name', $keyword);
            $this->db->or_like('description', $keyword);
        }
        return $this->db->get('products', $limit, $start)->result_array();
    }

    public function countAllPeoples()
    {
        return $this->db->get('peoples')->num_rows();
    }

    public function getCategory($category_id, $limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('name', $keyword);
            $this->db->or_like('description', $keyword);
        }
        $this->db->where('category_id', $category_id);
        return $this->db->get('products', $limit, $start)->result_array();
    }
}
