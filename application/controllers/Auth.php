<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Satu_untuk_semua');
		
	}

	// View //

	public function index()
	{
		$data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/Header', $data);
		$this->load->view('Index', $data);
		$this->load->view('template/Footer');
		
	}

}