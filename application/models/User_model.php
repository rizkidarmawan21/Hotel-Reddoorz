<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class User_model extends CI_Model{

        public function getCountObat(){
            $this->db->where('status',0);
            $query = $this->db->get('obat');

            if($query->num_rows()> 0)
            {
                return $query->num_rows();
            }else{

            return 0;
            }
        }

        public function getCountTransaksi(){
            $this->db->where('status',1);
            $query = $this->db->get('transaksi');

            if($query->num_rows()> 0)
            {
                return $query->num_rows();
            }else{

            return 0;
            }
        }

        public function getCountStok(){
           return $this->db->query("SELECT SUM(stok) as `stok` FROM `obat` WHERE `status` = 0 ");
        }

        public function getCountUangMasuk(){
            return $this->db->query("SELECT SUM(`obat`.`harga` * `transaksi`.`jumlah_barang`) AS `total`
                                        FROM `transaksi` 
                                        JOIN `obat`
                                        On   `transaksi`.`id_obat` = `obat`.`id` WHERE `transaksi`.`status` = 1
                                        GROUP BY `transaksi`.`id` ");
        }
    }