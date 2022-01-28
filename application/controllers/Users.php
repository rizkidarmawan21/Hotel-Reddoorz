<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	public function index()
	{
		// $this->load->view('welcome_message');
		$data['user'] = $this->db->get_where('user',['email' =>$this->session->userdata('email')])->row_array();
        $data['users'] = $this->db->query('SELECT * FROM `user` WHERE `role_id` = 2 AND `is_delete` = 0')->result_array();
		$data['title'] = 'Data Users';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('users/index',$data);
		$this->load->view('templates/footer',$data);
	}

    public function delete($id){
        $this->db->set('is_delete' ,1);
        $this->db->where('id',$id);
        $this->db->update('user');

        $this->session->set_flashdata('message','
			<div class="alert alert-success" role="alert">
 			 Berhasil menghapus data user
			</div>
			');
			redirect('users');
    }
}