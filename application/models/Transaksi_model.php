<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model{
    public function getAll(){
        return $this->db->query("SELECT `transaksi`.*, `transaksi`.`id` AS `id_transaksi` , `user`.* ,`user`.`id` AS `user_id` , `kamar`.*, `kamar`.`id` AS `kamar_id` FROM `transaksi` JOIN `user` On `transaksi`.`id_user` = `user`.`id` JOIN `kamar` On `transaksi`.`id_kamar` = `kamar`.`id` WHERE `transaksi`.`status` = 0  GROUP BY `transaksi`.`id`");
    }
    public function getAllTransaksi(){
        return $this->db->query("SELECT `transaksi`.*, `transaksi`.`id` AS `id_transaksi` , `user`.* ,`user`.`id` AS `user_id` , `kamar`.*, `kamar`.`id` AS `kamar_id` FROM `transaksi` JOIN `user` On `transaksi`.`id_user` = `user`.`id` JOIN `kamar` On `transaksi`.`id_kamar` = `kamar`.`id` WHERE `transaksi`.`status` = 0 AND `transaksi`.`status_pembayaran` = 1  GROUP BY `transaksi`.`id`");
    }

    public function getAllPesanan(){
        return $this->db->query("SELECT `transaksi`.*, `transaksi`.`id` AS `id_transaksi` , `user`.* ,`user`.`id` AS `user_id` , `kamar`.*, `kamar`.`id` AS `kamar_id` FROM `transaksi` JOIN `user` On `transaksi`.`id_user` = `user`.`id` JOIN `kamar` On `transaksi`.`id_kamar` = `kamar`.`id` WHERE `transaksi`.`status` = 0  AND `transaksi`.`status_pesanan` = 0  GROUP BY `transaksi`.`id`");
    }
    // public function getLogAllTransaksi(){
    //     return $this->db->query("SELECT `transaksi`.*, `transaksi`.`id` AS `id_transaksi` , `obat`.*,  SUM(`obat`.`harga` * `transaksi`.`jumlah_barang`) AS `total`
    //                                 FROM `transaksi` 
    //                                 JOIN `obat`
    //                                 On   `transaksi`.`id_obat` = `obat`.`id` WHERE `transaksi`.`status` = 1
    //                                 GROUP BY `transaksi`.`id` ");
    // }

    // public function getCountTransaksi(){
    //     $this->db->where('status',0);
    //     $query = $this->db->get('transaksi');

    //     if($query->num_rows()> 0)
    //     {
    //         return $query->num_rows();
    //     }else{

    //     return 0;
    //     }
    // }

    public function getTransaksiByUser($id){
       $id_user = $id['id'];
        return $this->db->query("SELECT *, `transaksi`.`id` AS `id_transaksi` FROM `transaksi` JOIN `kamar` ON `transaksi`.`id_kamar` = `kamar`.`id` WHERE id_user = $id_user AND `transaksi`.`status` = 0 ");
    }
    public function getTransaksiBayarByUser($id){
       $id_user = $id['id'];
        return $this->db->query("SELECT *, `transaksi`.`id` AS `id_transaksi` FROM `transaksi` JOIN `kamar` ON `transaksi`.`id_kamar` = `kamar`.`id` JOIN `user` On `transaksi`.`id_user` = `user`.`id` WHERE id_user = $id_user AND `transaksi`.`status` = 0 AND `transaksi`.`status_pembayaran` in(1,2,3)");
    }
    public function getTransaksiDetail($data_id){
       $id_user = $data_id['id_user']['id'];
       $id_trans = $data_id['id_transaksi'];
        return $this->db->query("SELECT *, `transaksi`.`id` AS `id_transaksi` FROM `transaksi` JOIN `kamar` ON `transaksi`.`id_kamar` = `kamar`.`id` JOIN `user` On `transaksi`.`id_user` = `user`.`id` WHERE id_user = $id_user AND `transaksi`.`id` = $id_trans AND `transaksi`.`status` = 0 ");
    }
} 