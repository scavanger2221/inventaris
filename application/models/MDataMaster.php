<?php

class MDataMaster extends CI_Model{

    function getBarang(){

            $this->db->select("barang.*, kategori.kategori");

            $this->db->from("barang");

            $this->db->join("kategori", "barang.kode_kategori = kategori.kode");

        return $this->db->get();

        }

        

     function getTable($table){


            return $this->db->get($table);

        }

        

        

	function input_data($data,$table){

        $this->db->insert($table,$data);

        $id = $this->db->insert_id();

        return $id;

        }
        
        function edit_user($id, $username, $password){

                if($password <> ''){
                        $this->db->query("UPDATE tb_user SET username = '$username', password = '$password' WHERE id_user = $id");
                }else{
                        $this->db->query("UPDATE tb_user SET username = '$username'  WHERE id_user = $id");
                }
          
        
        
        }

        function edit_data($data, $where, $table){

                $this->db->where($where);
               return $this->db->update($table, $data);
                
        }

        // function edit_kategori($id, $nama){

        //         $this->db->query("UPDATE tb_kategori SET nama_kategori = '$nama' WHERE kodeKategori = '".$id."'");
        
        // }
        // function edit_produk($data, $st){
        //         if($st == 1){
        //                 $this->db->query("UPDATE tb_barang SET id_kategori = '".$data['id_kategori']."', nama_barang = '".$data['nama_barang']."'
        //                 , deskripsi = '".$data['deskripsi']."' , ukuran_brg = '".$data['ukuran_brg']."', gambar = '".$data['gambar']."' 
        //                 , harga_brg = '".$data['harga_brg']."' , berat_brg = '".$data['berat_brg']."' 
        //                 WHERE id_barang = '".$data['id_barang']."'");
        //         }else{
        //                 $this->db->query("UPDATE tb_barang SET id_kategori = '".$data['id_kategori']."', nama_barang = '".$data['nama_barang']."'
        //                 , deskripsi = '".$data['deskripsi']."' , ukuran_brg = '".$data['ukuran_brg']."'
        //                 , harga_brg = '".$data['harga_brg']."' , berat_brg = '".$data['berat_brg']."' 
        //                 WHERE id_barang = '".$data['id_barang']."'");
        //         }
              
        
        // }



        function hapus_id($WHERE, $table){
        
                $this->db->query("DELETE FROM $table $WHERE");
        }
        
        public function getCicilan(){
                $a=$this->db->query("SELECT cicilan.*,kategori.*,barang.*, (SELECT EXISTS(SELECT id_bayar FROM pembayaran WHERE pembayaran.id_cicilan=cicilan.id_cicilan)) as is_uneditable FROM cicilan LEFT JOIN barang ON cicilan.id_barang=barang.id LEFT JOIN kategori
                 ON barang.kode_kategori = kategori.kode");
                return $a->result();
        }

        public function setCicilan($datas,$id_cicilan){
                $this->db->update('cicilan',$datas,$id_cicilan);
        }

}
