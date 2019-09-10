<?php

class MPembayaran extends CI_Model
{
    public function get_pembayaran()
    {
        $a = $this->db->query("SELECT cicilan.*,kategori.kategori as kategori , barang.nama_barang,
        (cicilan.lama-
        (SELECT COUNT(id_bayar)FROM pembayaran WHERE pembayaran.id_cicilan=cicilan.id_cicilan)) as sisa_bulan,
        (cicilan.harga_total-
        (IFNULL((SELECT SUM(bayar) FROM pembayaran WHERE pembayaran.id_cicilan=cicilan.id_cicilan),0))) as sisa_bayar,
        (SELECT EXISTS(SELECT id_bayar FROM pembayaran WHERE MONTH(tgl_bayar)=MONTH(CURDATE()) AND pembayaran.id_cicilan=cicilan.id_cicilan)) as is_paid
        FROM cicilan LEFT JOIN barang ON 
                cicilan.id_barang=barang.id LEFT JOIN kategori
                ON barang.kode_kategori = kategori.kode 
                WHERE (cicilan.harga_total-(IFNULL((SELECT SUM(bayar) FROM pembayaran WHERE pembayaran.id_cicilan=cicilan.id_cicilan),0)))>0");
        return $a->result();
    }

    public function get_detail_pembayaran($where = null)
    {
        $this->db->join('cicilan', 'pembayaran.id_cicilan=cicilan.id_cicilan');
        $this->db->join('barang', 'cicilan.id_barang=barang.id');
        $this->db->join('kategori', 'barang.kode_kategori=kategori.kode');
        $this->db->from("pembayaran");
        if ($where != null)
            $this->db->where($where);
        $a = $this->db->get();
        return $a->result();
    }

    function input_data($data, $table)
    {

        $this->db->insert($table, $data);

        $id = $this->db->insert_id();

        return $id;
    }
}
