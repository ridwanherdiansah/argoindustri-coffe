<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Suplier extends CI_Model {

	public function getuser()
		{
			$urut = "CO000";

			$this->db->select('id_user');
			$this->db->from('user');
			$this->db->distinct();
			$nomor = $this->db->get()->num_rows();
			$panjang = strlen($nomor);
			$urut_ = substr($urut, 0, strlen($urut) - $panjang);
			$nomor = $nomor + 1;
			$tahun = date('Y', time());
			return "$urut_$nomor";
		}

	public function getpetani()
		{
			$urut = "SUP000";

			$this->db->select('id_petani');
			$this->db->from('petani');
			$this->db->distinct();
			$nomor = $this->db->get()->num_rows();
			$panjang = strlen($nomor);
			$urut_ = substr($urut, 0, strlen($urut) - $panjang);
			$nomor = $nomor + 1;
			$tahun = date('Y', time());
			return "$urut_$nomor";
		}

	public function gettransaksi()
		{
			$urut = "TR000";

			$this->db->select('id_transaksi');
			$this->db->from('transaksi');
			$this->db->distinct();
			$nomor = $this->db->get()->num_rows();
			$panjang = strlen($nomor);
			$urut_ = substr($urut, 0, strlen($urut) - $panjang);
			$nomor = $nomor + 1;
			$tahun = date('Y', time());
			return "$urut_$nomor";
		}

	public function getexpedisi()
		{
			$urut = "EXP000";

			$this->db->select('id_expedisi');
			$this->db->from('k_expedisi');
			$this->db->distinct();
			$nomor = $this->db->get()->num_rows();
			$panjang = strlen($nomor);
			$urut_ = substr($urut, 0, strlen($urut) - $panjang);
			$nomor = $nomor + 1;
			$tahun = date('Y', time());
			return "$urut_$nomor";
		}	

	public function katalog_petani()
		{
			$query = "  SELECT 
							p.id_petani,
							p.id_pengepul,
							kp.nama,
							kp.tempat_lahir,
							kp.tanggal_lahir,
							kp.jenis_kelamin,
							kp.alamat,
							kp.desa,
							kp.kecamatan,
							kp.kota,
							kp.email,
							kp.telepon,
							kp.image
						FROM k_petani as kp 
						JOIN petani as p
						ON kp.id_petani = p.id_petani
						";
			return $this->db->query($query)->result_array();
		}

	public function getk_petani($id_pengepul)
		{
			$query = "  SELECT 
							p.id_petani,
							p.id_pengepul,
							kp.nama,
							kp.tempat_lahir,
							kp.tanggal_lahir,
							kp.jenis_kelamin,
							kp.alamat,
							kp.desa,
							kp.kecamatan,
							kp.kota,
							kp.email,
							kp.telepon,
							kp.image
						FROM k_petani as kp 
						JOIN petani as p
						ON kp.id_petani = p.id_petani
						WHERE p.id_pengepul = '$id_pengepul'
						";
			return $this->db->query($query)->result_array();
		}

	public function gete_petani($id_petani)
		{
			$query = "  SELECT 
							p.id_petani,
							kp.nama,
							kp.tempat_lahir,
							kp.tanggal_lahir,
							kp.jenis_kelamin,
							kp.alamat,
							kp.desa,
							kp.kecamatan,
							kp.kota,
							kp.email,
							kp.telepon,
							kp.image
						FROM k_petani as kp 
						JOIN petani as p
						ON kp.id_petani = p.id_petani
						WHERE p.id_petani = '$id_petani'
						";
			return $this->db->query($query)->row_array();
		}

	public function katalog_kopi()
		{
			$query = "  SELECT 
							k.id_petani,
							k.id_pengepul,
							kk.id_kopi,
							kk.nama,
							kk.keterangan_kopi,
							kk.type_kopi,
							kk.jenis_kopi,
							kk.tempat_tanam,
							kk.tanggal_tanam,
							kk.tanggal_panen,
							kk.pupuk,
							kk.keterangan_pupuk,
							kk.riwayat_penyakit,
							kk.harga,
							kk.harga_jual,
							kk.rating,
							kk.image,
							sk.stok

						FROM k_kopi as kk 

						JOIN kopi as k
						ON kk.id_kopi = k.id_kopi

						JOIN s_kopi as sk 
						ON sk.id_kopi = k.id_kopi
						";
			return $this->db->query($query)->result_array();
		}

	public function getk_kopi($id_pengepul)
		{
			$query = "  SELECT 
							k.id_petani,
							k.id_pengepul,
							kk.id_kopi,
							kk.nama,
							kk.keterangan_kopi,
							kk.type_kopi,
							kk.jenis_kopi,
							kk.tempat_tanam,
							kk.tanggal_tanam,
							kk.tanggal_panen,
							kk.pupuk,
							kk.keterangan_pupuk,
							kk.riwayat_penyakit,
							kk.harga,
							kk.harga_jual,
							kk.rating,
							kk.image,
							sk.stok

						FROM k_kopi as kk 

						JOIN kopi as k
						ON kk.id_kopi = k.id_kopi

						JOIN s_kopi as sk 
						ON sk.id_kopi = k.id_kopi
						WHERE k.id_pengepul = '$id_pengepul'
						";
			return $this->db->query($query)->result_array();
		}
	public function get_kopi()
		{
			$urut = "KOPI000";

			$this->db->select('id_kopi');
			$this->db->from('kopi');
			$this->db->distinct();
			$nomor = $this->db->get()->num_rows();
			$panjang = strlen($nomor);
			$urut_ = substr($urut, 0, strlen($urut) - $panjang);
			$nomor = $nomor + 1;
			$tahun = date('Y', time());
			return "$urut_$nomor";
		}

	public function gete_kopi($id_kopi)
		{
			$query = "  SELECT 
							k.id_petani,
							k.id_pengepul,
							kk.id_kopi,
							kk.nama,
							kk.keterangan_kopi,
							kk.type_kopi,
							kk.jenis_kopi,
							kk.tempat_tanam,
							kk.tanggal_tanam,
							kk.tanggal_panen,
							kk.pupuk,
							kk.keterangan_pupuk,
							kk.riwayat_penyakit,
							kk.berat,
							kk.harga,
							kk.harga_jual,
							kk.rating,
							kk.image,
							sk.stok

						FROM k_kopi as kk 

						RIGHT JOIN kopi as k
						ON kk.id_kopi = k.id_kopi

						LEFT JOIN s_kopi as sk 
						ON sk.id_kopi = k.id_kopi

						WHERE k.id_kopi = '$id_kopi'
						";
			return $this->db->query($query)->row_array();
		}

	public function dataKopi($id_kopi){
		$this->db->select('*');
		$this->db->from('kopi k');
		$this->db->join('s_kopi s', 's.id_kopi = k.id_kopi', 'left');
		$this->db->join('k_kopi ko', 'ko.id_kopi = k.id_kopi', 'left');
		$this->db->where('k.id_kopi', $id_kopi);
		return $this->db->get()->row_array();
	}

	public function getl_pemasukan($id)
		{
			$query = "  SELECT 
							p.id,
							p.id_pengepul,
							p.id_petani,
							p.id_kopi,
							p.nama,
							p.jumlah,
							p.tanggal,
							kk.id_kopi,
							kk.keterangan_kopi,
							kk.type_kopi,
							kk.jenis_kopi,
							kk.harga,
							kk.harga_jual

						FROM pemasukan as p

						RIGHT JOIN k_kopi as kk
						ON kk.id_kopi = p.id_kopi

						WHERE p.id = '$id'
						";
			return $this->db->query($query)->row_array();
		}

	public function getp_kopi($id_petani)
		{
			$query = "  SELECT 
							p.id_petani,
							kk.id_kopi,
							kk.nama,
							kk.keterangan_kopi,
							kk.type_kopi,
							kk.jenis_kopi,
							kk.tempat_tanam,
							kk.tanggal_tanam,
							kk.tanggal_panen,
							kk.pupuk,
							kk.keterangan_pupuk,
							kk.riwayat_penyakit,
							kk.harga,
							kk.harga_jual,
							kk.rating,
							kk.image

						FROM petani as p 

						RIGHT JOIN kopi as k
						ON p.id_petani = k.id_petani

						LEFT JOIN k_kopi as kk 
						ON kk.id_kopi = k.id_kopi

						WHERE p.id_petani = '$id_petani'
						";
			return $this->db->query($query)->result_array();
		}

	public function get_user($id_user)
		{
			$query = "  SELECT 
							u.id_user,
							u.email,
							u.password,
							u.nama,
							u.is_active,
							u.date_created,
							u.image,
							ku.alamat,
							ku.telepon,
							ku.desa,
							ku.kecamatan,
							ku.kota,
							ku.provinsi,
							ku.kode_pos

						FROM user as u
						JOIN k_user as ku
						ON u.id_user = ku.id_user

						WHERE u.id_user = '$id_user'
						";
			return $this->db->query($query)->row_array();
		}

	public function get_transaksi($id_transaksi)
		{
			$query = "  SELECT 
							t.id_transaksi,
							t.id_user,
							t.id_expedisi,
							t.tanggal,
							t.status,
							t.total_berat,
							t.total_pembayaran,
							ko.id_expedisi,
							ko.no_resi,
							ko.nama,
							ko.deskripsi,
							ko.lama_hari,
							ko.berat,
							ko.harga

						FROM transaksi as t

						JOIN k_expedisi as ko
						ON t.id_expedisi = ko.id_expedisi

						WHERE t.id_transaksi = '$id_transaksi'
						";
			return $this->db->query($query)->row_array();
		}

	public function getk_transaksi($id_pengepul)
		{
			$query = "  SELECT 
							t.id_transaksi,
							t.id_user,
							t.id_expedisi,
							t.total_pembayaran,
							t.total_berat,
							t.tanggal,
							t.status,
							kt.id_pengepul,
							kt.id_petani,
							kt.id_kopi,
							kt.nama,
							kt.harga,
							kt.jumlah,
							kt.image

						FROM transaksi as t 

						JOIN k_transaksi as kt
						ON t.id_transaksi = kt.id_transaksi

						WHERE kt.id_pengepul = '$id_pengepul'
						";
			return $this->db->query($query)->result_array();
		}

	public function cetak_transaksi()
		{
			$this->db->select('*');
			$this->db->from('transaksi t');
			$this->db->join('k_transaksi kt', 'kt.id_transaksi = t.id_transaksi', 'left');
			$this->db->where('tanggal >= ', $this->input->post('tanggal_awal'));
			$this->db->where('tanggal <= ', $this->input->post('tanggal_akhir'));
			$this->db->where('status = ', '2');
			$this->db->where('id_kopi = ', $this->input->post('id_kopi'));
			return $this->db->get()->result_array();
		}

	public function get_pengeluaran()
		{
			$query = "  SELECT 
							t.id_transaksi,
							t.id_user,
							t.id_expedisi,
							t.tanggal,
							t.status,
							t.total_berat,
							t.total_pembayaran,
							ko.id_expedisi,
							ko.no_resi,
							ko.nama,
							ko.deskripsi,
							ko.lama_hari,
							ko.berat,
							ko.harga

						FROM transaksi as t

						JOIN k_expedisi as ko
						ON t.id_expedisi = ko.id_expedisi

						WHERE t.status = '2'
						";
			return $this->db->query($query)->result_array();
		}

	public function get_pengeluaran_pengepul($id_pengepul)
			{
			$this->db->select('*');
			$this->db->from('transaksi t');
			$this->db->join('k_transaksi kt', 'kt.id_transaksi = t.id_transaksi', 'left');
			$this->db->where('status = ', '2');
			$this->db->where('id_pengepul = ', $id_pengepul);
			return $this->db->get()->result_array();
		}
}


/* End of file M_petani.php */
/* Location: ./application/models/M_petani.php */