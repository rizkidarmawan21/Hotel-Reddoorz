<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_model extends CI_Model{
    public function getAllObat(){
        $this->db->where("status",0);
        $this->db->order_by("id", "desc");
        return $this->db->get('obat');
    }
}