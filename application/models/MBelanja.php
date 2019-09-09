<?php

class MBelanja extends CI_Model{


    function getProduk(){

        // $this->db->select("tb_barang.id_barang, tb_barang.nama_barang, tb_kategori.nama_kategori, tb_barang.ukuran_brg, tb_stok.tglbelanja, tb_stok.qty");

        

        $this->db->select("*");

       

        $this->db->FROM("tb_barang");

        // $this->db->join("tb_keranjang_belanja", "tb_barang.id_barang = tb_keranjang_belanja.id_barang");

        return $this->db->get();

    }

    function getTransaksi($id_konsumen){

        $this->db->select("tb_barang.id_barang, tb_barang.nama_barang as nama, tb_barang.harga_brg as harga, tb_keranjang_belanja.qty, tb_barang.gambar, tb_keranjang_belanja.id_keranjang ");

        $this->db->FROM("tb_barang");

        $this->db->join("tb_keranjang_belanja", "tb_barang.id_barang = tb_keranjang_belanja.id_barang");
        // $this->db->join("tb_pemesanan", "tb_pemesanan.id_pemesanan = tb_keranjang_belanja.id_pemesanan");
        $this->db->where("id_pemesanan", '0');
        $this->db->where("id_konsumen", $id_konsumen);
        // $this->db->where("tb_pemesanan.id_konsumen", $id_konsumen);
        // $this->db->where("status", 'Not Paid');
        return $this->db->get();

    }

    function getInvoice($inv){

        $this->db->select("id_pemesanan, nama_pemesan, alamat_pemesanan, nohp_pemesan, keterangan, ongkir, total, tgl_pembayaran, tgl_pemesanan, status ");
        $this->db->from("tb_pemesanan");
        $this->db->where("tb_pemesanan.id_pemesanan", $inv);
        return $this->db->get();

    }
    function getDetailInvoice($inv){

        $this->db->select("tb_barang.id_barang, tb_barang.nama_barang as nama, tb_barang.harga_brg as harga, tb_keranjang_belanja.qty, tb_barang.berat_brg, tb_barang.gambar, tb_keranjang_belanja.id_keranjang ");

        $this->db->FROM("tb_barang");

        $this->db->join("tb_keranjang_belanja", "tb_barang.id_barang = tb_keranjang_belanja.id_barang");
        $this->db->where("tb_keranjang_belanja.id_pemesanan", $inv);
        // $this->db->where("status", 'Not Paid');
        return $this->db->get();

    }
    function getHistoryTransaksi($id_konsumen){

        $this->db->select("tb_barang.id_barang, tb_barang.nama_barang as nama, tb_barang.harga_brg as harga, tb_keranjang_belanja.qty, tb_barang.gambar, tb_keranjang_belanja.id_keranjang, tb_pemesanan.status, tb_pemesanan.id_pemesanan, tb_pemesanan.tgl_pembayaran, tb_pemesanan.tgl_pemesanan ");

        $this->db->FROM("tb_barang");

        $this->db->join("tb_keranjang_belanja", "tb_barang.id_barang = tb_keranjang_belanja.id_barang");
        $this->db->join("tb_pemesanan", "tb_pemesanan.id_pemesanan = tb_keranjang_belanja.id_pemesanan");
        $this->db->where("tb_pemesanan.id_konsumen", $id_konsumen);
        $this->db->GROUP_BY("tb_pemesanan.id_pemesanan");
        $this->db->ORDER_BY("status", 'ASC');
        return $this->db->get();

    }
    function getCart($id_konsumen){

        $this->db->select("tb_barang.id_barang, tb_barang.nama_barang as nama, tb_barang.harga_brg as harga, tb_keranjang_belanja.qty, tb_barang.gambar, tb_keranjang_belanja.id_keranjang, tb_kategori.nama_kategori as nama_kategori, tb_barang.berat_brg as berat ");

        $this->db->FROM("tb_barang");

        $this->db->join("tb_keranjang_belanja", "tb_barang.id_barang = tb_keranjang_belanja.id_barang");
        $this->db->join("tb_kategori", "tb_kategori.kodeKategori = tb_barang.id_kategori");
        // $this->db->join("tb_pemesanan", "tb_pemesanan.id_pemesanan = tb_keranjang_belanja.id_pemesanan");
        $this->db->where("id_pemesanan", '0');
        $this->db->where("id_konsumen", $id_konsumen);
        // $this->db->where("tb_pemesanan.id_konsumen", $id_konsumen);
        // $this->db->where("status", 'Not Paid');
        return $this->db->get();

    }

