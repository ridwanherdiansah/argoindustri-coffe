<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suplier extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_Suplier');
		$this->load->model('Cetak_Model');
	}

public function Petani()
	{
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$id_pengepul = $data['admin']['id_pengepul'];
		$data['petani'] = $this->M_Suplier->getk_petani($id_pengepul); 

		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/sidebar', $data);
		$this->load->view('template/admin/topbar', $data);
		$this->load->view('suplier/petani', $data);
		$this->load->view('template/admin/footer', $data);
	}

public function t_Petani()
	{
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['petani'] = $this->M_Suplier->getpetani(); 

		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/sidebar', $data);
		$this->load->view('template/admin/topbar', $data);
		$this->load->view('suplier/t_petani', $data);
		$this->load->view('template/admin/footer', $data);
	}

public function p_petani()
	{
		$admin = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

		$config['allowed_types']	='gif|jpg|png';
		$config['max_size']			='2048';
		$config['upload_path']		='./assets/admin/img/suplier/';
		$config['file_name']		= $_FILES['image']['name'];

		$this->load->library('upload',$config);

			 if ( ! $this->upload->do_upload('image'))
            {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('upload_form', $error);
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());

                $petani = [
                	'id_petani'		=> $this->input->post('id_petani'),
                	'id_pengepul'	=> $admin['id_pengepul'],
					'nama' 			=> $this->input->post('nama'),
                	];
                $this->db->insert('petani', $petani);
				
				$k_petani = [
					'id_petani'		=> $this->input->post('id_petani'),
					'nama' 			=> $this->input->post('nama'),
					'tempat_lahir' 	=> $this->input->post('tempat_lahir'),
					'tanggal_lahir' => $this->input->post('tanggal_lahir'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'alamat' 		=> $this->input->post('alamat'),
					'desa' 			=> $this->input->post('desa'),
					'kecamatan' 	=> $this->input->post('kecamatan'),
					'kota' 			=> $this->input->post('kota'),
					'email' 		=> $this->input->post('email'),
					'telepon' 		=> $this->input->post('telepon'),
					'image' 		=> $config['file_name']
				];
				$this->db->insert('k_petani', $k_petani);

				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30" role="alert"><span class="close" data-dismiss="alert"></span><center>Data berhasil di simpan </center></div>');
				redirect('suplier/petani');

            }
	}

public function e_Petani($id_petani)
	{
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['k_petani'] = $this->db->get_where('k_petani', ['id_petani' => $id_petani])->row_array();
					
		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/sidebar', $data);
		$this->load->view('template/admin/topbar', $data);
		$this->load->view('suplier/e_petani', $data);
		$this->load->view('template/admin/footer', $data);
	}

