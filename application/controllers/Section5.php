<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section5 extends CI_Controller {

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
	
		
		$this->form_validation->set_rules('isi_testi', 'Isi_testi', 'required', array(
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('nama_user', 'Nama_user', 'required', array(
			'required' => '%s harus diisi !!'
		));
	}

	public function _rules2()
	{
		$this->form_validation->set_rules('judul', 'Judul', 'required', array(
			'required' => '%s harus diisi !!'
		));
		$this->form_validation->set_rules('sub_judul', 'Sub_judul', 'required', array(
			'required' => '%s harus diisi !!'
		));
	}
    

    ////////////////////////////// View //////////////////////////////////////
	public function index()
	{
		$data['section5'] = $this->Satu_untuk_semua->get_data('section5')->result();
		$data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('template/Header', $data);
		$this->load->view('backend/Section5_be', $data);
		$this->load->view('template/Footer');
	}

    public function testimoni()
	{
		$data['section5_testimoni'] = $this->Satu_untuk_semua->get_data('section5_testimoni')->result();
		$data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('template/Header', $data);
		$this->load->view('backend/section5_testimoni_be', $data);
		$this->load->view('template/Footer');
	}

    //////////////////////////////////////////////////////////////////////////////

    // Fungsi untuk section 5 //
	 // edit //
	 public function edit_data_st5($id_st5)
	 {
		 $this->_rules2();
		 if ($this->form_validation->run() == FALSE) {
			 $this->index();
		 } else {
			 $data = array(
				 'id_st5' => $id_st5,
				 'judul' => $this->input->post('judul'),
				 'sub_judul' => $this->input->post('sub_judul'),
			 );
			 $this->Satu_untuk_semua->update_data_st5($data, 'section5');
			 $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			 <strong>Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			 <span aria-hidden="true">&times;</span></button></div>');
			 redirect('Section5/');
		 }
	 }
	 
 
	 // delete //
	 public function delete_st5($id_st5)
	 {
		 $where = array('id_st5' => $id_st5);
		 $this->Satu_untuk_semua->delete($where, 'section5');
			 $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			 <strong>Data berhasil di hapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			 <span aria-hidden="true">&times;</span></button></div>');
			 redirect('Section5/');
	 }

	 // tambah //
	 public function tambah_data_st5()
	 {
		 $this->_rules2();
		 if ($this->form_validation->run() == FALSE) {
			 $this->index();
		 } else {
			 $data = array(
				 'judul' => $this->input->post('judul'),
				 'sub_judul' => $this->input->post('sub_judul'),
			 );
			 $this->Satu_untuk_semua->insert_data($data, 'section5');
			 $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			 <strong>Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			 <span aria-hidden="true">&times;</span></button></div>');
			 redirect('Section5');
		 }
	 }

	 //////////////////////////////////////////////////////////////////////////////


	 // section 5 testimoni //
	 public function edit_data_testi($id_testi)
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$old_filename = $this->input->post('gambar_lama');
			$new_filename = $_FILES['img']['name'];
			if ($new_filename == TRUE) {
				$update_filename = 'st5' . "_" . str_replace(' ', '-', $_FILES['img']['name']);
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
				
				'isi_testi' => $this->input->post('isi_testi'),
				'nama_user' => $this->input->post('nama_user'),
				'img' => $img,
			);
			$this->Satu_untuk_semua->update_data_testi($data, 'section5_testimoni', $id_testi);
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');
			redirect('Section5/testimoni');
		}
	}

	public function delete_data_testi($id_testi)
	{
		$section5_testimoni = new Satu_untuk_semua;
		if ($section5_testimoni->cek_data_testi($id_testi)); {
			$data = $section5_testimoni->cek_data_testi($id_testi);
			if (file_exists("./assets/img/" . $data->img)) {
				unlink("./assets/img/" . $data->img);
			}
			$section5_testimoni->delete_data_testi($id_testi);
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil di hapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Section5/testimoni');
		}
	}


	public function tambah_data_testi()
	{
		$this->_rules();
		if  ($this->form_validation->run() == FALSE){
			$this->index();
		} else {
			$ori_filename = $_FILES['img']['name'];
			$new_name ="testi"."_".str_replace('','-',$ori_filename);
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
					$this->load->view('backend/Section5_testimoni_be', $imgerror);
					$this->load->view('template/Footer');
				}
				else
				{
					$img = $this->upload->data('file_name');
					$data = array(
                        
                        'nama_user' => $this->input->post('nama_user'),
                        'isi_testi' => $this->input->post('isi_testi'),
						'img' => $img,
					);
					$this->Satu_untuk_semua->insert_data($data, 'section5_testimoni');
					$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button></div>');
					redirect('Section5/testimoni');
				}
	
			}
			
		}

}


