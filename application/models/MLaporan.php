<?php

class MLaporan extends CI_Model{

    function cek_login($table,$where){		

		return $this->db->get_where($table,$where);

	}

	function getProdukTerlaris($tglawal, $tglakhir){

			$hasil=	$this->db->query("SELECT nama_barang, sum(qty) as jmlqty, qty, month(tgl_pembayaran)  FROM `tb_keranjang_belanja` INNER JOIN tb_pemesanan 
				ON tb_pemesanan.id_pemesanan = tb_keranjang_belanja.id_pemesanan INNER JOIN tb_barang ON tb_barang.id_barang = tb_keranjang_belanja.id_barang  WHERE tgl_pembayaran >= '$tglawal' and tgl_pembayaran <= '$tglakhir'
				GROUP BY tb_keranjang_belanja.id_barang, month(tgl_pembayaran)  ORDER BY qty DESC LIMIT 8");


			return $hasil;

	}

	function getLapTransaksi($tglawal, $tglakhir){

		$hasil=	$this->db->query("SELECT tb_pemesanan.id_pemesanan, nama_barang, qty, tgl_pembayaran, harga_brg, keterangan, tb_pemesanan.total, nama_pemesan  FROM `tb_keranjang_belanja` INNER JOIN tb_pemesanan 
			ON tb_pemesanan.id_pemesanan = tb_keranjang_belanja.id_pemesanan INNER JOIN tb_barang ON tb_barang.id_barang = tb_keranjang_belanja.id_barang  WHERE tgl_pembayaran >= '$tglawal' and tgl_pembayaran <= '$tglakhir' AND status='Paid'");


		return $hasil;

}
function getLapBarang($tglawal, $tglakhir){

	$hasil=	$this->db->query("SELECT nama_barang, nama_kategori, qty  FROM `tb_barang` INNER JOIN tb_stok 
		ON tb_barang.id_barang = tb_stok.id_barang INNER JOIN tb_kategori ON tb_barang.id_kategori = tb_kategori.kodeKategori");


	return $hasil;

}

}

?>