<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Golongan extends CI_Model
{
    public function getALl()
    {
        return $this->db->get('golongan')->result_array();
    }
}
