<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section4 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Satu_untuk_semua');
		if(!$this->session->userdata('email')){
			redirect('Loginpage');
		}
	}

    // rules
	public function _rules()
	{
        $this->form_validation->set_rules('judul', 'Judul', 'required', array(
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('isi', 'Isi', 'required', array(
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('logo', 'Logo', 'required', array(
			'required' => '%s harus diisi !!'
		));

	}
	public function _rules2()
	{
        $this->form_validation->set_rules('judul', 'Judul', 'required', array(
			'required' => '%s harus diisi !!'
		));

	}

    

    ////////////////////////////// View //////////////////////////////////////
	public function index()
	{
		$data['section4'] = $this->Satu_untuk_semua->get_data('section4')->result();
		$data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('template/Header', $data);
		$this->load->view('backend/Section4_be', $data);
		$this->load->view('template/Footer');
	}

    public function card()
	{
		$data['section4_card'] = $this->Satu_untuk_semua->get_data('section4_card')->result();
		$data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('template/Header', $data);
		$this->load->view('backend/Section4_card_be', $data);
		$this->load->view('template/Footer');
	}

    //////////////////////////////////////////////////////////////////////////////

    // Fungsi untuk section 4 //
	 // edit //
	 public function edit_data_st4($id_st4)
	 {
		 $this->_rules2();
		 if ($this->form_validation->run() == FALSE) {
			 $this->index();
		 } else {
			 $data = array(
				 'id_st4' => $id_st4,
				 'judul' => $this->input->post('judul'),
			 );
			 $this->Satu_untuk_semua->update_data_st4($data, 'section4');
			 $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			 <strong>Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			 <span aria-hidden="true">&times;</span></button></div>');
			 redirect('Section4/');
		 }
	 }
	 
 
	 // delete //
	 public function delete_st4($id_st4)
	 {
		 $where = array('id_st4' => $id_st4);
		 $this->Satu_untuk_semua->delete($where, 'section4');
			 $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			 <strong>Data berhasil di hapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			 <span aria-hidden="true">&times;</span></button></div>');
			 redirect('Section4/');
	 }

	 // tambah //
	 public function tambah_data_st4()
	 {
		 $this->_rules2();
		 if ($this->form_validation->run() == FALSE) {
			 $this->index();
		 } else {
			 $data = array(
				 'judul' => $this->input->post('judul'),
			 );
			 $this->Satu_untuk_semua->insert_data($data, 'section4');
			 $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			 <strong>Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			 <span aria-hidden="true">&times;</span></button></div>');
			 redirect('Section4');
		 }
	 }

	 //////////////////////////////////////////////////////////////////////////////

    // Fungsi untuk section 4 bagian card //

	// edit //
	public function edit_data_card($id_card)
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'id_card' => $id_card,
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
				'logo' => $this->input->post('logo'),
			);
			$this->Satu_untuk_semua->update_data_card($data, 'section4_card');
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Section4/card');
		}
	}
	

	// delete //
	public function delete_card($id_card)
	{
		$where = array('id_card' => $id_card);
		$this->Satu_untuk_semua->delete($where, 'section4_card');
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil di hapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Section4/card');
	}

	// tambah //
	public function tambah_data_card()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
				'logo' => $this->input->post('logo'),
			);
			$this->Satu_untuk_semua->insert_data($data, 'section4_card');
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Section4/card');
		}
	}

}


