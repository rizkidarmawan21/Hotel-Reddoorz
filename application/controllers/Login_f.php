<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_f extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}


		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {

			$data['judul'] = 'RedDoorz User | Login';
			$this->load->view('frond/auth/login', $data);
		} else {
			// ketika validasinya lolos
			$this->_login();
		}
	}

	private function _login()
	{
		$email  = $this->input->post('email');
		$password  = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		// jika usernya ada
		if ($user) {
			//jika usernya aktif 
			if ($user['is_active'] == 1) {

				if ($user['is_delete'] == 0) {

					// cek password
					if (password_verify($password, $user['password'])) {

						$data = [
							'email' => $user['email'],
							'role_id' => $user['role_id'],
							'is_login' => true
						];

						if ($user['role_id'] == 2) {
							$this->session->set_userdata($data);
							redirect('home_f');
						} else {
							$this->session->set_flashdata('message', '
						<div class="alert alert-danger" role="alert">
						You are not logged in as admin !
						</div>
						');
							redirect('login_f');
						}
					} else {
						$this->session->set_flashdata('message', '
					<div class="alert alert-danger" role="alert">
						This password is wrong!
						</div>
						');
						redirect('login_f');
					}
				}else {

					$this->session->set_flashdata('message', '
				<div class="alert alert-warning" role="alert">
				  Account is not registered ! 
				</div>
				');
					redirect('login_f');
				}
			} else {
				$this->session->set_flashdata('message', '
			<div class="alert alert-warning" role="alert">
 			 This email has not activated!. Please check your email.
			</div>
			');
				redirect('login_f');
			}
		} else {
			$this->session->set_flashdata('message', '
			<div class="alert alert-danger" role="alert">
 			 Email is not registered!
			</div>
			');
			redirect('login_f');
		}
	}

	public function registration()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'This email has already registered!'
		]);



		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Registration ';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('frond/auth/registration');
			$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email', true);

			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($email),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];


			// siapkan token berupa bilngan random
			// $token = base64_encode(random_bytes(32));
			// $user_token = [
			// 	'email'=>$email,
			// 	'token'=>$token,
			// 	'date_created'=> time()
			// ];


			$this->db->insert('user', $data);
			// $this->db->insert('user_token',$user_token);

			// $this->_sendEmail($token,'verify');

			$this->session->set_flashdata('message', '
			<div class="alert alert-success" role="alert">
 			 Congratulation! your account has been created. Please login again !</div>
			');
			redirect('login_f');
		}
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'writingtex@gmail.com',
			'smtp_pass' => 'sehatituindah',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->load->library('email', $config);

		$this->email->initialize($config);  //tambahkan baris ini
		$this->email->from('writingtex@gmail.com', 'Rizki Darmawan');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {

			$this->email->subject('Account Verification');
			$this->email->message('Klik link ini untuk mengaktivikasi akun anda: <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
		} else if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Klik link ini untuk mengganti akun anda : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {

				if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');

					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '
				<div class="alert alert-success" role="alert">
				 ' . $email . ' has been activated! Please login
				</div>
				');
					redirect('login_f');
				} else {
					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('message', '
				<div class="alert alert-danger" role="alert">
				 Account activation failed! Token expired
				</div>
				');
					redirect('login_f');
				}
			} else {
				$this->session->set_flashdata('message', '
				<div class="alert alert-danger" role="alert">
				 Account activation failed! Token invalid.
				</div>
				');
				redirect('login_f');
			}
		} else {
			$this->session->set_flashdata('message', '
			<div class="alert alert-danger" role="alert">
 			Account activation failed! Wrong email.
			</div>
			');
			redirect('login_f');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('is_login');

		$this->session->set_flashdata('message', '
			<div class="alert alert-success" role="alert">
 			 You has been logged out.
			</div>
			');
		redirect('home_f');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
		// echo "access blocked";
	}


	public function forgotPassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Forgot Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('frond/auth/forgot-password');
			$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email');
			$user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

			if ($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('user_token', $user_token);

				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('message', '
					<div class="alert alert-success" role="alert">
					Please check your email to reset your password!
					</div>
					');
				redirect('frond/auth/forgotpassword');
			} else {
				$this->session->set_flashdata('message', '
					<div class="alert alert-danger" role="alert">
					Your email is not registered or activated!
					</div>
					');
				redirect('frond/auth/forgotpassword');
			}
		}
	}

	public function resetPassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			} else {
				$this->session->set_flashdata('message', '
					<div class="alert alert-danger" role="alert">
					Reset password failed! Wrong token
					</div>
					');
				redirect('login_f');
			}
		} else {
			$this->session->set_flashdata('message', '
					<div class="alert alert-danger" role="alert">
					Reset password failed! Wrong email
					</div>
					');
			redirect('login_f');
		}
	}

	public function changePassword()
	{

		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');


		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Change Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/change-password');
			$this->load->view('templates/auth_footer');
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('message', '
					<div class="alert alert-success" role="alert">
					Password has been change! Please login.
					</div>
					');
			redirect('auth');
		}
	}
}