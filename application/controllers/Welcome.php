<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data['dashboard'] = $this->db->get_where('dashboard')->row_array();

		$this->load->view('welcome/welcome', $data);
	}
}
