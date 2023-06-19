<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginpage extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['tittle'] = 'login page';
			$this->load->view('Loginview');
		} else {
			$this->_login();
		}
		
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		

		$users = $this->db->get_where('users', ['email' => $email])->row_array();

		//jika ada user
		if ($users) {
			//jika user aktif
			if ($users['is_active'] == 1) {
				// cek password
				if (password_verify($password, $users['password'])){
					$data = [
						'email' => $users['email'],
						'role_id' => $users['role_id']
					];
					$this->session->set_userdata($data);
					if ($users['role_id'] == 2) {
						redirect('Section1');
					} else {
						redirect('Loginpage');
					}
				} else{
					$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Wrong password!
					</div>');
						redirect('Loginpage');
				}
			} else {
				$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Sorry! This email has not been activated!
					</div>');
						redirect('Loginpage');
			}
		}
	}
    
	public function logout()
	{
        
	$this->session->unset_userdata('email');
	$this->session->unset_userdata('role_id');
	$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">You have been logged out! 
	</div>');
	redirect('Loginpage');
	}


    public function register()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
			'is_unique' => 'this email has already registered!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		

		if ($this->form_validation->run() == false) {	
			$data['tittle'] = 'Registration';
			$this->load->view('register');
		} else {
			$email = $this->input->post('email', true);
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'email' => htmlspecialchars($email),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time(),
			];
			$this->db->insert('users', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role=">Congratulation! Your account has been crated, Please actived
				</div>');
			redirect('Loginpage');
		}
	}
}
