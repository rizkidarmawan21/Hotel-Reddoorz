<?php
date_default_timezone_set('Asia/Jakarta');
defined('BASEPATH') or exit('No direct script access allowed');

class Home_f extends CI_Controller
{


	public function index()
	{
		// $this->load->view('welcome_message');
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['title'] = 'Dashboard';
		$this->load->view('frond/templates/header');
		$this->load->view('frond/templates/navbar', $data);
		$this->load->view('frond/home/index');
		$this->load->view('frond/templates/footer');
	}

	public function kamar()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kamar'] = $this->Kamar_model->getAll()->result_array();
		$this->load->view('frond/templates/header');
		$this->load->view('frond/templates/navbar', $data);
		$this->load->view('frond/kamar/index', $data);
		$this->load->view('frond/templates/footer');
	}

	public function pesan($id)
	{
		is_logged_in_user();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kamar'] = $this->db->get_where('kamar', ['id' => $id])->row_array();
		// $this->load->view('frond/templates/header');
		// $this->load->view('frond/templates/navbar', $data);
		$this->load->view('frond/form_pesan/index', $data);
		// $this->load->view('frond/templates/footer');
	}

	public function pesan_action()
	{
		is_logged_in_user();
		$this->form_validation->set_rules('id_user', 'Id User', 'trim|required');
		$this->form_validation->set_rules('id_kamar', 'Jumlah Kamar', 'trim|required');
		$this->form_validation->set_rules('tgl_checkin', 'Tanggal Check In', 'trim|required');
		$this->form_validation->set_rules('tgl_checkout', 'Tanggal Check Out', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'Jumlah Kamar', 'trim|required');
		$this->form_validation->set_rules('lama_hari', 'Lama Menginap', 'trim|required');
		$this->form_validation->set_rules('total_bayar', 'Total Bayar', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal menambahkan pesanan ! ,coba beberapa saat lagi.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
            </button>
          </div>');
			$this->kamar();
		} else {
			$id_user = $this->input->post('id_user', true);
			$id_kamar = $this->input->post('id_kamar', true);
			$jumlah = $this->input->post('jumlah', true);
			$tgl_checkin = $this->input->post('tgl_checkin', true);
			$tgl_checkout = $this->input->post('tgl_checkout', true);
			$lama_menginap = $this->input->post('lama_hari', true);
			$total_bayar = $this->input->post('total_bayar', true);

			$data = [
				'id_user' => $id_user,
				'id_kamar' => $id_kamar,
				'tgl_pesan' => date("Y-m-d H:i:s"),
				'tgl_masuk' => $tgl_checkin,
				'tgl_keluar' => $tgl_checkout,
				'jumlah_kamar' => $jumlah,
				'lama_hari' => $lama_menginap,
				'total_bayar' => $total_bayar,
				'bank' => '',
				'no_rekening' => '',
				'nm_rekening' => '',
				'bukti' => '',
				'status_pesanan' => 0,
				'status_pembayaran' => 0,
				'status' => 0
			];

			$this->db->insert('transaksi', $data);
			$this->session->set_flashdata('message', '<span style="background-color: darkgrey;">
			<p  style="text-align: center;">Pesanan berhasil ditambahkan! ,cek menu orders</p>
		</span>');
			redirect('home_f/kamar');
		}
	}


	public function blocked()
	{
		$this->load->view('frond/auth/blocked');
		// echo "access blocked";
	}


	public function pesanan()
	{
		is_logged_in_user();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$id = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pesanan'] = $this->Transaksi_model->getTransaksiByUser($id)->result_array();
		// var_dump($data['pesanan']);
		// die();
		// $this->load->view('frond/templates/header');
		// $this->load->view('frond/templates/navbar', $data);
		$this->load->view('frond/pesanan/index', $data);
		// $this->load->view('frond/templates/footer');
	}


	public function detail_pesan($id)
	{
		is_logged_in_user();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data_id =  [
			'id_user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'id_transaksi' => $id
		];
		$data['pesanan'] = $this->Transaksi_model->getTransaksiDetail($data_id)->row_array();
		// var_dump($data['pesanan']);
		// die();
		// $this->load->view('frond/templates/header');
		// $this->load->view('frond/templates/navbar', $data);
		$this->load->view('frond/pesanan/detail', $data);
		// $this->load->view('frond/templates/footer');
	}

	public function bayar($id)
	{
		is_logged_in_user();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data_id =  [
			'id_user' => $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'id_transaksi' => $id
		];
		$data['pesanan'] = $this->Transaksi_model->getTransaksiDetail($data_id)->row_array();
		// var_dump($data['pesanan']);
		// die();
		// $this->load->view('frond/templates/header');
		// $this->load->view('frond/templates/navbar', $data);
		$this->load->view('frond/pesanan/bayar', $data);
		// $this->load->view('frond/templates/footer');
	}

	public function bayar_aksi()
	{
		is_logged_in_user();
		$id = $this->input->post('id_transaksi', true);
		$bank = $this->input->post('bank', true);
		$no_rekening = $this->input->post('no_rek', true);
		$nm_rekening = $this->input->post('nm_rek', true);
		$image_bukti = $_FILES['bukti'];


		if ($image_bukti) {
			$config['upload_path'] = './assets/img/bukti/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '20000';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('bukti')) {
				$new_image = $this->upload->data('file_name');
				$this->db->set('bukti', $new_image);
			} else {
				echo $this->upload->display_errors();
			}
		}

		$data = [
			'bank'	 => $bank,
			'no_rekening' => $no_rekening,
			'nm_rekening' 	 => $nm_rekening,
			'status_pembayaran' => 1

		];
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('transaksi');

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			Konfirmasi Pembayaran Berhasil
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		  </div>');
		redirect('home_f/transaksi');
	}

	public function batal_pesan($id)
	{
		is_logged_in_user();
		$this->db->set('status_pesanan', 2);
		$this->db->where('id', $id);
		$this->db->update('transaksi');

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			Pesanan berhasil dibatalkan
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		  </div>');
		redirect('home_f/pesanan');
	}

	public function transaksi()
	{
		is_logged_in_user();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$id = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pesanan'] = $this->Transaksi_model->getTransaksiBayarByUser($id)->result_array();
		// var_dump($data['pesanan']);
		// die();
		// $this->load->view('frond/templates/header');
		// $this->load->view('frond/templates/navbar', $data);
		$this->load->view('frond/transaksi/index', $data);
		// $this->load->view('frond/templates/footer');
	}

	public function profil()
	{
		is_logged_in_user();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		// var_dump($data['pesanan']);
		// die();
		// $this->load->view('frond/templates/header');
		// $this->load->view('frond/templates/navbar', $data);
		$this->load->view('frond/profile/index', $data);
		// $this->load->view('frond/templates/footer');
	}

	public function edit_profile()
	{
		is_logged_in_user();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$address = $this->input->post('address');

		// cek jika ada gambar yg diupload
		$upload_image = $_FILES['image']['name'];
		if ($upload_image) {
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '10000';
			$config['upload_path'] = './assets/img/profile/';

			$this->load->library('upload', $config);


			if ($this->upload->do_upload('image')) {
				$old_image = $data['user']['image'];
				if ($old_image != 'default.jpg') {
					unlink(FCPATH . 'assets/img/profile/' . $old_image);
				}
				$new_image = $this->upload->data('file_name');
				$this->db->set('image', $new_image);
			} else {
				echo $this->upload->display_errors();
			}
		}

		$this->db->set('name', $name);
		$this->db->set('email', $email);
		$this->db->set('phone', $phone);
		$this->db->set('address', $address);
		$this->db->where('id', $data['user']['id']);
		$this->db->update('user');

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Edit Profile Success !
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  </div>');
		redirect('home_f/profil');
	}


	public function changePassword()
	{

		// $this->load->view('welcome_message');
		$data['title'] = 'Change Password';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$current_password = $this->input->post('current_password');
		$new_password = $this->input->post('new_password1');
		if ($current_password == $new_password) {
			$this->session->set_flashdata('message', '
				<div class="alert alert-danger" role="alert">
				  New Password Cannot Be The Same As Current Password
				</div>
				');
				redirect('home_f/profil');
		} else {
			$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

			$this->db->set('password', $password_hash);
			$this->db->where('email', $this->session->userdata('email'));
			$this->db->update('user');

			$this->session->set_flashdata('message', '
				<div class="alert alert-success" role="alert">
				  Password Changed
				</div>
				');
			redirect('home_f/profil');
		}
	}
}
