<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Hahaha extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model('M_CallSQL');
		
		if($this->session->userdata('status') != "Login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
		$data = $this->M_CallSQL->sessdata();
		$data['tPengguna'] = $this->db->select("p_username, p_name, p_email")
									->from("ta_pengguna")->get()->result();
		$view = array(
			$this->load->view('template/v_header', $data),
			$this->load->view('content/v_absensi', $data),
			$this->load->view('template/v_footer')
		);

		return $view;
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}