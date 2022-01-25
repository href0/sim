<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenisPemohon extends CI_Model
{
    public function getALl()
    {
        return $this->db->get('jenis_pemohon')->result_array();
    }
}
