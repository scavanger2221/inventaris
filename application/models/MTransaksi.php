<?php

class MTransaksi extends CI_Model{

         

    function getProduk(){
        // $this->db->select("tb_barang.id_barang, tb_barang.nama_barang, tb_kategori.nama_kategori, tb_barang.ukuran_brg, tb_stok.tglbelanja, tb_stok.qty");
        $this->db->select("tb_barang.id_barang, tb_barang.nama_barang, tb_kategori.nama_kategori, tb_barang.ukuran_brg");
        $this->db->FROM("tb_barang");

        $this->db->join("tb_kategori", "tb_barang.id_kategori = tb_kategori.kodeKategori");
        $this->db->join("tb_stok", "tb_barang.id_barang = tb_stok.id_barang", 'left');
        $this->db->where("tb_stok.id_barang", NULL);
        return $this->db->get();

    }

    function getDetail($id){

        $this->db->select("*");
        $this->db->FROM("tb_keranjang_belanja");
        $this->db->join("tb_barang", "tb_barang.id_barang = tb_keranjang_belanja.id_barang");
        $this->db->join("tb_kategori", "tb_barang.id_kategori = tb_kategori.kodeKategori");
        $this->db->where("tb_keranjang_belanja.id_pemesanan", $id);

        return $this->db->get();

    }

        

    function getData(){

        $this->db->select("tb_barang.id_barang, tb_barang.nama_barang, tb_kategori.nama_kategori, tb_barang.ukuran_brg, tb_stok.tglbelanja, tb_stok.qty");

    

        // $this->db->select("*");

        $this->db->FROM("tb_barang");

        $this->db->join("tb_stok", "tb_barang.id_barang = tb_stok.id_barang");

        $this->db->join("tb_kategori", "tb_barang.id_kategori = tb_kategori.kodeKategori");

        return $this->db->get();

    }
    function cekhp($idpemesanan){

        $hasil = $this->db->query("SELECT nohp_pemesan FROM tb_pemesanan WHERE id_pemesanan ='".$idpemesanan."'")->row();
        return $hasil->nohp_pemesan;

    }
    

    function get_data_barang_bykode($kode){

        $hsl=$this->db->query("SELECT tb_barang.id_barang, tb_barang.nama_barang, tb_kategori.nama_kategori FROM tb_barang INNER JOIN tb_kategori on tb_barang.id_kategori = tb_kategori.kodeKategori WHERE tb_barang.id_barang='$kode'");

        if($hsl->num_rows()>0){

            foreach ($hsl->result() as $data) {

                $hasil=array(

                    'id_barang' => $data->id_barang,

                    'nama_barang' => $data->nama_barang,

                    'nama_kategori' => $data->nama_kategori

                    );

            }

        }

        return $hasil;

    }



    function input_data($data,$table){

        $this->db->insert($table,$data);

        extract($data);

       
    }


    function updateStok($kode, $qty){
        $hasil = $this->db->query("SELECT qty FROM tb_stok WHERE id_barang = '$kode'")->row();
        $jml = $hasil->qty + $qty;
                $this->db->query("UPDATE tb_stok SET qty = '".$jml."'WHERE id_barang = '".$kode."'");

}
function inputResi($kode, $resi){

            $this->db->query("UPDATE tb_pemesanan SET no_resi = '".$resi."'WHERE id_pemesanan = '".$kode."'");

}


    function terimatrans($id){
        date_default_timezone_set('Asia/Makassar');
        $this->db->where('id_pemesanan', $id);
        $this->db->update('tb_pemesanan', array('status' => "Paid" , 'tgl_pembayaran' => date('Y-m-d H:i:s') ));
    }

    function getPemesanan(){
        $this->db->select("*");
        $this->db->FROM("tb_pemesanan");
        $this->db->JOIN("tb_konsumen", "tb_pemesanan.id_konsumen = tb_konsumen.id_konsumen");
        return $this->db->get();
    }

    function getPemesananInvoice(){
        $this->db->select("*");
        $this->db->FROM("tb_pemesanan");
        $this->db->JOIN("tb_konsumen", "tb_pemesanan.id_konsumen = tb_konsumen.id_konsumen");
        
        $this->db->WHERE("no_resi", "");
        $this->db->WHERE("status", "Paid");
        return $this->db->get();
    }
    function getPemesananResi(){
        $this->db->select("*");
        $this->db->FROM("tb_pemesanan");
        $this->db->JOIN("tb_konsumen", "tb_pemesanan.id_konsumen = tb_konsumen.id_konsumen");
        $this->db->WHERE("status", "Paid");
        return $this->db->get();
    }

    

       



        

}

?>