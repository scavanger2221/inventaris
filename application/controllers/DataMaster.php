<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class DataMaster extends CI_Controller {



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

		$this->load->model('MDataMaster');

		// $this->load->helper('url');

		$this->load->helper(array('form', 'url'));

 

	}

	public function index()

	{

		$data['user'] = $this->MDataMaster->getTable("user")->result();

        $this->load->view('top-header');

        $this->load->view('sidebar');

        $this->load->view('user', $data);

        $this->load->view('control-sidebar');

        $this->load->view('footer');

	}

	function tambah_user(){

		$nama = $this->input->post('nama');

		$alamat = $this->input->post('alamat');

		$username = $this->input->post('username');

		$password = $this->input->post('password');

 

		$data = array(

			'username' => $username,

			'nama' => $nama,	
			'alamat' => $alamat,
			'password' => md5($password),

			'admin' => "1"

			);

		$iduser = $this->MDataMaster->input_data($data,'user');
		redirect('DataMaster');

	}
	function edit_user(){

		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$this->MDataMaster->edit_user($id, $username, $password);


		redirect('DataMaster');

	}
	function hapus_user($id){
		$where ="WHERE id = '".$id."'";
		$this->MDataMaster->hapus_id($where, 'user');
		redirect('DataMaster');
	}

	function edit_kategori(){
		$id = $this->input->post('kode');
		$nama = $this->input->post('nama');

		$data = array('kode' => $id,
				 	  'kategori' =>$nama,	 
					 );

		$where = array('id' => $id, );			 
		$this->MDataMaster->edit_data($data, $where, 'kategori');
		redirect('DataMaster/vKategori');
	}

	function hapus_kategori($id){
	
		$where ="WHERE kode = '".$id."'";
		$this->MDataMaster->hapus_id($where, 'kategori');
		redirect('DataMaster/vKategori');
	}



	function tambah_kategori(){
		$nama = $this->input->post('nama');
		$kode = $this->input->post('kode');
		$data = array(
			'kategori' => $nama,
			'kode' => $kode,
			);

		
		$iduser = $this->MDataMaster->input_data($data,'kategori');



		redirect('DataMaster/vKategori');

	}

	





	function tambah_produk(){

		 // setting konfigurasi upload
        // $config['upload_path'] = './gambar/';
        // $config['allowed_types'] = 'gif|jpg|png|jpeg';
        // // load library upload
        // $this->load->library('upload', $config);
        // if (!$this->upload->do_upload('usefile')) {
        //     $error = $this->upload->display_errors();
        //     // menampilkan pesan error
        //     print_r($error);
        // } else {
        //     $result = $this->upload->data();
			// $kodeProduk = $this->input->post('kodeProduk');
		$kodeKategori = $this->input->post('kodeKategori');
		$nama = $this->input->post('nama');

		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('jumlah');
		$data = array(

			// 'id_barang' => $kodeProduk,
			'kode_kategori' => $kodeKategori,
			'nama_barang' => $nama,
			'harga' => $harga,
			'jumlah' => $jumlah,
			// 'gambar' => $result['file_name']
			);
		$this->MDataMaster->input_data($data,'barang');
		redirect('DataMaster/vProduk');
       
	}

	function edit_produk(){
	
		$kodeKategori = $this->input->post('kodeKategori');
		$id_barang = $this->input->post('kodes');
		$nama = $this->input->post('nama');
		$harga = $this->input->post('harga');
		$jumlah = $this->input->post('jumlah');
	
			$data = array(
				'kode_kategori' => $kodeKategori,
				'nama_barang' => $nama,
				'harga' => $harga,
				'jumlah' => $jumlah,
				);
			
			$where = array('id' => $id_barang , );	

				$this->MDataMaster->edit_data($data, $where, 'barang');
				// redirect('DataMaster/vProduk');
			
				
				$str = $this->db->last_query();

				echo $str;

				print_r($data);
   }

	
	public function vkategori()
	{
		$data['kategori'] = $this->MDataMaster->getTable('kategori')->result();
        $this->load->view('top-header');
        $this->load->view('sidebar');
        $this->load->view('kategori', $data);

        $this->load->view('control-sidebar');

        $this->load->view('footer');

	}



	public function vProduk()
	//view Produk
	{

		$data['produk'] = $this->MDataMaster->getBarang()->result();

		$data['kategori'] = $this->MDataMaster->getTable('kategori')->result();

        $this->load->view('top-header');

        $this->load->view('sidebar');

        $this->load->view('produk', $data);

        $this->load->view('control-sidebar');

        $this->load->view('footer');

	}





	

}

