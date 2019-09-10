<?php

class MAuth extends CI_Model{

    function cek_login($where){		

		return $this->db->get_where('user',$where);

	}

}

?>