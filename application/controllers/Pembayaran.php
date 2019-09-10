<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('MPembayaran');
        $this->load->model('MDataMaster');
        $this->load->helper(array('form', 'url'));
    }

    public function vPembayaran()
    {
        $data['data_bayar'] = $this->MPembayaran->get_pembayaran();
        $this->load->view('top-header');

        $this->load->view('sidebar');

        $this->load->view('pembayaran', $data);

        $this->load->view('control-sidebar');

        $this->load->view('footer');
    }
    public function vHistoryBayar($id_bayar = null)
    {
        if ($id_bayar != null) {
            $where = array(
                "pembayaran.id_cicilan" => $id_bayar
            );
        }else{
            $where=null;
        }
        $data['pembayaran'] = $this->MPembayaran->get_detail_pembayaran($where);
        // echo $this->db->last_query();
        // print_r($data['pembayaran']);


        $this->load->view('top-header');

        $this->load->view('sidebar');

        $this->load->view('historyBayar', $data);

        $this->load->view('control-sidebar');

        $this->load->view('footer');
    }

    public function bayar()
    {
        $bayar = $this->input->post('bayar');
        $date = date('Y-m-d');
        $id_cicilan = $this->input->post('idCicilan');

        $data = array(
            "bayar" => $bayar,
            "tgl_bayar" => $date,
            "id_cicilan" => $id_cicilan
        );

        $this->MPembayaran->input_data($data, "pembayaran");
        redirect("Pembayaran/vPembayaran");
    }
}
