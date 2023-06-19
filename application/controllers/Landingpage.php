<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landingpage extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Satu_untuk_semua');
		
	}

	// View //

	public function index()
	{
		$data['section1'] = $this->Satu_untuk_semua->get_data('section1')->result();
		$data['section2'] = $this->Satu_untuk_semua->get_data('section2')->result();
		$data['section2_subteks'] = $this->Satu_untuk_semua->get_data('section2_subteks')->result();
		$data['section2_subteks2'] = $this->Satu_untuk_semua->get_data('section2_subteks2')->result();
		$data['section3'] = $this->Satu_untuk_semua->get_data('section3')->result();
		$data['section3_items'] = $this->Satu_untuk_semua->get_data('section3_items')->result();
		$data['section4'] = $this->Satu_untuk_semua->get_data('section4')->result();
		$data['section4_card'] = $this->Satu_untuk_semua->get_data('section4_card')->result();
		$data['section5'] = $this->Satu_untuk_semua->get_data('section5')->result();
		$data['section5_testimoni'] = $this->Satu_untuk_semua->get_data('section5_testimoni')->result();
		$data['section6'] = $this->Satu_untuk_semua->get_data('section6')->result();
		$data['wa'] = $this->Satu_untuk_semua->get_data('wa')->result();
		$this->load->view('V_landingpage', $data);
		
	}

}