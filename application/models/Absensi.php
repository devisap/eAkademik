<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function getAll($param){
        $res = $this->db->order_by('created_at', 'DESC')->get_where('dt_absensi', $param)->result();
        return $res;
    }
    public function get($param){
        $filter = !empty($param['filter'])? $param['filter'] : '';
        $res    = $this->db->get_where('dt_absensi', $filter)->result();
        return $res;
    }
    public function insert($param){
        $this->db->insert('dt_absensi', $param);
        return $this->db->insert_id();
    }
    public function insertBatch($param){
        return $this->db->insert_batch('dt_absensi', $param);
    }
    public function update($param){
        $this->db->where('ID_ABSENSI', $param['ID_ABSENSI'])->update('dt_absensi', $param);
        return true;
    }
    public function delete($param){
        $this->db->where($param)->delete('dt_absensi');
        return true;
    }
}