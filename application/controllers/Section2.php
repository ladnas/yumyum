<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section2 extends CI_Controller {

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
	}

	public function _rules2()
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

    ////////////////////////////// View //////////////////////////////////////
	public function index()
	{
		$data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['section2'] = $this->Satu_untuk_semua->get_data('section2')->result();
		$this->load->view('template/Header' , $data) ;
		$this->load->view('backend/Section2_be', $data);
		$this->load->view('template/Footer');
	}

    public function subteks()
	{
		$data['section2_subteks'] = $this->Satu_untuk_semua->get_data('section2_subteks')->result();
		$data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('template/Header', $data);
		$this->load->view('backend/Section2_subteks_be', $data);
		$this->load->view('template/Footer');
	}

	public function subteks2()
	{
		$data['section2_subteks2'] = $this->Satu_untuk_semua->get_data('section2_subteks2')->result();
		$data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('template/Header', $data);
		$this->load->view('backend/Section2_subteks_be2', $data);
		$this->load->view('template/Footer');
	}

    //////////////////////////////////////////////////////////////////////////////

    // Fungsi untuk section 2 //
	public function edit_data_st2($id_st2)
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$old_filename = $this->input->post('gambar_lama');
			$new_filename = $_FILES['img']['name'];
			if ($new_filename == TRUE) {
				$update_filename = 'st2' . "_" . str_replace(' ', '-', $_FILES['img']['name']);
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
				'img' => $img,
			);
			$this->Satu_untuk_semua->update_data_st2($data, 'section2', $id_st2);
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');
			redirect('Section2');
		}
	}

	public function delete_data_st2($id_st2)
	{
		$section2 = new Satu_untuk_semua;
		if ($section2->cek_data_st2($id_st2)); {
			$data = $section2->cek_data_st2($id_st2);
			if (file_exists("./assets/img/" . $data->img)) {
				unlink("./assets/img/" . $data->img);
			}
			$section2->delete_st2($id_st2);
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil di hapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Section2');
		}
	}


	public function tambah_data_st2()
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
					$this->load->view('backend/Section2_be', $imgerror);
					$this->load->view('template/Footer');
				}
				else
				{
					$img = $this->upload->data('file_name');
					$data = array(
                        
                        'judul' => $this->input->post('judul'),
						'img' => $img,
					);
					$this->Satu_untuk_semua->insert_data($data, 'section2');
					$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button></div>');
					redirect('Section2');
				}
	
			}
			
		}


    // Fungsi untuk section 2 bagian sub teks//

    // tambah //
    public function tambah_subteks()
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
			$this->Satu_untuk_semua->insert_data($data, 'section2_subteks');
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Section2/subteks/');
		}
	}

    // edit //
    public function edit_subteks($id_sub)
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'id_sub' => $id_sub,
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi'),
				'logo' => $this->input->post('logo'),
			);
			$this->Satu_untuk_semua->update_data_subteks($data, 'section2_subteks');
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Section2/subteks/');
		}
	}
    

    // delete //
    public function delete_subteks($id_sub)
	{
		$where = array('id_sub' => $id_sub);
		$this->Satu_untuk_semua->delete($where, 'section2_subteks');
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil di hapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Section2/subteks');
	}

	// Fungsi untuk section 2 bagian sub teks bag 2//

    // tambah //
    public function tambah_subteks2()
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
			$this->Satu_untuk_semua->insert_data($data, 'section2_subteks2');
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Section2/subteks2/');
		}
	}

    // edit //
    public function edit_subteks2($id_sub2)
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$data = array(
				'id_sub2' => $id_sub2,
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi'),
				'logo' => $this->input->post('logo'),
			);
			$this->Satu_untuk_semua->update_data_subteks2($data, 'section2_subteks2');
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Section2/subteks2/');
		}
	}
    

    // delete //
    public function delete_subteks2($id_sub2)
	{
		$where = array('id_sub2' => $id_sub2);
		$this->Satu_untuk_semua->delete($where, 'section2_subteks2');
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<strong>Data berhasil di hapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Section2/subteks2');
	}
}


