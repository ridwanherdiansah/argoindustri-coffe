<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_Suplier');
		$this->load->model('Cetak_Model');
	}


public function dashboard()
	{
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$id_pengepul = $data['admin']['id_pengepul'];

		$data['transaksi'] = $this->M_Suplier->getk_transaksi($id_pengepul);
		$data['user'] = $this->db->get_where('user')->num_rows();
		$data['petani'] = $this->db->get_where('petani')->num_rows();
		$data['kopi'] = $this->db->get_where('kopi')->num_rows();

		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/sidebar', $data);
		$this->load->view('template/admin/topbar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('template/admin/footer', $data);
	}

public function profile()
	{
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/sidebar', $data);
		$this->load->view('template/admin/topbar', $data);
		$this->load->view('admin/profile', $data);
		$this->load->view('template/admin/footer', $data);
	}

public function e_profile($id_pengepul)
	{
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

			$admin = [
					'nama' 		=> $this->input->post('nama'),
					'alamat' 	=> $this->input->post('alamat'),
					'provinsi' 	=> $this->input->post('provinsi'),
					'kota' 		=> $this->input->post('kota')
				];

			//cek jika ada gambar yang di upload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) 
			{
				$config['allowed_types']	='gif|jpg|png';
				$config['max_size']			='2048';
				$config['upload_path']		='./assets/admin/img/profile/';

				$this->load->library('upload',$config);

				if($this->upload->do_upload('image')){
					$old_image = $data['admin']['image'];
					if($old_image != 'default.jpg'){
						unlink(FCPATH . 'assets/admin/img/profile/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image',$new_image);

				}else{
					echo $this->upload->dispay_errors();
				}
			}

			$this->db->set('id_pengepul', $this->input->post('id_pengepul'));
			$this->db->where('id_pengepul', $this->input->post('id_pengepul'));
			$this->db->update('admin', $admin);

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30" role="alert"><span class="close" data-dismiss="alert"></span><center>Data berhasil di update</center></div>');
				redirect('admin/profile');		
		}


public function header()
	{
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['dashboard'] = $this->db->get('dashboard')->row_array();

		$this->form_validation->set_rules('title','Title','required|trim');
		$this->form_validation->set_rules('sub_title','Full Name','required|trim');

		if(	$this->form_validation->run() == false) {
			$this->load->view('template/admin/header');
			$this->load->view('template/admin/sidebar');
			$this->load->view('template/admin/topbar', $data);
			$this->load->view('admin/header', $data);
			$this->load->view('template/admin/footer'); 
		}else{
			$data = 
			[
				'id'	 				=> $this->input->post('id'),
				'title'					=> $this->input->post('title'),
				'sub_title'				=> $this->input->post('sub_title'),
			];

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('dashboard',$data);
			$this->session->set_flashdata('message','
				<div class="alert alert-success" role="alert">
				  <h4 class="alert-heading">Berhasil !!!</h4>
				  <p>Anda sudah memperbarui Header</p>
				  <hr>
				  <p class="mb-0">keep working and dont forget to take a shower</p>
				</div>');
			redirect('admin/header');
		}
	}

public function about()
	{
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['dashboard'] = $this->db->get('dashboard')->row_array();

		$this->form_validation->set_rules('title_2','Title','required|trim');
		$this->form_validation->set_rules('deskripsi_2','Full Name','required|trim');

		if(	$this->form_validation->run() == false) {
			$this->load->view('template/admin/header');
			$this->load->view('template/admin/sidebar');
			$this->load->view('template/admin/topbar', $data);
			$this->load->view('admin/about', $data);
			$this->load->view('template/admin/footer'); 
		}else{
			$data = 
			[
				'id'	 				=> $this->input->post('id'),
				'title_2'					=> $this->input->post('title_2'),
				'deskripsi_2'				=> $this->input->post('deskripsi_2'),
			];

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('dashboard',$data);
			$this->session->set_flashdata('message','
				<div class="alert alert-success" role="alert">
				  <h4 class="alert-heading">Berhasil !!!</h4>
				  <p>Anda sudah memperbarui About</p>
				  <hr>
				  <p class="mb-0">keep working and dont forget to take a shower</p>
				</div>');
			redirect('admin/about');
		}
	}

public function content_1()
	{		
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['dashboard'] = $this->db->get('dashboard')->row_array();

		$this->form_validation->set_rules('title_3','Title','required|trim');
		$this->form_validation->set_rules('deskripsi_3','Deskripsi','required|trim');
		
		if($this->form_validation->run() == false) {
			$this->load->view('template/admin/header');
			$this->load->view('template/admin/sidebar');
			$this->load->view('template/admin/topbar', $data);
			$this->load->view('admin/content_1', $data);
			$this->load->view('template/admin/footer'); 
		}else{

			$data = [
            	'title_3'		=> $this->input->post('title_3'),
				'deskripsi_3' 	=> $this->input->post('deskripsi_3'),
        	];

			//cek jika ada gambar yang di upload
			$upload_image = $_FILES['image_3']['name'];

			if ($upload_image) 
			{
				$config['allowed_types']	='gif|jpg|png';
				$config['max_size']			='2048';
				$config['upload_path']		='./assets/admin/img/frontend/';

				$this->load->library('upload',$config);

				if($this->upload->do_upload('image_3')){
					$dashboard= $this->db->get_where('dashboard', ['id' => $this->input->post('id')])->row_array();
					$old_image = $dashboard['image_3'];
					if($old_image != 'default.jpg'){
						unlink(FCPATH . 'assets/admin/img/frontend/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image_3',$new_image);

				}else{
					echo $this->upload->dispay_errors();
				}
			}

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('dashboard',$data);
			$this->session->set_flashdata('message','
				<div class="alert alert-success" role="alert">
				  <h4 class="alert-heading">Berhasil !!!</h4>
				  <p>Anda sudah memperbarui conten 1</p>
				  <hr>
				  <p class="mb-0">keep working and dont forget to take a shower</p>
				</div>');
			redirect('admin/content_1');			
		}
	}

public function content_2()
	{		
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['dashboard'] = $this->db->get('dashboard')->row_array();

		$this->form_validation->set_rules('title_4','Title','required|trim');
		$this->form_validation->set_rules('deskripsi_4','Deskripsi','required|trim');
		
		if($this->form_validation->run() == false) {
			$this->load->view('template/admin/header');
			$this->load->view('template/admin/sidebar');
			$this->load->view('template/admin/topbar', $data);
			$this->load->view('admin/content_2', $data);
			$this->load->view('template/admin/footer'); 
		}else{

			$data = [
            	'title_4'		=> $this->input->post('title_4'),
				'deskripsi_4' 	=> $this->input->post('deskripsi_4'),
        	];

			//cek jika ada gambar yang di upload
			$upload_image = $_FILES['image_4']['name'];

			if ($upload_image) 
			{
				$config['allowed_types']	='gif|jpg|png';
				$config['max_size']			='2048';
				$config['upload_path']		='./assets/admin/img/frontend/';

				$this->load->library('upload',$config);

				if($this->upload->do_upload('image_4')){
					$dashboard= $this->db->get_where('dashboard', ['id' => $this->input->post('id')])->row_array();
					$old_image = $dashboard['image_4'];
					if($old_image != 'default.jpg'){
						unlink(FCPATH . 'assets/admin/img/frontend/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image_4',$new_image);

				}else{
					echo $this->upload->dispay_errors();
				}
			}

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('dashboard',$data);
			$this->session->set_flashdata('message','
				<div class="alert alert-success" role="alert">
				  <h4 class="alert-heading">Berhasil !!!</h4>
				  <p>Anda sudah memperbarui conten 2</p>
				  <hr>
				  <p class="mb-0">keep working and dont forget to take a shower</p>
				</div>');
			redirect('admin/content_2');			
		}
	}

public function content_3()
	{		
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['dashboard'] = $this->db->get('dashboard')->row_array();

		$this->form_validation->set_rules('title_5','Title','required|trim');
		$this->form_validation->set_rules('deskripsi_5','Deskripsi','required|trim');
		
		if($this->form_validation->run() == false) {
			$this->load->view('template/admin/header');
			$this->load->view('template/admin/sidebar');
			$this->load->view('template/admin/topbar', $data);
			$this->load->view('admin/content_3', $data);
			$this->load->view('template/admin/footer'); 
		}else{

			$data = [
            	'title_5'		=> $this->input->post('title_5'),
				'deskripsi_5' 	=> $this->input->post('deskripsi_5'),
        	];

			//cek jika ada gambar yang di upload
			$upload_image = $_FILES['image_5']['name'];

			if ($upload_image) 
			{
				$config['allowed_types']	='gif|jpg|png';
				$config['max_size']			='2048';
				$config['upload_path']		='./assets/admin/img/frontend/';

				$this->load->library('upload',$config);

				if($this->upload->do_upload('image_5')){
					$dashboard= $this->db->get_where('dashboard', ['id' => $this->input->post('id')])->row_array();
					$old_image = $dashboard['image_5'];
					if($old_image != 'default.jpg'){
						unlink(FCPATH . 'assets/admin/img/frontend/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image_5',$new_image);

				}else{
					echo $this->upload->dispay_errors();
				}
			}

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('dashboard',$data);
			$this->session->set_flashdata('message','
				<div class="alert alert-success" role="alert">
				  <h4 class="alert-heading">Berhasil !!!</h4>
				  <p>Anda sudah memperbarui conten 2</p>
				  <hr>
				  <p class="mb-0">keep working and dont forget to take a shower</p>
				</div>');
			redirect('admin/content_3');			
		}
	}

public function contack()
	{
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['dashboard'] = $this->db->get('dashboard')->row_array();

		$this->form_validation->set_rules('title_6','Title','required|trim');
		$this->form_validation->set_rules('deskripsi_6','Deskripsi','required|trim');
		$this->form_validation->set_rules('alamat','Alamat','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim');
		$this->form_validation->set_rules('telepon','Telepon','required|trim');
		$this->form_validation->set_rules('facebook','Facebook','required|trim');
		$this->form_validation->set_rules('youtube','Youtube','required|trim');

		if(	$this->form_validation->run() == false) {
			$this->load->view('template/admin/header');
			$this->load->view('template/admin/sidebar');
			$this->load->view('template/admin/topbar', $data);
			$this->load->view('admin/contack', $data);
			$this->load->view('template/admin/footer'); 
		}else{
			$data = 
			[
				'title_6'				=> $this->input->post('title_6'),
				'deskripsi_6'			=> $this->input->post('deskripsi_6'),
				'alamat'	 			=> $this->input->post('alamat'),
				'email'					=> $this->input->post('email'),
				'telepon'				=> $this->input->post('telepon'),
				'facebook'	 			=> $this->input->post('facebook'),
				'whatsap'	 			=> $this->input->post('whatsap'),
				'youtube'				=> $this->input->post('youtube')
			];

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('dashboard',$data);
			$this->session->set_flashdata('message','
				<div class="alert alert-success" role="alert">
				  <h4 class="alert-heading">Berhasil !!!</h4>
				  <p>Anda sudah memperbarui Contack</p>
				  <hr>
				  <p class="mb-0">keep working and dont forget to take a shower</p>
				</div>');
			redirect('admin/contack');
		}
	}

public function transaksi()
	{
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$id_pengepul = $data['admin']['id_pengepul'];

		$data['transaksi'] = $this->M_Suplier->getk_transaksi($id_pengepul);

		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/sidebar', $data);
		$this->load->view('template/admin/topbar', $data);
		$this->load->view('transaksi/transaksi', $data);
		$this->load->view('template/admin/footer', $data);
	}

public function detail_transaksi($id_transaksi)
	{
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$id_pengepul = $data['admin']['id_pengepul'];

		$data['k_transaksi'] = $this->db->get_where('k_transaksi', ['id_transaksi' => $id_transaksi])->row_array();

		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/sidebar', $data);
		$this->load->view('template/admin/topbar', $data);
		$this->load->view('transaksi/d_transaksi', $data);
		$this->load->view('template/admin/footer', $data);
	}

public function cetak_transaksi()
	{
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$id_pengepul = $data['admin']['id_pengepul'];

		$data['transaksi'] = $this->M_Suplier->cetak_transaksi();

		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/sidebar', $data);
		$this->load->view('template/admin/topbar', $data);
		$this->load->view('transaksi/cetak_transaksi', $data);
		$this->load->view('template/admin/footer', $data);

	}

public function Pemasukan()
	{
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$id_pengepul = $data['admin']['id_pengepul'];
		$data['pemasukan'] = $this->db->get_where('pemasukan', ['id_pengepul' => $id_pengepul])->result_array();
		
		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/sidebar', $data);
		$this->load->view('template/admin/topbar', $data);
		$this->load->view('admin/pemasukan', $data);
		$this->load->view('template/admin/footer', $data);
	}

public function l_pemasukan($id)
	{
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['pemasukan'] = $this->M_Suplier->getl_pemasukan($id);

		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/sidebar', $data);
		$this->load->view('template/admin/topbar', $data);
		$this->load->view('admin/l_pemasukan', $data);
		$this->load->view('template/admin/footer', $data);
	}

public function pengeluaran()
	{
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$id_pengepul = $data['admin']['id_pengepul'];
		$data['pengeluaran'] = $this->M_Suplier->get_pengeluaran_pengepul($id_pengepul);

		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/sidebar', $data);
		$this->load->view('template/admin/topbar', $data);
		$this->load->view('admin/pengeluaran', $data);
		$this->load->view('template/admin/footer', $data);
	}

public function cetak_pemasukan($id_pengepul)
	{
		$data = $this->Cetak_Model->cetak_pemasukan($id_pengepul);
		// $this->library->printr($data);
		$data = array('data' => $data, );
		$this->load->view('cetak/cetak_pemasukan', $data);
	}

public function cetak_transaksi2($id_pengepul)
	{
		if ($id_kopi = $this->input->post('id_kopi')) {
			$data = $this->Cetak_Model->cetak_transaksi2($id_pengepul);
			// $this->library->printr($data);
			$data = array('data' => $data, );
			$this->load->view('cetak/cetak_transaksi', $data);
		}else{
			$data = $this->Cetak_Model->cetak_transaksi2_semua($id_pengepul);
			// $this->library->printr($data);
			$data = array('data' => $data, );
			$this->load->view('cetak/cetak_transaksi', $data);
		}
		
	}


}


// $this->library->printr($kopi);