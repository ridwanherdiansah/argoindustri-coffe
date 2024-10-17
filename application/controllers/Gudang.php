<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_Suplier');
		$this->load->model('Cetak_Model');
	}

public function profile()
	{
		$data['admin_gudang'] = $this->db->get_where('admin_gudang', ['email' => $_SESSION['admin_gudang']['email']])->row_array();

		$this->load->view('template/gudang/header', $data);
		$this->load->view('template/gudang/sidebar', $data);
		$this->load->view('template/gudang/topbar', $data);
		$this->load->view('gudang/profile', $data);
		$this->load->view('template/gudang/footer', $data);
	}

public function e_profile($email)
	{
		$data['admin_gudang'] = $this->db->get_where('admin_gudang', ['email' => $_SESSION['admin_gudang']['email']])->row_array();

			$admin_gudang = [
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
				$config['upload_path']		='./assets/admin/img/gudang/';

				$this->load->library('upload',$config);

				if($this->upload->do_upload('image')){
					$old_image = $data['admin']['image'];
					if($old_image != 'default.jpg'){
						unlink(FCPATH . 'assets/admin/img/gudang/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image',$new_image);

				}else{
					echo $this->upload->dispay_errors();
				}
			}

			
			$this->db->set('email', $email);
			$this->db->where('email', $email);
			$this->db->update('admin_gudang', $admin_gudang);

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30" role="alert"><span class="close" data-dismiss="alert"></span><center>Data berhasil di update</center></div>');
				redirect('gudang/profile');		
		}

public function transaksi()
	{
		$data['admin_gudang'] = $this->db->get_where('admin_gudang', ['email' => $_SESSION['admin_gudang']['email']])->row_array();
		$data['transaksi'] = $this->db->get_where('transaksi')->result_array();

		$this->load->view('template/gudang/header', $data);
		$this->load->view('template/gudang/sidebar', $data);
		$this->load->view('template/gudang/topbar', $data);
		$this->load->view('gudang/transaksi', $data);
		$this->load->view('template/gudang/footer', $data);
	}

public function cek_produk($id_transaksi)
	{
		$data['admin_gudang'] = $this->db->get_where('admin_gudang', ['email' => $_SESSION['admin_gudang']['email']])->row_array();
		$data['expedisi'] = $this->M_Suplier->get_transaksi($id_transaksi);
		$data['k_transaksi'] = $this->db->get_where('k_transaksi', ['id_transaksi' => $id_transaksi])->result_array();

        $sub_total = 0;
	        foreach($data['k_transaksi'] as $t):
	        
	        	$sub_total = $sub_total + $t['total_harga'];
	    	endforeach;
	    $data['sub_total_detail_transaksi'] = $sub_total;

		$this->load->view('template/gudang/header', $data);
		$this->load->view('template/gudang/sidebar', $data);
		$this->load->view('template/gudang/topbar', $data);
		$this->load->view('gudang/cek_produk', $data);
		$this->load->view('template/gudang/footer', $data);
	}

public function terima($id_transaksi)
	{
		$data['expedisi'] = $this->M_Suplier->get_transaksi($id_transaksi);

		$terima = [
			'status' => 1,
		];

		$no_resi = [
			'no_resi' => $this->input->post('no_resi'),
		];

		$this->db->set('id_expedisi', $data['expedisi']['id_expedisi']);
		$this->db->where('id_expedisi',$data['expedisi']['id_expedisi']);
		$this->db->update('k_expedisi',$no_resi);

		$this->db->set('id_transaksi', $id_transaksi);
		$this->db->where('id_transaksi',$id_transaksi);
		$this->db->update('transaksi',$terima);

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30" role="alert"><span class="close" data-dismiss="alert"></span><center>Data sudah di update</center></div>');
		redirect('gudang/transaksi');	

	}

	public function tolak($id_transaksi)
	{
		$data['expedisi'] = $this->M_Suplier->get_transaksi($id_transaksi);

		$tolak = [
			'status' => 3,
		];

		// $no_resi = [
		// 	'no_resi' => $this->input->post('no_resi'),
		// ];

		// $this->db->set('id_expedisi', $data['expedisi']['id_expedisi']);
		// $this->db->where('id_expedisi',$data['expedisi']['id_expedisi']);
		// $this->db->update('k_expedisi',$no_resi);

		$this->db->set('id_transaksi', $id_transaksi);
		$this->db->where('id_transaksi',$id_transaksi);
		$this->db->update('transaksi',$tolak);

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30" role="alert"><span class="close" data-dismiss="alert"></span><center>Data sudah di update</center></div>');
		redirect('gudang/transaksi');	

	}

public function detail_transaksi($id_transaksi)
	{
		$data['admin_gudang'] = $this->db->get_where('admin_gudang', ['email' => $_SESSION['admin_gudang']['email']])->row_array();
		$data['expedisi'] = $this->M_Suplier->get_transaksi($id_transaksi);
		$data['k_transaksi'] = $this->db->get_where('k_transaksi', ['id_transaksi' => $id_transaksi])->result_array();

		$sub_total = 0;
	        foreach($data['k_transaksi'] as $t):
	        
	        	$sub_total = $sub_total + $t['total_harga'];
	    	endforeach;
	    $data['sub_total_detail_transaksi'] = $sub_total;

		$this->load->view('template/gudang/header', $data);
		$this->load->view('template/gudang/sidebar', $data);
		$this->load->view('template/gudang/topbar', $data);
		$this->load->view('gudang/detail_transaksi', $data);
		$this->load->view('template/gudang/footer', $data);
	}

public function pemasukan()
	{
		$data['admin_gudang'] = $this->db->get_where('admin_gudang', ['email' => $_SESSION['admin_gudang']['email']])->row_array();
		$data['pemasukan'] = $this->db->get_where('pemasukan')->result_array();

		$this->load->view('template/gudang/header', $data);
		$this->load->view('template/gudang/sidebar', $data);
		$this->load->view('template/gudang/topbar', $data);
		$this->load->view('gudang/pemasukan', $data);
		$this->load->view('template/gudang/footer', $data);
	}


public function l_pemasukan($id)
	{
		$data['admin_gudang'] = $this->db->get_where('admin_gudang', ['email' => $_SESSION['admin_gudang']['email']])->row_array();
		$data['pemasukan'] = $this->M_Suplier->getl_pemasukan($id);

		$this->load->view('template/gudang/header', $data);
		$this->load->view('template/gudang/sidebar', $data);
		$this->load->view('template/gudang/topbar', $data);
		$this->load->view('gudang/l_pemasukan', $data);
		$this->load->view('template/gudang/footer', $data);
	}

public function pengeluaran()
	{
		$data['admin_gudang'] = $this->db->get_where('admin_gudang', ['email' => $_SESSION['admin_gudang']['email']])->row_array();
		$data['pengeluaran'] = $this->M_Suplier->get_pengeluaran();

		$this->load->view('template/gudang/header', $data);
		$this->load->view('template/gudang/sidebar', $data);
		$this->load->view('template/gudang/topbar', $data);
		$this->load->view('gudang/pengeluaran', $data);
		$this->load->view('template/gudang/footer', $data);
	}

public function Pengepul()
	{
		$data['admin_gudang'] = $this->db->get_where('admin_gudang', ['email' => $_SESSION['admin_gudang']['email']])->row_array();
		$data['admin'] = $this->db->get_where('admin')->result_array();

		$this->load->view('template/gudang/header', $data);
		$this->load->view('template/gudang/sidebar', $data);
		$this->load->view('template/gudang/topbar', $data);
		$this->load->view('gudang/pengepul', $data);
		$this->load->view('template/gudang/footer', $data);
	}

public function active($id_pengepul)
	{
		$admin = $this->db->get_where('admin', ['id_pengepul' => $id_pengepul])->row_array();

		$is_active = [
				'is_active' => 1,
			];

		$this->db->where('id_pengepul', $id_pengepul);
		$this->db->update('admin', $is_active);

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30" role="alert"><span class="close" data-dismiss="alert"></span><center>Status Admin sudah di <i>active</i> kan</center></div>');
		redirect('gudang/Pengepul');	
	} 

public function non_active($id_pengepul)
	{
		$admin = $this->db->get_where('admin', ['id_pengepul' => $id_pengepul])->row_array();

		$is_active = [
				'is_active' => 0,
			];

		$this->db->where('id_pengepul', $id_pengepul);
		$this->db->update('admin', $is_active);

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30" role="alert"><span class="close" data-dismiss="alert"></span><center>Status Admin sudah di <i>non active</i> kan</center></div>');
		redirect('gudang/Pengepul');	
	} 

public function cetak_transaksi()
	{
		if ($id_user = $this->input->post('id_user')) {
			$data = $this->Cetak_Model->cetak_transaksi_gudang();
			// $this->library->printr($data);
			$data = array('data' => $data, );
			$this->load->view('cetak/cetak_transaksi_gudang', $data);
		}else{
			$data = $this->Cetak_Model->cetak_transaksi_gudang_semua();
			// $this->library->printr($data);
			$data = array('data' => $data, );
			$this->load->view('cetak/cetak_transaksi_gudang', $data);
		}
	}

public function cetak_pemasukan()
	{
		if ($id_pengepul = $this->input->post('id_pengepul')) {
			$data = $this->Cetak_Model->cetak_pemasukan_gudang();
			// $this->library->printr($data);
			$data = array('data' => $data, );
			$this->load->view('cetak/cetak_pemasukan_gudang', $data);
		}else{
			$data = $this->Cetak_Model->cetak_pemasukan_gudang_semua();
			// $this->library->printr($data);
			$data = array('data' => $data, );
			$this->load->view('cetak/cetak_pemasukan_gudang', $data);
		}
	}

public function cetak_pengeluaran()
	{
		$data = $this->Cetak_Model->cetak_pengeluaran();
		// $this->library->printr($data);
		$data = array('data' => $data, );
		$this->load->view('cetak/cetak_pengeluaran', $data);
	}

}

// $this->library->printr($kopi);