<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

    public function index(){
        $data['user'] = $this->db->get_where('user',['email' =>$this->session->userdata('email')])->row_array();

		$data['transaksi'] = $this->Transaksi_model->getAllTransaksi()->result_array();
        $data['title'] = 'Data Transaksi';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('transaksi/index',$data);
		$this->load->view('templates/footer',$data);
    }

	public function konfirmasi(){
		$data['user'] = $this->db->get_where('user',['email' =>$this->session->userdata('email')])->row_array();

		$data['transaksi'] = $this->Transaksi_model->getAllPesanan()->result_array();
        $data['title'] = 'Konfirmasi Pesanan';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('transaksi/konfirmasi',$data);
		$this->load->view('templates/footer',$data);
	}

	public function konfir_pesanan($id){
		$this->db->set('status_pesanan',1 );
		$this->db->where('id',$id);
		$this->db->update('transaksi');

		$this->session->set_flashdata('message','
			<div class="alert alert-success" role="alert">
 			Konfirmasi Pesanan Success !
			</div>
			');
			redirect('transaksi/konfirmasi');
	}
	public function konfir_pembayaran($id){
		$this->db->set('status_pembayaran',2 );
		$this->db->where('id',$id);
		$this->db->update('transaksi');

		$this->session->set_flashdata('message','
			<div class="alert alert-success" role="alert">
 			Konfirmasi Pembayaran Success !
			</div>
			');
			redirect('transaksi/');
	}

	public function batal_pesanan($id){
		$this->db->set('status_pesanan',2 );
		$this->db->where('id',$id);
		$this->db->update('transaksi');

		$this->session->set_flashdata('message','
			<div class="alert alert-success" role="alert">
 			Batalkan Pesanan Success !
			</div>
			');
			redirect('transaksi/konfirmasi');
	}

	public function log(){
		$data['user'] = $this->db->get_where('user',['email' =>$this->session->userdata('email')])->row_array();

		$data['transaksi'] = $this->Transaksi_model->getAll()->result_array();
        $data['title'] = 'Log Transaksi';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('transaksi/log',$data);
		$this->load->view('templates/footer',$data);
	}
}