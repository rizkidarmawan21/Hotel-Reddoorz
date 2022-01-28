<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar_f extends CI_Controller {

	public function index()
	{
		// $this->load->view('welcome_message');
		// $data['user'] = $this->db->get_where('user',['email' =>$this->session->userdata('email')])->row_array();
        $data['kamar'] = $this->Kamar_model->getAll()->result_array();
		$data['title'] = 'Reddoorz | Kamar';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('frond/kamar/index',$data);
		$this->load->view('templates/footer',$data);
	}

}