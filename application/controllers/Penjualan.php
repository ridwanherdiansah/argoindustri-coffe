<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_Suplier');
	}

public function tentang_kami()
	{
		$data['title'] = "Tentang Kami";
		$data['dashboard'] = $this->db->get_where('dashboard')->row_array();

		$this->load->view('template/penjualan/header', $data);
		$this->load->view('template/penjualan/topbar', $data);
		$this->load->view('penjualan/tentang_kami', $data);
		$this->load->view('template/penjualan/footer', $data);
	}
	
public function katalog_kopi()
	{
		$data['title'] = "Katalog Kopi";
		$data['dashboard'] = $this->db->get_where('dashboard')->row_array();
		$data['kopi'] = $this->M_Suplier->katalog_kopi();

		$this->load->view('template/penjualan/header', $data);
		$this->load->view('template/penjualan/topbar', $data);
		$this->load->view('penjualan/katalog_kopi', $data);
		$this->load->view('template/penjualan/footer', $data);
	}

public function rating($id_kopi)
	{
		$kopi = $this->M_Suplier->gete_kopi($id_kopi);

		$rating_baru = $kopi['rating'] + 1 ;
		$rating = [
				'rating' => $rating_baru,
			];

		$this->db->set('id_kopi',$id_kopi);
		$this->db->where('id_kopi', $id_kopi);
		$this->db->update('k_kopi', $rating);

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30" role="alert"><span class="close" data-dismiss="alert"></span><center>Terimakasih sudah memberikan rating</center></div>');
		redirect('penjualan/katalog_kopi');	
	}

public function kopi($id_kopi)
	{
		$data['title'] = "Kopi";
		$data['dashboard'] = $this->db->get_where('dashboard')->row_array();
		$data['kopi'] = $this->M_Suplier->gete_kopi($id_kopi);
		$data['komentar'] = $this->db->get_where('komentar', ['id_kopi' => $id_kopi])->result_array();

		$this->load->view('template/penjualan/header', $data);
		$this->load->view('template/penjualan/topbar', $data);
		$this->load->view('penjualan/kopi', $data);
		$this->load->view('template/penjualan/footer', $data);
	}

public function katalog_petani()
	{
		$data['title'] = "Katalog Petani";
		$data['dashboard'] = $this->db->get_where('dashboard')->row_array();
		$data['petani'] = $this->M_Suplier->katalog_petani();

		$this->load->view('template/penjualan/header', $data);
		$this->load->view('template/penjualan/topbar', $data);
		$this->load->view('penjualan/katalog_petani', $data);
		$this->load->view('template/penjualan/footer', $data);
	}

public function petani($id_petani)
	{
		$data['title'] = "Petani";
		$data['dashboard'] = $this->db->get_where('dashboard')->row_array();
		$data['petani'] = $this->M_Suplier->gete_petani($id_petani);
		$data['kopi'] = $this->M_Suplier->getp_kopi($id_petani);

		$this->load->view('template/penjualan/header', $data);
		$this->load->view('template/penjualan/topbar', $data);
		$this->load->view('penjualan/petani', $data);
		$this->load->view('template/penjualan/footer', $data);
	}

public function kontak()
	{
		$data['title'] = "Kontak";
		$data['dashboard'] = $this->db->get_where('dashboard')->row_array();
		$data['admin'] = $this->db->get_where('admin')->result_array();

		$this->load->view('template/penjualan/header', $data);
		$this->load->view('template/penjualan/topbar', $data);
		$this->load->view('penjualan/kontak', $data);
		$this->load->view('template/penjualan/footer', $data);
	}

public function p_komentar($id_kopi)
	{
		if ($_SESSION['user']) {
			$user = $this->db->get_where('user', ['email' => $_SESSION['user']['email']])->row_array();
			
			$komentar = [

				'id_kopi' 	=> $id_kopi,
				'email' 	=> $user['email'],
				'nama' 		=> $user['nama'],
				'komentar' 	=> $this->input->post('komentar'),
				'tanggal' 	=> date('Y-m-h'),
				'waktu' 	=> time('h-m'),
			];

			$this->db->insert('komentar', $komentar);

			$this->session->set_flashdata('komentar', '<div class="alert alert-success alert-dismissible fade show text-center mb-30"><span class="close" data-dismiss="alert"></span><i class="fe-icon-award"></i>komentar sudah di tambahkan</div>');
			redirect('penjualan/kopi/' . $id_kopi);
			
		}else{
			$this->session->set_flashdata('komentar', '<div class="alert alert-danger alert-dismissible fade show text-center mb-30"><span class="close" data-dismiss="alert"></span><i class="fe-icon-award"></i>Maaf anda belum login !!</div>');
			redirect('penjualan/kopi/' . $id_kopi);
		}
	}