public function pe_petani($id_petani)
	{
		$data['k_petani'] = $this->db->get_where('k_petani', ['id_petani' => $id_petani])->row_array();

			$petani = [
                	'id_petani'		=> $this->input->post('id_petani'),
					'nama' 			=> $this->input->post('nama'),
            	];

            $this->db->set('id_petani',$id_petani);
			$this->db->where('id_petani', $id_petani);
			$this->db->update('petani');

			$k_petani = [
					'id_petani'		=> $this->input->post('id_petani'),
					'nama' 			=> $this->input->post('nama'),
					'tempat_lahir' 	=> $this->input->post('tempat_lahir'),
					'tanggal_lahir' => $this->input->post('tanggal_lahir'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'alamat' 		=> $this->input->post('alamat'),
					'desa' 			=> $this->input->post('desa'),
					'kecamatan' 	=> $this->input->post('kecamatan'),
					'kota' 			=> $this->input->post('kota'),
					'email' 		=> $this->input->post('email'),
					'telepon' 		=> $this->input->post('telepon')
				];

			//cek jika ada gambar yang di upload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) 
			{
				$config['allowed_types']	='gif|jpg|png';
				$config['max_size']			='2048';
				$config['upload_path']		='./assets/admin/img/suplier/';

				$this->load->library('upload',$config);

				if($this->upload->do_upload('image')){
					$old_image = $data['k_petani']['image'];
					if($old_image != 'default.jpg'){
						unlink(FCPATH . 'assets/admin/img/suplier/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image',$new_image);

				}else{
					echo $this->upload->dispay_errors();
				}
			}

			$this->db->set('id_petani',$id_petani);
			$this->db->where('id_petani', $id_petani);
			$this->db->update('k_petani');

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30" role="alert"><span class="close" data-dismiss="alert"></span><center>Data berhasil di update</center></div>');
				redirect('suplier/petani');		
		}

public function d_petani($id_petani)
	{
		$this->db->where('id_petani', $id_petani);
		$this->db->delete('petani');

		$this->db->where('id_petani', $id_petani);
		$this->db->delete('k_petani');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30" role="alert"><span class="close" data-dismiss="alert"></span><center>Data berhasil di hapus</center></div>');
		redirect('suplier/petani');
	}

public function kopi()
	{
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$id_pengepul = $data['admin']['id_pengepul'];
		$data['kopi'] = $this->M_Suplier->getk_kopi($id_pengepul);

		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/sidebar', $data);
		$this->load->view('template/admin/topbar', $data);
		$this->load->view('suplier/kopi', $data);
		$this->load->view('template/admin/footer', $data);
	}

public function t_kopi()
	{
		$data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['kopi'] = $this->M_Suplier->get_kopi();

		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/sidebar', $data);
		$this->load->view('template/admin/topbar', $data);
		$this->load->view('suplier/t_kopi', $data);
		$this->load->view('template/admin/footer', $data);
	}

public function p_kopi()
	{
		$admin = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$id_petani = $this->input->post('id_petani');
		$petani = $this->db->get_where('petani', ['id_petani' => $id_petani])->row_array();

		if ($petani) {
			$config['allowed_types']	='gif|jpg|png';
			$config['max_size']			='2048';
			$config['upload_path']		='./assets/admin/img/kopi/';
			$config['file_name']		= $_FILES['image']['name'];

			$this->load->library('upload',$config);

				 if ( ! $this->upload->do_upload('image'))
	            {
	                    $error = array('error' => $this->upload->display_errors());

	                    $this->load->view('upload_form', $error);
	            }
	            else
	            {
	                $data = array('upload_data' => $this->upload->data());

	                $kopi = [
	                	'id_kopi'		=> $this->input->post('id_kopi'),
	                	'id_petani'		=> $this->input->post('id_petani'),
	                	'id_pengepul'	=> $admin['id_pengepul'],
						'nama' 			=> $this->input->post('nama'),
	                	];
	                $this->db->insert('kopi', $kopi);
					
					$harga_jual = 2000+$this->input->post('harga');
					$k_kopi = [
						'id_kopi'			=> $this->input->post('id_kopi'),
						'nama' 				=> $this->input->post('nama'),
						'keterangan_kopi' 	=> $this->input->post('keterangan_kopi'),
						'type_kopi' 		=> $this->input->post('type_kopi'),
						'jenis_kopi' 		=> $this->input->post('jenis_kopi'),
						'tempat_tanam' 		=> $this->input->post('tempat_tanam'),
						'tanggal_tanam' 	=> $this->input->post('tanggal_tanam'),
						'tanggal_panen' 	=> $this->input->post('tanggal_panen'),
						'pupuk' 			=> $this->input->post('pupuk'),
						'keterangan_pupuk' 	=> $this->input->post('keterangan_pupuk'),
						'riwayat_penyakit' 	=> $this->input->post('riwayat_penyakit'),
						'harga' 			=> $this->input->post('harga'),
						'berat' 			=> $this->input->post('berat'),
						'harga_jual' 		=> $harga_jual,
						'rating' 			=> 0,
						'image' 			=> $config['file_name']
					];
					$this->db->insert('k_kopi', $k_kopi);

					$s_kopi = [
						'id_kopi'			=> $this->input->post('id_kopi'),
						'stok' 				=> $this->input->post('stok'),
					];
					$this->db->insert('s_kopi', $s_kopi);

					$pemasukan = [
						'id_pengepul'	=> $admin['id_pengepul'],
	                	'id_petani'		=> $this->input->post('id_petani'),
	                	'id_kopi'		=> $this->input->post('id_kopi'),
						'nama' 			=> $this->input->post('nama'),
						'jumlah'		=> $this->input->post('stok'),
						'tanggal' 		=> date('Y-m-h')
						
	                	];
	                $this->db->insert('pemasukan', $pemasukan);

					$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30" role="alert"><span class="close" data-dismiss="alert"></span><center>Data berhasil di simpan </center></div>');
					redirect('suplier/kopi');

	            }
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center mb-30" role="alert"><span class="close" data-dismiss="alert"></span><center>ID petani tidak ada</center></div>');
			redirect('suplier/t_kopi');
		}	
	}

public function e_kopi($id_kopi)
	{

		$data = array(
			'admin' => $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array(),
			'kopi' =>  $this->M_Suplier->gete_kopi($id_kopi) 
		);


		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/sidebar', $data);
		$this->load->view('template/admin/topbar', $data);
		$this->load->view('suplier/e_kopi', $data);
		$this->load->view('template/admin/footer', $data);
	}

public function pe_kopi($id_kopi)
	{
		$data['k_kopi'] = $this->db->get_where('k_kopi', ['id_kopi' => $id_kopi])->row_array();

			$kopi = [
					'nama' 			=> $this->input->post('nama'),
            	];

            $this->db->set('id_kopi',$id_kopi);
			$this->db->where('id_kopi', $id_kopi);
			$this->db->update('kopi', $kopi);


			$s_kopi = [
					'stok' 			=> $this->input->post('stok'),
            	];

            $this->db->set('id_kopi',$id_kopi);
			$this->db->where('id_kopi', $id_kopi);
			$this->db->update('s_kopi', $s_kopi);

			$k_kopi = [
					'id_kopi'			=> $this->input->post('id_kopi'),
					'nama' 				=> $this->input->post('nama'),
					'keterangan_kopi' 	=> $this->input->post('keterangan_kopi'),
					'type_kopi'			=> $this->input->post('type_kopi'),
					'jenis_kopi' 		=> $this->input->post('jenis_kopi'),
					'tempat_tanam' 		=> $this->input->post('tempat_tanam'),
					'tanggal_tanam' 	=> $this->input->post('tanggal_tanam'),
					'tanggal_panen' 	=> $this->input->post('tanggal_panen'),
					'pupuk' 			=> $this->input->post('pupuk'),
					'keterangan_pupuk' 	=> $this->input->post('keterangan_pupuk'),
					'riwayat_penyakit' 	=> $this->input->post('riwayat_penyakit'),
					'harga' 			=> $this->input->post('harga'),
					'berat' 			=> $this->input->post('berat'),
					'harga_jual' 		=> $this->input->post('harga_jual')
				];

			//cek jika ada gambar yang di upload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) 
			{
				$config['allowed_types']	='gif|jpg|png';
				$config['max_size']			='2048';
				$config['upload_path']		='./assets/admin/img/kopi/';

				$this->load->library('upload',$config);

				if($this->upload->do_upload('image')){
					$old_image = $data['k_kopi']['image'];
					if($old_image != 'default.jpg'){
						unlink(FCPATH . 'assets/admin/img/kopi/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image',$new_image);

				}else{
					echo $this->upload->dispay_errors();
				}
			}

			$this->db->set('id_kopi',$id_kopi);
			$this->db->where('id_kopi', $id_kopi);
			$this->db->update('k_kopi', $k_kopi);

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30" role="alert"><span class="close" data-dismiss="alert"></span><center>Data berhasil di update</center></div>');
				redirect('suplier/kopi');		
	}


public function d_kopi($id_kopi)
	{
		$this->db->where('id_kopi', $id_kopi);
		$this->db->delete('kopi');

		$this->db->where('id_kopi', $id_kopi);
		$this->db->delete('k_kopi');

		$this->db->where('id_kopi', $id_kopi);
		$this->db->delete('s_kopi');

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30" role="alert"><span class="close" data-dismiss="alert"></span><center>Data berhasil di hapus</center></div>');
		redirect('suplier/kopi');
	}

public function t_stok($id_kopi)
	{	
		$admin = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$s_kopi = $this->M_Suplier->gete_kopi($id_kopi);

		$t_stok = $s_kopi['stok'] + $this->input->post('jumlah_stok');
		$ts_kopi = [
					'stok' 			=> $t_stok,
            	];

            $this->db->set('id_kopi',$id_kopi);
			$this->db->where('id_kopi', $id_kopi);
			$this->db->update('s_kopi', $ts_kopi);

		$pemasukan = [
					'id_pengepul'	=> $admin['id_pengepul'],
                	'id_petani'		=> $s_kopi['id_petani'],
                	'id_kopi'		=> $s_kopi['id_kopi'],
					'nama' 			=> $s_kopi['nama'],
					'jumlah'		=> $this->input->post('jumlah_stok'),
					'tanggal' 		=> date('Y-m-h')
					
                	];

            $this->db->insert('pemasukan', $pemasukan);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30" role="alert"><span class="close" data-dismiss="alert"></span><center>Stok berhasil di tambahkan</center></div>');
		redirect('suplier/kopi');
	}

public function cetak_petani($id_pengepul)
	{
		if ($id_petani = $this->input->post('id_petani')) {
			$data = $this->Cetak_Model->cetak_petani($id_pengepul);
			// $this->library->printr($data);
			$data = array('data' => $data, );
			$this->load->view('cetak/cetak_petani', $data);
		}else{
			$data = $this->Cetak_Model->cetak_petani_semua($id_pengepul);
			// $this->library->printr($data);
			$data = array('data' => $data, );
			$this->load->view('cetak/cetak_petani', $data);
		}
	}

public function cetak_kopi($id_pengepul)
	{
		if ($id_kopi = $this->input->post('id_kopi')) {
			$data = $this->Cetak_Model->cetak_kopi($id_pengepul);
			// $this->library->printr($data);
			$data = array('data' => $data, );
			$this->load->view('cetak/cetak_kopi', $data);
		}else{
			$data = $this->Cetak_Model->cetak_kopi_semua($id_pengepul);
			// $this->library->printr($data);
			$data = array('data' => $data, );
			$this->load->view('cetak/cetak_kopi', $data);
		}
	}


}
// $this->library->printr($kopi);