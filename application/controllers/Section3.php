<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section3 extends CI_Controller {

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
		$this->form_validation->set_rules('harga', 'Harga', 'required', array(
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('button', 'Button', 'required', array(
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('isi', 'Isi', 'required', array(
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
		$data['section3'] = $this->Satu_untuk_semua->get_data('section3')->result();
		$data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('template/Header', $data);
		$this->load->view('backend/Section3_be', $data);
		$this->load->view('template/Footer');
	}

    public function items()
	{
		$data['section3_items'] = $this->Satu_untuk_semua->get_data('section3_items')->result();
		$data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('template/Header', $data);
		$this->load->view('backend/Section3_items_be', $data);
		$this->load->view('template/Footer');
	}

    //////////////////////////////////////////////////////////////////////////////

    // Fungsi untuk section 3 //

    // tambah //
    public function tambah_data_st3()
	{
		$this->_rules2();
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
                'judul' => $this->input->post('judul'),
			);
			$this->Satu_untuk_semua->insert_data($data, 'section3');
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Section3');
		}
	}

    // edit //
    public function edit_data_st3($id_st3)
	{
		$this->_rules2();
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'id_st3' => $id_st3,
                'judul' => $this->input->post('judul'),
			);
			$this->Satu_untuk_semua->update_data_st3($data, 'Section3');
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Section3');
		}
	}
    

    // delete //
    public function delete_st3($id_st3)
	{
		$where = array('id_st3' => $id_st3);
		$this->Satu_untuk_semua->delete($where, 'Section3');
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil di hapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Section3');
	}

	//////////////////////////////////////////////////////////////////////////////

	// Section 3 //
	public function edit_data_item($id_item)
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$old_filename = $this->input->post('gambar_lama');
			$new_filename = $_FILES['img']['name'];
			if ($new_filename == TRUE) {
				$update_filename = 'item' . "_" . str_replace(' ', '-', $_FILES['img']['name']);
				$config = [
					'max_size' => '2048',
					'upload_path' => './assets/img/',
					'allowed_types' => 'png|jpg|jpeg',
					'file_name' => $update_filename,
				];
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('img')) {
					if (file_exists("./assets/img/" . $old_filename)) {
						unlink("./assets/img/" . $old_filename);
					}
				}
			} else {
				$update_filename = $old_filename;
			}
			$img = $update_filename;
			$data = array(
				
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi'),
				'button' => $this->input->post('button'),
				'harga' => $this->input->post('harga'),
				'img' => $img,
			);
			$this->Satu_untuk_semua->update_data_item($data, 'section3_items', $id_item);
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');
			redirect('Section3/items');
		}
	}

	public function delete_data_item($id_item)
	{
		$section3_items = new Satu_untuk_semua;
		if ($section3_items->cek_data_item($id_item)); {
			$data = $section3_items->cek_data_item($id_item);
			if (file_exists("./assets/img/" . $data->img)) {
				unlink("./assets/img/" . $data->img);
			}
			$section3_items->delete_item($id_item);
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil di hapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Section3/items');
		}
	}


	public function tambah_data_item()
	{
		$this->_rules();
		if  ($this->form_validation->run() == FALSE){
			$this->index();
		} else {
			$ori_filename = $_FILES['img']['name'];
			$new_name ="item"."_".str_replace('','-',$ori_filename);
			$config = [
				'max_size' => '2048',
				'upload_path' => './assets/img/',
				'allowed_types' => 'png|jpg|jpeg',
				'file_name' => $new_name,
			];
			$this->load->library('upload',$config);
			if ( ! $this->upload->do_upload('img'))
				{
					$imgerror = array('error' => $this->upload->display_errors());
					$this->load->view('template/Header');
					$this->load->view('backend/Section3_items_be', $imgerror);
					$this->load->view('template/Footer');
				}
				else
				{
					$img = $this->upload->data('file_name');
					$data = array(
                        
                        'judul' => $this->input->post('judul'),
                        'isi' => $this->input->post('isi'),
						'button' => $this->input->post('button'),
						'harga' => $this->input->post('harga'),
						'img' => $img,
					);
					$this->Satu_untuk_semua->insert_data($data, 'section3_items');
					$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button></div>');
					redirect('Section3/items');
				}
	
			}
			
		}

}


