<?php

class MAuth extends CI_Model{

    function cek_login($table,$where){		

		return $this->db->get_where($table,$where);

	}
	function getDataKonsumen($where){		
		$this->db->select("*");
		$this->db->from("tb_konsumen");
		$this->db->where("tb_konsumen.id_user", $where);
		return $this->db->get();

	}
	function getDataAdmin($where){		
		$this->db->select("*");
		$this->db->from("tb_admin");
		$this->db->where("tb_admin.id_user", $where);
		return $this->db->get();

	}

	function input_data($data,$table){
        $this->db->insert($table,$data);
        $id = $this->db->insert_id();
        return $id;
        }


        

}

?>