<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT user_sub_menu.*, user_menu.menu
                    FROM user_sub_menu JOIN user_menu
                    On user_sub_menu.menu_id = user_menu.id
        ";
        return $this->db->query($query)->result_array();
    }

    public function getAllMenu()
    {
        return $this->db->get('user_menu')->result_array();
    }

    public function insertSubMenu()
    {
        $data = [
            'title' => $this->input->post('title'),
            'menu_id' => $this->input->post('menu_id'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active'),
        ];
        $this->db->insert('user_sub_menu', $data);
    }

    public function insertMenu()
    {
        $this->db->insert('user_menu', [
            'menu' => $this->input->post('menu')
        ]);
    }

    public function getCompany()
    {
        return $this->db->get_where('company', ['id' => '1'])->row_array();
    }

    public function updateCompany()
    {
        $data = [
            'company_name' => $this->input->post('company_name', true),
            'description' => $this->input->post('description', true),
            'bukalapak' => $this->input->post('bukalapak', true),
            'tokopedia' => $this->input->post('tokopedia', true),
            'olx' => $this->input->post('olx', true),
            'whatsapp' => $this->input->post('whatsapp', true),
            'line' => $this->input->post('line', true),
            'address' => $this->input->post('address', true),
            'number_phone' => $this->input->post('number_phone', true),
            'number_wa' => $this->input->post('number_wa', true),
            'email' => $this->input->post('email', true),
            'maps' => $this->input->post('maps', true),
        ];

        $this->db->where('id', 1);
        $this->db->update('company', $data);
    }
}
