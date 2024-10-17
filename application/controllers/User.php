<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_Suplier');
	}


public function profile($id_user)
	{
		$data['title'] = "Profile";
		$data['dashboard'] = $this->db->get_where('dashboard')->row_array();
		$data['user'] = $this->M_Suplier->get_user($id_user); 

		$this->load->view('template/penjualan/header', $data);
		$this->load->view('template/penjualan/topbar', $data);
		$this->load->view('template/penjualan/user_slider', $data);
		$this->load->view('user/profile', $data);
		$this->load->view('template/penjualan/footer', $data);
	}

public function p_profile($id_user)
	{
		$data['title'] = "Profile";
		$data['dashboard'] = $this->db->get_where('dashboard')->row_array();
		$data['user'] = $this->M_Suplier->get_user($id_user); 

		if ($this->input->post('password1')) {
			
			$this->form_validation->set_rules('password1', 'Pasword', 'required|trim|min_length[2]|matches[password2]', ['matches' => 'Pasword tidak sama!', 'min_length' => 'Pasword terlalu pendek!']);
			$this->form_validation->set_rules('password2', 'Pasword', 'required|trim|matches[password1]');

			if ($this->form_validation->run() == True) {
				
				$user = [
					'nama' 		=> $this->input->post('nama'),
					'password' 	=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            	];

				//cek jika ada gambar yang di upload
				$upload_image = $_FILES['image']['name'];

				if ($upload_image) 
				{
					$config['allowed_types']	='gif|jpg|png';
					$config['max_size']			='2048';
					$config['upload_path']		='./assets/user/profile/';

					$this->load->library('upload',$config);

					if($this->upload->do_upload('image')){
						$old_image = $data['user']['image'];
						if($old_image != 'default.jpg'){
							unlink(FCPATH . 'assets/user/profile/' . $old_image);
						}

						$new_image = $this->upload->data('file_name');
						$this->db->set('image',$new_image);

					}else{
						echo $this->upload->dispay_errors();
					}
				}

				$this->db->set('id_user',$id_user);
				$this->db->where('id_user', $id_user);
				$this->db->update('user', $user);

				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30" role="alert"><span class="close" data-dismiss="alert"></span><center>Data berhasil di update</center></div>');
					redirect('user/profile/'.$id_user);	

			}else{

				$this->load->view('template/penjualan/header', $data);
				$this->load->view('template/penjualan/topbar', $data);
				$this->load->view('template/penjualan/user_slider', $data);
				$this->load->view('user/profile', $data);
				$this->load->view('template/penjualan/footer', $data);
			}
		}else{

			$user = [
					'nama' 			=> $this->input->post('nama'),
            	];

			//cek jika ada gambar yang di upload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) 
			{
				$config['allowed_types']	='gif|jpg|png';
				$config['max_size']			='2048';
				$config['upload_path']		='./assets/user/profile/';

				$this->load->library('upload',$config);

				if($this->upload->do_upload('image')){
					$old_image = $data['user']['image'];
					if($old_image != 'default.jpg'){
						unlink(FCPATH . 'assets/user/profile/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image',$new_image);

				}else{
					echo $this->upload->dispay_errors();
				}
			}

			$this->db->set('id_user',$id_user);
			$this->db->where('id_user', $id_user);
			$this->db->update('user');

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30" role="alert"><span class="close" data-dismiss="alert"></span><center>Data berhasil di update</center></div>');
				redirect('user/profile/'.$id_user);		
		}
	}

public function alamat($id_user)
	{
		$data['title'] = "Alamat";
		$data['dashboard'] = $this->db->get_where('dashboard')->row_array();
		$data['user'] = $this->M_Suplier->get_user($id_user); 

		$this->load->view('template/penjualan/header', $data);
		$this->load->view('template/penjualan/topbar', $data);
		$this->load->view('template/penjualan/user_slider', $data);
		$this->load->view('user/alamat', $data);
		$this->load->view('template/penjualan/footer', $data);
	}

public function p_alamat($id_user)
	{
		$k_user = [
					'id_user'	=> $id_user,
					'alamat' 	=> $this->input->post('alamat'),
					'desa' 		=> $this->input->post('desa'),
					'kecamatan' => $this->input->post('kecamatan'),
					'kota' 		=> $this->input->post('kota'),
					'provinsi' 	=> $this->input->post('provinsi'),
					'kode_pos' 	=> $this->input->post('kode_pos')
				];
		
		// $this->library->printr($k_user);
		$this->db->where('id_user', $id_user);
		$this->db->update('k_user', $k_user);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30"><span class="close" data-dismiss="alert"></span><i class="fe-icon-award"></i>Alamat sudah di <i>Update</i></div>');
		redirect('user/alamat/'.$id_user);
	}

public function history($id_user)
	{
		$data['title'] = "History";
		$data['dashboard'] = $this->db->get_where('dashboard')->row_array();
		$data['user'] = $this->M_Suplier->get_user($id_user); 
		$data['transaksi'] = $this->db->get_where('transaksi', ['id_user' => $id_user])->result_array();

		$this->load->view('template/penjualan/header', $data);
		$this->load->view('template/penjualan/topbar', $data);
		$this->load->view('template/penjualan/user_slider', $data);
		$this->load->view('user/history', $data);
		$this->load->view('template/penjualan/footer', $data);
	}
}