    function get($id_konsumen){

        $this->db->select("tb_barang.id_barang, tb_barang.nama_barang as nama, tb_barang.harga_brg as harga, tb_keranjang_belanja.qty, tb_barang.gambar, tb_keranjang_belanja.id_keranjang ");

        $this->db->FROM("tb_barang");

        $this->db->join("tb_keranjang_belanja", "tb_barang.id_barang = tb_keranjang_belanja.id_barang");
        // $this->db->join("tb_pemesanan", "tb_pemesanan.id_pemesanan = tb_keranjang_belanja.id_pemesanan");
        $this->db->where("id_pemesanan", '0');
        $this->db->where("id_konsumen", $id_konsumen);
        // $this->db->where("tb_pemesanan.id_konsumen", $id_konsumen);
        // $this->db->where("status", 'Not Paid');
        return $this->db->get();

    }

    function getBerat($id_konsumen){
        $this->db->select("sum(berat_brg) as berat_brg");

        $this->db->FROM("tb_barang");

        $this->db->join("tb_keranjang_belanja", "tb_barang.id_barang = tb_keranjang_belanja.id_barang");
        $this->db->where("id_pemesanan", '0');
        $this->db->where("id_konsumen", $id_konsumen);
        
        return $this->db->get();

    }

    function cekCart($id_konsumen){

        $query = $this->db->query("SELECT * FROM tb_keranjang_belanja WHERE id_konsumen = '$id_konsumen' AND id_pemesanan = '0'");
     

        return $query->num_rows();

    }

    function sumCart($id_konsumen){



        $this->db->select("sum(subtotal) as total");
        $this->db->FROM("tb_keranjang_belanja");
        $this->db->where("id_konsumen", $id_konsumen);
        $this->db->where("id_pemesanan", '0');
        return $this->db->get();

    }

    function cekHP($invoice){
        $this->db->select("nohp_pemesan");
        $this->db->FROM("tb_pemesanan");
        $this->db->where("id_pemesanan", $invoice);
        return $this->db->get();
    }



    function getBestSeller(){
        $this->db->select("tb_barang.id_barang as id_barang, nama_barang, harga_brg, gambar, sum(qty) as jmlbarang ");
        $this->db->FROM("tb_pemesanan") ;
        $this->db->join("tb_keranjang_belanja", "tb_pemesanan.id_pemesanan = tb_keranjang_belanja.id_pemesanan");
        $this->db->join("tb_barang", "tb_barang ON tb_barang.id_barang = tb_keranjang_belanja.id_barang");
        $this->db->WHERE("status = 'Paid'");
        $this->db->group_by("tb_barang.id_barang");
        $this->db->order_by("jmlbarang", "DESC LIMIT 10");
        return $this->db->get();
    }





       function getTable($table){

        return $this->db->get($table);

    }

  

    function hapusCart($id){

       $this->db->query('DELETE FROM tb_keranjang_belanja WHERE id_keranjang = '.$id);

      

    }
     function addQty($id){


        $query = $this->db->query('SELECT * FROM tb_keranjang_belanja INNER JOIN tb_barang ON tb_keranjang_belanja.id_barang = tb_barang.id_barang WHERE id_keranjang ='.$id)->row();
            $cekQty = $query->qty + 1;
            $cekHarga = $query->harga_brg * $cekQty;
                // echo $cekQty;
        // $cek = 10;
            $this->db->query('UPDATE tb_keranjang_belanja SET tb_keranjang_belanja.qty = '.$cekQty.', tb_keranjang_belanja.subtotal = '.$cekHarga.' WHERE id_keranjang = '.$id);

            

    }

 
        function removeQty($id){


   $query = $this->db->query('SELECT * FROM tb_keranjang_belanja INNER JOIN tb_barang ON tb_keranjang_belanja.id_barang = tb_barang.id_barang WHERE id_keranjang ='.$id)->row();
    $cekQty = $query->qty - 1;
    $cekHarga = $query->harga_brg * $cekQty;
        // echo $cekQty;
// $cek = 10;
       $this->db->query('UPDATE tb_keranjang_belanja SET tb_keranjang_belanja.qty = '.$cekQty.', tb_keranjang_belanja.subtotal = '.$cekHarga.' WHERE id_keranjang = '.$id);

      

    }



