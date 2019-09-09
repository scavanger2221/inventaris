<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Admin extends CI_Controller {



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

		// $this->load->model('MAuth');

		// $this->load->helper('url');

		$this->load->helper(array('form', 'url'));
		

 

	}

	public function index()

	{
        $this->load->view('top-header');

        $this->load->view('sidebar');

        $this->load->view('dashboard');

        $this->load->view('control-sidebar');

        $this->load->view('footer');

	}

}

