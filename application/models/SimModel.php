<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SimModel extends CI_Model
{
    public function getALl()
    {
        return $this->db
            ->join('jenis_pemohon', 'jenis_pemohon.jenis_pemohon_id = sim.jenis_pemohon_id')
            ->join('golongan', 'golongan.golongan_id = sim.golongan_id')
            ->get('sim')
            ->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('sim', $data);
        return $this->db->insert_id();
    }

    public function getById($sim_id)
    {
        return $this->db
            ->join('jenis_pemohon', 'jenis_pemohon.jenis_pemohon_id = sim.jenis_pemohon_id')
            ->join('golongan', 'golongan.golongan_id = sim.golongan_id')
            ->where('sim_id', $sim_id)
            ->get('sim')
            ->row_array();
    }

    public function update($data, $sim_id)
    {
        return  $this->db->set($data)->where('sim_id', $sim_id)->update('sim');
    }
}
