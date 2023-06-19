<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Popup extends CI_Controller
{
	public function  __construct()
	{
		parent::__construct();
		$this->load->model('Satu_untuk_semua');
		if(!$this->session->userdata('email')){
			redirect('Loginpage');
		}
		
	}
	public function _rules()
	{
		$this->form_validation->set_rules('judul', 'judul', 'required', array(
			'required' => '%s harus disub_judul !!'
		));
		$this->form_validation->set_rules('sub_judul', 'sub_judul', 'required', array(
			'required' => '%s harus disub_judul !!'
		));
		$this->form_validation->set_rules('sub_teks', 'sub_teks', 'required', array(
			'required' => '%s harus disub_judul !!'
		));
		$this->form_validation->set_rules('nama_wa', 'nama_wa', 'required', array(
			'required' => '%s harus disub_judul !!'
		));
        $this->form_validation->set_rules('link_wa', 'link_wa', 'required', array(
			'required' => '%s harus disub_judul !!'
		));
	
	}

	public function index()
	{
		$data['wa'] = $this->Satu_untuk_semua->get_data('wa')->result();
		$data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('template/Header', $data);
		$this->load->view('backend/Popup_wa', $data);
		$this->load->view('template/Footer');
	}
	public function edit_data_wa($id_wa)
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$old_filename = $this->input->post('gambar_lama');
			$new_filename = $_FILES['img']['name'];
			if ($new_filename == TRUE) {
				$update_filename = 'auth' . "_" . str_replace(' ', '-', $_FILES['img']['name']);
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
                'sub_teks' => $this->input->post('sub_teks'),
                'nama_wa' => $this->input->post('nama_wa'),
                'link_wa' => $this->input->post('link_wa'),
				'img' => $img,
			);
			$this->Satu_untuk_semua->update_data_wa($data, 'wa', $id_wa);
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');
			redirect('Popup');
		}
	}

	public function delete_data_wa($id_wa)
	{
		$wa = new Satu_untuk_semua;
		if ($wa->cek_data_wa($id_wa)); {
			$data = $wa->cek_data_wa($id_wa);
			if (file_exists("./assets/img/" . $data->img)) {
				unlink("./assets/img/" . $data->img);
			}
			$wa->delete_wa($id_wa);
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil di hapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Popup');
		}
	}


	public function tambah_data_wa()
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
					$this->load->view('nama_view', $imgerror);
					$this->load->view('template/Footer');
				}
				else
				{
					$img = $this->upload->data('file_name');
					$data = array(
                        
                        'judul' => $this->input->post('judul'),
				        'sub_judul' => $this->input->post('sub_judul'),
                        'sub_teks' => $this->input->post('sub_teks'),
                        'nama_wa' => $this->input->post('nama_wa'),
                        'link_wa' => $this->input->post('link_wa'),
						'img' => $img,
					);
					$this->Satu_untuk_semua->insert_data($data, 'wa');
					$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button></div>');
					redirect('Popup');
				}
	
			}
			
		}
}