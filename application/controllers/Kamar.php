<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	public function index()
	{
		// $this->load->view('welcome_message');
		$data['user'] = $this->db->get_where('user',['email' =>$this->session->userdata('email')])->row_array();
        $data['kamar'] = $this->Kamar_model->getAll()->result_array();
		$data['title'] = 'Data Kamar';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('kamar/index',$data);
		$this->load->view('templates/footer',$data);
	}

	public function store(){
		$this->form_validation->set_rules('type','Type Kamar','trim|required');
		$this->form_validation->set_rules('jumlah','Jumlah Kamar','trim|required');
		$this->form_validation->set_rules('stok','Stok Kamar','trim|required');
		$this->form_validation->set_rules('price','Harga Kamar','trim|required');

		if($this->form_validation->run() == false){
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Tambah kamar gagal !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            $this->index();
		}else{
			$type = $this->input->post('type',true);
			$jumlah = $this->input->post('jumlah',true);
			$stok = $this->input->post('stok',true);
			$price = $this->input->post('price',true);
			$image_produk = $_FILES['image_produk'];

			if($image_produk){
				$config['upload_path'] = './assets/img/produk/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '20000';
				$config['encrypt_name'] = TRUE;

				$this->load->library('upload',$config);
				if (!$this->upload->do_upload('image_produk')) {
					//  echo $this->upload->display_errors();
					//  var_dump($image_produk);
                    // die();
					$image_produk = 'default.jpg';
				}else {
					$image_produk = $this->upload->data('file_name');
				}

			}

			$data = [
				'type'			=> $type,
				'jumlah'		=> $jumlah,
				'stok'			=> $stok,
				'price'			=> $price,
				'image_produk'	=> $image_produk
			];

			$this->db->insert('kamar',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			Data kamar berhasil di tambah !
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
			redirect('kamar');
		}
	}


	public function edit($id){
		$data['user'] = $this->db->get_where('user',['email' =>$this->session->userdata('email')])->row_array();
		//  ==================================================
		$id = ['id' => $id];
		$data['title'] = 'Edit Data Kamar';
		$data['kamar'] = $this->db->get_where('kamar',$id)->row_array();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('kamar/edit',$data);
		$this->load->view('templates/footer',$data);
	}

	public function update(){
		$this->form_validation->set_rules('type','Type Kamar','trim|required');
		$this->form_validation->set_rules('jumlah','Jumlah Kamar','trim|required');
		$this->form_validation->set_rules('stok','Stok Kamar','trim|required');
		$this->form_validation->set_rules('price','Harga Kamar','trim|required');


		if($this->form_validation->run() == false){
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Edit data kamar gagal !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            $this->index();
		}else{
			$id = $this->input->post('id',true);
			$type = $this->input->post('type',true);
			$jumlah = $this->input->post('jumlah',true);
			$stok = $this->input->post('stok',true);
			$price = $this->input->post('price',true);
			$image_produk = $_FILES['image_produk'];

			$data['produk'] = $this->db->query("SELECT image_produk FROM `kamar` WHERE id = $id")->row_array();

			// var_dump($image_produk);
			// die();

			if($image_produk){
				$config['upload_path'] = './assets/img/produk/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '20000';
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload',$config);
				if($this->upload->do_upload('image_produk')){
					$old_image = $data['produk']['image_produk'];
				
					if($old_image != 'default_obat.jpg'){
						unlink('./assets/img/produk/'. $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image_produk',$new_image);
				} else{
					echo $this->upload->display_errors();
				}

			}


			$data = [
				'type'	 => $type,
				'jumlah' => $jumlah,
				'stok' 	 => $stok,
				'price'  => $price
			];

			$id_ob = ['id' => $id];
			$this->db->where($id_ob);
			$this->db->update('kamar',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			Data kamar berhasil di edit !
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
			</button>
		  </div>');
			redirect('kamar');
		}


	}


	public function delete($id){
		// cari gambar berdasarkan id
		 $data['produk'] = $this->db->query("SELECT image_produk FROM `kamar` WHERE id = $id")->row_array();
		// hapus gambar 
		if ($data['produk']['image_produk'] != 'default.jpg') {
			# code...
			unlink("./assets/img/produk/".$data['produk']['image_produk']);
		}


		$id = ['id'=>$id];
		$this->db->where($id);
		// $this->db->delete('obat');
		$this->db->set('is_active',1);
		$this->db->set('image_produk',"default.jpg");
		$this->db->update('kamar');
		$this->session->set_flashdata('message','
		<div class="alert alert-success" role="alert">
		 Data kamar berhasil dihapus !
		</div>
		');
		redirect('obat');
	}
	
	public function stok(){
		$data['user'] = $this->db->get_where('user',['email' =>$this->session->userdata('email')])->row_array();
		$data['title'] = 'Stok Kamar';
		$data['kamar'] = $this->Kamar_model->getAll()->result_array();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('kamar/stok',$data); 
		$this->load->view('templates/footer',$data);
	}

}