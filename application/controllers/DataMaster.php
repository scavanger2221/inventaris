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

		$data['user'] = $this->MDataMaster->getTable("tb_user")->result();

        $this->load->view('admin/top-header');

        $this->load->view('admin/sidebar');

        $this->load->view('admin/user', $data);

        $this->load->view('admin/control-sidebar');

        $this->load->view('admin/footer');

	}

	function tambah_user(){

		$nama = $this->input->post('nama');

		$alamat = $this->input->post('alamat');

		$username = $this->input->post('username');

		$password = $this->input->post('password');

 

		$data = array(

			'username' => $username,

			'password' => md5($password),

			'status' => "Admin"

			);

			

		$iduser = $this->MDataMaster->input_data($data,'tb_user');



		$data2 = array(

			'nama_admin' => $nama,

			'alamat_admin' => $alamat,

			'id_user' => $iduser

			);

			$this->MDataMaster->input_data($data2,'tb_admin');

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
		$where ="WHERE id_user = '".$id."'";
		$this->MDataMaster->hapus_id($where, 'tb_user');
		redirect('DataMaster');
	}

	function edit_kategori(){
		$id = $this->input->post('kode');
		$nama = $this->input->post('nama');
		$this->MDataMaster->edit_kategori($id, $nama);
		redirect('DataMaster/vKategori');
	}

	function hapus_kategori($id){
	
		$where ="WHERE kodeKategori = '".$id."'";
		$this->MDataMaster->hapus_id($where, 'tb_kategori');
		redirect('DataMaster/vKategori');
	}



	function tambah_kategori(){
		$nama = $this->input->post('nama');
		$kode = $this->input->post('kode');
		$data = array(

			'nama_kategori' => $nama,

			'kodeKategori' => $kode,

			);

			

		$iduser = $this->MDataMaster->input_data($data,'tb_kategori');



		redirect('DataMaster/vKategori');

	}

	










	function tambah_produk(){

		 // setting konfigurasi upload
        $config['upload_path'] = './gambar/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        // load library upload
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('usefile')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            $result = $this->upload->data();
			// $kodeProduk = $this->input->post('kodeProduk');
		$kodeKategori = $this->input->post('kodeKategori');
		$nama = $this->input->post('nama');
		$deskripsi = $this->input->post('deskripsi');
		$gambar = $this->input->post('gambar');
		$ukuran = $this->input->post('ukuran');
		$harga = $this->input->post('harga');
		$data = array(

			// 'id_barang' => $kodeProduk,
			'id_kategori' => $kodeKategori,
			'nama_barang' => $nama,
			'deskripsi' => $deskripsi,
			'ukuran_brg' => $ukuran,
			'harga_brg' => $harga,
			'gambar' => $result['file_name']
			);
		$this->MDataMaster->input_data($data,'tb_barang');
		redirect('DataMaster/vProduk');
        }
	}

	function edit_produk(){
		
				// setting konfigurasi upload
				$config['upload_path'] = './gambar/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				// load library upload
				$this->load->library('upload', $config);
				
		$gambar = $this->input->post('usefile');
		$kodeKategori = $this->input->post('kodeKategori');
		$kodeProduk = $this->input->post('kodes');
		$nama = $this->input->post('nama');
		$deskripsi = $this->input->post('deskripsi');
		$ukuran = $this->input->post('ukuran');
		$berat = $this->input->post('berat');
		$harga = $this->input->post('harga');
		if($gambar <> ''){
			
				if (!$this->upload->do_upload('usefile')) {
					$error = $this->upload->display_errors();
					// menampilkan pesan error
					print_r($error);
				} else {
			
					$result = $this->upload->data();
					if($result){
					// $kodeProduk = $this->input->post('kodeProduk');
		 
					 $data = array(
		 
						 'id_barang' => $kodeProduk,
						 'id_kategori' => $kodeKategori,
						 'nama_barang' => $nama,
						 'deskripsi' => $deskripsi,
						 'ukuran_brg' => $ukuran,
						 'harga_brg' => $harga,
						 'berat_brg' => $berat,
						 'gambar' => $result['file_name']
						 );
						 }else {
		 
						 }
		 
		 
				$this->MDataMaster->edit_produk($data,'1');
				redirect('DataMaster/vProduk');
				}
		}else{
			$data = array(
		 
				'id_barang' => $kodeProduk,
				'id_kategori' => $kodeKategori,
				'nama_barang' => $nama,
				'deskripsi' => $deskripsi,
				'ukuran_brg' => $ukuran,
				'berat_brg' => $berat,
				'harga_brg' => $harga
				
				);
				$this->MDataMaster->edit_produk($data,'0');
				redirect('DataMaster/vProduk');
		}
	
   }

	
	public function vkategori()
	{
		$data['kategori'] = $this->MDataMaster->getTable('tb_kategori')->result();
        $this->load->view('admin/top-header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/kategori', $data);

        $this->load->view('admin/control-sidebar');

        $this->load->view('admin/footer');

	}



	public function vProduk()

	{

		$data['produk'] = $this->MDataMaster->getUser()->result();

		$data['kategori'] = $this->MDataMaster->getTable('tb_kategori')->result();

        $this->load->view('admin/top-header');

        $this->load->view('admin/sidebar');

        $this->load->view('admin/produk', $data);

        $this->load->view('admin/control-sidebar');

        $this->load->view('admin/footer');

	}





	

}

