<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar_model extends CI_Model{
    public function getAll(){
        $this->db->where("is_active",0);
        $this->db->order_by("id", "desc");
        return $this->db->get('kamar');
    }
}

