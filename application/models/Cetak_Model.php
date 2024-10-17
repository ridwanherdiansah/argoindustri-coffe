<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_Model extends CI_Model {

	public function cetak_kopi($id_pengepul)
		{
			$this->db->select('*');
			$this->db->from('kopi k');
			$this->db->join('k_kopi kk', 'k.id_kopi = kk.id_kopi');
			$this->db->where('k.id_pengepul', $id_pengepul);
			$this->db->where('k.id_kopi = ', $this->input->post('id_kopi'));
			return $this->db->get()->result_array();
		}

	public function cetak_kopi_semua($id_pengepul)
		{
			$this->db->select('*');
			$this->db->from('kopi k');
			$this->db->join('k_kopi kk', 'k.id_kopi = kk.id_kopi');
			$this->db->where('k.id_pengepul', $id_pengepul);
			return $this->db->get()->result_array();
		}

	public function cetak_petani($id_pengepul)
		{
			$this->db->select('*');
			$this->db->from('petani p');
			$this->db->join('k_petani kp', 'p.id_petani = kp.id_petani');
			$this->db->where('p.id_pengepul', $id_pengepul);
			$this->db->where('p.id_petani = ', $this->input->post('id_petani'));
			return $this->db->get()->result_array();
		}

	public function cetak_petani_semua($id_pengepul)
		{
			$this->db->select('*');
			$this->db->from('petani p');
			$this->db->join('k_petani kp', 'p.id_petani = kp.id_petani');
			$this->db->where('p.id_pengepul', $id_pengepul);
			return $this->db->get()->result_array();
		}

	public function cetak_pemasukan($id_pengepul)
		{
			$this->db->from('pemasukan');
			$this->db->where('tanggal >= ', $this->input->post('tanggal_awal'));
			$this->db->where('tanggal <= ', $this->input->post('tanggal_akhir'));
			$this->db->where('id_pengepul = ', $id_pengepul);
			return $this->db->get()->result_array();
		}

	public function cetak_transaksi2($id_pengepul)
		{
			$this->db->select('*');
			$this->db->from('transaksi t');
			$this->db->join('k_transaksi kt', 'kt.id_transaksi = t.id_transaksi', 'left');
			$this->db->where('tanggal >= ', $this->input->post('tanggal_awal'));
			$this->db->where('tanggal <= ', $this->input->post('tanggal_akhir'));
			$this->db->where('status = ', '2');
			$this->db->where('id_kopi = ', $this->input->post('id_kopi'));
			$this->db->where('id_pengepul = ', $id_pengepul);
			return $this->db->get()->result_array();
		}

	public function cetak_transaksi2_semua($id_pengepul)
		{
			$this->db->select('*');
			$this->db->from('transaksi t');
			$this->db->join('k_transaksi kt', 'kt.id_transaksi = t.id_transaksi', 'left');
			$this->db->join('k_expedisi ke', 'ke.id_expedisi = t.id_expedisi', 'left');
			$this->db->where('status = ', '2');
			$this->db->where('id_pengepul = ', $id_pengepul);
			return $this->db->get()->result_array();
		}

	public function cetak_transaksi_gudang()
		{
			$this->db->select('*');
			$this->db->from('transaksi t');
			$this->db->join('k_expedisi ke', 'ke.id_expedisi = t.id_expedisi', 'left');
			$this->db->where('t.tanggal >= ', $this->input->post('tanggal_awal'));
			$this->db->where('t.tanggal <= ', $this->input->post('tanggal_akhir'));
			$this->db->where('t.id_user = ', $this->input->post('id_user'));
			return $this->db->get()->result_array();
		}

	public function cetak_transaksi_gudang_semua()
		{
			$this->db->select('*');
			$this->db->from('transaksi t');
			$this->db->join('k_expedisi ke', 'ke.id_expedisi = t.id_expedisi', 'left');
			$this->db->where('t.tanggal >= ', $this->input->post('tanggal_awal'));
			$this->db->where('t.tanggal <= ', $this->input->post('tanggal_akhir'));
			return $this->db->get()->result_array();
		}

	public function cetak_pemasukan_gudang()
		{
			$this->db->from('pemasukan');
			$this->db->where('tanggal >= ', $this->input->post('tanggal_awal'));
			$this->db->where('tanggal <= ', $this->input->post('tanggal_akhir'));
			$this->db->where('id_pengepul = ', $this->input->post('id_pengepul'));
			return $this->db->get()->result_array();
		}

	public function cetak_pemasukan_gudang_semua()
		{
			$this->db->from('pemasukan');
			$this->db->where('tanggal >= ', $this->input->post('tanggal_awal'));
			$this->db->where('tanggal <= ', $this->input->post('tanggal_akhir'));
			return $this->db->get()->result_array();
		}

	public function cetak_pengeluaran()
		{
			$this->db->select('*');
			$this->db->from('transaksi t');
			$this->db->join('k_expedisi ke', 'ke.id_expedisi = t.id_expedisi', 'left');
			$this->db->where('t.tanggal >= ', $this->input->post('tanggal_awal'));
			$this->db->where('t.tanggal <= ', $this->input->post('tanggal_akhir'));
			$this->db->where('t.status = ', 2);
			return $this->db->get()->result_array();
		}
}


/* End of file M_petani.php */
/* Location: ./application/models/M_petani.php */