    function addCart($table,$data){



        $this->db->insert($table,$data);

    }



    function cekBarang($id){

        $query = $this->db->query('SELECT * FROM tb_barang WHERE id_barang = '.$id);

        return $query;

    }

    function cekCartWhere($id_barang, $id_konsumen){

        $query = $this->db->query("SELECT * FROM tb_keranjang_belanja WHERE id_barang ='$id_barang' AND id_konsumen ='$id_konsumen' AND id_pemesanan = '0'");

        return $query;

    }

    function updateCart($table,$data,$where){

		$this->db->where($where);

		$this->db->update($table,$data);

	}	

    function bayarCart($id_konsumen , $id_admin, $keterangan, $bukti_trf, $ongkir, $subtotal, $provinsi, $kota, $kurir, $nohplain, $namalain, $alamatlain){
        $qry_inv = $this->db->query("SELECT id FROM tb_pemesanan ORDER BY id_pemesanan DESC LIMIT 1")->row();

        $query = $this->db->query("SELECT * FROM tb_konsumen WHERE id_konsumen ='$id_konsumen'")->row();
    
        //angka unik untuk trx
	
                    //no invoice
                    $cek_id_awal = $qry_inv->id;
                    if($cek_id_awal == ''){
                        $idhasil = 1;
                    } else {
                        $idhasil= $qry_inv->id + 1;
                    }
	    $inv=770000+$idhasil;
                    

        if($nohplain == ''){
            $data['nohp_pemesan'] = $query->telp_konsumen;
        }else{
            $data['nohp_pemesan'] = $nohplain;
        }

        if($namalain == ''){
            $data['nama_pemesan'] = $query->nama_konsumen;
        }else{
            $data['nama_pemesan'] = $namalain;
        }

        if($alamatlain == ''){
            $data['alamat_pemesanan'] = $query->alamat_konsumen;
        }else{
            $data['alamat_pemesanan'] = $alamatlain;
        }

        $data['id_pemesanan'] =  "INV-".$inv;
        $data['id_konsumen'] = $query->id_konsumen;
        $data['keterangan'] = $keterangan;
        $data['bukti_trf'] = $bukti_trf;
        $data['ongkir'] = $ongkir;
        $data['total'] = $subtotal;
        $data['kurir'] = $kurir;
        $data['provinsi'] = $provinsi;
        $data['kota'] = $kota;
        $data['status'] = 'Not Paid';
        
        $this->db->insert("tb_pemesanan",$data);
        $id = $this->db->insert_id();
        if($id <> ''){
            $qry = $this->db->query('SELECT * FROM tb_pemesanan WHERE id ='.$id)->row();
    
            $this->db->query("UPDATE tb_keranjang_belanja SET tb_keranjang_belanja.id_pemesanan = '$qry->id_pemesanan' WHERE id_konsumen = '$id_konsumen' AND id_pemesanan = '0'");       
            
        }

            return $inv;


            


    }

    
    function getProdukAll($ket,$limit, $start){
        $this->db->select("*");
        $this->db->from("tb_barang");
        $this->db->join("tb_kategori", "tb_kategori.kodeKategori = tb_barang.id_kategori");
        $this->db->like("nama_barang", $ket);
        $this->db->limit( $limit, $start);
        return $this->db->get();
    }
    function jmlProdukAll($ket){
        $this->db->select("*");
        $this->db->from("tb_barang");
        $this->db->join("tb_kategori", "tb_kategori.kodeKategori = tb_barang.id_kategori");
        $this->db->like("nama_barang", $ket);
        return $this->db->get()->num_rows();
    }

        

}

?>