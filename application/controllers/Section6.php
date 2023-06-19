<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section6 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Satu_untuk_semua');
		if(!$this->session->userdata('email')){
			redirect('Loginpage');
		}
	}

	// Rules //
	public function _rules()
	{
		$this->form_validation->set_rules('judul', 'Judul', 'required', array(
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('sub_judul', 'Sub_judul', 'required', array(
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('button', 'Button', 'required', array(
			'required' => '%s harus diisi !!'
		));
	
	}

	// View //

	public function index()
	{
		$data['section6'] = $this->Satu_untuk_semua->get_data('section6')->result();
		$data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('template/Header', $data);
		$this->load->view('backend/Section6_be', $data);
		$this->load->view('template/Footer');
	}

	/////////////////////////////////////////////////////////////

	// Fungsi edit // 
	public function edit_data_st6($id_st6)
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$old_filename = $this->input->post('gambar_lama');
			$new_filename = $_FILES['img']['name'];
			if ($new_filename == TRUE) {
				$update_filename = 'st6' . "_" . str_replace(' ', '-', $_FILES['img']['name']);
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
				'sub_judul' => $this->input->post('sub_judul'),
				'button' => $this->input->post('button'),
				'img' => $img,
			);
			$this->Satu_untuk_semua->update_data_st6($data, 'section6', $id_st6);
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');
			redirect('Section6');
		}
	}

	public function delete_st6 ($id_st6)
	{
		$section6 = new Satu_untuk_semua;
		if ($section6->cek_data_st6($id_st6)); {
			$data = $section6->cek_data_st6($id_st6);
			if (file_exists("./assets/img/" . $data->img)) {
				unlink("./assets/img/" . $data->img);
			}
			$section6->delete_data_st6($id_st6);
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil di hapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Section6');
		}
	}
	// ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// // 


	// Fungsi tambah data //
	public function tambah_data_st6()
	{
		$this->_rules();
		if  ($this->form_validation->run() == FALSE){
			$this->index();
		} else {
			$ori_filename = $_FILES['img']['name'];
			$new_name ="img"."_".str_replace('','-',$ori_filename);
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
					$this->load->view('backend/section6_be', $imgerror);
					$this->load->view('template/Footer');
				}
				else
				{
					$img = $this->upload->data('file_name');
					$data = array(
                        
                        'judul' => $this->input->post('judul'),
						'sub_judul' => $this->input->post('sub_judul'),
						'button' => $this->input->post('button'),
						'img' => $img,
					);
					$this->Satu_untuk_semua->insert_data($data, 'section6');
					$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button></div>');
					redirect('Section6');
				}
	
			}
			
		}
}