public function t_keranjang($id_kopi)
	{
		$kopi = $this->M_Suplier->gete_kopi($id_kopi);
		$total_harga = $this->input->post('jumlah_barang') * $kopi['harga_jual'];
		$total_berat = $this->input->post('jumlah_barang') * $kopi['berat'];

		if (@$_SESSION['user']) {
			
			if ($kopi['stok'] > $this->input->post('jumlah_barang')) {

				if (@$_SESSION['kopi'][$id_kopi]) {

					$jumlah_barang =  @$_SESSION['kopi'][$id_kopi]['jumlah_barang'] + $this->input->post('jumlah_barang');

					if ($kopi['stok'] >= $jumlah_barang ) {

						@$_SESSION['kopi'][$id_kopi]['berat'] 			+= $total_berat;
						@$_SESSION['kopi'][$id_kopi]['jumlah_barang'] 	+= $this->input->post('jumlah_barang');
						@$_SESSION['kopi'][$id_kopi]['total_harga'] 	+= $total_harga;

						$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30"><span class="close" data-dismiss="alert"></span><i class="fe-icon-award"></i>Data berhasil di tambahkan</div>');
						redirect('penjualan/keranjang');

					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center mb-30"><span class="close" data-dismiss="alert"></span><i class="fe-icon-award"></i>Jumlah pembelian melebihi stok</div>');
						redirect('penjualan/kopi/'.$id_kopi);
					}
				}else{
					$kopi_baru =  [
						'id_kopi'		=> $id_kopi,
						'nama'  		=> $kopi['nama'],
						'berat' 		=> $kopi['berat'],
						'jumlah_barang' => $this->input->post('jumlah_barang'),
						'harga' 		=> $kopi['harga_jual'],
						'total_harga' 	=> $total_harga,
						'total_berat'	=> $total_berat,
						'image'			=> $kopi['image']
					];

					$_SESSION['kopi'][$id_kopi] = $kopi_baru;

					$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30"><span class="close" data-dismiss="alert"></span><i class="fe-icon-award"></i>Data berhasil di masukan ke keranjang</div>');
					redirect('penjualan/keranjang');
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center mb-30"><span class="close" data-dismiss="alert"></span><i class="fe-icon-award"></i>Pembelian melebihi stok</div>');
				redirect('penjualan/kopi/'.$id_kopi);
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center mb-30"><span class="close" data-dismiss="alert"></span><i class="fe-icon-award"></i>Anda harus login terlebih dahulu</div>');
			redirect('penjualan/kopi/'.$id_kopi);
		}

	}
	
public function keranjang()
	{
		$data['title'] = "keranjang";
		$data['dashboard'] = $this->db->get_where('dashboard')->row_array();
		$data['user'] = $this->db->get_where('user', ['email' => $_SESSION['user']['email']])->row_array();

		if (@$_SESSION['user']) {

			$this->load->view('template/penjualan/header', $data);
			$this->load->view('template/penjualan/topbar', $data);
			$this->load->view('penjualan/keranjang', $data);
			$this->load->view('template/penjualan/footer', $data);
		}else{

			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center mb-30"><span class="close" data-dismiss="alert"></span><i class="fe-icon-award"></i>Anda harus login terlebih dahulu</div>');
			redirect('penjualan/katalog_kopi');
		}
		

		
	}

public function d_keranjang($id_kopi)
	{
		unset($_SESSION['kopi'][$id_kopi]);
		$this->session->set_flashdata('message','
				<div class="alert alert-info alert-dismissible fade show text-center mb-30">
				<span class="close" data-dismiss="alert"></span>
				<i class="fe-icon-award"></i>
				&nbsp;&nbsp;Data kopi sudah di hapus dari keranjang</div>');	
		redirect('penjualan/keranjang');

	}

public function p_keranjang($id_user)
	{
		$user = $this->M_Suplier->get_user($id_user); 

		// cek alamat
		if ($user['provinsi']) {
			
			if ($user['kota']) {
				
				redirect('penjualan/expedisi/'.$id_user);
				// echo "berhasil";
			
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center mb-30"><span class="close" data-dismiss="alert"></span><i class="fe-icon-award"></i>Maaf alamat kota belum di isi !!!</div>');
				redirect('user/alamat/'.$id_user);
			}

		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center mb-30"><span class="close" data-dismiss="alert"></span><i class="fe-icon-award"></i>Maaf alamat provinsi belum di isi !!!</div>');
			redirect('user/alamat/'.$id_user);
		}
	}

public function expedisi($id_user)
	{
		$admin_gudang = $this->db->get_where('admin_gudang', ['email' => 'ridwan@gmail.com'])->row_array();

		$data['ongkir'] = '';
			if (count($_POST)) {

				$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS =>"origin=".$admin_gudang['kota'].
				  "&destination=".$this->input->post('kota_penerima').
				  "&weight=".$this->input->post('berat').
				  "&courier=".$this->input->post('expedisi'),
				  CURLOPT_HTTPHEADER => array(
				    "content-type: application/x-www-form-urlencoded",
				    "key: aaa7455b9029fa0906b85f4199588f53"
				  ),
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);

				if ($err) {
				  echo "cURL Error #:" . $err;
				} else {
				  $data['ongkir'] = $response;
				}
			}
			
		$data['title'] = "Expedisi";
		$data['dashboard'] = $this->db->get_where('dashboard')->row_array();
		$data['user'] = $this->M_Suplier->get_user($id_user); 
		$data['admin_gudang'] = $this->db->get_where('admin_gudang', ['email' => 'ridwan@gmail.com'])->row_array();

		$this->load->view('template/penjualan/header', $data);
		$this->load->view('template/penjualan/topbar', $data);
		$this->load->view('penjualan/expedisi', $data);
		$this->load->view('template/penjualan/footer', $data);
	}

public function cek_ongkir($id_user)
	{
		$admin_gudang = $this->db->get_where('admin_gudang', ['email' => 'ridwan@gmail.com'])->row_array();

		$data['ongkir'] = '';
		if (count($_POST)) {

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS =>"origin=".$admin_gudang['kota'].
			  "&destination=".$this->input->post('kota_penerima').
			  "&weight=".$this->input->post('berat').
			  "&courier=".$this->input->post('expedisi'),
			  CURLOPT_HTTPHEADER => array(
			    "content-type: application/x-www-form-urlencoded",
			    "key: aaa7455b9029fa0906b85f4199588f53"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  // echo "cURL Error #:" . $err;
			  redirect('auth/error');
			} else {
			  $data['ongkir'] = $response;
			}
		}
		$data['title'] = "Expedisi";
		$data['dashboard'] = $this->db->get_where('dashboard')->row_array();
		$data['user'] = $this->M_Suplier->get_user($id_user); 

		$this->load->view('template/penjualan/header', $data);
		$this->load->view('template/penjualan/topbar', $data);
		$this->load->view('penjualan/expedisi', $data);
		$this->load->view('template/penjualan/footer', $data);
	}

public function p_expedisi($id_user)
	{
		$expedisi = [

				'nama'	=> $this->input->post('nama'),
				'deskripsi'	=> $this->input->post('deskripsi'),
				'lama_hari'	=> $this->input->post('lama_hari'),
				'berat'	=> $this->input->post('berat'),
				'harga'	=> $this->input->post('harga')
			];
			$_SESSION['expedisi'] = $expedisi;

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30"><span class="close" data-dismiss="alert"></span><i class="fe-icon-award"></i>Expedisi telah di tentukan</div>');
		redirect('penjualan/cekout/'.$id_user);
	}

public function cekout($id_user)
	{
			
		$data['title'] = "Cekout";
		$data['dashboard'] = $this->db->get_where('dashboard')->row_array();
		$data['user'] = $this->M_Suplier->get_user($id_user); 

		$this->load->view('template/penjualan/header', $data);
		$this->load->view('template/penjualan/topbar', $data);
		$this->load->view('penjualan/cekout', $data);
		$this->load->view('template/penjualan/footer', $data);
	}

public function p_cekout($id_user)
	{
		$data['user'] = $this->M_Suplier->get_user($id_user);
		$id_transaksi = $this->M_Suplier->gettransaksi();
		$id_expedisi = $this->M_Suplier->getexpedisi(); 

		$total_berat = 0;
		$total_bayar = 0;
        foreach($_SESSION['kopi'] as $key => $val):
            $total_berat = $total_berat + $_SESSION['kopi'][$key]['total_berat'];
            $total_bayar = $total_bayar + $_SESSION['kopi'][$key]['total_harga'] + $_SESSION['expedisi']['harga'];
        endforeach;

		// insert ke tabel transaksi
		$transaksi = [
					'id_transaksi'  	=> $id_transaksi,
					'id_user'  			=> $id_user,
					'id_expedisi'  		=> $id_expedisi,
					'tanggal'			=> date('Y-m-h'),
					'total_berat'		=> $total_berat,
					'total_pembayaran'	=> $total_bayar,
					'status'			=> 0
				];

		$this->db->insert('transaksi',$transaksi);

		// input ke tabel d_transaksi, dan ambil id_transaksi di tabel transaksi
		foreach($_SESSION['kopi'] as $key => $value):

		$kopi= $this->M_Suplier->gete_kopi($key);
		$k_transaksi = [
					'id_transaksi'  => $id_transaksi,
					'id_pengepul'   => $kopi['id_pengepul'],
					'id_petani'     => $kopi['id_petani'],
					'id_kopi'     	=> $key,
					'nama'    		=> $_SESSION['kopi'][$key]['nama'],
					'harga'   		=> $_SESSION['kopi'][$key]['harga'],
					'jumlah' 		=> $_SESSION['kopi'][$key]['jumlah_barang'],
					'total_harga' 	=> $_SESSION['kopi'][$key]['total_harga'],
					'image' 		=> $kopi['image'],
				];

				// insert
				$this->db->insert('k_transaksi',$k_transaksi);

		$bintang = $kopi['rating'] + 1;
		$rating = [
					'rating'	=> $bintang,
			];

				// update
				$this->db->where('id_kopi',$key);
				$this->db->update('k_kopi', $rating);
				
		endforeach;

		// insert keterangan expedisi
		$expedisi = [
					'id_expedisi'  	=> $id_expedisi,
					'no_resi'  		=> '0',
					'nama'  		=> $_SESSION['expedisi']['nama'],
					'deskripsi'		=> $_SESSION['expedisi']['deskripsi'],
					'lama_hari'		=> $_SESSION['expedisi']['lama_hari'],
					'berat'			=> $_SESSION['expedisi']['berat'],
					'harga'			=> $_SESSION['expedisi']['harga']
				];

		$this->db->insert('k_expedisi',$expedisi);

		unset($_SESSION['kopi']);
		unset($_SESSION['expedisi']);
	
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30"><span class="close" data-dismiss="alert"></span><i class="fe-icon-award"></i>Cekout berhasil. mohon tunggu orderan kopi sedang di proses</div>');
		redirect('penjualan/complate/'.$id_transaksi);
	}

public function complate($id_transaksi)
	{
		$data['title'] = "Cekout berhasil";
		$data['dashboard'] = $this->db->get_where('dashboard')->row_array();
		$data['transaksi'] = $this->db->get_where('transaksi', ['id_transaksi' => $id_transaksi])->row_array();

		$this->load->view('template/penjualan/header', $data);
		$this->load->view('template/penjualan/topbar', $data);
		$this->load->view('penjualan/complate', $data);
		$this->load->view('template/penjualan/footer', $data);
	}

public function track($id_transaksi)
	{
		$data['title'] = "Cekout berhasil";
		$data['dashboard'] = $this->db->get_where('dashboard')->row_array();
		$data['k_transaksi'] = $this->db->get_where('k_transaksi', ['id_transaksi' => $id_transaksi])->result_array();
		$data['transaksi'] = $this->M_Suplier->get_transaksi($id_transaksi);

		$this->load->view('template/penjualan/header', $data);
		$this->load->view('template/penjualan/topbar', $data);
		$this->load->view('penjualan/track', $data);
		$this->load->view('template/penjualan/footer', $data);
	}

public function terima($id_transaksi)
	{
		$terima = [

			'status' => 2,
		];

		$this->db->set('id_transaksi', $id_transaksi);
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->update('transaksi', $terima);
		
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center mb-30"><span class="close" data-dismiss="alert"></span><i class="fe-icon-award"></i>Produk sudah di terima</div>');
		redirect('user/history/'.@$_SESSION['user']['id_user']);
	}

}

	// $this->library->printr($kopi);