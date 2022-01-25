<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{

    public function register($data)
    {

        $this->db->insert('users', $data);

        return $this->db->insert_id();
    }

    public function update($data, $user_id)
    {
        return  $this->db->set($data)->where('user_id', $user_id)->update('users');
    }

    public function getUser($row, $field)
    {
        $check = $this->db
            ->where($row, $field)
            ->get('users');

        return $check->num_rows() > 0 ? $check->row_array() : FALSE;
    }

    public function getUsers()
    {
        return $this->db->get('users')->result_array();
    }
}
