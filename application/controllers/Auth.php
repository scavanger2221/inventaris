<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Auth extends CI_Controller {



	/**

	 * Index Page for this controller.

	 *

	 * Maps to the following URL

	 * 		http://example.com/index.php/welcome

	 *	- or -

	 * 		http://example.com/index.php/welcome/index

	 *	- or -

	 * Since this controller is set as the default controller in

	 * config/routes.php, it's displayed at http://example.com/

	 *

	 * So any other public methods not prefixed with an underscore will

	 * map to /index.php/welcome/<method_name>

	 * @see https://codeigniter.com/user_guide/general/urls.html

	 */



	function __construct(){

		parent::__construct();		

		$this->load->model('MAuth');

		// $this->load->helper('url');

		$this->load->helper(array('form', 'url'));

 

	}





	public function index()

	{

		$this->load->view('login');

	}



	public function verifikasi(){

		$username = $this->input->post('username');

		$password = $this->input->post('password');

		$where = array(

			'username' => $username,

			'password' => md5($password)

			);

		$res = $this->MAuth->cek_login($data);

		if($res->num_rows()>0){
			$row = $res->row();
				$data_session = array(
					'nama' => $row->nama,
					'username' => $username,
					'status' => "login",
					);

					$this->session->set_userdata($data_session);
					redirect(base_url("Admin"));
			}else{
			echo "Username dan password salah !";
		}

	}

	function logout(){

		$this->session->sess_destroy();

		redirect(base_url('Auth'));

	}

}

